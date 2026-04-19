<?php
namespace StudioAtrium\Entity\Attachment;

class Finder
{
        private $dao;

    public function __construct(\Point7_CMS_Attachment_DAO_PDOMySQL $dao)
    {
        $this->dao = $dao;
    }

    public function getAttachmentsByProfile(
        string $profile,
        bool $onlyPublished = true,
        int $limit = 10,
        bool $withOwner = true,
        bool $onlyMain = false,
        bool $asArray = true
    ): array {
        return $this->dao->getAttachmentsByProfile($profile, $onlyPublished, $limit, $withOwner, $onlyMain, $asArray);
    }
}
