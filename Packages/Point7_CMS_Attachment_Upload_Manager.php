<?php
class Point7_CMS_Attachment_Upload_Manager
{
    private string  $ownerUid;
    private string  $tmpPath;
    private string  $resourcePath;
    private int     $dirMode       = 0775;
    private ?object $hashMethod    = null;
    private int     $folderBuckets = 100;

    public function __construct(string $ownerUid, string $tmpPath, string $resourcePath)
    {
        $this->ownerUid     = $ownerUid;
        $this->tmpPath      = rtrim($tmpPath, '/');
        $this->resourcePath = rtrim($resourcePath, '/');
    }

    public function setDirMode(int $mode): void
    {
        $this->dirMode = $mode;
    }

    public function setHashFileMethod(object $method): void
    {
        $this->hashMethod = $method;
    }

    public function setFolderBuckets(int $buckets): void
    {
        $this->folderBuckets = $buckets;
    }

    public function processFile(array $uploadedFile, Point7_CMS_Attachment_Upload_Profile $profile): Point7_CMS_Attachment
    {
        if (empty($uploadedFile['tmp_name']) || !is_uploaded_file($uploadedFile['tmp_name'])) {
            throw new Point7_CMS_Attachment_Upload_Exception(
                'No uploaded file',
                Point7_CMS_Attachment_Upload_Exception::ERR_UPLOAD_FAILED
            );
        }

        $originalName = $uploadedFile['name'] ?? 'file';
        $ext          = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowed      = $profile->getAllowedExtensions();

        if ($allowed && !in_array($ext, $allowed, true)) {
            throw new Point7_CMS_Attachment_Upload_Exception(
                "Extension '$ext' not allowed.",
                Point7_CMS_Attachment_Upload_Exception::ERR_WRONG_FILE_EXTENSION
            );
        }

        // Determine target directory
        $subDir = '';
        if ($this->hashMethod instanceof Point7_CMS_Attachment_Upload_Manager_HashFileToFolderMethod) {
            $subDir = $this->hashMethod->getFolder($originalName) . '/';
        }

        $targetDir = $this->resourcePath . '/' . $subDir;
        if (!is_dir($targetDir)) {
            @mkdir($targetDir, $this->dirMode, true);
        }

        $storedName = md5(uniqid($originalName, true)) . '.' . $ext;

        // Custom path from profile
        if (method_exists($profile, 'getFilePath') && ($customPath = $profile->getFilePath())) {
            $targetDir  = rtrim($customPath, '/') . '/';
            $storedName = $originalName;
        }

        $dest = $targetDir . $storedName;
        if (!move_uploaded_file($uploadedFile['tmp_name'], $dest)) {
            throw new Point7_CMS_Attachment_Upload_Exception(
                'Failed to move uploaded file.',
                Point7_CMS_Attachment_Upload_Exception::ERR_STORAGE_FAILED
            );
        }

        $attachment = new Point7_CMS_Attachment();
        $attachment->setOwnerUid($this->ownerUid);
        $attachment->setFilename($storedName);
        $attachment->setPath($subDir . $storedName);
        $attachment->setProfileName($profile->getProfileName());

        return $attachment;
    }
}
