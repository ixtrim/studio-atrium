<?php
namespace StudioAtrium\Application\WWW;

class RequestResolver
{
    private \Point7_WebApp_Request $request;

    public function __construct(\Point7_WebApp_Request $request)
    {
        $this->request = $request;
    }

    public function getModule(): string
    {
        return ucfirst(strtolower((string)($this->request->getParam('module') ?? 'index')));
    }

    public function getAction(): string
    {
        return ucfirst(strtolower((string)($this->request->getParam('action') ?? '')));
    }
}
