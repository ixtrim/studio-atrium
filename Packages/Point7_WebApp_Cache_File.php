<?php
class Point7_WebApp_Cache_File
{
    private $path = '';
    public function configure(string $key, string $value)
    {
        if ($key === 'path') {
            $this->path = $value;
        }
    }

    public function init()
    {
        if ($this->path && !is_dir($this->path)) {
            @mkdir($this->path, 0775, true);
        }
    }

    public function get(string $key)
    {
        $file = $this->keyFile($key);
        if (!$file || !file_exists($file)) {
            return false;
        }
        $data = unserialize(file_get_contents($file));
        if (!is_array($data) || (isset($data['exp']) && $data['exp'] < time())) {
            @unlink($file);
            return false;
        }
        return $data['val'];
    }

    public function set(string $key, $value, int $ttl = 3600)
    {
        $file = $this->keyFile($key);
        if (!$file) return;
        $dir = dirname($file);
        if (!is_dir($dir)) @mkdir($dir, 0775, true);
        file_put_contents($file, serialize(['val' => $value, 'exp' => time() + $ttl]), LOCK_EX);
    }

    public function delete(string $key)
    {
        $file = $this->keyFile($key);
        if ($file && file_exists($file)) @unlink($file);
    }

    private function keyFile(string $key): string
    {
        if (!$this->path) return '';
        return rtrim($this->path, '/') . '/' . md5($key) . '.cache';
    }
}
