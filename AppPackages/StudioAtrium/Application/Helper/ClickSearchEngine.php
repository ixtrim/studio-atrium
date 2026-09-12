<?php
namespace StudioAtrium\Application\Helper;

/**
 * DB-backed click-search engine used by the public overlay
 * (project-search-overlay / click_search_numbers).
 * Returns facet keys matching overlay DOM ids (bucketed + slugified).
 */
class ClickSearchEngine
{
	private static $typeCategoryMap = [
		'parterowe'                => 5,
		'z_poddaszem'              => 6,
		'z_poddaszem_do_adaptacji' => 6,
		'pietrowe'                 => 7,
		'nowoczesne'               => 13,
		'beskidzkie'               => 14,
		'dla_rodziny_2+2'          => 16,
		'dla_rodziny_2+3'          => 17,
		'blizniacze'               => 21,
		'dwulokalowe'              => 22,
		'na_waska_dzialke'         => 25,
		'z_plaskim_dachem'         => 40,
		'szkieletowe'              => 43,
		'na_skarpe'                => 46,
		'rezydencje'               => 49,
		'nowoczesna_stodola'       => 59,
		'male_do_70m2'             => 78,
	];

	/** Extra checkboxes keyed as c{categoryId} in the overlay. */
	private static $categoryFacets = [
		'c18' => 18, // duza_kotlownia
		'c19' => 19, // kotlownia
		'c26' => 26, // od_poludnia
		'c30' => 30, // zantresola
		'c31' => 31, // zestrychem
	];

	/** Form slug => DB string_value for select/radio string params. */
	private static $slugToDbValue = [
		'lekki'                   => 'lekki',
		'gestozebrowy'            => 'gęstożebrowy',
		'plyta_zelbetowa'         => 'płyta żelbetowa',
		'drewniany_belkowy'       => 'drewniany belkowy',
		'dwuspadowy'              => 'dwuspadowy',
		'wielospadowy'            => 'wielospadowy',
		'mansardowy'              => 'mansardowy',
		'stozkowy'                => 'stożkowy',
		'stropodach'              => 'stropodach',
		'rownolegla_do_drogi'     => 'równoległa do drogi',
		'prostopadla_do_drogi'    => 'prostopadła do drogi',
		'rownolegla'              => 'równoległa do drogi',
		'prostopadla'             => 'prostopadła do drogi',
		'brak'                    => 'brak',
		'wbryle'                  => 'w bryle',
		'wpiwnicy'                => 'w piwnicy',
		'dostawiony'              => 'dostawiony do bryły',
		'wysuniety'               => 'wysunięty od frontu',
		'jednobiegowe'            => 'jednobiegowe',
		'zabiegowe'               => 'zabiegowe',
		'krecone'                 => 'kręcone',
		'zespocznikiem'           => 'ze spocznikiem',
	];

	const GARAGE_LOCATION_PARAM_ID = 109;
	const GARAGE_SPOTS_PARAM_ID    = 78;
	const BASEMENT_PARAM_ID        = 2;
	const HEIGHT_PARAM_ID          = 26;
	const ANGLE_PARAM_ID           = 27;

	public function search(\PDO $pdo, array $searchParams, array $csParams, $typProjektu = null): array
	{
		$filters = $this->_normalizeFilters($csParams);

		list($baseWhere, $baseBinds) = $this->_buildSearchWhere($searchParams);
		$fullWhere = $baseWhere;
		$fullBinds = $baseBinds;
		$this->_applyFilters($fullWhere, $fullBinds, $filters, null);
		$this->_appendCategoryFilters($pdo, $fullWhere, $filters, null);

		if ($typProjektu) {
			$typeIds = $this->_getTypeProjectIds($pdo, (string)$typProjektu);
			$fullWhere[] = $typeIds
				? 'p.id IN (' . implode(',', $typeIds) . ')'
				: '1 = 0';
		}

		$whereSql = implode(' AND ', $fullWhere);
		$stmt = $pdo->prepare("SELECT p.id FROM project p WHERE {$whereSql}");
		$stmt->execute($fullBinds);
		$projectIds = array_map('intval', $stmt->fetchAll(\PDO::FETCH_COLUMN));

		$stats = $this->_computeStats($pdo, $baseWhere, $baseBinds, $filters, $typProjektu, count($projectIds));

		return [
			'status'     => 'ok',
			'projectIds' => $projectIds,
			'stats'      => $stats,
		];
	}

	private function _normalizeFilters(array $csParams): array
	{
		$filters = [];
		foreach ($csParams as $key => $value) {
			if ($value === '' || $value === null) {
				continue;
			}
			$keyStr = (string)$key;

			if (isset(self::$categoryFacets[$keyStr])) {
				$filters[] = [
					'key'   => $keyStr,
					'type'  => 'category',
					'value' => (int)$value,
					'catId' => self::$categoryFacets[$keyStr],
				];
				continue;
			}

			$paramId = (int)$key;
			if (!$paramId) {
				continue;
			}

			if ($paramId === self::GARAGE_SPOTS_PARAM_ID) {
				$filters[] = ['key' => (string)$paramId, 'type' => 'garage', 'value' => (int)$value];
			} elseif ($paramId === self::BASEMENT_PARAM_ID) {
				$filters[] = ['key' => (string)$paramId, 'type' => 'basement', 'value' => (int)$value];
			} elseif ($paramId === self::HEIGHT_PARAM_ID) {
				$filters[] = ['key' => (string)$paramId, 'type' => 'height', 'value' => (int)$value];
			} elseif ($paramId === self::ANGLE_PARAM_ID) {
				$filters[] = ['key' => (string)$paramId, 'type' => 'angle', 'value' => (int)$value];
			} else {
				$filters[] = [
					'key'   => (string)$paramId,
					'type'  => 'exact',
					'value' => $this->_resolveFilterValue($paramId, $value),
				];
			}
		}
		return $filters;
	}

	private function _resolveFilterValue(int $paramId, $value)
	{
		if (is_string($value) && isset(self::$slugToDbValue[$value])) {
			return self::$slugToDbValue[$value];
		}
		return $value;
	}

	private function _buildSearchWhere(array $searchParams): array
	{
		$where = ["p.status = 'published'", "p.type = 'house'"];
		$binds = [];
		$i     = 0;

		foreach ($searchParams as $paramId => $range) {
			$paramId = (int)$paramId;
			if (!$paramId || !is_array($range)) {
				continue;
			}
			$conds = [];
			if (isset($range['min']) && $range['min'] !== '') {
				$ph = ':rmin' . $i++;
				$conds[] = "ptp.num_value >= {$ph}";
				$binds[$ph] = (float)$range['min'];
			}
			if (isset($range['max']) && $range['max'] !== '') {
				$ph = ':rmax' . $i++;
				$conds[] = "ptp.num_value <= {$ph}";
				$binds[$ph] = (float)$range['max'];
			}
			if (!$conds) {
				continue;
			}
			$where[] = "EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$paramId} AND " . implode(' AND ', $conds) . ')';
		}

		return [$where, $binds];
	}

	/**
	 * @param array $where
	 * @param array $binds
	 * @param array $filters
	 * @param string|null $exceptKey leave-one-out facet key (param id or c18)
	 */
	private function _applyFilters(array &$where, array &$binds, array $filters, $exceptKey)
	{
		$i = count($binds);
		foreach ($filters as $filter) {
			if ($exceptKey !== null && $filter['key'] === (string)$exceptKey) {
				continue;
			}
			$type  = $filter['type'];
			$value = $filter['value'];

			switch ($type) {
				case 'category':
					// Applied later via _appendCategoryFilters (needs PDO).
					break;
				case 'garage':
					$where[] = $this->_garageWhere((int)$value);
					break;
				case 'basement':
					$where[] = $this->_basementWhere((int)$value);
					break;
				case 'height':
					$range = $this->_heightRange((int)$value);
					if ($range) {
						$where[] = $this->_numericRangeWhere(self::HEIGHT_PARAM_ID, $range, $binds, $i);
					}
					break;
				case 'angle':
					$range = $this->_angleRange((int)$value);
					if ($range) {
						$where[] = $this->_numericRangeWhere(self::ANGLE_PARAM_ID, $range, $binds, $i);
					}
					break;
				case 'exact':
				default:
					$paramId = (int)$filter['key'];
					$ph = ':cs' . $i++;
					$where[] = "EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$paramId} AND (ptp.string_value = {$ph} OR ptp.num_value = {$ph}))";
					$binds[$ph] = $value;
					break;
			}
		}
	}

	private function _appendCategoryFilters(\PDO $pdo, array &$where, array $filters, $exceptKey)
	{
		foreach ($filters as $filter) {
			if ($filter['type'] !== 'category') {
				continue;
			}
			if ($exceptKey !== null && $filter['key'] === (string)$exceptKey) {
				continue;
			}
			$ids = $this->_loadCategoryProjectIds($pdo, (int)$filter['catId']);
			$where[] = $ids
				? 'p.id IN (' . implode(',', $ids) . ')'
				: '1 = 0';
		}
	}

	private function _garageWhere(int $value): string
	{
		$id = self::GARAGE_SPOTS_PARAM_ID;
		if ($value === 1) {
			return "EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id} AND ptp.num_value = 1)";
		}
		if ($value === 2) {
			return "EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id} AND ptp.num_value >= 2)";
		}
		// 3 = no garage spots
		return "NOT EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id} AND ptp.num_value > 0)";
	}

	private function _basementWhere(int $value): string
	{
		$id = self::BASEMENT_PARAM_ID;
		if ($value === 1) {
			return "EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id})";
		}
		// 2 = no basement
		return "NOT EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id})";
	}

	/** @return array{min:?float,max:?bool,minExclusive?:bool,maxExclusive?:bool}|null */
	private function _heightRange(int $bucket)
	{
		switch ($bucket) {
			case 1: return ['min' => null, 'max' => 6];
			case 2: return ['min' => 6, 'max' => 7, 'minExclusive' => true];
			case 3: return ['min' => 7, 'max' => 8, 'minExclusive' => true];
			case 4: return ['min' => 8, 'max' => 9, 'minExclusive' => true];
			case 5: return ['min' => 9, 'max' => 10, 'minExclusive' => true];
			case 6: return ['min' => 10, 'max' => null, 'minExclusive' => true];
			default: return null;
		}
	}

	private function _angleRange(int $bucket)
	{
		switch ($bucket) {
			case 1: return ['min' => null, 'max' => 30];
			case 2: return ['min' => 30, 'max' => 35, 'minExclusive' => true];
			case 3: return ['min' => 35, 'max' => 40, 'minExclusive' => true];
			case 4: return ['min' => 40, 'max' => 45, 'minExclusive' => true];
			case 5: return ['min' => 45, 'max' => null];
			default: return null;
		}
	}

	private function _numericRangeWhere(int $paramId, array $range, array &$binds, int &$i): string
	{
		$conds = [];
		if ($range['min'] !== null) {
			$ph = ':nmin' . $i++;
			$op = !empty($range['minExclusive']) ? '>' : '>=';
			$conds[] = "ptp.num_value {$op} {$ph}";
			$binds[$ph] = (float)$range['min'];
		}
		if ($range['max'] !== null) {
			$ph = ':nmax' . $i++;
			$op = !empty($range['maxExclusive']) ? '<' : '<=';
			$conds[] = "ptp.num_value {$op} {$ph}";
			$binds[$ph] = (float)$range['max'];
		}
		return "EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$paramId} AND " . implode(' AND ', $conds) . ')';
	}

	private function _loadCategoryProjectIds(\PDO $pdo, int $categoryId): array
	{
		static $cache = [];
		if (isset($cache[$categoryId])) {
			return $cache[$categoryId];
		}
		$stmt = $pdo->prepare('SELECT project_list FROM project_category WHERE id = :id');
		$stmt->execute([':id' => $categoryId]);
		$list = $stmt->fetchColumn();
		$cache[$categoryId] = $list
			? array_values(array_filter(array_map('intval', explode(',', $list))))
			: [];
		return $cache[$categoryId];
	}

	private function _getTypeProjectIds(\PDO $pdo, string $slug): array
	{
		if ($slug === 'bez_garazu' || $slug === 'z_garazem') {
			$stmt = $pdo->prepare(
				'SELECT DISTINCT project_id FROM project_to_param WHERE project_param_id = ' . self::GARAGE_LOCATION_PARAM_ID
			);
			$stmt->execute();
			$withGarage = array_map('intval', $stmt->fetchAll(\PDO::FETCH_COLUMN));

			if ($slug === 'z_garazem') {
				return $withGarage;
			}
			$stmt = $pdo->query("SELECT id FROM project WHERE status = 'published' AND type = 'house'");
			$allIds = array_map('intval', $stmt->fetchAll(\PDO::FETCH_COLUMN));
			return array_values(array_diff($allIds, $withGarage));
		}

		$categoryId = self::$typeCategoryMap[$slug] ?? null;
		if (!$categoryId) {
			return [];
		}

		return $this->_loadCategoryProjectIds($pdo, $categoryId);
	}

	private function _computeStats(
		\PDO $pdo,
		array $baseWhere,
		array $baseBinds,
		array $filters,
		$typProjektu,
		int $total
	): array {
		$facetParamIds = $pdo->query(
			"SELECT id FROM project_param WHERE is_clicksearch = 1 OR id IN (2, 78) OR char_id IN ('garaz', 'piwnica', 'iloscmiejscgarazowych')"
		)->fetchAll(\PDO::FETCH_COLUMN);

		$sets = [];
		foreach ($facetParamIds as $paramId) {
			$paramId = (int)$paramId;
			$where = $baseWhere;
			$binds = $baseBinds;
			$this->_applyFilters($where, $binds, $filters, (string)$paramId);
			$this->_appendCategoryFilters($pdo, $where, $filters, (string)$paramId);
			if ($typProjektu) {
				$typeIds = $this->_getTypeProjectIds($pdo, $typProjektu);
				$where[] = $typeIds
					? 'p.id IN (' . implode(',', $typeIds) . ')'
					: '1 = 0';
			}
			$whereSql = implode(' AND ', $where);
			$sets[(string)$paramId] = $this->_facetCounts($pdo, $paramId, $whereSql, $binds);
		}

		foreach (self::$categoryFacets as $cKey => $catId) {
			$where = $baseWhere;
			$binds = $baseBinds;
			$this->_applyFilters($where, $binds, $filters, $cKey);
			$this->_appendCategoryFilters($pdo, $where, $filters, $cKey);
			if ($typProjektu) {
				$typeIds = $this->_getTypeProjectIds($pdo, $typProjektu);
				$where[] = $typeIds
					? 'p.id IN (' . implode(',', $typeIds) . ')'
					: '1 = 0';
			}
			$whereSql = implode(' AND ', $where);
			$count = $this->_countInCategory($pdo, $whereSql, $binds, $catId);
			if ($count > 0) {
				$sets[$cKey] = ['1' => $count];
			}
		}

		// Types: leave-one-out of typ_projektu
		$whereNoType = $baseWhere;
		$bindsNoType = $baseBinds;
		$this->_applyFilters($whereNoType, $bindsNoType, $filters, null);
		$this->_appendCategoryFilters($pdo, $whereNoType, $filters, null);

		return [
			'total' => $total,
			'types' => $this->_computeTypeStats($pdo, implode(' AND ', $whereNoType), $bindsNoType),
			'sets'  => $sets,
		];
	}

	private function _facetCounts(\PDO $pdo, int $paramId, string $whereSql, array $binds): array
	{
		if ($paramId === self::GARAGE_SPOTS_PARAM_ID) {
			return $this->_garageFacetCounts($pdo, $whereSql, $binds);
		}
		if ($paramId === self::BASEMENT_PARAM_ID) {
			return $this->_basementFacetCounts($pdo, $whereSql, $binds);
		}
		if ($paramId === self::HEIGHT_PARAM_ID) {
			return $this->_bucketFacetCounts($pdo, $paramId, $whereSql, $binds, [1, 2, 3, 4, 5, 6], 'height');
		}
		if ($paramId === self::ANGLE_PARAM_ID) {
			return $this->_bucketFacetCounts($pdo, $paramId, $whereSql, $binds, [1, 2, 3, 4, 5], 'angle');
		}

		$sql = "SELECT COALESCE(ptp.string_value, ptp.num_value) AS val, COUNT(DISTINCT p.id) AS cnt
			FROM project p
			JOIN project_to_param ptp ON ptp.project_id = p.id AND ptp.project_param_id = {$paramId}
			WHERE {$whereSql}
			GROUP BY val";
		$stmt = $pdo->prepare($sql);
		$stmt->execute($binds);
		$rows = $stmt->fetchAll(\PDO::FETCH_KEY_PAIR);
		$normalized = [];
		if ($rows) {
			foreach ($rows as $val => $cnt) {
				if (is_numeric($val) && (float)$val == (int)$val) {
					$key = (string)(int)$val;
				} else {
					$key = $this->_slugify((string)$val);
				}
				if ($key === '') {
					continue;
				}
				$normalized[$key] = ($normalized[$key] ?? 0) + (int)$cnt;
			}
		}
		return $normalized;
	}

	private function _garageFacetCounts(\PDO $pdo, string $whereSql, array $binds): array
	{
		$id = self::GARAGE_SPOTS_PARAM_ID;
		$out = ['1' => 0, '2' => 0, '3' => 0];

		$sql1 = "SELECT COUNT(DISTINCT p.id) FROM project p
			WHERE {$whereSql}
			AND EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id} AND ptp.num_value = 1)";
		$stmt = $pdo->prepare($sql1);
		$stmt->execute($binds);
		$out['1'] = (int)$stmt->fetchColumn();

		$sql2 = "SELECT COUNT(DISTINCT p.id) FROM project p
			WHERE {$whereSql}
			AND EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id} AND ptp.num_value >= 2)";
		$stmt = $pdo->prepare($sql2);
		$stmt->execute($binds);
		$out['2'] = (int)$stmt->fetchColumn();

		$sql3 = "SELECT COUNT(DISTINCT p.id) FROM project p
			WHERE {$whereSql}
			AND NOT EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id} AND ptp.num_value > 0)";
		$stmt = $pdo->prepare($sql3);
		$stmt->execute($binds);
		$out['3'] = (int)$stmt->fetchColumn();

		return $out;
	}

	private function _basementFacetCounts(\PDO $pdo, string $whereSql, array $binds): array
	{
		$id = self::BASEMENT_PARAM_ID;
		$out = ['1' => 0, '2' => 0];

		$sql1 = "SELECT COUNT(DISTINCT p.id) FROM project p
			WHERE {$whereSql}
			AND EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id})";
		$stmt = $pdo->prepare($sql1);
		$stmt->execute($binds);
		$out['1'] = (int)$stmt->fetchColumn();

		$sql2 = "SELECT COUNT(DISTINCT p.id) FROM project p
			WHERE {$whereSql}
			AND NOT EXISTS (SELECT 1 FROM project_to_param ptp WHERE ptp.project_id = p.id AND ptp.project_param_id = {$id})";
		$stmt = $pdo->prepare($sql2);
		$stmt->execute($binds);
		$out['2'] = (int)$stmt->fetchColumn();

		return $out;
	}

	private function _bucketFacetCounts(\PDO $pdo, int $paramId, string $whereSql, array $binds, array $buckets, string $kind): array
	{
		$out = [];
		foreach ($buckets as $bucket) {
			$range = $kind === 'height' ? $this->_heightRange($bucket) : $this->_angleRange($bucket);
			if (!$range) {
				continue;
			}
			$localBinds = $binds;
			$i = count($localBinds);
			$rangeWhere = $this->_numericRangeWhere($paramId, $range, $localBinds, $i);
			$sql = "SELECT COUNT(DISTINCT p.id) FROM project p WHERE {$whereSql} AND {$rangeWhere}";
			$stmt = $pdo->prepare($sql);
			$stmt->execute($localBinds);
			$out[(string)$bucket] = (int)$stmt->fetchColumn();
		}
		return $out;
	}

	private function _countInCategory(\PDO $pdo, string $whereSql, array $binds, int $catId): int
	{
		$ids = $this->_loadCategoryProjectIds($pdo, $catId);
		if (!$ids) {
			return 0;
		}
		$sql = "SELECT COUNT(DISTINCT p.id) FROM project p WHERE {$whereSql} AND p.id IN (" . implode(',', $ids) . ')';
		$stmt = $pdo->prepare($sql);
		$stmt->execute($binds);
		return (int)$stmt->fetchColumn();
	}

	private function _computeTypeStats(\PDO $pdo, string $whereSqlNoType, array $binds): array
	{
		$stmt = $pdo->prepare("SELECT p.id FROM project p WHERE {$whereSqlNoType}");
		$stmt->execute($binds);
		$candidateIds = array_flip(array_map('intval', $stmt->fetchAll(\PDO::FETCH_COLUMN)));

		$types = [];
		$slugs = array_keys(self::$typeCategoryMap);
		$slugs[] = 'bez_garazu';
		$slugs[] = 'z_garazem';

		foreach ($slugs as $slug) {
			$ids = $this->_getTypeProjectIds($pdo, $slug);
			$count = 0;
			foreach ($ids as $id) {
				if (isset($candidateIds[$id])) {
					$count++;
				}
			}
			if ($count > 0) {
				$types[$slug] = $count;
			}
		}

		return $types;
	}

	private function _slugify(string $value): string
	{
		$map = [
			'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z', 'ż' => 'z',
			'Ą' => 'a', 'Ć' => 'c', 'Ę' => 'e', 'Ł' => 'l', 'Ń' => 'n', 'Ó' => 'o', 'Ś' => 's', 'Ź' => 'z', 'Ż' => 'z',
		];
		$value = strtr($value, $map);
		$value = mb_strtolower($value, 'UTF-8');
		$value = preg_replace('/[^a-z0-9]+/', '_', $value);
		return trim((string)$value, '_');
	}
}
