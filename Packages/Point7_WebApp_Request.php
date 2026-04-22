<?php
class Point7_WebApp_Request
{
    protected $params  = [];
    protected $raw     = [];
    protected $files   = [];
    protected $cookies = [];
    protected $method  = 'GET';
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

    public static function fromGlobals()
    {
        return new static(
            $_GET    ?? [],
            $_POST   ?? [],
            $_FILES  ?? [],
            $_COOKIE ?? [],
            $_SERVER['REQUEST_METHOD'] ?? 'GET'
        );
    }

    public function getParam(string $name)
    {
        return $this->params[$name] ?? null;
    }

    public function getRawParam(string $name)
    {
        return $this->raw[$name] ?? null;
    }

    public function getRawParams(): array
    {
        return $this->raw;
    }

    /**
     * Replace raw HTTP params without changing filtered getParam() values.
     * Used after injecting XML defaults into $_GET so getRawParams() still
     * reflects only what the client actually sent.
     */
    public function replaceRawParams(array $raw)
    {
        $this->raw = $raw;
    }

    public function getType(): string
    {
        return $this->method;
    }

    public function getCookieParam(string $name)
    {
        return $this->cookies[$name] ?? null;
    }

    public function getFile(string $name)
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
