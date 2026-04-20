<?php
class Point7_WebApp_Request
{
    protected array  $params  = [];
    protected array  $raw     = [];
    protected array  $files   = [];
    protected array  $cookies = [];
    protected string $method  = 'GET';

    public function __construct(
        array $get     = [],
        array $post    = [],
        array $files   = [],
        array $cookies = [],
        string $method = 'GET'
    ) {
        $this->raw     = array_merge($get, $post);
        $this->params  = $this->raw;
        $this->files   = $files;
        $this->cookies = $cookies;
        $this->method  = strtoupper($method);
    }

    public static function fromGlobals(): static
    {
        return new static(
            $_GET    ?? [],
            $_POST   ?? [],
            $_FILES  ?? [],
            $_COOKIE ?? [],
            $_SERVER['REQUEST_METHOD'] ?? 'GET'
        );
    }

    public function getParam(string $name): mixed
    {
        return $this->params[$name] ?? null;
    }

    public function getRawParam(string $name): mixed
    {
        return $this->raw[$name] ?? null;
    }

    public function getRawParams(): array
    {
        return $this->raw;
    }

    public function getType(): string
    {
        return $this->method;
    }

    public function getCookieParam(string $name): mixed
    {
        return $this->cookies[$name] ?? null;
    }

    public function getFile(string $name): mixed
    {
        return $this->files[$name] ?? null;
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function isParamAllowed(string $name): bool
    {
        return array_key_exists($name, $this->params);
    }

    public function toArray(): array
    {
        return $this->params;
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getErrorMessages(): array
    {
        return [];
    }

    public function getInvalidFields(): array
    {
        return [];
    }
}
