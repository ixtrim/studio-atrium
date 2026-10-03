<?php
namespace StudioAtrium\Application\WWW;

class RequestResolver
{
    private $request;
    public function __construct(\Point7_WebApp_Request $request)
    {
        $this->request = $request;
    }

    public function getModule(): string
    {
        $name = (string)($this->request->getParam('module') ?? 'index');
        // 'index' → 'Index', 'project_extend' → 'ProjectExtend'
        return str_replace('_', '', ucwords(strtolower($name), '_'));
    }

    public function getAction(): string
    {
        $name = (string)($this->request->getParam('action') ?? '');
        // 'promo_info_notify' → 'PromoInfoNotify'
        return str_replace('_', '', ucwords(strtolower($name), '_'));
    }
}
