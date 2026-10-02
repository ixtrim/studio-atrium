<?php
namespace StudioAtrium\Application\Helper;

/**
 * Payment / delivery method labels and courier costs for the order cart.
 *
 * Lived in the old StudioAtrium.phar packages and was never ported into
 * AppPackages — Order::doCart fatals without it. Values match live
 * studioatrium.pl cart output (data-min-payment / data-payment-* / labels).
 */
class Delivery
{
    /** Cart total (zł) at/above which courier shipping is free. */
    const MIN_PAYMENT_TO_FREE_SHIPPING = 501;

    /**
     * @param string|null $key  When set, return that label only
     * @return array|string|null
     */
    public static function getPayment($key = null)
    {
        $methods = array(
            'cash'     => 'Gotówka przy odbiorze',
            'transfer' => 'Przelew na konto',
            'online'   => 'Płatność online',
        );

        if ($key !== null && $key !== '') {
            return isset($methods[$key]) ? $methods[$key] : null;
        }

        return $methods;
    }

    /**
     * Payment options when the basket has add-ons only (no project).
     *
     * @param string|null $key
     * @return array|string|null
     */
    public static function getAddonPayment($key = null)
    {
        $methods = array(
            'transfer' => 'Przelew na konto',
        );

        if ($key !== null && $key !== '') {
            return isset($methods[$key]) ? $methods[$key] : null;
        }

        return $methods;
    }

    /**
     * @param string|null $key
     * @return array|string|null
     */
    public static function getDelivery($key = null)
    {
        $methods = array(
            'courier' => 'Kurier',
            'self'    => 'Odbiór osobisty',
        );

        if ($key !== null && $key !== '') {
            return isset($methods[$key]) ? $methods[$key] : null;
        }

        return $methods;
    }

    /**
     * Shipping costs keyed for Cart.tpl / order.js data-payment-* attributes.
     * Courier costs are per payment method; self is a flat 0.
     *
     * @return array
     */
    public static function getCost()
    {
        return array(
            'courier' => array(
                'cash'     => 25,
                'transfer' => 25,
                'online'   => 25,
            ),
            'self' => 0,
        );
    }
}
