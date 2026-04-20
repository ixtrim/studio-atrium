<?php
namespace StudioAtrium\Entity;

class DAOActivityListener
{
    private string $file   = '';
    private string $format = '%{timestamp} - %{message}';

    public function configure(string $key, string $value): void
    {
        if ($key === 'file')   $this->file   = $value;
        if ($key === 'format') $this->format = $value;
    }

    public function onEvent(string $event, mixed $object): void
    {
        if (!$this->file) return;
        $file = \Point7_WebApp::resolveValue($this->file);
        $dir  = dirname($file);
        if (!is_dir($dir)) @mkdir($dir, 0775, true);
        $msg = sprintf("[%s] %s: %s\n", date('Y-m-d H:i:s'), $event, get_class($object));
        @file_put_contents($file, $msg, FILE_APPEND | LOCK_EX);
    }
}
