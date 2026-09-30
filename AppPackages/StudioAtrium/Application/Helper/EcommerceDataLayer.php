<?php
namespace StudioAtrium\Application\Helper;

/**
 * GA4 / GTM ecommerce payloads (additive dataLayer pushes).
 * Spec: https://developers.google.com/analytics/devguides/collection/ga4/ecommerce
 */
class EcommerceDataLayer
{
	const CURRENCY = 'PLN';
	const BRAND = 'Studio Atrium';

	/**
	 * @param int|string $id
	 * @param string $name
	 * @param float|int|string $price
	 * @param string|null $category
	 * @param int|null $index 1-based
	 * @param int $quantity
	 * @return array
	 */
	public static function item($id, $name, $price, $category = null, $index = null, $quantity = 1)
	{
		$item = array(
			'item_id' => (string) $id,
			'item_name' => self::_decodeName($name),
			'item_brand' => self::BRAND,
			'price' => round((float) $price, 2),
			'quantity' => max(1, (int) $quantity),
		);
		if ($category !== null && $category !== '') {
			$item['item_category'] = (string) $category;
		}
		if ($index !== null) {
			$item['index'] = (int) $index;
		}
		return $item;
	}

	/**
	 * @param array $card from _buildCategoryListCards
	 * @param int|null $index
	 * @return array
	 */
	public static function itemFromCard(array $card, $index = null)
	{
		return self::item(
			isset($card['id']) ? $card['id'] : '',
			isset($card['name']) ? $card['name'] : '',
			isset($card['price']) ? $card['price'] : 0,
			isset($card['type_label']) ? $card['type_label'] : 'Projekt',
			$index !== null ? $index : null
		);
	}

	/**
	 * Basket cookie row: pid, price, name (often urlencoded), version; optional project array.
	 *
	 * @param array $basketItem
	 * @param array|null $project
	 * @return array|null
	 */
	public static function itemFromBasket(array $basketItem, $project = null)
	{
		if (!empty($basketItem['pid'])) {
			$id = $basketItem['pid'];
			$name = isset($basketItem['name']) ? $basketItem['name'] : '';
			$category = 'Projekt domu';
			if (is_array($project)) {
				if (!empty($project['name'])) {
					$name = $project['name'];
				} elseif ($name === '' && !empty($project['symbol_alpha'])) {
					$name = trim(($project['symbol_alpha'] ?? '') . ' ' . ($project['symbol_num'] ?? ''));
				}
				if (!empty($project['type'])) {
					$category = Project::getTypes($project['type']) ?: $category;
				}
			}
			return self::item($id, $name, isset($basketItem['price']) ? $basketItem['price'] : 0, $category);
		}
		if (!empty($basketItem['eid'])) {
			return self::item(
				'extra-' . $basketItem['eid'],
				isset($basketItem['name']) ? $basketItem['name'] : ('Dodatek ' . $basketItem['eid']),
				isset($basketItem['price']) ? $basketItem['price'] : 0,
				'Dodatek'
			);
		}
		return null;
	}

	/**
	 * @param object $project Project entity
	 * @param float|int $price
	 * @param string|null $categoryLabel
	 * @return array
	 */
	public static function itemFromProjectEntity($project, $price, $categoryLabel = null)
	{
		$type = method_exists($project, 'getType') ? $project->getType() : 'house';
		$category = $categoryLabel ?: (Project::getTypes($type) ?: 'Projekt domu');
		$name = method_exists($project, 'getName') ? $project->getName() : '';
		if ($name === '' && method_exists($project, 'getSymbolAlpha')) {
			$name = trim($project->getSymbolAlpha() . ' ' . $project->getSymbolNum());
		}
		return self::item($project->getId(), $name, $price, $category);
	}

	/**
	 * @param array $item
	 * @return array event payload (without event wrapper — use event())
	 */
	public static function viewItem(array $item)
	{
		return self::event('view_item', array($item), self::_valueFromItems(array($item)));
	}

	/**
	 * @param array $items
	 * @param string $listId
	 * @param string $listName
	 * @return array
	 */
	public static function viewItemList(array $items, $listId, $listName)
	{
		$withList = array();
		foreach ($items as $i => $item) {
			$item['item_list_id'] = (string) $listId;
			$item['item_list_name'] = (string) $listName;
			if (!isset($item['index'])) {
				$item['index'] = $i + 1;
			}
			$withList[] = $item;
		}
		return self::event('view_item_list', $withList, null, array(
			'item_list_id' => (string) $listId,
			'item_list_name' => (string) $listName,
		));
	}

	/**
	 * @param array $item
	 * @return array
	 */
	public static function addToCart(array $item)
	{
		return self::event('add_to_cart', array($item), self::_valueFromItems(array($item)));
	}

	/**
	 * @param array $items
	 * @param float|null $value
	 * @return array
	 */
	public static function viewCart(array $items, $value = null)
	{
		return self::event('view_cart', $items, $value !== null ? $value : self::_valueFromItems($items));
	}

	/**
	 * @param array $items
	 * @param float|null $value
	 * @return array
	 */
	public static function beginCheckout(array $items, $value = null)
	{
		return self::event('begin_checkout', $items, $value !== null ? $value : self::_valueFromItems($items));
	}

	/**
	 * @param string|int $transactionId
	 * @param array $items
	 * @param float $value
	 * @param float|null $tax VAT amount (gross includes 23% VAT → tax = value * 0.23/1.23)
	 * @return array
	 */
	public static function purchase($transactionId, array $items, $value, $tax = null)
	{
		$value = round((float) $value, 2);
		if ($tax === null && $value > 0) {
			$tax = round($value * 0.23 / 1.23, 2);
		}
		$extra = array(
			'transaction_id' => (string) $transactionId,
			'value' => $value,
		);
		if ($tax !== null) {
			$extra['tax'] = round((float) $tax, 2);
		}
		return self::event('purchase', $items, $value, $extra);
	}

	/**
	 * @param string $eventName
	 * @param array $items
	 * @param float|null $value
	 * @param array $extraEcommerce
	 * @return array full dataLayer object
	 */
	public static function event($eventName, array $items, $value = null, array $extraEcommerce = array())
	{
		$ecommerce = array_merge(array(
			'currency' => self::CURRENCY,
			'items' => array_values($items),
		), $extraEcommerce);
		if ($value !== null && !isset($ecommerce['value'])) {
			$ecommerce['value'] = round((float) $value, 2);
		}
		return array(
			'event' => $eventName,
			'ecommerce' => $ecommerce,
		);
	}

	/**
	 * Build items + value from basket + optional projects map keyed by id.
	 *
	 * @param array $basket
	 * @param array $projects
	 * @return array{items: array, value: float}
	 */
	public static function fromBasket(array $basket, array $projects = array())
	{
		$items = array();
		$value = 0.0;
		foreach ($basket as $row) {
			$project = null;
			if (!empty($row['pid']) && isset($projects[$row['pid']])) {
				$project = $projects[$row['pid']];
			}
			$item = self::itemFromBasket($row, $project);
			if ($item) {
				$items[] = $item;
				$value += $item['price'] * $item['quantity'];
			}
		}
		return array('items' => $items, 'value' => round($value, 2));
	}

	/**
	 * @param array $listCards
	 * @param string $listId
	 * @param string $listName
	 * @return array
	 */
	public static function fromListCards(array $listCards, $listId, $listName)
	{
		$items = array();
		foreach ($listCards as $i => $card) {
			$items[] = self::itemFromCard($card, $i + 1);
		}
		return self::viewItemList($items, $listId, $listName);
	}

	/**
	 * @param array $items
	 * @return float
	 */
	private static function _valueFromItems(array $items)
	{
		$sum = 0.0;
		foreach ($items as $item) {
			$qty = isset($item['quantity']) ? (int) $item['quantity'] : 1;
			$sum += ((float) $item['price']) * max(1, $qty);
		}
		return round($sum, 2);
	}

	/**
	 * @param string $name
	 * @return string
	 */
	private static function _decodeName($name)
	{
		$name = (string) $name;
		if ($name === '') {
			return '';
		}
		$decoded = rawurldecode($name);
		// Avoid double-decoding garbage; prefer decoded if it looks like text
		if ($decoded !== $name && preg_match('//u', $decoded)) {
			return $decoded;
		}
		return $name;
	}
}
