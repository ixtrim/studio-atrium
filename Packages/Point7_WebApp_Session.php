<?php
class Point7_WebApp_Session
{
    private string $name     = 'PHPSESSID';
    private int    $lifetime = 3600;
    private string $domain   = '';
    private bool   $autostart = false;

    public function configure(string $key, $value): void
    {
        match ($key) {
            'name'      => $this->name      = (string)$value,
            'lifetime'  => $this->lifetime  = (int)$value,
            'domain'    => $this->domain    = (string)$value,
            'autostart' => $this->autostart = ($value === 'true' || $value === true),
            default     => null,
        };
    }

    public function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_name($this->name);
            if ($this->lifetime) {
                session_set_cookie_params([
                    'lifetime' => $this->lifetime,
                    'path'     => '/',
                    'domain'   => $this->domain,
                    'secure'   => false,
                    'httponly' => true,
                    'samesite' => 'Lax',
                ]);
            }
            session_start();
        }
    }

    public function get(string $key): mixed
    {
        $this->ensureStarted();
        return $_SESSION[$key] ?? null;
    }

    public function set(string $key, mixed $value): void
    {
        $this->ensureStarted();
        $_SESSION[$key] = $value;
    }

    public function remove(string $key): void
    {
        $this->ensureStarted();
        unset($_SESSION[$key]);
    }

    public function clear(): void
    {
        $this->ensureStarted();
        $_SESSION = [];
    }

    public function destroy(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }

    private function ensureStarted(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            $this->start();
        }
    }

    public function init(): void
    {
        if ($this->autostart) {
            $this->start();
        }
    }
}
