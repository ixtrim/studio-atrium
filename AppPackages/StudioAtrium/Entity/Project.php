<?php
namespace StudioAtrium\Entity;

class Project
{
    const STATUS_PUBLISHED = 'published';
    const STATUS_DRAFT     = 'draft';
    const STATUS_HIDDEN    = 'hidden';

    private int $id = 0;
    private ?int $idOld = null;
    private string $symbolAlpha = '';
    private int $symbolNum = 0;
    private string $name = '';
    private ?string $alternateName = null;
    private ?string $searchNames = null;
    private ?string $shortDescription = null;
    private ?string $description = null;
    private ?string $alternateDescription = null;
    private ?string $price = null;
    private ?string $discount = null;
    private string $type = 'house';
    private string $status = 'published';
    private ?string $paramsGeneral = null;
    private ?string $paramsList = null;
    private ?string $buildCost = null;
    private ?string $metaTitle = null;
    private ?string $metaDescription = null;
    private ?string $modifyDate = null;
    private ?string $technology = null;
    private ?string $extraData = null;
    private array $attachmentsByType = [];

    public function getId(): int { return $this->id; }
    public function setId(int $v): void { $this->id = $v; }
    public function getIdOld(): ?int { return $this->idOld; }
    public function setIdOld(?int $v): void { $this->idOld = $v; }
    public function getSymbolAlpha(): string { return $this->symbolAlpha; }
    public function setSymbolAlpha(string $v): void { $this->symbolAlpha = $v; }
    public function getSymbolNum(): int { return $this->symbolNum; }
    public function setSymbolNum(int $v): void { $this->symbolNum = $v; }
    public function getName(): string { return $this->name; }
    public function setName(string $v): void { $this->name = $v; }
    public function getAlternateName(): ?string { return $this->alternateName; }
    public function setAlternateName(?string $v): void { $this->alternateName = $v; }
    public function getShortDescription(): ?string { return $this->shortDescription; }
    public function setShortDescription(?string $v): void { $this->shortDescription = $v; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $v): void { $this->description = $v; }
    public function getAlternateDescription(): ?string { return $this->alternateDescription; }
    public function setAlternateDescription(?string $v): void { $this->alternateDescription = $v; }
    public function getPrice(): ?string { return $this->price; }
    public function setPrice(?string $v): void { $this->price = $v; }
    public function getDiscount(): ?string { return $this->discount; }
    public function setDiscount(?string $v): void { $this->discount = $v; }
    public function getType(): string { return $this->type; }
    public function setType(string $v): void { $this->type = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v): void { $this->status = $v; }
    public function getParamsGeneral(): ?string { return $this->paramsGeneral; }
    public function setParamsGeneral(?string $v): void { $this->paramsGeneral = $v; }
    public function getParamsList(): ?string { return $this->paramsList; }
    public function setParamsList(?string $v): void { $this->paramsList = $v; }
    public function getBuildCost(): ?string { return $this->buildCost; }
    public function setBuildCost(?string $v): void { $this->buildCost = $v; }
    public function getMetaTitle(): ?string { return $this->metaTitle; }
    public function setMetaTitle(?string $v): void { $this->metaTitle = $v; }
    public function getMetaDescription(): ?string { return $this->metaDescription; }
    public function setMetaDescription(?string $v): void { $this->metaDescription = $v; }
    public function getModifyDate(): ?string { return $this->modifyDate; }
    public function setModifyDate(?string $v): void { $this->modifyDate = $v; }
    public function getTechnology(): ?string { return $this->technology; }
    public function setTechnology(?string $v): void { $this->technology = $v; }
    public function getExtraData(): ?string { return $this->extraData; }
    public function setExtraData(?string $v): void { $this->extraData = $v; }

    public function setAttachmentsByType(array $byType): void { $this->attachmentsByType = $byType; }

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
