<?php
namespace StudioAtrium\Application\WWW;

class UrlGenerator
{
    private $baseUrl = '';
    public function __construct(string $baseUrl = '')
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function generateUrl(array $params, $tpl = null): string
    {
        $module = $params['module'] ?? '';
        $action = $params['action'] ?? '';

        if ($module === 'project' && in_array($action, ['item','house'])) {
            $url = $this->projectUrl($params);
        } elseif ($module === 'project' && $action === 'garage') {
            $url = $this->garageUrl($params);
        } elseif ($module === 'project' && $action === 'other') {
            $url = $this->otherProjectUrl($params);
        } elseif ($module === 'project' && $action === 'realizations') {
            $url = '/projekty-domow/realizacje/';
        } elseif ($module === 'panel' && $action === 'account') {
            $url = '/panel';
        } elseif ($module === 'panel' && $action === 'message') {
            $url = '/panel/wiadomosci' . (isset($params['project_id']) ? '?project_id=' . (int)$params['project_id'] : '');
        } elseif ($module === 'panel') {
            $url = '/panel';
        } elseif ($module === 'favourite' && $action === 'list') {
            $url = '/ulubione/lista.html';
        } elseif ($module === 'favourite' && $action === 'compare') {
            $url = '/ulubione/porownanie.html';
        } elseif ($module === 'order' && $action === 'cart') {
            $url = '/zamowienie/koszyk.html';
        } elseif ($module === 'discuss' && $action === 'forum') {
            $url = '/forum/';
        } elseif ($module === 'discuss' && $action === 'category') {
            $url = '/forum/' . (int)($params['id'] ?? 0);
        } elseif ($module === 'discuss' && $action === 'thread') {
            $url = '/forum/post,' . (int)($params['id'] ?? 0);
        } elseif ($module === 'catalog' && $action === 'form') {
            $url = '/katalog/zapytanie';
        } elseif ($module === 'article' && $action === 'hash_tag') {
            $url = '/baza-wiedzy' . (isset($params['tag']) ? ',' . (int)$params['tag'] : '') . '/';
        } elseif ($module === 'article' && $action === 'item') {
            $url = $this->articleUrl($params);
        } elseif ($module === 'project_extend' && $action === 'addons') {
            $url = '/dodatki/' . $this->slugify('') . ',' . (int)($params['id'] ?? 0) . '.html';
        } elseif ($module === 'contact') {
            $url = '/kontakt';
        } elseif ($module === 'varia' && $action === 'addons') {
            $url = '/dodatki/';
        } else {
            $url = '/?module=' . urlencode($module) . '&action=' . urlencode($action) . $this->extraParams($params);
        }

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
