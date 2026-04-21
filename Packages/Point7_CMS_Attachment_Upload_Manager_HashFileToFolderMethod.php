<?php
class Point7_CMS_Attachment_Upload_Manager_HashFileToFolderMethod
{
    private int $buckets;

    public function __construct(int $buckets = 100)
    {
        $this->buckets = $buckets;
    }

    public function getFolder(string $filename): string
    {
        $hash = crc32($filename);
        return (string)(abs($hash) % $this->buckets);
    }
}
