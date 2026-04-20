<?php
class Point7_AbstractDAO_FinderParams
{
    const OPERATOR_EQUAL         = 'EQUAL';
    const OPERATOR_NOT_EQUAL     = 'NOT_EQUAL';
    const OPERATOR_LIKE          = 'LIKE';
    const OPERATOR_GT            = 'GT';
    const OPERATOR_GTE           = 'GTE';
    const OPERATOR_LT            = 'LT';
    const OPERATOR_LTE           = 'LTE';
    const OPERATOR_IN            = 'IN';
    const OPERATOR_NOT_IN        = 'NOT_IN';
    const OPERATOR_IS_NULL       = 'IS_NULL';
    const OPERATOR_IS_NOT_NULL   = 'IS_NOT_NULL';

    const SORT_ASC  = 'ASC';
    const SORT_DESC = 'DESC';

    public array $filters          = [];
    public array $functionFilters  = [];
    public array $explicitFilters  = [];
    public ?array $sorting         = null;
    public ?int   $limit           = null;
    public ?int   $offset          = null;

    public function addFilter(string $field, mixed $value, string $operator = self::OPERATOR_EQUAL): self
    {
        $this->filters[] = ['field' => $field, 'value' => $value, 'op' => $operator];
        return $this;
    }

    public function addFunctionFilter(string $field, mixed $value): self
    {
        $this->functionFilters[] = ['field' => $field, 'value' => $value];
        return $this;
    }

    public function addExplicitFilter(string $condition): self
    {
        $this->explicitFilters[] = $condition;
        return $this;
    }

    public function setSorting(string $field, string $direction = self::SORT_ASC): self
    {
        $this->sorting = ['field' => $field, 'dir' => strtoupper($direction)];
        return $this;
    }

    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function setOffset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Build a WHERE clause fragment and PDO bindings from the filters.
     * Returns ['sql' => string, 'params' => array]
     */
    public function buildWhere(): array
    {
        $parts  = [];
        $params = [];
        $i      = 0;

        foreach ($this->filters as $f) {
            $ph = ':fp' . $i++;
            switch ($f['op']) {
                case self::OPERATOR_NOT_EQUAL:
                    $parts[]   = "`{$f['field']}` != $ph";
                    $params[$ph] = $f['value'];
                    break;
                case self::OPERATOR_LIKE:
                    $parts[]     = "`{$f['field']}` LIKE $ph";
                    $params[$ph] = $f['value'];
                    break;
                case self::OPERATOR_GT:
                    $parts[]     = "`{$f['field']}` > $ph";
                    $params[$ph] = $f['value'];
                    break;
                case self::OPERATOR_GTE:
                    $parts[]     = "`{$f['field']}` >= $ph";
                    $params[$ph] = $f['value'];
                    break;
                case self::OPERATOR_LT:
                    $parts[]     = "`{$f['field']}` < $ph";
                    $params[$ph] = $f['value'];
                    break;
                case self::OPERATOR_LTE:
                    $parts[]     = "`{$f['field']}` <= $ph";
                    $params[$ph] = $f['value'];
                    break;
                case self::OPERATOR_IN:
                    $vals = (array)$f['value'];
                    $phs  = array_map(fn($n) => ':fp' . $i++, $vals);
                    foreach (array_values($vals) as $k => $v) $params[$phs[$k]] = $v;
                    $parts[] = "`{$f['field']}` IN (" . implode(',', $phs) . ')';
                    break;
                case self::OPERATOR_NOT_IN:
                    $vals = (array)$f['value'];
                    $phs  = array_map(fn($n) => ':fp' . $i++, $vals);
                    foreach (array_values($vals) as $k => $v) $params[$phs[$k]] = $v;
                    $parts[] = "`{$f['field']}` NOT IN (" . implode(',', $phs) . ')';
                    break;
                case self::OPERATOR_IS_NULL:
                    $parts[] = "`{$f['field']}` IS NULL";
                    break;
                case self::OPERATOR_IS_NOT_NULL:
                    $parts[] = "`{$f['field']}` IS NOT NULL";
                    break;
                default: // EQUAL
                    $parts[]     = "`{$f['field']}` = $ph";
                    $params[$ph] = $f['value'];
            }
        }

        foreach ($this->explicitFilters as $cond) {
            $parts[] = $cond;
        }

        $sql = $parts ? 'WHERE ' . implode(' AND ', $parts) : '';
        return ['sql' => $sql, 'params' => $params];
    }
}
