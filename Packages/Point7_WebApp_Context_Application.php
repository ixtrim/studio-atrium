<?php
class Point7_WebApp_Context_Application
{
    private array  $config          = [];
    private mixed  $user            = null;
    private string $secret          = '';
    private array  $commandResults  = [];

    public function setConfig(array $config): void
    {
        $this->config = $config;
    }

    public function setSecret(string $secret): void
    {
        $this->secret = $secret;
    }

    public function getConfigParam(string $key): mixed
    {
        $parts = explode('.', $key);
        $node  = $this->config;
        foreach ($parts as $part) {
            if (!is_array($node) || !array_key_exists($part, $node)) {
                return null;
            }
            $node = $node[$part];
        }
        return $node;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }

    public function getUser(): mixed
    {
        return $this->user;
    }

    public function setUser(mixed $user): void
    {
        $this->user = $user;
    }

    public function recordCommandResult(string $commandClass, bool $ok): void
    {
        $this->commandResults[$commandClass] = $ok;
    }

    public function isCommandResultOk(string $commandClass): bool
    {
        return isset($this->commandResults[$commandClass]) && $this->commandResults[$commandClass] === true;
    }
}
