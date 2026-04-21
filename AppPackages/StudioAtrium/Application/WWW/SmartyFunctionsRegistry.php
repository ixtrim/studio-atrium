<?php
namespace StudioAtrium\Application\WWW;

class SmartyFunctionsRegistry
{
    private string $resUrl = '';
    private ?UrlGenerator $urlGenerator = null;

    public function configure(string $key, string $value): void
    {
        if ($key === 'res_url') $this->resUrl = $value;
    }

    public function setUrlGenerator(UrlGenerator $gen): void
    {
        $this->urlGenerator = $gen;
    }

    public function fArticleImage(array $params, mixed $tpl = null): string
    {
        $doc = $params['document'] ?? null;
        if (!$doc) return '';

        $id = is_array($doc) ? ($doc['id'] ?? 0) : (method_exists($doc, 'getId') ? $doc->getId() : 0);
        if (!$id) return '';

        static $cache = [];
        if (isset($cache[$id])) return $cache[$id];

        $pdo = \Point7_WebApp::getPDO();
        $stmt = $pdo->prepare(
            'SELECT path, filename FROM attachment WHERE owner_uid = :slot AND profile_name = \'ProjectRender\' ORDER BY sorting ASC LIMIT 1'
        );
        $stmt->execute([':slot' => $id * 256 + 2]);
        $row = $stmt->fetch();

        $baseUrl = rtrim(\Point7_WebApp::getConfigParam('static.documents') ?? 'https://media.studioatrium.pl/document', '/');
        $url = $row ? ($baseUrl . '/' . $row['path'] . '/' . $row['filename']) : '';
        $cache[$id] = $url;
        return $url;
    }

    public function registerAll(\Smarty $smarty): void
    {
        $resUrl = $this->resUrl;
        $urlGen = $this->urlGenerator ?? new UrlGenerator();

        $smarty->registerPlugin('function', 'res_url', function (array $params) use ($resUrl): string {
            return rtrim($resUrl, '/') . '/' . ltrim($params['path'] ?? '', '/');
        });

        // {url} — generates site URLs from module/action params
        $smarty->registerPlugin('function', 'url', [$urlGen, 'generateUrl']);

        // {image} — generates image src URLs for projects
        $imageHelper = new ImageHelper();
        $smarty->registerPlugin('function', 'image', [$imageHelper, 'fImage']);

        // {articleImage} — returns URL of main image for a document/article
        $smarty->registerPlugin('function', 'articleImage', [$this, 'fArticleImage']);

        // Modifiers used in project listings
        $paramsHelper = new ProjectParamsHelper();
        $smarty->registerPlugin('modifier', 'hasFloor',       [$paramsHelper, 'mHasFloor']);
        $smarty->registerPlugin('modifier', 'hasLoft',        [$paramsHelper, 'mHasLoft']);
        $smarty->registerPlugin('modifier', 'isGroundFloor',  [$paramsHelper, 'mIsGroundFloor']);
        $smarty->registerPlugin('modifier', 'usableArea',     [$paramsHelper, 'mUsableArea']);
        $smarty->registerPlugin('modifier', 'parcelWidth',    [$paramsHelper, 'mParcelWidth']);
        $smarty->registerPlugin('modifier', 'parcelHeight',   [$paramsHelper, 'mParcelHeight']);
        $smarty->registerPlugin('modifier', 'houseHeight',    [$paramsHelper, 'mHouseHeight']);
        $smarty->registerPlugin('modifier', 'roofAngle',      [$paramsHelper, 'mRoofAngle']);
        $smarty->registerPlugin('modifier', 'roomCount',      [$paramsHelper, 'mRoomCount']);
        $smarty->registerPlugin('modifier', 'isNew',          [$paramsHelper, 'mIsNew']);
        $smarty->registerPlugin('modifier', 'replace',        fn($str, $find, $replace) => str_replace($find, $replace, $str));
        $smarty->registerPlugin('modifier', 'unicode',        function($str) {
            if (!is_string($str)) return $str;
            return preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', fn($m) => mb_convert_encoding(pack('H*', $m[1]), 'UTF-8', 'UCS-2BE'), $str);
        });
        $smarty->registerPlugin('modifier', 'number_format',  fn($n, $decimals = 0, $dec = '.', $sep = ',') => number_format((float)$n, $decimals, $dec, $sep));
        $smarty->registerPlugin('modifier', 'date_format',    fn($date, $fmt = '%b %e, %Y') => strftime($fmt, is_numeric($date) ? $date : strtotime($date)));
        $smarty->registerPlugin('modifier', 'nl2br',          fn($str) => nl2br($str));
        $smarty->registerPlugin('modifier', 'json_encode',    fn($val) => json_encode($val, JSON_UNESCAPED_UNICODE));
        $smarty->registerPlugin('modifier', 'strip_tags',     fn($str, $allowed = '') => strip_tags((string)$str, $allowed));
        $smarty->registerPlugin('modifier', 'htmlspecialchars', fn($str) => htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8'));
        $smarty->registerPlugin('modifier', 'htmlspecialchars_decode', fn($str) => htmlspecialchars_decode((string)$str, ENT_QUOTES));
        $smarty->registerPlugin('modifier', 'substr',         fn($str, $start, $len = null) => $len !== null ? mb_substr($str, $start, $len) : mb_substr($str, $start));
        $smarty->registerPlugin('modifier', 'strlen',         fn($str) => mb_strlen((string)$str));
        $smarty->registerPlugin('modifier', 'strtolower',     fn($str) => mb_strtolower((string)$str));
        $smarty->registerPlugin('modifier', 'strtoupper',     fn($str) => mb_strtoupper((string)$str));
        $smarty->registerPlugin('modifier', 'trim',           fn($str) => trim((string)$str));
        $smarty->registerPlugin('modifier', 'strpos',         fn($str, $find, $offset = 0) => strpos((string)$str, (string)$find, $offset));
        $smarty->registerPlugin('modifier', 'count',          fn($arr) => is_countable($arr) ? count($arr) : 0);
    }
}
