<?php
namespace StudioAtrium\Entity;

class Project
{
    const STATUS_PUBLISHED = 'published';
    const STATUS_DRAFT     = 'draft';
    const STATUS_HIDDEN    = 'hidden';

    private $id = 0;
    private $idOld = null;
    private $symbolAlpha = '';
    private $symbolNum = 0;
    private $name = '';
    private $alternateName = null;
    private $searchNames = null;
    private $shortDescription = null;
    private $description = null;
    private $alternateDescription = null;
    private $price = null;
    private $discount = null;
    private $type = 'house';
    private $status = 'published';
    private $paramsGeneral = null;
    private $paramsList = null;
    private $buildCost = null;
    private $metaTitle = null;
    private $metaDescription = null;
    private $modifyDate = null;
    private $technology = null;
    private $extraData = null;
    private $attachmentsByType = [];
    public function getId(): int { return $this->id; }
    public function setId(int $v) { $this->id = $v; }
    public function getIdOld() { return $this->idOld; }
    public function setIdOld($v) { $this->idOld = $v; }
    public function getSymbolAlpha(): string { return $this->symbolAlpha; }
    public function setSymbolAlpha(string $v) { $this->symbolAlpha = $v; }
    public function getSymbolNum(): int { return $this->symbolNum; }
    public function setSymbolNum(int $v) { $this->symbolNum = $v; }
    public function getName(): string { return $this->name; }
    public function setName(string $v) { $this->name = $v; }
    public function getAlternateName() { return $this->alternateName; }
    public function setAlternateName($v) { $this->alternateName = $v; }
    public function getShortDescription() { return $this->shortDescription; }
    public function setShortDescription($v) { $this->shortDescription = $v; }
    public function getDescription() { return $this->description; }
    public function setDescription($v) { $this->description = $v; }
    public function getAlternateDescription() { return $this->alternateDescription; }
    public function setAlternateDescription($v) { $this->alternateDescription = $v; }
    public function getPrice() { return $this->price; }
    public function setPrice($v) { $this->price = $v; }
    public function getDiscount() { return $this->discount; }
    public function setDiscount($v) { $this->discount = $v; }
    public function getType(): string { return $this->type; }
    public function setType(string $v) { $this->type = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v) { $this->status = $v; }
    public function getParamsGeneral() { return $this->paramsGeneral; }
    public function setParamsGeneral($v) { $this->paramsGeneral = $v; }
    public function getParamsList() { return $this->paramsList; }
    public function setParamsList($v) { $this->paramsList = $v; }
    public function getBuildCost() { return $this->buildCost; }
    public function setBuildCost($v) { $this->buildCost = $v; }
    public function getMetaTitle() { return $this->metaTitle; }
    public function setMetaTitle($v) { $this->metaTitle = $v; }
    public function getMetaDescription() { return $this->metaDescription; }
    public function setMetaDescription($v) { $this->metaDescription = $v; }
    public function getModifyDate() { return $this->modifyDate; }
    public function setModifyDate($v) { $this->modifyDate = $v; }
    public function getTechnology() { return $this->technology; }
    public function setTechnology($v) { $this->technology = $v; }
    public function getExtraData() { return $this->extraData; }
    public function setExtraData($v) { $this->extraData = $v; }

    public function setAttachmentsByType(array $byType) { $this->attachmentsByType = $byType; }

    public function getAttachmentsByType(string $type): \StudioAtrium\Entity\EntityCollection
    {
        $atts = $this->attachmentsByType[$type] ?? [];
        $objects = [];
        foreach ($atts as $row) {
            $a = new \Point7_CMS_Attachment();
            $a->setId((int)($row['id'] ?? 0));
            $a->setOwnerUid((string)($row['owner_uid'] ?? ''));
            $a->setFilename($row['filename'] ?? '');
            $a->setPath($row['path'] ?? '');
            $a->setProfileName($row['profile_name'] ?? $type);
            $a->setTitle($row['title'] ?? null);
            $a->setProps($row['props'] ?? null);
            $a->setSortOrder((int)($row['sorting'] ?? 0));
            $objects[] = $a;
        }
        return new \StudioAtrium\Entity\EntityCollection($objects);
    }

    public function toArray(): array
    {
        return [
            'id'                    => $this->id,
            'id_old'                => $this->idOld,
            'symbol_alpha'          => $this->symbolAlpha,
            'symbol_num'            => $this->symbolNum,
            'name'                  => $this->name,
            'alternate_name'        => $this->alternateName,
            'search_names'          => $this->searchNames,
            'short_description'     => $this->shortDescription,
            'description'           => $this->description,
            'alternate_description' => $this->alternateDescription,
            'price'                 => $this->price,
            'discount'              => $this->discount,
            'type'                  => $this->type,
            'status'                => $this->status,
            'params_general'        => $this->paramsGeneral,
            'params_list'           => $this->paramsList,
            'build_cost'            => $this->buildCost,
            'meta_title'            => $this->metaTitle,
            'meta_description'      => $this->metaDescription,
            'modify_date'           => $this->modifyDate,
            'technology'            => $this->technology,
            'extra_data'            => $this->extraData,
        ];
    }
}
