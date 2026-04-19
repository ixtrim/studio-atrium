<?php
namespace StudioAtrium\Entity\Adwords;

class Clicks
{
    private $id = 0;
    private $clickDate = null;
    private $campaignNo = null;
    private $clicksDesktop = 0;
    private $clicksTablet = 0;
    private $clicksMobile = 0;
    public function getId(): int { return $this->id; }
    public function setId(int $v) { $this->id = $v; }
    public function getClickDate() { return $this->clickDate; }
    public function setClickDate($v) { $this->clickDate = $v; }
    public function getCampaignNo() { return $this->campaignNo; }
    public function setCampaignNo($v) { $this->campaignNo = $v; }
    public function getClicksDesktop(): int { return $this->clicksDesktop; }
    public function setClicksDesktop(int $v) { $this->clicksDesktop = $v; }
    public function getClicksTablet(): int { return $this->clicksTablet; }
    public function setClicksTablet(int $v) { $this->clicksTablet = $v; }
    public function getClicksMobile(): int { return $this->clicksMobile; }
    public function setClicksMobile(int $v) { $this->clicksMobile = $v; }
}
