<?php
namespace StudioAtrium\Entity\Adwords;

class Clicks
{
    private int $id = 0;
    private ?string $clickDate = null;
    private ?int $campaignNo = null;
    private int $clicksDesktop = 0;
    private int $clicksTablet = 0;
    private int $clicksMobile = 0;

    public function getId(): int { return $this->id; }
    public function setId(int $v): void { $this->id = $v; }
    public function getClickDate(): ?string { return $this->clickDate; }
    public function setClickDate(?string $v): void { $this->clickDate = $v; }
    public function getCampaignNo(): ?int { return $this->campaignNo; }
    public function setCampaignNo(?int $v): void { $this->campaignNo = $v; }
    public function getClicksDesktop(): int { return $this->clicksDesktop; }
    public function setClicksDesktop(int $v): void { $this->clicksDesktop = $v; }
    public function getClicksTablet(): int { return $this->clicksTablet; }
    public function setClicksTablet(int $v): void { $this->clicksTablet = $v; }
    public function getClicksMobile(): int { return $this->clicksMobile; }
    public function setClicksMobile(int $v): void { $this->clicksMobile = $v; }
}
