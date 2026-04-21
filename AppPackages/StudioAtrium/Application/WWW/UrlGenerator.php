<?php
namespace StudioAtrium\Application\WWW;

class UrlGenerator
{
    private string $baseUrl = '';

    public function __construct(string $baseUrl = '')
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function generateUrl(array $params, mixed $tpl = null): string
    {
        $module = $params['module'] ?? '';
        $action = $params['action'] ?? '';

        $url = match(true) {
            $module === 'project' && in_array($action, ['item','house']) => $this->projectUrl($params),
            $module === 'project' && $action === 'garage'               => $this->garageUrl($params),
            $module === 'project' && $action === 'other'                => $this->otherProjectUrl($params),
            $module === 'project' && $action === 'realizations'         => '/projekty-domow/realizacje/',
            $module === 'panel'   && $action === 'account'              => '/panel',
            $module === 'panel'   && $action === 'message'              => '/panel/wiadomosci' . (isset($params['project_id']) ? '?project_id=' . (int)$params['project_id'] : ''),
            $module === 'panel'                                         => '/panel',
            $module === 'favourite' && $action === 'list'               => '/ulubione/lista.html',
            $module === 'favourite' && $action === 'compare'            => '/ulubione/porownanie.html',
            $module === 'order'   && $action === 'cart'                 => '/zamowienie/koszyk.html',
            $module === 'discuss' && $action === 'forum'                => '/forum/',
            $module === 'discuss' && $action === 'category'             => '/forum/' . (int)($params['id'] ?? 0),
            $module === 'discuss' && $action === 'thread'               => '/forum/post,' . (int)($params['id'] ?? 0),
            $module === 'catalog' && $action === 'form'                 => '/katalog/zapytanie',
            $module === 'article' && $action === 'hash_tag'             => '/baza-wiedzy' . (isset($params['tag']) ? ',' . (int)$params['tag'] : '') . '/',
            $module === 'article' && $action === 'item'                 => $this->articleUrl($params),
            $module === 'project_extend' && $action === 'addons'        => '/dodatki/' . $this->slugify('') . ',' . (int)($params['id'] ?? 0) . '.html',
            $module === 'contact'                                       => '/kontakt',
            $module === 'varia'   && $action === 'addons'               => '/dodatki/',
            default => '/?module=' . urlencode($module) . '&action=' . urlencode($action) . $this->extraParams($params),
        };

        return $this->baseUrl . $url;
    }

    private function projectUrl(array $params): string
    {
        $id   = (int)($params['id'] ?? 0);
        $name = $this->slugify($params['link_title'] ?? $params['name'] ?? '');
        return '/projekty-domow/' . ($name ? $name . ',' : '') . $id . '.html';
    }

    private function garageUrl(array $params): string
    {
        $id   = (int)($params['id'] ?? 0);
        $name = $this->slugify($params['link_title'] ?? $params['name'] ?? '');
        return '/projekty-garazy/' . ($name ? $name . ',' : '') . $id . '.html';
    }

    private function otherProjectUrl(array $params): string
    {
        $id       = (int)($params['id'] ?? 0);
        $cat      = $params['category'] ?? 'wiaty';
        $name     = $this->slugify($params['link_title'] ?? $params['name'] ?? '');
        return '/projekty/' . $cat . '/' . ($name ? $name . ',' : '') . $id . '.html';
    }

    private function articleUrl(array $params): string
    {
        $id   = (int)($params['docId'] ?? $params['id'] ?? 0);
        $name = $this->slugify($params['link_title'] ?? $params['name'] ?? 'artykul');
        return '/artykuly/' . $name . ',' . $id . '.html';
    }

    private function extraParams(array $params): string
    {
        $skip = ['module', 'action'];
        $extra = [];
        foreach ($params as $k => $v) {
            if (!in_array($k, $skip, true)) {
                $extra[] = urlencode($k) . '=' . urlencode((string)$v);
            }
        }
        return $extra ? '&' . implode('&', $extra) : '';
    }

    private function slugify(string $text): string
    {
        if ($text === '') return '';
        $text = mb_strtolower($text, 'UTF-8');
        $map = ['ą'=>'a','ć'=>'c','ę'=>'e','ł'=>'l','ń'=>'n','ó'=>'o','ś'=>'s','ź'=>'z','ż'=>'z'];
        $text = strtr($text, $map);
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        return trim($text, '-');
    }
}
