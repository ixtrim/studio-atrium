<?php
class Point7_WebApp_Context_Response
{
    private $data           = [];
    private $errorMessage  = null;
    private $infoMessage   = null;
    private $jsonResponse   = [];
    private $jsResponse    = null;
    private $fileToSend     = null;
    private $filename      = null;
    private $fileContent   = null;
    private $headers        = [];
    private $meta           = [];
    private $forwardParams  = [];
    public function set(string $key, $value)
    {
        $this->data[$key] = $value;
    }

    public function setOnce(string $key, $value)
    {
        if (!array_key_exists($key, $this->data)) {
            $this->data[$key] = $value;
        }
    }

    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    public function getAll(): array
    {
        return $this->data;
    }

    public function setErrorMessage(string $msg)
    {
        $this->errorMessage = $msg;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setInfoMessage(string $msg)
    {
        $this->infoMessage = $msg;
    }

    public function getInfoMessage()
    {
        return $this->infoMessage;
    }

    // Note: PHP method names are case-insensitive, so setJSONResponse and
    // setJSONREsponse (the typo variant used in some modules) resolve to the same method.
    public function setJSONResponse(string $name, $data)
    {
        $this->jsonResponse[$name] = $data;
    }

    public function setJSONResponseData($data)
    {
        $this->jsonResponse = is_array($data) ? $data : ['data' => $data];
    }

    public function getJSONResponse(): array
    {
        return $this->jsonResponse;
    }

    public function setJavaScriptResponse(string $js)
    {
        $this->jsResponse = $js;
    }

    public function getJavaScriptResponse()
    {
        return $this->jsResponse;
    }

    public function setFileToSend($file)
    {
        $this->fileToSend = $file;
    }

    public function getFileToSend()
    {
        return $this->fileToSend;
    }

    public function setFilename(string $name)
    {
        $this->filename = $name;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFileContent(string $content)
    {
        $this->fileContent = $content;
    }

    public function getFileContent()
    {
        return $this->fileContent;
    }

    public function setHTTPResponseHeader(string $name, string $value)
    {
        $this->headers[$name] = $value;
    }

    public function getHTTPResponseHeaders(): array
    {
        return $this->headers;
    }

    // Every caller of setMeta() (Modules/Project.php, Selfie.php, Developer.php,
    // Contest.php) passes a page title as $name and a meta description as $value,
    // expecting them to become the <title> and <meta name="description"> tags.
    // The old $meta array was never read anywhere in the render pipeline (only
    // $data is assigned to Smarty - see Point7_WebApp::run()), so this was a
    // silent no-op: pages with a project-level meta title fell through to the
    // generic default title instead. Route it through set() so it actually
    // reaches the template.
    public function setMeta(string $name, string $value)
    {
        $this->meta[$name] = $value;
        $this->set('pageTitle', $name);
        $this->set('pageMetaDescription', $value);
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    public function setForwardParam(string $name, $value)
    {
        $this->forwardParams[$name] = $value;
    }

    public function getForwardParams(): array
    {
        return $this->forwardParams;
    }
}
