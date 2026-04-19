<?php
class Point7_WebApp_Session
{
    private $name     = 'PHPSESSID';
    private $lifetime = 3600;
    private $domain   = '';
    private $autostart = false;
    public function configure(string $key, $value)
    {
        switch ($key) {
            case 'name':
                $this->name = (string)$value;
                break;
            case 'lifetime':
                $this->lifetime = (int)$value;
                break;
            case 'domain':
                $this->domain = (string)$value;
                break;
            case 'autostart':
                $this->autostart = ($value === 'true' || $value === true);
                break;
        }
    }

    public function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_name($this->name);
            if ($this->lifetime) {
                session_set_cookie_params($this->lifetime, '/', $this->domain, false, true);
            }
            session_start();
        }
    }

    public function get(string $key)
    {
        $this->ensureStarted();
        return $_SESSION[$key] ?? null;
    }

    public function set(string $key, $value)
    {
        $this->ensureStarted();
        $_SESSION[$key] = $value;
    }

    public function remove(string $key)
    {
        $this->ensureStarted();
        unset($_SESSION[$key]);
    }

    public function clear()
    {
        $this->ensureStarted();
        $_SESSION = [];
    }

    public function destroy()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }

    private function ensureStarted()
    {
        if (session_status() === PHP_SESSION_NONE) {
            $this->start();
        }
    }

    public function init()
    {
        if ($this->autostart) {
            $this->start();
        }
    }
}
