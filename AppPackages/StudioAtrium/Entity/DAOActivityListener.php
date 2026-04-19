<?php
namespace StudioAtrium\Entity;

class DAOActivityListener
{
    private $file   = '';
    private $format = '%{timestamp} - %{message}';

    public function configure(string $key, string $value)
    {
        if ($key === 'file')   $this->file   = $value;
        if ($key === 'format') $this->format = $value;
    }

    public function onEvent(string $event, $object)
    {
        if (!$this->file) return;
        $file = \Point7_WebApp::resolveValue($this->file);
        $dir  = dirname($file);
        if (!is_dir($dir)) @mkdir($dir, 0775, true);
        $msg = sprintf("[%s] %s: %s\n", date('Y-m-d H:i:s'), $event, get_class($object));
        @file_put_contents($file, $msg, FILE_APPEND | LOCK_EX);
    }
}
