<?php
namespace StudioAtrium\Application\WWW;

class SmartyFunctionsRegistry
{
    private $resUrl = '';
    private $urlGenerator = null;
    public function configure(string $key, string $value)
    {
        if ($key === 'res_url') $this->resUrl = $value;
    }

    public function setUrlGenerator(UrlGenerator $gen)
    {
        $this->urlGenerator = $gen;
    }

    public function fArticleImage(array $params, $tpl = null): string
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

    private function fetchSocialUrls(): array
    {
        try {
            $pdo  = \Point7_WebApp::getPDO();
            $stmt = $pdo->query(
                "SELECT REPLACE(char_id, 'social_', '') AS platform, string_value AS url
                 FROM settings
                 WHERE char_id IN ('social_facebook','social_instagram','social_pinterest','social_youtube')"
            );
            $defaults = [
                'facebook'  => 'https://www.facebook.com/studioatrium',
                'instagram' => 'https://www.instagram.com/studioatrium.pl/',
                'pinterest' => 'https://www.pinterest.com/studioatrium/',
                'youtube'   => 'https://www.youtube.com/user/StudioAtrium',
            ];
            $fromDb = $stmt->fetchAll(\PDO::FETCH_KEY_PAIR) ?: [];
            return array_merge($defaults, array_filter($fromDb));
        } catch (\Exception $e) {
            return [
                'facebook'  => 'https://www.facebook.com/studioatrium',
                'instagram' => 'https://www.instagram.com/studioatrium.pl/',
                'pinterest' => 'https://www.pinterest.com/studioatrium/',
                'youtube'   => 'https://www.youtube.com/user/StudioAtrium',
            ];
        }
    }

    private function fetchSeoData(): array
    {
        try {
            $pdo  = \Point7_WebApp::getPDO();
            $stmt = $pdo->query("SELECT string_value FROM settings WHERE char_id = 'seo_links_header' LIMIT 1");
            $row  = $stmt->fetch(\PDO::FETCH_ASSOC);

            $stmt  = $pdo->query('SELECT label, url FROM footer_seo ORDER BY sorting ASC');
            $links = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return ['header' => $row ? $row['string_value'] : '', 'links' => $links];
        } catch (\Exception $e) {
            return ['header' => '', 'links' => []];
        }
    }

    private function fetchPromoMarqueeText(): string
    {
        $default = 'Rabat 350 zł na WSZYSTKO do 30.11';
        try {
            $pdo  = \Point7_WebApp::getPDO();
            $stmt = $pdo->query("SELECT string_value FROM settings WHERE char_id = 'promo_marquee_text' LIMIT 1");
            $row  = $stmt->fetch(\PDO::FETCH_ASSOC);
            $text = $row ? trim((string) $row['string_value']) : '';
            return $text !== '' ? $text : $default;
        } catch (\Exception $e) {
            return $default;
        }
    }

    private function fetchArticlesTicks(): array
    {
        $defaults = $this->getArticlesTicksDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureArticlesTicksTable($pdo);
            $stmt = $pdo->query(
                'SELECT title, teaser, link_url, link_label
                 FROM homepage_articles_ticks
                 ORDER BY sorting ASC, id ASC'
            );
            if (!$stmt) {
                return $defaults;
            }
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return !empty($rows) ? $rows : $defaults;
        } catch (\Throwable $e) {
            return $defaults;
        }
    }

    /**
     * Create homepage_articles_ticks if missing and seed default rows once.
     * If the table already exists, leave its content alone.
     */
    private function ensureArticlesTicksTable(\PDO $pdo)
    {
        $exists = $pdo->query("SHOW TABLES LIKE 'homepage_articles_ticks'");
        if ($exists && $exists->fetchColumn()) {
            return;
        }

        $created = $pdo->exec(
            'CREATE TABLE homepage_articles_ticks (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                title VARCHAR(255) NOT NULL DEFAULT \'\',
                teaser VARCHAR(512) NOT NULL DEFAULT \'\',
                link_url VARCHAR(512) NOT NULL DEFAULT \'\',
                link_label VARCHAR(128) NOT NULL DEFAULT \'Czytaj dalej...\',
                sorting INT UNSIGNED NOT NULL DEFAULT 0,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
        if ($created === false) {
            throw new \RuntimeException('Could not create homepage_articles_ticks');
        }

        $stmt = $pdo->prepare(
            'INSERT INTO homepage_articles_ticks (title, teaser, link_url, link_label, sorting)
             VALUES (:title, :teaser, :link_url, :link_label, :sorting)'
        );
        foreach ($this->getArticlesTicksDefaults() as $i => $row) {
            $stmt->execute([
                ':title'      => $row['title'],
                ':teaser'     => $row['teaser'],
                ':link_url'   => $row['link_url'],
                ':link_label' => $row['link_label'],
                ':sorting'    => $i,
            ]);
        }
    }

    private function getArticlesTicksDefaults(): array
    {
        return [
            [
                'title'      => 'Wszystkie projekty domów',
                'teaser'     => 'Fragment tekstu pierwsze zdania zajawki',
                'link_url'   => '#',
                'link_label' => 'Czytaj dalej...',
            ],
            [
                'title'      => 'Dlaczego warto zdecydować się na projekty domów Studio Atrium',
                'teaser'     => 'Fragment tekstu',
                'link_url'   => '#',
                'link_label' => 'Czytaj dalej...',
            ],
            [
                'title'      => 'Najczęściej zadawane pytania',
                'teaser'     => 'Fragment tekstu pierwsze zdania zajawki',
                'link_url'   => '#',
                'link_label' => 'Czytaj dalej...',
            ],
        ];
    }

    private function fetchInitiative()
    {
        $defaults = $this->getInitiativeDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureInitiativeTable($pdo);
            $stmt = $pdo->query(
                'SELECT title, body, image_url, image_alt, button_label, button_url
                 FROM homepage_initiative
                 ORDER BY id ASC
                 LIMIT 1'
            );
            if (!$stmt) {
                return $defaults;
            }
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $row ? $row : $defaults;
        } catch (\Throwable $e) {
            return $defaults;
        }
    }

    private function ensureInitiativeTable(\PDO $pdo)
    {
        $exists = $pdo->query("SHOW TABLES LIKE 'homepage_initiative'");
        if ($exists && $exists->fetchColumn()) {
            return;
        }

        $created = $pdo->exec(
            'CREATE TABLE homepage_initiative (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                title VARCHAR(255) NOT NULL DEFAULT \'\',
                body TEXT NOT NULL,
                image_url VARCHAR(512) NOT NULL DEFAULT \'\',
                image_alt VARCHAR(255) NOT NULL DEFAULT \'\',
                button_label VARCHAR(128) NOT NULL DEFAULT \'\',
                button_url VARCHAR(512) NOT NULL DEFAULT \'\',
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
        if ($created === false) {
            throw new \RuntimeException('Could not create homepage_initiative');
        }

        $defaults = $this->getInitiativeDefaults();
        $stmt = $pdo->prepare(
            'INSERT INTO homepage_initiative (title, body, image_url, image_alt, button_label, button_url)
             VALUES (:title, :body, :image_url, :image_alt, :button_label, :button_url)'
        );
        $stmt->execute(array(
            ':title'        => $defaults['title'],
            ':body'         => $defaults['body'],
            ':image_url'    => $defaults['image_url'],
            ':image_alt'    => $defaults['image_alt'],
            ':button_label' => $defaults['button_label'],
            ':button_url'   => $defaults['button_url'],
        ));
    }

    private function getInitiativeDefaults()
    {
        return array(
            'title'        => 'Nasze inicjatywy dla architektury',
            'body'         => 'Firma architektoniczna i wydawnicza Studio Atrium istnieje na polskim rynku od 1994 roku. W naszym dorobku znajduje się ponad 1400 projektów powtarzalnych, ale zajmujemy się także inną działalnością w obszarze budownictwa oraz działalnością wydawniczą. Nasz dorobek projektowy prezentujemy na łamach katalogu Domy w Tradycji. Byliśmy także wydawcą magazynu Romantyczny Styl. Oprócz działalności na polu projektów powtarzalnych jesteśmy autorami projektów budynków usługowych, projektów wnętrz i mamy na koncie dwie ogólnopolskie akcje Dom Modelowy. Serdecznie zapraszamy do zapoznania się z naszymi osiągnięciami.',
            'image_url'    => 'https://www.studioatrium.pl/img/about.webp',
            'image_alt'    => 'Katalogi Studio Atrium',
            'button_label' => 'Zobacz co jeszcze robimy',
            'button_url'   => '#',
        );
    }

    private function fetchCharity()
    {
        $defaults = $this->getCharityDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureCharityTable($pdo);
            $stmt = $pdo->query(
                'SELECT title, body, logo1_url, logo1_alt, logo2_url, logo2_alt
                 FROM homepage_charity
                 ORDER BY id ASC
                 LIMIT 1'
            );
            if (!$stmt) {
                return $defaults;
            }
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $row ? $row : $defaults;
        } catch (\Throwable $e) {
            return $defaults;
        }
    }

    private function ensureCharityTable(\PDO $pdo)
    {
        $exists = $pdo->query("SHOW TABLES LIKE 'homepage_charity'");
        if ($exists && $exists->fetchColumn()) {
            return;
        }

        $created = $pdo->exec(
            'CREATE TABLE homepage_charity (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                title VARCHAR(255) NOT NULL DEFAULT \'\',
                body TEXT NOT NULL,
                logo1_url VARCHAR(512) NOT NULL DEFAULT \'\',
                logo1_alt VARCHAR(255) NOT NULL DEFAULT \'\',
                logo2_url VARCHAR(512) NOT NULL DEFAULT \'\',
                logo2_alt VARCHAR(255) NOT NULL DEFAULT \'\',
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
        if ($created === false) {
            throw new \RuntimeException('Could not create homepage_charity');
        }

        $defaults = $this->getCharityDefaults();
        $stmt = $pdo->prepare(
            'INSERT INTO homepage_charity (title, body, logo1_url, logo1_alt, logo2_url, logo2_alt)
             VALUES (:title, :body, :logo1_url, :logo1_alt, :logo2_url, :logo2_alt)'
        );
        $stmt->execute(array(
            ':title'     => $defaults['title'],
            ':body'      => $defaults['body'],
            ':logo1_url' => $defaults['logo1_url'],
            ':logo1_alt' => $defaults['logo1_alt'],
            ':logo2_url' => $defaults['logo2_url'],
            ':logo2_alt' => $defaults['logo2_alt'],
        ));
    }

    private function getCharityDefaults()
    {
        return array(
            'title'     => 'Wspieramy potrzebujących',
            'body'      => 'Biuro projektowe Studio Atrium działa na rynku od ponad 25 lat. Domy wybudowane według naszych projektów można spotkać w całym kraju. Jesteśmy przekonani, że mieszkają w nich szczęśliwe rodziny. Jednak zawsze staramy się pamiętać także o tych, których los nie zawsze traktuje z łagodnością.',
            'logo1_url' => '/img/maitri.png',
            'logo1_alt' => 'Maitri',
            'logo2_url' => 'https://www.studioatrium.pl/img/drachma.png',
            'logo2_alt' => 'Drachma',
        );
    }

    private function fetchContactData(): array
    {
        try {
            $pdo  = \Point7_WebApp::getPDO();
            $stmt = $pdo->query(
                "SELECT REPLACE(char_id, 'contact_', '') AS key_name, string_value AS val
                 FROM settings
                 WHERE char_id IN ('contact_header','contact_phone1','contact_phone2','contact_extra_phones','contact_email','contact_details','contact_map_url','contact_map_text')"
            );
            return $stmt->fetchAll(\PDO::FETCH_KEY_PAIR);
        } catch (\Exception $e) {
            return [];
        }
    }

    private function fetchMenuColumns(): array
    {
        try {
            $pdo  = \Point7_WebApp::getPDO();
            $stmt = $pdo->query('SELECT label, url, target, col FROM footer_menus ORDER BY col ASC, sorting ASC');
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $cols = ['a' => [], 'b' => [], 'c' => []];
            foreach ($rows as $row) {
                $col = $row['col'];
                if (isset($cols[$col])) {
                    $cols[$col][] = $row;
                }
            }
            return $cols;
        } catch (\Exception $e) {
            return ['a' => [], 'b' => [], 'c' => []];
        }
    }

    public function registerAll(\Smarty $smarty)
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

        // Assign social media URLs from settings table — available as $social.facebook etc.
        $smarty->assign('social', $this->fetchSocialUrls());

        // Assign contact data from settings table — available as $contact.phone1 etc.
        $smarty->assign('contact', $this->fetchContactData());

        // Assign SEO links header and repeater rows from footer_seo table
        $seoData = $this->fetchSeoData();
        $smarty->assign('seo_links_header', $seoData['header']);
        $smarty->assign('seo_links', $seoData['links']);

        // Assign header promo marquee text from settings table
        $smarty->assign('promo_marquee_text', $this->fetchPromoMarqueeText());

        // Assign homepage article ticks (zajawki artykułów)
        $smarty->assign('articles_ticks', $this->fetchArticlesTicks());

        // Assign homepage initiative / charity unique sections
        $smarty->assign('initiative', $this->fetchInitiative());
        $smarty->assign('charity', $this->fetchCharity());

        // Assign footer menu columns (a/b/c) from footer_menus table
        $smarty->assign('footer_menus', $this->fetchMenuColumns());

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
        $smarty->registerPlugin('modifier', 'replace',        function($str, $find, $replace) { return str_replace($find, $replace, $str); });
        $smarty->registerPlugin('modifier', 'unicode',        function($str) {
            if (!is_string($str)) return $str;
            return preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function($m) { return mb_convert_encoding(pack('H*', $m[1]), 'UTF-8', 'UCS-2BE'); }, $str);
        });
        $smarty->registerPlugin('modifier', 'number_format',  function($n, $decimals = 0, $dec = '.', $sep = ',') { return number_format((float)$n, $decimals, $dec, $sep); });
        $smarty->registerPlugin('modifier', 'date_format',    function($date, $fmt = '%b %e, %Y') { return strftime($fmt, is_numeric($date) ? $date : strtotime($date)); });
        $smarty->registerPlugin('modifier', 'nl2br',          function($str) { return nl2br($str); });
        $smarty->registerPlugin('modifier', 'json_encode',    function($val) { return json_encode($val, JSON_UNESCAPED_UNICODE); });
        $smarty->registerPlugin('modifier', 'strip_tags',     function($str, $allowed = '') { return strip_tags((string)$str, $allowed); });
        $smarty->registerPlugin('modifier', 'htmlspecialchars', function($str) { return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8'); });
        $smarty->registerPlugin('modifier', 'htmlspecialchars_decode', function($str) { return htmlspecialchars_decode((string)$str, ENT_QUOTES); });
        $smarty->registerPlugin('modifier', 'substr',         function($str, $start, $len = null) { return $len !== null ? mb_substr($str, $start, $len) : mb_substr($str, $start); });
        $smarty->registerPlugin('modifier', 'strlen',         function($str) { return mb_strlen((string)$str); });
        $smarty->registerPlugin('modifier', 'strtolower',     function($str) { return mb_strtolower((string)$str); });
        $smarty->registerPlugin('modifier', 'strtoupper',     function($str) { return mb_strtoupper((string)$str); });
        $smarty->registerPlugin('modifier', 'trim',           function($str) { return trim((string)$str); });
        $smarty->registerPlugin('modifier', 'strpos',         function($str, $find, $offset = 0) { return strpos((string)$str, (string)$find, $offset); });
        $smarty->registerPlugin('modifier', 'count',          function($arr) { return (is_array($arr) || $arr instanceof \Countable) ? count($arr) : 0; });
    }
}
