<?php
class Point7_WebApp_Context_Response
{
    private array  $data           = [];
    private ?string $errorMessage  = null;
    private ?string $infoMessage   = null;
    private array  $jsonResponse   = [];
    private ?string $jsResponse    = null;
    private mixed  $fileToSend     = null;
    private ?string $filename      = null;
    private ?string $fileContent   = null;
    private array  $headers        = [];
    private array  $meta           = [];
    private array  $forwardParams  = [];

    public function set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }

    public function setOnce(string $key, mixed $value): void
    {
        if (!array_key_exists($key, $this->data)) {
            $this->data[$key] = $value;
        }
    }

    public function get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    public function getAll(): array
    {
        return $this->data;
    }

    public function setErrorMessage(string $msg): void
    {
        $this->errorMessage = $msg;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function setInfoMessage(string $msg): void
    {
        $this->infoMessage = $msg;
    }

    public function getInfoMessage(): ?string
    {
        return $this->infoMessage;
    }

    // Note: PHP method names are case-insensitive, so setJSONResponse and
    // setJSONREsponse (the typo variant used in some modules) resolve to the same method.
    public function setJSONResponse(string $name, mixed $data): void
    {
        $this->jsonResponse[$name] = $data;
    }

    public function setJSONResponseData(mixed $data): void
    {
        $this->jsonResponse = is_array($data) ? $data : ['data' => $data];
    }

    public function getJSONResponse(): array
    {
        return $this->jsonResponse;
    }

    public function setJavaScriptResponse(string $js): void
    {
        $this->jsResponse = $js;
    }

    public function getJavaScriptResponse(): ?string
    {
        return $this->jsResponse;
    }

    public function setFileToSend(mixed $file): void
    {
        $this->fileToSend = $file;
    }

    public function getFileToSend(): mixed
    {
        return $this->fileToSend;
    }

    public function setFilename(string $name): void
    {
        $this->filename = $name;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFileContent(string $content): void
    {
        $this->fileContent = $content;
    }

    public function getFileContent(): ?string
    {
        return $this->fileContent;
    }

    public function setHTTPResponseHeader(string $name, string $value): void
    {
        $this->headers[$name] = $value;
    }

    public function getHTTPResponseHeaders(): array
    {
        return $this->headers;
    }

    public function setMeta(string $name, string $value): void
    {
        $this->meta[$name] = $value;
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    public function setForwardParam(string $name, mixed $value): void
    {
        $this->forwardParams[$name] = $value;
    }

    public function getForwardParams(): array
    {
        return $this->forwardParams;
    }
}
