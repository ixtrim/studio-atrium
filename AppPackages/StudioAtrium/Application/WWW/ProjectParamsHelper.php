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
}
