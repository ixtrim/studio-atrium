<?php
namespace StudioAtrium\Entity;

/**
 * Promo / discount code entity (table `discount`).
 * Restored — Finder/DAO were never ported and AJAX validate_discount_code fatals without them.
 */
class Discount
{
    const TYPE_PERCENT = 'percent';
    const TYPE_VALUE = 'value';

    const STATUS_ENABLED = 'enabled';
    const STATUS_DISABLED = 'disabled';

    const DEFAULT_START_DATE = '1994-01-01';
    const DEFAULT_STOP_DATE = '2100-01-01';

    private $id = 0;
    private $title = '';
    private $description = '';
    private $code = '';
    private $discountValue = 0.0;
    private $discountType = self::TYPE_VALUE;
    private $startDate = null;
    private $stopDate = null;
    private $status = self::STATUS_ENABLED;
    private $userId = null;
    private $projectsId = null;
    private $showInPanel = 0;
    private $excludeOther = 0;
    private $percentDiscountValue = 0.0;

    public static function fromRow(array $row)
    {
        $d = new self();
        $d->id = (int) $row['id'];
        $d->title = (string) $row['title'];
        $d->description = isset($row['description']) ? (string) $row['description'] : '';
        $d->code = (string) $row['code'];
        $d->discountValue = (float) $row['discount_value'];
        $d->discountType = (string) $row['discount_type'];
        $d->startDate = $row['start_date'];
        $d->stopDate = $row['stop_date'];
        $d->status = (string) $row['status'];
        $d->userId = !empty($row['user_id']) ? (int) $row['user_id'] : null;
        $d->projectsId = !empty($row['projects_id']) ? (string) $row['projects_id'] : null;
        $d->showInPanel = !empty($row['show_in_panel']) ? 1 : 0;
        $d->excludeOther = !empty($row['exclude_other']) ? 1 : 0;
        $d->percentDiscountValue = isset($row['percent_discount_value'])
            ? (float) $row['percent_discount_value']
            : 0.0;
        return $d;
    }

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getCode() { return $this->code; }
    public function getDiscountValue() { return $this->discountValue; }
    public function getDiscountType() { return $this->discountType; }
    public function getStartDate() { return $this->startDate; }
    public function getStopDate() { return $this->stopDate; }
    public function getStatus() { return $this->status; }
    public function getUserId() { return $this->userId; }
    public function getProjectsId() { return $this->projectsId; }
    public function getShowInPanel() { return $this->showInPanel; }
    public function getExcludeOther() { return $this->excludeOther; }
    public function getPercentDiscountValue() { return $this->percentDiscountValue; }

    public function setPercentDiscountValue($value)
    {
        $this->percentDiscountValue = (float) $value;
        return $this;
    }

    public function toArray()
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'code' => $this->code,
            'discount_value' => $this->discountValue,
            'discount_type' => $this->discountType,
            'start_date' => $this->startDate,
            'stop_date' => $this->stopDate,
            'status' => $this->status,
            'user_id' => $this->userId,
            'projects_id' => $this->projectsId,
            'show_in_panel' => $this->showInPanel,
            'exclude_other' => $this->excludeOther,
            'percent_discount_value' => $this->percentDiscountValue,
        );
    }
}
