<?php
namespace StudioAtrium\Application\WWW;

class ProjectParamsHelper
{
    private static $paramIds = [
        'usable_area'       => 1,
        'total_area'        => 22,
        'build_area'        => 23,
        'cubature'          => 25,
        'house_height'      => 26,
        'roof_angle'        => 27,
        'garage_height'     => 33,
        'fence_span_height' => 83,
        'fence_roof_height' => 84,
        'arbor_height'      => 85,
        'carport_height'    => 86,
        'room_count'        => 68,
        'parcel_width'      => 75,
        'parcel_height'     => 76,
        'floor_area'        => 18,
        'loft_area'         => 17,
        'second_floor_area' => 19,
    ];

    private function decode($paramsGeneral): array
    {
        if (is_string($paramsGeneral) && $paramsGeneral !== '') {
            $decoded = json_decode($paramsGeneral, true);
            return is_array($decoded) ? $decoded : [];
        }
        if (is_array($paramsGeneral)) {
            return $paramsGeneral;
        }
        return [];
    }

    private function getParamValue($paramsGeneral, $paramId, $namedKey = null)
    {
        $p = $this->decode($paramsGeneral);
        if ($namedKey !== null && isset($p[$namedKey]) && $p[$namedKey] !== '') {
            return $p[$namedKey];
        }
        foreach ([(string) $paramId, $paramId] as $key) {
            if (!isset($p[$key])) {
                continue;
            }
            if (is_array($p[$key]) && array_key_exists('value', $p[$key])) {
                return $p[$key]['value'];
            }
            return $p[$key];
        }
        return null;
    }

    private function formatNumber($value, $strict = false): string
    {
        if ($value === null || $value === '') {
            return '';
        }
        $formatted = number_format((float) $value, 2, '.', '');
        $formatted = rtrim(rtrim($formatted, '0'), '.');
        return $formatted;
    }

    public function mHasFloor($params, bool $strict = false): bool
    {
        $floorArea = $this->getParamValue($params, self::$paramIds['floor_area'], 'floor_area');
        if ($floorArea !== null && (float) $floorArea > 0) {
            return true;
        }
        $secondFloor = $this->getParamValue($params, self::$paramIds['second_floor_area']);
        if ($secondFloor !== null && (float) $secondFloor > 0) {
            return true;
        }
        $p = $this->decode($params);
        return isset($p['floors']) && (int) $p['floors'] >= 2;
    }

    public function mHasLoft($params, bool $strict = false): bool
    {
        $loftArea = $this->getParamValue($params, self::$paramIds['loft_area'], 'loft');
        if ($loftArea !== null && (float) $loftArea > 0) {
            return true;
        }
        $p = $this->decode($params);
        return !empty($p['loft']);
    }

    public function mIsGroundFloor($params, bool $strict = false): bool
    {
        return !$this->mHasFloor($params, $strict) && !$this->mHasLoft($params, $strict);
    }

    public function mHasSkeletonOption($params): bool
    {
        return $this->isCheckboxParamSet($params, 88);
    }

    public function mIsWithdrawn($params): bool
    {
        return $this->isCheckboxParamSet($params, 146);
    }

    public function mHasMirror($params): bool
    {
        if (!is_array($params)) {
            return true;
        }
        if (!isset($params[80]) && !isset($params['80'])) {
            return true;
        }
        $value = isset($params[80]) ? $params[80] : $params['80'];
        if (!is_array($value)) {
            return empty($value);
        }
        if (array_key_exists('num_value', $value)) {
            return $value['num_value'] === null || $value['num_value'] === '' || (float) $value['num_value'] == 0.0;
        }
        return empty($value['string_value']);
    }

    public function mHasRegeneration($params): bool
    {
        return $this->isCheckboxParamSet($params, 92);
    }

    public function mStairsChange($params): bool
    {
        return $this->isCheckboxParamSet($params, 141);
    }

    public function mIsMultiApartment($params): bool
    {
        return $this->isCheckboxParamSet($params, 150);
    }

    public function mIsAvailable($params): bool
    {
        if ($this->isCheckboxParamSet($params, 82)) {
            return false;
        }
        if ($this->isCheckboxParamSet($params, 100)) {
            return false;
        }
        if ($this->isCheckboxParamSet($params, 146)) {
            return false;
        }
        return true;
    }

    public function mIsReady7days($params): bool
    {
        return $this->isCheckboxParamSet($params, 101);
    }

    public function mIsReady14days($params): bool
    {
        return $this->isCheckboxParamSet($params, 138);
    }

    public function mIsWT2021needful($params): bool
    {
        return $this->isCheckboxParamSet($params, 137);
    }

    public function mIsWT2021needfulHeat($params): bool
    {
        return $this->isCheckboxParamSet($params, 139);
    }

    public function mIsWT2021ready($params): bool
    {
        return $this->isCheckboxParamSet($params, 140);
    }

    public function mIsBlackWeek($params): bool
    {
        return $this->isCheckboxParamSet($params, 144);
    }

    public function mIsChristmas($params): bool
    {
        return $this->isCheckboxParamSet($params, 155);
    }

    public function mOneFlatArea($params)
    {
        return $this->getProjectParamDisplayValue($params, 120);
    }

    public function mOneFlatGarageArea($params)
    {
        return $this->getProjectParamDisplayValue($params, 121);
    }

    public function mMapStorey($storey)
    {
        return \StudioAtrium\Application\Helper\SketchParamsNameMapper::mapStorey($storey);
    }

    public function mMapStoreyCatalog($storey)
    {
        return \StudioAtrium\Application\Helper\SketchParamsNameMapper::mapStoreyCatalog($storey);
    }

    private function getProjectParamDisplayValue($params, $paramId)
    {
        if (!is_array($params)) {
            return '';
        }
        if (!isset($params[$paramId]) && !isset($params[(string) $paramId])) {
            return '';
        }
        $value = isset($params[$paramId]) ? $params[$paramId] : $params[(string) $paramId];
        if (!is_array($value)) {
            return (string) $value;
        }
        if (isset($value['num_value']) && $value['num_value'] !== null && $value['num_value'] !== '') {
            return rtrim(rtrim(number_format((float) $value['num_value'], 2, '.', ''), '0'), '.');
        }
        return isset($value['string_value']) ? (string) $value['string_value'] : '';
    }

    private function isCheckboxParamSet($params, $paramId): bool
    {
        if (!is_array($params)) {
            return false;
        }
        if (!isset($params[$paramId]) && !isset($params[(string) $paramId])) {
            return false;
        }
        $value = isset($params[$paramId]) ? $params[$paramId] : $params[(string) $paramId];
        if (!is_array($value)) {
            return !empty($value);
        }
        if (array_key_exists('num_value', $value) && $value['num_value'] !== null && $value['num_value'] !== '') {
            return (float) $value['num_value'] == 1.0;
        }
        return !empty($value['string_value']);
    }

    public function mUsableArea($params): string
    {
        $value = $this->getParamValue($params, self::$paramIds['usable_area'], 'usable_area');
        return $this->formatNumber($value);
    }

    public function mTotalArea($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['total_area'], 'total_area');
        $formatted = $this->formatNumber($value);
        if ($strict && $formatted !== '') {
            return $formatted . ' m²';
        }
        return $formatted;
    }

    public function mBuildArea($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['build_area'], 'build_area');
        return $this->formatNumber($value);
    }

    public function mCubature($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['cubature'], 'cubature');
        return $this->formatNumber($value);
    }

    public function mParcelWidth($params): string
    {
        $value = $this->getParamValue($params, self::$paramIds['parcel_width'], 'parcel_width');
        return $value !== null ? (string) $value : '';
    }

    public function mParcelHeight($params): string
    {
        $value = $this->getParamValue($params, self::$paramIds['parcel_height'], 'parcel_height');
        return $value !== null ? (string) $value : '';
    }

    public function mHouseHeight($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['house_height'], 'house_height');
        $formatted = $value !== null ? (string) $value : '';
        if ($strict && $formatted !== '') {
            return $formatted . ' m';
        }
        return $formatted;
    }

    public function mGarageHeight($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['garage_height'], 'garage_height');
        $formatted = $value !== null ? (string) $value : '';
        if ($strict && $formatted !== '') {
            return $formatted . ' m';
        }
        return $formatted;
    }

    public function mArborHeight($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['arbor_height'], 'arbor_height');
        return $value !== null ? (string) $value : '';
    }

    public function mCarportHeight($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['carport_height'], 'carport_height');
        $formatted = $value !== null ? (string) $value : '';
        if ($strict && $formatted !== '') {
            return $formatted . ' m';
        }
        return $formatted;
    }

    public function mFenceSpanHeight($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['fence_span_height'], 'fence_span_height');
        $formatted = $value !== null ? (string) $value : '';
        if ($strict && $formatted !== '') {
            return $formatted . ' cm';
        }
        return $formatted;
    }

    public function mFenceRoofHeight($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['fence_roof_height'], 'fence_roof_height');
        $formatted = $value !== null ? (string) $value : '';
        if ($strict && $formatted !== '') {
            return $formatted . ' cm';
        }
        return $formatted;
    }

    public function mRoofAngle($params, bool $strict = false): string
    {
        $value = $this->getParamValue($params, self::$paramIds['roof_angle'], 'roof_angle');
        $formatted = $value !== null ? (string) $value : '';
        if ($strict && $formatted !== '') {
            return $formatted . '°';
        }
        return $formatted;
    }

    public function mRoomCount($params): string
    {
        $value = $this->getParamValue($params, self::$paramIds['room_count'], 'room_count');
        return $value !== null ? (string) $value : '';
    }

    public function mIsNew($params): bool
    {
        if (is_object($params) && method_exists($params, 'getModifyDate')) {
            $modifyDate = $params->getModifyDate();
        } elseif (is_array($params)) {
            $modifyDate = $params['modify_date'] ?? '';
        } else {
            return false;
        }
        if (!$modifyDate) {
            return false;
        }
        return strtotime($modifyDate) > strtotime('-90 days');
    }

    public function mPanoramaLink($params)
    {
        return $this->getStringParamValue($params, 93);
    }

    public function mMovieLink($params)
    {
        return $this->getStringParamValue($params, 52);
    }

    public function mIsNarrowGarage($params): bool
    {
        return $this->isCheckboxParamSet($params, 100);
    }

    public function mIsHalfPrice($params): bool
    {
        return $this->isCheckboxParamSet($params, 149);
    }

    public function mIsDual($params): bool
    {
        return $this->isCheckboxParamSet($params, 150);
    }

    public function mLowestPrice($params)
    {
        return $this->formatPriceParamValue($params, 156);
    }

    public function mPCForFree($params): bool
    {
        return $this->isCheckboxParamSet($params, 154);
    }

    public function mCostInfo($params)
    {
        return $this->getStringParamValue($params, 136);
    }

    public function mHasEnergyFactor($params): bool
    {
        $ep = $this->getNumParamValue($params, 49);
        $ek = $this->getNumParamValue($params, 50);
        if ($ep !== null && $ep !== '' && (float) $ep > 0) {
            return true;
        }
        if ($ek !== null && $ek !== '' && (float) $ek > 0) {
            return true;
        }
        return false;
    }

    public function mEpEnergyFactor($params)
    {
        return $this->formatEnergyFactor($this->getNumParamValue($params, 49));
    }

    public function mEkEnergyFactor($params)
    {
        return $this->formatEnergyFactor($this->getNumParamValue($params, 50));
    }

    public function mVatValue($params)
    {
        return $this->getStringParamValue($params, 118);
    }

    private function getStringParamValue($params, $paramId)
    {
        if (!is_array($params)) {
            return '';
        }
        if (!isset($params[$paramId]) && !isset($params[(string) $paramId])) {
            return '';
        }
        $value = isset($params[$paramId]) ? $params[$paramId] : $params[(string) $paramId];
        if (!is_array($value)) {
            return trim((string) $value);
        }
        if (isset($value['string_value']) && $value['string_value'] !== null && $value['string_value'] !== '') {
            return trim((string) $value['string_value']);
        }
        if (isset($value['num_value']) && $value['num_value'] !== null && $value['num_value'] !== '') {
            return trim((string) $value['num_value']);
        }
        return '';
    }

    private function getNumParamValue($params, $paramId)
    {
        if (!is_array($params)) {
            return null;
        }
        if (!isset($params[$paramId]) && !isset($params[(string) $paramId])) {
            return null;
        }
        $value = isset($params[$paramId]) ? $params[$paramId] : $params[(string) $paramId];
        if (!is_array($value)) {
            return $value;
        }
        if (isset($value['num_value']) && $value['num_value'] !== null && $value['num_value'] !== '') {
            return $value['num_value'];
        }
        if (isset($value['string_value']) && $value['string_value'] !== null && $value['string_value'] !== '') {
            return $value['string_value'];
        }
        return null;
    }

    private function formatPriceParamValue($params, $paramId)
    {
        $value = $this->getNumParamValue($params, $paramId);
        if ($value === null || $value === '') {
            return '';
        }
        return rtrim(rtrim(number_format((float) $value, 2, '.', ''), '0'), '.');
    }

    private function formatEnergyFactor($value)
    {
        if ($value === null || $value === '') {
            return '';
        }
        return rtrim(rtrim(number_format((float) $value, 2, '.', ''), '0'), '.');
    }
}
