<?php
class Point7_CMS_Attachment_DeleteHelper
{
    private $dao;
    private $resourcePath;
    public function __construct(Point7_CMS_Attachment_DAO_PDOMySQL $dao, string $resourcePath)
    {
        $this->dao          = $dao;
        $this->resourcePath = rtrim($resourcePath, '/');
    }

    public function deleteAttachment(Point7_CMS_Attachment $attachment)
    {
        // Delete children first (grouped by parent_relationship or flat list)
        foreach ($attachment->getChildAttachments() as $childOrGroup) {
            if ($childOrGroup instanceof Point7_CMS_Attachment) {
                $this->deleteAttachment($childOrGroup);
            } elseif (is_array($childOrGroup)) {
                foreach ($childOrGroup as $child) {
                    if ($child instanceof Point7_CMS_Attachment) {
                        $this->deleteAttachment($child);
                    }
                }
            }
        }

        // Remove physical file
        $file = $this->resourcePath . '/' . $attachment->getPath();
        if ($file && is_file($file)) {
            @unlink($file);
        }

        // Remove DB record
        if ($attachment->getId()) {
            $pdo  = Point7_WebApp::getPDO();
            $stmt = $pdo->prepare('DELETE FROM `attachment` WHERE id = :id');
            $stmt->execute([':id' => $attachment->getId()]);
        }
    }
}
