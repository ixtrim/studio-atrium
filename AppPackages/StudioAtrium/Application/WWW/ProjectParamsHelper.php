<?php
namespace StudioAtrium\Application\WWW;

class ProjectParamsHelper
{
    private function decode($paramsGeneral): array
    {
        if (is_string($paramsGeneral) && $paramsGeneral !== '') {
            $decoded = json_decode($paramsGeneral, true);
            return is_array($decoded) ? $decoded : [];
        }
        return [];
    }

    public function mHasFloor($params, bool $strict = false): bool
    {
        $p = $this->decode($params);
        return isset($p['floors']) && (int)$p['floors'] >= 2;
    }

    public function mHasLoft($params, bool $strict = false): bool
    {
        $p = $this->decode($params);
        return isset($p['loft']) && (bool)$p['loft'];
    }

    public function mIsGroundFloor($params, bool $strict = false): bool
    {
        $p = $this->decode($params);
        $floors = (int)($p['floors'] ?? 0);
        $loft   = (bool)($p['loft'] ?? false);
        return $floors <= 1 && !$loft;
    }

    public function mUsableArea($params): string
    {
        $p = $this->decode($params);
        return isset($p['usable_area']) ? number_format((float)$p['usable_area'], 2, '.', '') : '';
    }

    public function mParcelWidth($params): string
    {
        $p = $this->decode($params);
        return $p['parcel_width'] ?? '';
    }

    public function mParcelHeight($params): string
    {
        $p = $this->decode($params);
        return $p['parcel_height'] ?? '';
    }

    public function mHouseHeight($params): string
    {
        $p = $this->decode($params);
        return $p['house_height'] ?? '';
    }

    public function mRoofAngle($params): string
    {
        $p = $this->decode($params);
        return $p['roof_angle'] ?? '';
    }

    public function mRoomCount($params): string
    {
        $p = $this->decode($params);
        return $p['room_count'] ?? '';
    }

    public function mIsNew($params): bool
    {
        if (!is_array($params)) return false;
        $modifyDate = $params['modify_date'] ?? '';
        if (!$modifyDate) return false;
        return strtotime($modifyDate) > strtotime('-90 days');
    }
}
