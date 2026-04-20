<?php
namespace StudioAtrium\Application\WWW;

class SmartyFunctionsRegistry
{
    private string $resUrl = '';

    public function configure(string $key, string $value): void
    {
        if ($key === 'res_url') $this->resUrl = $value;
    }

    public function registerAll(\Smarty $smarty): void
    {
        $resUrl = $this->resUrl;

        $smarty->registerPlugin('function', 'res_url', function (array $params) use ($resUrl): string {
            return rtrim($resUrl, '/') . '/' . ltrim($params['path'] ?? '', '/');
        });
    }
}
