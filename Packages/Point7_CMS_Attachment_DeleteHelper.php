<?php
class Point7_CMS_Attachment_DeleteHelper
{
    private Point7_CMS_Attachment_DAO_PDOMySQL $dao;
    private string $resourcePath;

    public function __construct(Point7_CMS_Attachment_DAO_PDOMySQL $dao, string $resourcePath)
    {
        $this->dao          = $dao;
        $this->resourcePath = rtrim($resourcePath, '/');
    }

    public function deleteAttachment(Point7_CMS_Attachment $attachment): void
    {
        // Delete children first
        foreach ($attachment->getChildAttachments() as $child) {
            $this->deleteAttachment($child);
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
