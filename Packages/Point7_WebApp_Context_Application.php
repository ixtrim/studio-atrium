<?php
class Point7_WebApp_Context_Application
{
    private $config          = [];
    private $user            = null;
    private $secret          = '';
    private $commandResults  = [];
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    public function setSecret(string $secret)
    {
        $this->secret = $secret;
    }

    public function getConfigParam(string $key)
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

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function recordCommandResult(string $commandClass, bool $ok)
    {
        $this->commandResults[$commandClass] = $ok;
    }

    public function isCommandResultOk(string $commandClass): bool
    {
        return isset($this->commandResults[$commandClass]) && $this->commandResults[$commandClass] === true;
    }
}
