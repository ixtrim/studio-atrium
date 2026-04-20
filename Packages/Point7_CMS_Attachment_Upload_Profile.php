<?php
abstract class Point7_CMS_Attachment_Upload_Profile
{
    abstract public function getProfileName(): string;
    abstract public function getAllowedExtensions(): array;

    public function isSingleFile(): bool       { return false; }
    public function hasDescription(): bool     { return false; }
    public function hasTitle(): bool           { return false; }
    public function hasLink(): bool            { return false; }
    public function doNotStoreInDb(): bool     { return false; }
    public function getHashMethod(): ?string   { return null; }
    public function getFilePath(): ?string     { return null; }
    public function getFilePathWWW(): ?string  { return null; }
}
