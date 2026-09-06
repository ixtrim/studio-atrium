<?php
namespace StudioAtrium\Application\WWW;

class SmartyFunctionsRegistry
{
    private static $paramsHelperInstance = null;

    private static function paramsHelper()
    {
        if (self::$paramsHelperInstance === null) {
            self::$paramsHelperInstance = new ProjectParamsHelper();
        }
        return self::$paramsHelperInstance;
    }

    public static function mHasFloor($params, $strict = false)
    {
        return self::paramsHelper()->mHasFloor($params, (bool) $strict);
    }

    public static function mHasLoft($params, $strict = false)
    {
        return self::paramsHelper()->mHasLoft($params, (bool) $strict);
    }

    public static function mIsGroundFloor($params, $strict = false)
    {
        return self::paramsHelper()->mIsGroundFloor($params, (bool) $strict);
    }

    public static function mHasSkeletonOption($params)
    {
        return self::paramsHelper()->mHasSkeletonOption($params);
    }

    public static function mIsWithdrawn($params)
    {
        return self::paramsHelper()->mIsWithdrawn($params);
    }

    public static function mHasMirror($params)
    {
        return self::paramsHelper()->mHasMirror($params);
    }

    public static function mHasRegeneration($params)
    {
        return self::paramsHelper()->mHasRegeneration($params);
    }

    public static function mIsAvailable($params)
    {
        return self::paramsHelper()->mIsAvailable($params);
    }

    public static function mMapStorey($storey)
    {
        return self::paramsHelper()->mMapStorey($storey);
    }

    public static function mMapStoreyCatalog($storey)
    {
        return self::paramsHelper()->mMapStoreyCatalog($storey);
    }

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

    public function mProjectCatalog($type): string
    {
        return \StudioAtrium\Application\Helper\Project::getCatalogForType((string) $type);
    }

    public function mProjectType($type, $catalogSlug = false, $fullLabel = false): string
    {
        $type = (string) $type;
        if ($catalogSlug) {
            if ($fullLabel) {
                return \StudioAtrium\Application\Helper\Project::getCategorySlugForType($type);
            }
            return \StudioAtrium\Application\Helper\Project::getTypesPlural($type);
        }
        return \StudioAtrium\Application\Helper\Project::getTypes($type);
    }

    public function mLinkTitle($project): string
    {
        if (is_object($project)) {
            if (method_exists($project, 'getName') && $project->getName()) {
                return (string) $project->getName();
            }
            $alpha = method_exists($project, 'getSymbolAlpha') ? $project->getSymbolAlpha() : '';
            $num = method_exists($project, 'getSymbolNum') ? $project->getSymbolNum() : '';
            return trim($alpha . ' ' . $num);
        }
        if (is_array($project)) {
            if (!empty($project['name'])) {
                return (string) $project['name'];
            }
            return trim(($project['symbol_alpha'] ?? '') . ' ' . ($project['symbol_num'] ?? ''));
        }
        return '';
    }

    public function mHideEmails($text)
    {
        if (!is_string($text) || $text === '') {
            return $text;
        }
        return preg_replace(
            '/([a-zA-Z0-9._%+\-]+)@([a-zA-Z0-9.\-]+\.[a-zA-Z]{2,})/',
            '$1 [at] $2',
            $text
        );
    }

    /**
     * Rewrite relative asset / project links inside article HTML.
     * Smarty: {$article.content|fixArticleContent:$article.id}
     */
    public function mFixArticleContent($string, $articleId)
    {
        $string = (string) $string;
        $articleId = (int) $articleId;
        if ($string === '') {
            return $string;
        }

        $resUrl = $this->resUrl;
        if ($resUrl === '') {
            $resUrl = \Point7_WebApp::getConfigParam('static.documents');
        }
        if (!$resUrl) {
            $resUrl = 'https://media.studioatrium.pl/document';
        }
        $resUrl = rtrim($resUrl, '/');

        $matches = array();
        if (preg_match_all('/href="([0-9]+)"/', $string, $matches)) {
            foreach (array_unique($matches[1]) as $id) {
                $url = null;
                try {
                    $cache = \Point7_WebApp::getCache();
                    if ($cache) {
                        $url = $cache->get('url_' . $id);
                    }
                } catch (\Throwable $e) {
                    $url = null;
                }

                if (!$url) {
                    try {
                        $project = \Point7_WebApp::getDAORepository()
                            ->getProjectFinder(null)
                            ->getById((int) $id);
                        if ($project) {
                            $url = \StudioAtrium\Application\Helper\Url::buildProjectUrl($project);
                            try {
                                $cache = \Point7_WebApp::getCache();
                                if ($cache) {
                                    $cache->set('url_' . $id, $url);
                                }
                            } catch (\Throwable $e) {
                            }
                        }
                    } catch (\Throwable $e) {
                        $url = null;
                    }
                }

                if ($url) {
                    $string = str_replace('href="' . $id . '"', 'href="' . $url . '"', $string);
                }
            }
        }

        if (strpos($string, 'href="atrium.php') !== false) {
            $string = str_replace('href="atrium.php', 'href="/atrium.php', $string);
        }

        $string = preg_replace(
            '/href=(?:.*\/)?"?(.*(\.doc|\.pdf|\.zip|\.mp3))"?/',
            'href="' . $resUrl . '/' . $articleId . '/' . '$1"',
            $string
        );
        $string = preg_replace(
            '/(src=")(?!http)/',
            'src="' . $resUrl . '/' . $articleId . '/',
            $string
        );
        $string = str_replace(array('<h1>', '</h1>'), array('<h5>', '</h5>'), $string);
        return $string;
    }

    public function mAvatar($userId)
    {
        $userId = (int) $userId;
        if ($userId <= 0) {
            return '';
        }

        static $cache = array();
        if (isset($cache[$userId])) {
            return $cache[$userId];
        }

        try {
            $pdo = \Point7_WebApp::getPDO();
            $stmt = $pdo->prepare(
                "SELECT path, filename FROM attachment
                 WHERE owner_uid = :uid AND profile_name = 'UserAvatar'
                 ORDER BY sorting ASC LIMIT 1"
            );
            $stmt->execute(array(':uid' => $userId));
            $row = $stmt->fetch();
            if (!$row) {
                $cache[$userId] = '';
                return '';
            }

            $baseUrl = rtrim(\Point7_WebApp::getConfigParam('static.uploads') ?: 'https://media.studioatrium.pl/stock/28', '/');
            $cache[$userId] = $baseUrl . '/' . $row['path'] . '/' . $row['filename'];
            return $cache[$userId];
        } catch (\Exception $e) {
            $cache[$userId] = '';
            return '';
        }
    }

    public function mInBasket($project, $version = 'normal'): bool
    {
        $projectId = 0;
        if (is_object($project) && method_exists($project, 'getId')) {
            $projectId = (int) $project->getId();
        } elseif (is_array($project)) {
            $projectId = (int) ($project['id'] ?? 0);
        }
        if ($projectId <= 0) {
            return false;
        }

        $version = $version ?: 'normal';
        $session = \Point7_WebApp::getSession();
        $basket = $session->get('basket');
        if (!is_array($basket)) {
            return false;
        }

        foreach ($basket as $item) {
            if (!is_array($item)) {
                continue;
            }
            if ((int) ($item['pid'] ?? 0) === $projectId && ($item['version'] ?? 'normal') === $version) {
                return true;
            }
        }
        return false;
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

    private function fetchFeaturedVideo()
    {
        $defaults = $this->getFeaturedVideoDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureFeaturedVideoTable($pdo);
            $stmt = $pdo->query(
                'SELECT title, youtube_id, thumbnail_url, image_alt, badge_name, badge_area, badge_site, video_url
                 FROM homepage_featured_video
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

    private function ensureFeaturedVideoTable(\PDO $pdo)
    {
        $exists = $pdo->query("SHOW TABLES LIKE 'homepage_featured_video'");
        if ($exists && $exists->fetchColumn()) {
            return;
        }

        $created = $pdo->exec(
            'CREATE TABLE homepage_featured_video (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                title TEXT NOT NULL,
                youtube_id VARCHAR(64) NOT NULL DEFAULT \'\',
                thumbnail_url VARCHAR(512) NOT NULL DEFAULT \'\',
                image_alt VARCHAR(255) NOT NULL DEFAULT \'\',
                badge_name VARCHAR(128) NOT NULL DEFAULT \'\',
                badge_area VARCHAR(128) NOT NULL DEFAULT \'\',
                badge_site VARCHAR(255) NOT NULL DEFAULT \'\',
                video_url VARCHAR(512) NOT NULL DEFAULT \'\',
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
        if ($created === false) {
            throw new \RuntimeException('Could not create homepage_featured_video');
        }

        $defaults = $this->getFeaturedVideoDefaults();
        $stmt = $pdo->prepare(
            'INSERT INTO homepage_featured_video
             (title, youtube_id, thumbnail_url, image_alt, badge_name, badge_area, badge_site, video_url)
             VALUES
             (:title, :youtube_id, :thumbnail_url, :image_alt, :badge_name, :badge_area, :badge_site, :video_url)'
        );
        $stmt->execute(array(
            ':title'         => $defaults['title'],
            ':youtube_id'    => $defaults['youtube_id'],
            ':thumbnail_url' => $defaults['thumbnail_url'],
            ':image_alt'     => $defaults['image_alt'],
            ':badge_name'    => $defaults['badge_name'],
            ':badge_area'    => $defaults['badge_area'],
            ':badge_site'    => $defaults['badge_site'],
            ':video_url'     => $defaults['video_url'],
        ));
    }

    private function getFeaturedVideoDefaults()
    {
        return array(
            'title'          => "Zobacz piękną realizację\nnaszego projektu\nLOPEZ 101,90 m2\nZainspiruj się.",
            'youtube_id'     => 'KGbL49tcxiE',
            'thumbnail_url'  => 'https://img.youtube.com/vi/KGbL49tcxiE/maxresdefault.jpg',
            'image_alt'      => 'LOPEZ 101,90 m²',
            'badge_name'     => 'LOPEZ',
            'badge_area'     => '(101,90 m²)',
            'badge_site'     => 'www.studioatrium.pl',
            'video_url'      => 'https://www.youtube.com/watch?v=KGbL49tcxiE',
        );
    }

    private function fetchPorady()
    {
        $defaults = $this->getPoradyDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensurePoradyTables($pdo);
            $stmt = $pdo->query(
                'SELECT section_title, button_label, button_url
                 FROM homepage_porady
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

    private function fetchTips()
    {
        $defaults = $this->getTipsDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensurePoradyTables($pdo);
            $stmt = $pdo->query(
                'SELECT title, image_url, image_alt, article_url, tag1_label, tag1_url, tag2_label, tag2_url
                 FROM homepage_tips
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

    private function ensurePoradyTables(\PDO $pdo)
    {
        $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_porady'");
        if (!($existsMeta && $existsMeta->fetchColumn())) {
            $created = $pdo->exec(
                'CREATE TABLE homepage_porady (
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    section_title VARCHAR(255) NOT NULL DEFAULT \'\',
                    button_label VARCHAR(128) NOT NULL DEFAULT \'\',
                    button_url VARCHAR(512) NOT NULL DEFAULT \'\',
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
            );
            if ($created === false) {
                throw new \RuntimeException('Could not create homepage_porady');
            }
            $defaults = $this->getPoradyDefaults();
            $stmt = $pdo->prepare(
                'INSERT INTO homepage_porady (section_title, button_label, button_url)
                 VALUES (:section_title, :button_label, :button_url)'
            );
            $stmt->execute(array(
                ':section_title' => $defaults['section_title'],
                ':button_label'  => $defaults['button_label'],
                ':button_url'    => $defaults['button_url'],
            ));
        }

        $existsTips = $pdo->query("SHOW TABLES LIKE 'homepage_tips'");
        if (!($existsTips && $existsTips->fetchColumn())) {
            $createdTips = $pdo->exec(
                'CREATE TABLE homepage_tips (
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    title VARCHAR(512) NOT NULL DEFAULT \'\',
                    image_url VARCHAR(512) NOT NULL DEFAULT \'\',
                    image_alt VARCHAR(255) NOT NULL DEFAULT \'\',
                    article_url VARCHAR(512) NOT NULL DEFAULT \'\',
                    tag1_label VARCHAR(128) NOT NULL DEFAULT \'\',
                    tag1_url VARCHAR(512) NOT NULL DEFAULT \'\',
                    tag2_label VARCHAR(128) NOT NULL DEFAULT \'\',
                    tag2_url VARCHAR(512) NOT NULL DEFAULT \'\',
                    sorting INT UNSIGNED NOT NULL DEFAULT 0,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
            );
            if ($createdTips === false) {
                throw new \RuntimeException('Could not create homepage_tips');
            }

            $stmt = $pdo->prepare(
                'INSERT INTO homepage_tips
                 (title, image_url, image_alt, article_url, tag1_label, tag1_url, tag2_label, tag2_url, sorting)
                 VALUES
                 (:title, :image_url, :image_alt, :article_url, :tag1_label, :tag1_url, :tag2_label, :tag2_url, :sorting)'
            );
            foreach ($this->getTipsDefaults() as $i => $row) {
                $stmt->execute(array(
                    ':title'       => $row['title'],
                    ':image_url'   => $row['image_url'],
                    ':image_alt'   => $row['image_alt'],
                    ':article_url' => $row['article_url'],
                    ':tag1_label'  => $row['tag1_label'],
                    ':tag1_url'    => $row['tag1_url'],
                    ':tag2_label'  => $row['tag2_label'],
                    ':tag2_url'    => $row['tag2_url'],
                    ':sorting'     => $i,
                ));
            }
        }

        $this->ensureTipsArticleUrlColumn($pdo);
    }

    private function ensureTipsArticleUrlColumn(\PDO $pdo)
    {
        $col = $pdo->query("SHOW COLUMNS FROM homepage_tips LIKE 'article_url'");
        if ($col && $col->fetchColumn()) {
            return;
        }
        $pdo->exec("ALTER TABLE homepage_tips ADD article_url VARCHAR(512) NOT NULL DEFAULT '' AFTER image_alt");
    }

    private function getPoradyDefaults()
    {
        return array(
            'section_title' => 'Porady',
            'button_label'  => 'Czytaj więcej',
            'button_url'    => '#',
        );
    }

    private function getTipsDefaults()
    {
        return array(
            array(
                'title'       => 'Jakie dachówki wybrać do nowoczesnego projektu domu w stylu nowoczesnej stodoły?',
                'image_url'   => 'https://media.studioatrium.pl/stock/28/2332/67360499e8fdb-projekt-domu-torino-slim-multi.webp',
                'image_alt'   => 'Jakie dachówki wybrać do nowoczesnego projektu domu w stylu nowoczesnej stodoły?',
                'article_url' => '#',
                'tag1_label'  => 'Technologie',
                'tag1_url'    => '#',
                'tag2_label'  => 'Dachy',
                'tag2_url'    => '#',
            ),
            array(
                'title'       => 'Dach na lata - na co zwrócić uwagę wybierając pokrycie dachowe',
                'image_url'   => 'https://media.studioatrium.pl/stock/28/7964/68baea0b1474f-najlepsze-projekty-domow-parterowych.jpg',
                'image_alt'   => 'Dach na lata - na co zwrócić uwagę wybierając pokrycie dachowe',
                'article_url' => '#',
                'tag1_label'  => 'Technologie',
                'tag1_url'    => '#',
                'tag2_label'  => 'Dachy',
                'tag2_url'    => '#',
            ),
            array(
                'title'       => 'Dach na lata - na co zwrócić uwagę wybierając pokrycie dachowe',
                'image_url'   => 'https://media.studioatrium.pl/stock/28/7964/68baea0b1474f-najlepsze-projekty-domow-parterowych.jpg',
                'image_alt'   => 'Dach na lata - na co zwrócić uwagę wybierając pokrycie dachowe',
                'article_url' => '#',
                'tag1_label'  => 'Technologie',
                'tag1_url'    => '#',
                'tag2_label'  => 'Dachy',
                'tag2_url'    => '#',
            ),
            array(
                'title'       => 'Jakie dachówki wybrać do nowoczesnego projektu domu w stylu nowoczesnej stodoły?',
                'image_url'   => 'https://media.studioatrium.pl/stock/28/2332/67360499e8fdb-projekt-domu-torino-slim-multi.webp',
                'image_alt'   => 'Jakie dachówki wybrać do nowoczesnego projektu domu w stylu nowoczesnej stodoły?',
                'article_url' => '#',
                'tag1_label'  => 'Technologie',
                'tag1_url'    => '#',
                'tag2_label'  => 'Dachy',
                'tag2_url'    => '#',
            ),
        );
    }

    private function fetchOffer()
    {
        $defaults = $this->getOfferDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureOfferTable($pdo);
            $stmt = $pdo->query(
                'SELECT * FROM homepage_oferta ORDER BY id ASC LIMIT 1'
            );
            if (!$stmt) {
                return $defaults;
            }
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$row) {
                return $defaults;
            }
            $row['logo1_url'] = $this->resolveHomepageImageUrl(
                isset($row['logo1_url']) ? $row['logo1_url'] : '',
                isset($row['logo1_path']) ? $row['logo1_path'] : ''
            );
            $row['logo2_url'] = $this->resolveHomepageImageUrl(
                isset($row['logo2_url']) ? $row['logo2_url'] : '',
                isset($row['logo2_path']) ? $row['logo2_path'] : ''
            );
            $row['logo3_url'] = $this->resolveHomepageImageUrl(
                isset($row['logo3_url']) ? $row['logo3_url'] : '',
                isset($row['logo3_path']) ? $row['logo3_path'] : ''
            );
            $row['image_url'] = $this->resolveHomepageImageUrl(
                isset($row['image_url']) ? $row['image_url'] : '',
                isset($row['image_path']) ? $row['image_path'] : ''
            );
            return $row;
        } catch (\Throwable $e) {
            return $defaults;
        }
    }

    private function ensureOfferTable(\PDO $pdo)
    {
        $exists = $pdo->query("SHOW TABLES LIKE 'homepage_oferta'");
        if ($exists && $exists->fetchColumn()) {
            $this->ensureOfferImageColumns($pdo);
            $this->dropOfferQuoteBadgeColumn($pdo);
            return;
        }

        $created = $pdo->exec(
            'CREATE TABLE homepage_oferta (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                title VARCHAR(255) NOT NULL DEFAULT \'\',
                lead_text TEXT NOT NULL,
                button_label VARCHAR(128) NOT NULL DEFAULT \'\',
                button_url VARCHAR(512) NOT NULL DEFAULT \'\',
                quote_text TEXT NOT NULL,
                quote_author VARCHAR(255) NOT NULL DEFAULT \'\',
                logo1_url VARCHAR(512) NOT NULL DEFAULT \'\',
                logo1_path VARCHAR(512) NOT NULL DEFAULT \'\',
                logo1_filename VARCHAR(255) NOT NULL DEFAULT \'\',
                logo1_original_name VARCHAR(255) NOT NULL DEFAULT \'\',
                logo1_alt VARCHAR(255) NOT NULL DEFAULT \'\',
                logo2_url VARCHAR(512) NOT NULL DEFAULT \'\',
                logo2_path VARCHAR(512) NOT NULL DEFAULT \'\',
                logo2_filename VARCHAR(255) NOT NULL DEFAULT \'\',
                logo2_original_name VARCHAR(255) NOT NULL DEFAULT \'\',
                logo2_alt VARCHAR(255) NOT NULL DEFAULT \'\',
                logo3_url VARCHAR(512) NOT NULL DEFAULT \'\',
                logo3_path VARCHAR(512) NOT NULL DEFAULT \'\',
                logo3_filename VARCHAR(255) NOT NULL DEFAULT \'\',
                logo3_original_name VARCHAR(255) NOT NULL DEFAULT \'\',
                logo3_alt VARCHAR(255) NOT NULL DEFAULT \'\',
                image_url VARCHAR(512) NOT NULL DEFAULT \'\',
                image_path VARCHAR(512) NOT NULL DEFAULT \'\',
                image_filename VARCHAR(255) NOT NULL DEFAULT \'\',
                image_original_name VARCHAR(255) NOT NULL DEFAULT \'\',
                image_alt VARCHAR(255) NOT NULL DEFAULT \'\',
                image_caption VARCHAR(255) NOT NULL DEFAULT \'\',
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
        if ($created === false) {
            throw new \RuntimeException('Could not create homepage_oferta');
        }

        $defaults = $this->getOfferDefaults();
        $stmt = $pdo->prepare(
            'INSERT INTO homepage_oferta
             (title, lead_text, button_label, button_url, quote_text, quote_author,
              logo1_url, logo1_path, logo1_filename, logo1_original_name, logo1_alt,
              logo2_url, logo2_path, logo2_filename, logo2_original_name, logo2_alt,
              logo3_url, logo3_path, logo3_filename, logo3_original_name, logo3_alt,
              image_url, image_path, image_filename, image_original_name, image_alt, image_caption)
             VALUES
             (:title, :lead_text, :button_label, :button_url, :quote_text, :quote_author,
              :logo1_url, :logo1_path, :logo1_filename, :logo1_original_name, :logo1_alt,
              :logo2_url, :logo2_path, :logo2_filename, :logo2_original_name, :logo2_alt,
              :logo3_url, :logo3_path, :logo3_filename, :logo3_original_name, :logo3_alt,
              :image_url, :image_path, :image_filename, :image_original_name, :image_alt, :image_caption)'
        );
        $stmt->execute(array(
            ':title'                => $defaults['title'],
            ':lead_text'            => $defaults['lead_text'],
            ':button_label'         => $defaults['button_label'],
            ':button_url'           => $defaults['button_url'],
            ':quote_text'           => $defaults['quote_text'],
            ':quote_author'         => $defaults['quote_author'],
            ':logo1_url'            => $defaults['logo1_url'],
            ':logo1_path'           => '',
            ':logo1_filename'       => '',
            ':logo1_original_name'  => '',
            ':logo1_alt'            => $defaults['logo1_alt'],
            ':logo2_url'            => $defaults['logo2_url'],
            ':logo2_path'           => '',
            ':logo2_filename'       => '',
            ':logo2_original_name'  => '',
            ':logo2_alt'            => $defaults['logo2_alt'],
            ':logo3_url'            => $defaults['logo3_url'],
            ':logo3_path'           => '',
            ':logo3_filename'       => '',
            ':logo3_original_name'  => '',
            ':logo3_alt'            => $defaults['logo3_alt'],
            ':image_url'            => $defaults['image_url'],
            ':image_path'           => '',
            ':image_filename'       => '',
            ':image_original_name'  => '',
            ':image_alt'            => $defaults['image_alt'],
            ':image_caption'        => $defaults['image_caption'],
        ));
    }

    private function ensureOfferImageColumns(\PDO $pdo)
    {
        $cols = array(
            'logo1_path'           => "ALTER TABLE homepage_oferta ADD logo1_path VARCHAR(512) NOT NULL DEFAULT '' AFTER logo1_url",
            'logo1_filename'       => "ALTER TABLE homepage_oferta ADD logo1_filename VARCHAR(255) NOT NULL DEFAULT '' AFTER logo1_path",
            'logo1_original_name'  => "ALTER TABLE homepage_oferta ADD logo1_original_name VARCHAR(255) NOT NULL DEFAULT '' AFTER logo1_filename",
            'logo2_path'           => "ALTER TABLE homepage_oferta ADD logo2_path VARCHAR(512) NOT NULL DEFAULT '' AFTER logo2_url",
            'logo2_filename'       => "ALTER TABLE homepage_oferta ADD logo2_filename VARCHAR(255) NOT NULL DEFAULT '' AFTER logo2_path",
            'logo2_original_name'  => "ALTER TABLE homepage_oferta ADD logo2_original_name VARCHAR(255) NOT NULL DEFAULT '' AFTER logo2_filename",
            'logo3_path'           => "ALTER TABLE homepage_oferta ADD logo3_path VARCHAR(512) NOT NULL DEFAULT '' AFTER logo3_url",
            'logo3_filename'       => "ALTER TABLE homepage_oferta ADD logo3_filename VARCHAR(255) NOT NULL DEFAULT '' AFTER logo3_path",
            'logo3_original_name'  => "ALTER TABLE homepage_oferta ADD logo3_original_name VARCHAR(255) NOT NULL DEFAULT '' AFTER logo3_filename",
            'image_path'           => "ALTER TABLE homepage_oferta ADD image_path VARCHAR(512) NOT NULL DEFAULT '' AFTER image_url",
            'image_filename'       => "ALTER TABLE homepage_oferta ADD image_filename VARCHAR(255) NOT NULL DEFAULT '' AFTER image_path",
            'image_original_name'  => "ALTER TABLE homepage_oferta ADD image_original_name VARCHAR(255) NOT NULL DEFAULT '' AFTER image_filename",
        );
        foreach ($cols as $name => $sql) {
            $exists = $pdo->query("SHOW COLUMNS FROM homepage_oferta LIKE " . $pdo->quote($name));
            if ($exists && $exists->fetchColumn()) {
                continue;
            }
            $pdo->exec($sql);
        }
    }

    private function dropOfferQuoteBadgeColumn(\PDO $pdo)
    {
        $exists = $pdo->query("SHOW COLUMNS FROM homepage_oferta LIKE 'quote_badge'");
        if ($exists && $exists->fetchColumn()) {
            $pdo->exec('ALTER TABLE homepage_oferta DROP COLUMN quote_badge');
        }
    }

    private function getOfferDefaults()
    {
        return array(
            'title'         => 'Oferta dla deweloperów',
            'lead_text'     => 'Planujesz budowę inwestycyjną? Szukasz sprawdzonego partnera i bezpiecznych oszczędnościowych projektów domów jednorodzinnych i wielorodzinnych?',
            'button_label'  => 'Sprawdź ofertę',
            'button_url'    => '#',
            'quote_text'    => 'Firma Studio Atrium jest godna zaufania i dalszego polecenia. Zaproponowane rozwiązania architektoniczne i konstrukcyjne sprawdziły się w 100%.',
            'quote_author'  => 'Bogdan Białka',
            'logo1_url'     => '/images/logo-autobialka.png',
            'logo1_alt'     => 'Auto Białka',
            'logo2_url'     => '/images/logo-kl.png',
            'logo2_alt'     => 'KL',
            'logo3_url'     => '/images/logo-drachma.png',
            'logo3_alt'     => 'Drachma',
            'image_url'     => 'https://media.studioatrium.pl/stock/33/3361/6a33d9a2d629c-projekty-domow-na-osiedla.webp',
            'image_alt'     => 'Projekty dla deweloperów',
            'image_caption' => 'Projekty dla deweloperów',
        );
    }

    private function fetchHeroSlides()
    {
        $defaults = $this->getHeroSlidesDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureHeroSliderTable($pdo);
            $stmt = $pdo->query(
                'SELECT title, subtitle, badge, body, image_url, link_url
                 FROM homepage_hero_slides
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

    private function ensureHeroSliderTable(\PDO $pdo)
    {
        $exists = $pdo->query("SHOW TABLES LIKE 'homepage_hero_slides'");
        if ($exists && $exists->fetchColumn()) {
            return;
        }

        $created = $pdo->exec(
            'CREATE TABLE homepage_hero_slides (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                title VARCHAR(255) NOT NULL DEFAULT \'\',
                subtitle VARCHAR(255) NOT NULL DEFAULT \'\',
                badge VARCHAR(128) NOT NULL DEFAULT \'\',
                body TEXT NOT NULL,
                image_url VARCHAR(512) NOT NULL DEFAULT \'\',
                link_url VARCHAR(512) NOT NULL DEFAULT \'\',
                sorting INT UNSIGNED NOT NULL DEFAULT 0,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
        if ($created === false) {
            throw new \RuntimeException('Could not create homepage_hero_slides');
        }

        $stmt = $pdo->prepare(
            'INSERT INTO homepage_hero_slides
             (title, subtitle, badge, body, image_url, link_url, sorting)
             VALUES
             (:title, :subtitle, :badge, :body, :image_url, :link_url, :sorting)'
        );
        foreach ($this->getHeroSlidesDefaults() as $i => $row) {
            $stmt->execute(array(
                ':title'     => $row['title'],
                ':subtitle'  => $row['subtitle'],
                ':badge'     => $row['badge'],
                ':body'      => $row['body'],
                ':image_url' => $row['image_url'],
                ':link_url'  => $row['link_url'],
                ':sorting'   => $i,
            ));
        }
    }

    private function getHeroSlidesDefaults()
    {
        return array(
            array(
                'title'     => 'Projekty domów w promocji',
                'subtitle'  => 'w stylu nowoczesnej stodoły',
                'badge'     => 'PROMOCJE',
                'body'      => "Nowoczesne projekty w stylu stodoły\nw atrakcyjnej cenie",
                'image_url' => 'https://media.studioatrium.pl/stock/28/8476/6a6b351149745-projekty-domow-w-stylu-nowoczesnej-stodoly-w-promocji.webp',
                'link_url'  => 'https://www.studioatrium.pl/projekty-domow/promocje/',
            ),
            array(
                'title'     => 'Dla deweloperów',
                'subtitle'  => 'bliźniaki i budynki wielorodzinne',
                'badge'     => 'DLA DEWELOPERÓW',
                'body'      => "Projekty domów dla deweloperów\ndo realizacji osiedli",
                'image_url' => 'https://media.studioatrium.pl/stock/28/2332/6a4378038869a-projekty-domow-dla-deweloperow.webp',
                'link_url'  => 'https://www.studioatrium.pl/projekty-domow/dla-deweloperow/',
            ),
            array(
                'title'     => 'Szkielety',
                'subtitle'  => 'projekty domów szkieletowych',
                'badge'     => 'SZKIELETOWE',
                'body'      => "Domy w technologii szkieletowej\n– szybka budowa i niskie koszty",
                'image_url' => 'https://media.studioatrium.pl/stock/28/1820/6a350cf5572dc-projekty-domow-szkieletowych.webp',
                'link_url'  => 'https://www.studioatrium.pl/projekty-domow/szkieletowe/',
            ),
            array(
                'title'     => 'Indywidualne projekty domów',
                'subtitle'  => 'szyte na miarę Twojej działki',
                'badge'     => 'PROJEKT INDYWIDUALNY',
                'body'      => "Autorskie projekty na indywidualne\nzapotrzebowanie inwestora",
                'image_url' => 'https://media.studioatrium.pl/stock/28/9500/6a352789a42a1-indywidualne-projekty-domow.webp',
                'link_url'  => 'https://www.studioatrium.pl/projekt-indywidualny.html',
            ),
            array(
                'title'     => 'Najlepsze projekty domów parterowych',
                'subtitle'  => 'sprawdzone i najczęściej wybierane',
                'badge'     => 'PARTEROWE',
                'body'      => "Najlepsze projekty parterowe\ndla całej rodziny",
                'image_url' => 'https://media.studioatrium.pl/stock/28/7964/68baea0b1474f-najlepsze-projekty-domow-parterowych.jpg',
                'link_url'  => 'https://www.studioatrium.pl/projekty-domow/najlepsze-domy-parterowe/',
            ),
        );
    }

    private function fetchSafety()
    {
        $defaults = $this->getSafetyDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureSafetyTables($pdo);
            $stmt = $pdo->query(
                'SELECT title_left, title_bold, title_right, subtitle
                 FROM homepage_bezpieczenstwo
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

    private function fetchSafetyItems()
    {
        $defaults = $this->getSafetyItemsDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureSafetyTables($pdo);
            $stmt = $pdo->query(
                'SELECT item_number, item_text
                 FROM homepage_bezpieczenstwo_items
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

    private function ensureSafetyTables(\PDO $pdo)
    {
        $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_bezpieczenstwo'");
        if (!($existsMeta && $existsMeta->fetchColumn())) {
            $created = $pdo->exec(
                'CREATE TABLE homepage_bezpieczenstwo (
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    title_left VARCHAR(255) NOT NULL DEFAULT \'\',
                    title_bold VARCHAR(255) NOT NULL DEFAULT \'\',
                    title_right VARCHAR(255) NOT NULL DEFAULT \'\',
                    subtitle VARCHAR(512) NOT NULL DEFAULT \'\',
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
            );
            if ($created === false) {
                throw new \RuntimeException('Could not create homepage_bezpieczenstwo');
            }
            $defaults = $this->getSafetyDefaults();
            $stmt = $pdo->prepare(
                'INSERT INTO homepage_bezpieczenstwo (title_left, title_bold, title_right, subtitle)
                 VALUES (:title_left, :title_bold, :title_right, :subtitle)'
            );
            $stmt->execute(array(
                ':title_left'  => $defaults['title_left'],
                ':title_bold'  => $defaults['title_bold'],
                ':title_right' => $defaults['title_right'],
                ':subtitle'    => $defaults['subtitle'],
            ));
        }

        $existsItems = $pdo->query("SHOW TABLES LIKE 'homepage_bezpieczenstwo_items'");
        if ($existsItems && $existsItems->fetchColumn()) {
            return;
        }

        $createdItems = $pdo->exec(
            'CREATE TABLE homepage_bezpieczenstwo_items (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                item_number VARCHAR(8) NOT NULL DEFAULT \'\',
                item_text VARCHAR(512) NOT NULL DEFAULT \'\',
                sorting INT UNSIGNED NOT NULL DEFAULT 0,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
        if ($createdItems === false) {
            throw new \RuntimeException('Could not create homepage_bezpieczenstwo_items');
        }

        $stmt = $pdo->prepare(
            'INSERT INTO homepage_bezpieczenstwo_items (item_number, item_text, sorting)
             VALUES (:item_number, :item_text, :sorting)'
        );
        foreach ($this->getSafetyItemsDefaults() as $i => $row) {
            $stmt->execute(array(
                ':item_number' => $row['item_number'],
                ':item_text'   => $row['item_text'],
                ':sorting'     => $i,
            ));
        }
    }

    private function getSafetyDefaults()
    {
        return array(
            'title_left'  => 'BEZPIECZEŃSTWO I',
            'title_bold'  => '30 LAT',
            'title_right' => 'DOŚWIADCZENIA',
            'subtitle'    => '4 POWODY DLACZEGO WARTO WYBRAĆ NASZ PROJEKT',
        );
    }

    private function getSafetyItemsDefaults()
    {
        return array(
            array('item_number' => '1', 'item_text' => "Bezpłatna pomoc\ni doradztwo przy wyborze"),
            array('item_number' => '2', 'item_text' => "Adaptacja działki\nprzez specjalistów"),
            array('item_number' => '3', 'item_text' => "Zmiany i personalizacja\nprojektu"),
            array('item_number' => '4', 'item_text' => "Wysoka jakość\ndokumentacji"),
        );
    }

    private function fetchCategoriesMeta()
    {
        $defaults = $this->getCategoriesMetaDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureCategoriesTables($pdo);
            $stmt = $pdo->query(
                'SELECT section_title, see_all_label, see_all_url, cta_label, cta_url
                 FROM homepage_categories_meta
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

    private function fetchCategories()
    {
        $defaults = $this->getCategoriesDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureCategoriesTables($pdo);
            $stmt = $pdo->query(
                'SELECT title_line1, title_line2, image_url, image_path, link_url
                 FROM homepage_categories
                 ORDER BY sorting ASC, id ASC
                 LIMIT 14'
            );
            if (!$stmt) {
                return array_slice($defaults, 0, 14);
            }
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            if (empty($rows)) {
                return array_slice($defaults, 0, 14);
            }
            foreach ($rows as $i => $row) {
                $rows[$i]['image_url'] = $this->resolveHomepageImageUrl(
                    isset($row['image_url']) ? $row['image_url'] : '',
                    isset($row['image_path']) ? $row['image_path'] : ''
                );
                unset($rows[$i]['image_path']);
            }
            return array_slice($rows, 0, 14);
        } catch (\Throwable $e) {
            return $defaults;
        }
    }

    private function ensureCategoriesTables(\PDO $pdo)
    {
        $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_categories_meta'");
        if (!($existsMeta && $existsMeta->fetchColumn())) {
            $created = $pdo->exec(
                'CREATE TABLE homepage_categories_meta (
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    section_title VARCHAR(255) NOT NULL DEFAULT \'\',
                    see_all_label VARCHAR(255) NOT NULL DEFAULT \'\',
                    see_all_url VARCHAR(512) NOT NULL DEFAULT \'\',
                    cta_label VARCHAR(255) NOT NULL DEFAULT \'\',
                    cta_url VARCHAR(512) NOT NULL DEFAULT \'\',
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
            );
            if ($created === false) {
                throw new \RuntimeException('Could not create homepage_categories_meta');
            }
            $defaults = $this->getCategoriesMetaDefaults();
            $stmt = $pdo->prepare(
                'INSERT INTO homepage_categories_meta
                 (section_title, see_all_label, see_all_url, cta_label, cta_url)
                 VALUES
                 (:section_title, :see_all_label, :see_all_url, :cta_label, :cta_url)'
            );
            $stmt->execute(array(
                ':section_title' => $defaults['section_title'],
                ':see_all_label' => $defaults['see_all_label'],
                ':see_all_url'   => $defaults['see_all_url'],
                ':cta_label'     => $defaults['cta_label'],
                ':cta_url'       => $defaults['cta_url'],
            ));
        }

        $existsItems = $pdo->query("SHOW TABLES LIKE 'homepage_categories'");
        if (!($existsItems && $existsItems->fetchColumn())) {
            $created = $pdo->exec(
                'CREATE TABLE homepage_categories (
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    title_line1 VARCHAR(255) NOT NULL DEFAULT \'\',
                    title_line2 VARCHAR(255) NOT NULL DEFAULT \'\',
                    image_url VARCHAR(512) NOT NULL DEFAULT \'\',
                    image_path VARCHAR(512) NOT NULL DEFAULT \'\',
                    image_filename VARCHAR(255) NOT NULL DEFAULT \'\',
                    image_original_name VARCHAR(255) NOT NULL DEFAULT \'\',
                    link_url VARCHAR(512) NOT NULL DEFAULT \'\',
                    sorting INT UNSIGNED NOT NULL DEFAULT 0,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
            );
            if ($created === false) {
                throw new \RuntimeException('Could not create homepage_categories');
            }

            $stmt = $pdo->prepare(
                'INSERT INTO homepage_categories
                 (title_line1, title_line2, image_url, image_path, image_filename, image_original_name, link_url, sorting)
                 VALUES
                 (:title_line1, :title_line2, :image_url, :image_path, :image_filename, :image_original_name, :link_url, :sorting)'
            );
            foreach ($this->getCategoriesDefaults() as $i => $row) {
                $stmt->execute(array(
                    ':title_line1'         => $row['title_line1'],
                    ':title_line2'         => $row['title_line2'],
                    ':image_url'           => $row['image_url'],
                    ':image_path'          => '',
                    ':image_filename'      => '',
                    ':image_original_name' => '',
                    ':link_url'            => $row['link_url'],
                    ':sorting'             => $i,
                ));
            }
        }

        $this->ensureCategoriesImageColumns($pdo);
    }

    private function ensureCategoriesImageColumns(\PDO $pdo)
    {
        $cols = array(
            'image_path'          => "ALTER TABLE homepage_categories ADD image_path VARCHAR(512) NOT NULL DEFAULT '' AFTER image_url",
            'image_filename'      => "ALTER TABLE homepage_categories ADD image_filename VARCHAR(255) NOT NULL DEFAULT '' AFTER image_path",
            'image_original_name' => "ALTER TABLE homepage_categories ADD image_original_name VARCHAR(255) NOT NULL DEFAULT '' AFTER image_filename",
        );
        foreach ($cols as $name => $sql) {
            $exists = $pdo->query("SHOW COLUMNS FROM homepage_categories LIKE " . $pdo->quote($name));
            if ($exists && $exists->fetchColumn()) {
                continue;
            }
            $pdo->exec($sql);
        }
    }

    private function getCategoriesMetaDefaults()
    {
        return array(
            'section_title' => 'Nasze kategorie',
            'see_all_label' => 'Zobacz wszystkie kategorie',
            'see_all_url'   => '/projekty',
            'cta_label'     => 'Znajdź dom dla siebie',
            'cta_url'       => '/projekty',
        );
    }

    private function getCategoriesDefaults()
    {
        return array(
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'parterowe',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/545/69bbedfaec9a3-projekty-domow-parterowych.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'z poddaszem',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/2081/6735f65e70002-projekty-domow-z-poddaszem.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'piętrowe',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/2593/6735fa63a53c6-projekty-domow-pietrowych.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'nowoczesne',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/4385/673cad3ec1a17-projekty-domow-nowoczesnych.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'na wąską działkę',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/2849/6735f85ae5778-projekty-domow-na-waska-dzialke.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'szkieletowe',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/5409/69bbc6ce5167a-projekty-szkieletowe.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'tanie w budowie',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/3105/69bbd61f93bdc-projekty-domow-tanich-w-budowie.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'nowości',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/289/69bbd8ee83418-nowosci-projektowe.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'bliźniaki',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/8993/67d42fae1a2b4-projekty-domow-blizniaczych.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'w stylu stodoły',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/5921/6735fa0f0a3b8-projekty-domow-w-stylu-stodoly.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'na skarpę',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/9761/69bbd0ad18917-projekty-domow-na-skarpe.webp',
                'link_url'    => '/projekty',
            ),
            array(
                'title_line1' => 'Projekty domów',
                'title_line2' => 'z wnętrzami',
                'image_url'   => 'https://media.studioatrium.pl/stock/33/3873/6735fc416679b-projekty-domow-wizualizacja-wnetrz.webp',
                'link_url'    => '/projekty',
            ),
        );
    }

    private function fetchBestsellersMeta()
    {
        $defaults = $this->getBestsellersMetaDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureBestsellersTables($pdo);
            $stmt = $pdo->query(
                'SELECT section_title
                 FROM homepage_bestsellers_meta
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

    private function fetchBestsellers()
    {
        try {
            $pdo = \Point7_WebApp::getPDO();
            $this->ensureBestsellersTables($pdo);
            $stmt = $pdo->query(
                'SELECT project_id, tag
                 FROM homepage_bestsellers
                 ORDER BY sorting ASC, id ASC
                 LIMIT 8'
            );
            $rows = ($stmt) ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : array();
            if (empty($rows)) {
                $rows = $this->getBestsellersDefaults();
            }
            return $this->buildBestsellerCards($pdo, $rows);
        } catch (\Throwable $e) {
            return array();
        }
    }

    private function ensureBestsellersTables(\PDO $pdo)
    {
        $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_bestsellers_meta'");
        if (!($existsMeta && $existsMeta->fetchColumn())) {
            $created = $pdo->exec(
                'CREATE TABLE homepage_bestsellers_meta (
                    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    section_title VARCHAR(255) NOT NULL DEFAULT \'\',
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
            );
            if ($created === false) {
                throw new \RuntimeException('Could not create homepage_bestsellers_meta');
            }
            $defaults = $this->getBestsellersMetaDefaults();
            $stmt = $pdo->prepare(
                'INSERT INTO homepage_bestsellers_meta (section_title) VALUES (:section_title)'
            );
            $stmt->execute(array(':section_title' => $defaults['section_title']));
        }

        $existsItems = $pdo->query("SHOW TABLES LIKE 'homepage_bestsellers'");
        if ($existsItems && $existsItems->fetchColumn()) {
            $count = (int) $pdo->query('SELECT COUNT(*) FROM homepage_bestsellers')->fetchColumn();
            if ($count > 0) {
                return;
            }
            $this->seedBestsellersDefaults($pdo);
            return;
        }

        $created = $pdo->exec(
            'CREATE TABLE homepage_bestsellers (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                project_id INT UNSIGNED NOT NULL DEFAULT 0,
                tag VARCHAR(64) NOT NULL DEFAULT \'\',
                sorting INT UNSIGNED NOT NULL DEFAULT 0,
                PRIMARY KEY (id),
                KEY idx_project_id (project_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
        );
        if ($created === false) {
            throw new \RuntimeException('Could not create homepage_bestsellers');
        }
        $this->seedBestsellersDefaults($pdo);
    }

    private function seedBestsellersDefaults(\PDO $pdo)
    {
        $defaults = $this->getBestsellersDefaults();
        $ids = array();
        foreach ($defaults as $row) {
            $ids[] = (int) $row['project_id'];
        }
        $existing = array();
        if (!empty($ids)) {
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $stmt = $pdo->prepare("SELECT id FROM project WHERE id IN ($placeholders) AND status = 'published'");
            $stmt->execute($ids);
            foreach ($stmt->fetchAll(\PDO::FETCH_COLUMN) as $id) {
                $existing[(int) $id] = true;
            }
        }

        $toInsert = array();
        foreach ($defaults as $row) {
            $pid = (int) $row['project_id'];
            if (isset($existing[$pid])) {
                $toInsert[] = $row;
            }
        }

        if (empty($toInsert)) {
            $fallback = $pdo->query(
                "SELECT id FROM project WHERE status = 'published' ORDER BY id DESC LIMIT 8"
            );
            if ($fallback) {
                $sort = 0;
                foreach ($fallback->fetchAll(\PDO::FETCH_COLUMN) as $id) {
                    $toInsert[] = array(
                        'project_id' => (int) $id,
                        'tag'        => '',
                        'sorting'    => $sort++,
                    );
                }
            }
        }

        if (empty($toInsert)) {
            return;
        }

        $stmt = $pdo->prepare(
            'INSERT INTO homepage_bestsellers (project_id, tag, sorting)
             VALUES (:project_id, :tag, :sorting)'
        );
        foreach ($toInsert as $i => $row) {
            $stmt->execute(array(
                ':project_id' => (int) $row['project_id'],
                ':tag'        => isset($row['tag']) ? $row['tag'] : '',
                ':sorting'    => isset($row['sorting']) ? (int) $row['sorting'] : $i,
            ));
        }
    }

    private function buildBestsellerCards(\PDO $pdo, array $rows)
    {
        $ids = array();
        foreach ($rows as $row) {
            $pid = (int) $row['project_id'];
            if ($pid > 0) {
                $ids[] = $pid;
            }
        }
        if (empty($ids)) {
            return array();
        }

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $pdo->prepare(
            "SELECT id, name, type, price, discount, params_general, extra_data
             FROM project
             WHERE id IN ($placeholders) AND status = 'published'"
        );
        $stmt->execute($ids);
        $byId = array();
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $project) {
            $byId[(int) $project['id']] = $project;
        }

        $extras = array();
        $paramStmt = $pdo->prepare(
            "SELECT project_id, project_param_id, num_value
             FROM project_to_param
             WHERE project_id IN ($placeholders) AND project_param_id IN (45, 46, 78)"
        );
        $paramStmt->execute($ids);
        foreach ($paramStmt->fetchAll(\PDO::FETCH_ASSOC) as $param) {
            $pid = (int) $param['project_id'];
            $paramId = (int) $param['project_param_id'];
            if (!isset($extras[$pid])) {
                $extras[$pid] = array('baths' => 0, 'garage' => 0);
            }
            if ($paramId === 45 || $paramId === 46) {
                $extras[$pid]['baths'] += (int) round((float) $param['num_value']);
            } elseif ($paramId === 78) {
                $extras[$pid]['garage'] = (int) round((float) $param['num_value']);
            }
        }

        $urlGen = $this->urlGenerator ?? new UrlGenerator();
        $cards = array();
        foreach ($rows as $row) {
            $pid = (int) $row['project_id'];
            if (!isset($byId[$pid])) {
                continue;
            }
            $project = $byId[$pid];
            $params = array();
            if (!empty($project['params_general'])) {
                $decoded = json_decode($project['params_general'], true);
                if (is_array($decoded)) {
                    $params = $decoded;
                }
            }
            $extraData = array();
            if (!empty($project['extra_data'])) {
                $decodedExtra = json_decode($project['extra_data'], true);
                if (is_array($decodedExtra)) {
                    $extraData = $decodedExtra;
                }
            }

            $areaRaw = isset($params['1']['value']) ? $params['1']['value'] : '';
            $rooms   = isset($params['68']['value']) ? $params['68']['value'] : '';
            $area    = $areaRaw !== '' ? str_replace('.', ',', (string) $areaRaw) . ' m2' : '';

            $price = (float) $project['price'];
            $discount = (float) $project['discount'];
            $priceCurrent = $discount > 0 ? ($price - $discount) : $price;
            $priceOld = $discount > 0 ? $price : null;

            $tag = isset($row['tag']) ? trim((string) $row['tag']) : '';
            $type = $project['type'];
            $action = 'item';
            if ($type === 'garage') {
                $action = 'garage';
            } elseif (!in_array($type, array('house', 'skeleton'), true)) {
                $action = 'other';
            }

            $urlParams = array(
                'module'     => 'project',
                'action'     => $action,
                'id'         => $pid,
                'link_title' => $project['name'],
            );
            if ($action === 'other') {
                $urlParams['category'] = $type;
            }

            $imageUrl = '';
            if (!empty($extraData['thumbnail'])) {
                $imageUrl = 'https://media.studioatrium.pl/project/' . str_replace('-200-', '-640-', $extraData['thumbnail']);
            } else {
                $imageUrl = 'https://media.studioatrium.pl/project/' . $pid . '/render-box.jpg';
            }

            $cards[] = array(
                'id'         => $pid,
                'name'       => $project['name'],
                'url'        => $urlGen->generateUrl($urlParams),
                'image_url'  => $imageUrl,
                'tag'        => $tag,
                'type_label' => $this->projectTypeLabel($params, $type),
                'area'       => $area,
                'rooms'      => $rooms,
                'baths'      => isset($extras[$pid]) ? $extras[$pid]['baths'] : 0,
                'garage'     => isset($extras[$pid]) ? $extras[$pid]['garage'] : 0,
                'price'      => (int) round($priceCurrent),
                'price_old'  => $priceOld !== null ? (int) round($priceOld) : null,
            );
        }

        return $cards;
    }

    private function projectTypeLabel(array $params, $type)
    {
        if ($type === 'garage') {
            return 'GARAŻ';
        }
        if ($type === 'skeleton') {
            $prefix = 'DOM SZKIELETOWY';
        } else {
            $prefix = 'DOM';
        }

        $hasFloor = !empty($params['18']['value']);
        $hasLoft  = !empty($params['17']['value']);
        if ($hasFloor) {
            return $prefix . ' PIĘTROWY';
        }
        if ($hasLoft) {
            return $prefix . ' Z PODDASZEM';
        }
        return $prefix . ' PARTEROWY';
    }

    private function getBestsellersMetaDefaults()
    {
        return array(
            'section_title' => 'Nasze bestsellery',
        );
    }

    private function getBestsellersDefaults()
    {
        return array(
            array('project_id' => 1759, 'tag' => 'NOWOŚĆ', 'sorting' => 0),
            array('project_id' => 1766, 'tag' => 'NOWOŚĆ', 'sorting' => 1),
            array('project_id' => 1799, 'tag' => 'NOWOŚĆ', 'sorting' => 2),
            array('project_id' => 1776, 'tag' => '-355 RABATU', 'sorting' => 3),
            array('project_id' => 1789, 'tag' => '-355 RABATU', 'sorting' => 4),
            array('project_id' => 1796, 'tag' => 'NOWOŚĆ', 'sorting' => 5),
            array('project_id' => 1793, 'tag' => 'NOWOŚĆ', 'sorting' => 6),
            array('project_id' => 1794, 'tag' => 'NOWOŚĆ', 'sorting' => 7),
        );
    }

    private function fetchProductsSections()
    {
        $sectionDefaults = array(
            'bestsellers'  => array('section_key' => 'bestsellers', 'section_title' => 'Nasze bestsellery', 'section_subtitle' => 'Jeśli wybudowałeś dom według naszego projektu weź udział w FOTOKONKURSIE z nagrodami'),
            'promotions'   => array('section_key' => 'promotions', 'section_title' => 'Promocje na projekty', 'section_subtitle' => 'Jeśli wybudowałeś dom według naszego projektu weź udział w FOTOKONKURSIE z nagrodami'),
            'most_popular' => array('section_key' => 'most_popular', 'section_title' => 'Najczęściej kupowane', 'section_subtitle' => 'Jeśli wybudowałeś dom według naszego projektu weź udział w FOTOKONKURSIE z nagrodami'),
        );
        $productDefaults = array(
            'bestsellers'  => array(array('project_id' => 1759), array('project_id' => 585), array('project_id' => 1514)),
            'promotions'   => array(array('project_id' => 1759), array('project_id' => 585), array('project_id' => 1514)),
            'most_popular' => array(array('project_id' => 1759), array('project_id' => 585), array('project_id' => 1514)),
        );

        try {
            $pdo = \Point7_WebApp::getPDO();
            $existsSections = $pdo->query("SHOW TABLES LIKE 'homepage_products_sections'");
            $existsItems = $pdo->query("SHOW TABLES LIKE 'homepage_products'");
            if (!($existsSections && $existsSections->fetchColumn() && $existsItems && $existsItems->fetchColumn())) {
                throw new \RuntimeException('products tables missing');
            }

            $metaStmt = $pdo->query(
                'SELECT section_key, section_title, section_subtitle
                 FROM homepage_products_sections
                 ORDER BY FIELD(section_key, \'bestsellers\', \'promotions\', \'most_popular\'), id ASC'
            );
            $metaRows = ($metaStmt) ? $metaStmt->fetchAll(\PDO::FETCH_ASSOC) : array();
            $metaByKey = array();
            foreach ($metaRows as $row) {
                $metaByKey[$row['section_key']] = $row;
            }

            $itemStmt = $pdo->query(
                'SELECT section_key, project_id, sorting
                 FROM homepage_products
                 ORDER BY section_key ASC, sorting ASC, id ASC'
            );
            $itemRows = ($itemStmt) ? $itemStmt->fetchAll(\PDO::FETCH_ASSOC) : array();
            $itemsByKey = array();
            foreach ($itemRows as $row) {
                $key = $row['section_key'];
                if (!isset($itemsByKey[$key])) {
                    $itemsByKey[$key] = array();
                }
                $itemsByKey[$key][] = array(
                    'project_id' => (int) $row['project_id'],
                    'sorting'    => (int) $row['sorting'],
                );
            }

            $sections = array();
            foreach (array('bestsellers', 'promotions', 'most_popular') as $key) {
                $meta = isset($metaByKey[$key]) ? $metaByKey[$key] : $sectionDefaults[$key];
                $items = !empty($itemsByKey[$key]) ? $itemsByKey[$key] : $productDefaults[$key];
                $cards = $this->buildProductCards($pdo, $items);
                $sections[] = array(
                    'section_key'      => $key,
                    'section_title'    => $meta['section_title'],
                    'section_subtitle' => $meta['section_subtitle'],
                    'items'            => $cards,
                );
            }
            return $sections;
        } catch (\Throwable $e) {
            try {
                $pdo = \Point7_WebApp::getPDO();
                $sections = array();
                foreach (array('bestsellers', 'promotions', 'most_popular') as $key) {
                    $sections[] = array(
                        'section_key'      => $key,
                        'section_title'    => $sectionDefaults[$key]['section_title'],
                        'section_subtitle' => $sectionDefaults[$key]['section_subtitle'],
                        'items'            => $this->buildProductCards($pdo, $productDefaults[$key]),
                    );
                }
                return $sections;
            } catch (\Throwable $inner) {
                $sections = array();
                foreach (array('bestsellers', 'promotions', 'most_popular') as $key) {
                    $sections[] = array(
                        'section_key'      => $key,
                        'section_title'    => $sectionDefaults[$key]['section_title'],
                        'section_subtitle' => $sectionDefaults[$key]['section_subtitle'],
                        'items'            => array(),
                    );
                }
                return $sections;
            }
        }
    }

    private function buildProductCards(\PDO $pdo, array $rows)
    {
        $cardRows = array();
        foreach ($rows as $row) {
            $cardRows[] = array(
                'project_id' => (int) $row['project_id'],
                'tag'        => '',
            );
        }
        $cards = $this->buildBestsellerCards($pdo, $cardRows);
        foreach ($cards as $i => $card) {
            $areaRaw = isset($cards[$i]['area']) ? str_replace(' m2', '', $cards[$i]['area']) : '';
            $cards[$i]['area_display'] = $areaRaw !== '' ? $areaRaw . ' m²' : '';
            $cards[$i]['type_display'] = $this->productTypeDisplayLabelFromCard($card);
            $cards[$i]['link_title'] = isset($card['name']) ? $card['name'] : '';
            $cards[$i]['name_upper'] = isset($card['name']) ? mb_strtoupper((string) $card['name'], 'UTF-8') : '';
        }
        return $cards;
    }

    private function productTypeDisplayLabelFromCard(array $card)
    {
        $typeLabel = isset($card['type_label']) ? strtoupper((string) $card['type_label']) : '';
        if ($typeLabel === 'GARAŻ') {
            return 'Projekt garażu';
        }
        if (strpos($typeLabel, 'PIĘTROW') !== false) {
            return 'Projekt domu piętrowego';
        }
        if (strpos($typeLabel, 'PODDASZ') !== false) {
            return 'Projekt domu z poddaszem';
        }
        if (strpos($typeLabel, 'PARTER') !== false) {
            return 'Projekt domu parterowego';
        }
        if (strpos($typeLabel, 'SZKIELET') !== false) {
            return 'Projekt domu szkieletowego';
        }
        return 'Projekt domu';
    }

    private function fetchPartners()
    {
        $metaDefaults = array('section_title' => 'Partnerzy których polecamy');
        $itemDefaults = array(
            array('name' => 'Aluprof', 'logo_url' => 'https://media.studioatrium.pl/document/1309/samll-logo.png', 'link_url' => 'https://aluprof.eu', 'link_title' => 'Aluprof — systemy aluminiowe', 'link_rel' => 'noopener noreferrer'),
            array('name' => 'Termo Organika', 'logo_url' => 'https://media.studioatrium.pl/document/1215/small-logo.png', 'link_url' => 'https://www.termoorganika.pl', 'link_title' => 'Termo Organika — ocieplenia', 'link_rel' => 'noopener noreferrer'),
            array('name' => 'Fakro', 'logo_url' => 'https://media.studioatrium.pl/document/1179/fakro.jpg', 'link_url' => 'https://www.fakro.pl', 'link_title' => 'Fakro — okna dachowe', 'link_rel' => 'noopener noreferrer'),
        );
        try {
            $pdo = \Point7_WebApp::getPDO();
            $meta = $metaDefaults;
            $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_partners_meta'");
            if ($existsMeta && $existsMeta->fetchColumn()) {
                $stmt = $pdo->query('SELECT section_title FROM homepage_partners_meta ORDER BY id ASC LIMIT 1');
                if ($stmt) {
                    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if ($row) {
                        $meta = $row;
                    }
                }
            }

            $partners = $itemDefaults;
            $existsItems = $pdo->query("SHOW TABLES LIKE 'homepage_partners'");
            if ($existsItems && $existsItems->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT name, logo_url, logo_path, link_url, link_title, link_rel
                     FROM homepage_partners
                     ORDER BY sorting ASC, id ASC'
                );
                if ($stmt) {
                    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    if (!empty($rows)) {
                        $partners = $rows;
                    }
                }
            }

            foreach ($partners as $i => $partner) {
                $partners[$i]['logo_url'] = $this->resolveHomepageImageUrl(
                    isset($partner['logo_url']) ? $partner['logo_url'] : '',
                    isset($partner['logo_path']) ? $partner['logo_path'] : ''
                );
            }

            $marquee = array();
            for ($i = 0; $i < 4; $i++) {
                foreach ($partners as $partner) {
                    $marquee[] = $partner;
                }
            }

            return array(
                'meta'    => $meta,
                'items'   => $partners,
                'marquee' => $marquee,
            );
        } catch (\Throwable $e) {
            $marquee = array();
            for ($i = 0; $i < 4; $i++) {
                foreach ($itemDefaults as $partner) {
                    $marquee[] = $partner;
                }
            }
            return array(
                'meta'    => $metaDefaults,
                'items'   => $itemDefaults,
                'marquee' => $marquee,
            );
        }
    }

    private function getPopularCategoriesMetaDefaults()
    {
        return array('section_title' => 'Popularne kategorie');
    }

    private function getPopularCategoriesDefaults()
    {
        return array(
            array('label' => 'PROMOCJE', 'image_url' => 'https://media.studioatrium.pl/project/1477/realisation/budowa-62bbfdd0beec3.jpg', 'image_alt' => 'PROMOCJE', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/promocje/', 'link_title' => 'Promocje na projekty domów', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'NOWOŚCI', 'image_url' => 'https://media.studioatrium.pl/project/1258/realisation/budowa-5bfce6a922dac.jpg', 'image_alt' => 'NOWOŚCI', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/nowosc/', 'link_title' => 'Nowe projekty domów', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'NAJLEPSZE PROJEKTY', 'image_url' => 'https://media.studioatrium.pl/project/824/realisation/budowa-5e184f28bc334.jpg', 'image_alt' => 'NAJLEPSZE PROJEKTY', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/najlepsze/', 'link_title' => 'Najlepsze projekty domów', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'MAŁE PARTEROWE', 'image_url' => 'https://media.studioatrium.pl/project/920/realisation/budowa-65e03fcb50155.jpg', 'image_alt' => 'MAŁE PARTEROWE', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/parterowe-male/', 'link_title' => 'Małe domy parterowe', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'MAŁE', 'image_url' => 'https://media.studioatrium.pl/project/948/realisation/budowa-5d69012a46fbe.jpg', 'image_alt' => 'MAŁE', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/male/', 'link_title' => 'Małe projekty domów', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'W STYLU STODOŁY', 'image_url' => 'https://media.studioatrium.pl/project/1477/realisation/budowa-62bbfdd0beec3.jpg', 'image_alt' => 'W STYLU STODOŁY', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/stodola/', 'link_title' => 'Projekty domów w stylu stodoły', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'REGIONALNE', 'image_url' => 'https://media.studioatrium.pl/project/824/realisation/budowa-5e184f28bc334.jpg', 'image_alt' => 'REGIONALNE', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/regionalne/', 'link_title' => 'Regionalne projekty domów', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'Z WJAZDEM OD POŁUDNIA', 'image_url' => 'https://media.studioatrium.pl/project/920/realisation/budowa-65e03fd2c3740.jpg', 'image_alt' => 'Z WJAZDEM OD POŁUDNIA', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/wjazd-od-poludnia/', 'link_title' => 'Projekty domów z wjazdem od południa', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'BLIŹNIACZE', 'image_url' => 'https://media.studioatrium.pl/project/1258/realisation/budowa-5bfce6a922dac.jpg', 'image_alt' => 'BLIŹNIACZE', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/blizniacze/', 'link_title' => 'Projekty domów bliźniaczych', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'Z PŁASKIM DACHEM', 'image_url' => 'https://media.studioatrium.pl/project/1477/realisation/budowa-62bbfdd0beec3.jpg', 'image_alt' => 'Z PŁASKIM DACHEM', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/plaski-dach/', 'link_title' => 'Projekty domów z płaskim dachem', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'Z ANTRESOLĄ', 'image_url' => 'https://media.studioatrium.pl/project/948/realisation/budowa-5d69012a46fbe.jpg', 'image_alt' => 'Z ANTRESOLĄ', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/z-antresola/', 'link_title' => 'Projekty domów z antresolą', 'link_rel' => 'noopener noreferrer'),
            array('label' => 'REZYDENCJE', 'image_url' => 'https://media.studioatrium.pl/project/824/realisation/budowa-5e184f28bc334.jpg', 'image_alt' => 'REZYDENCJE', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/rezydencje/', 'link_title' => 'Projekty rezydencji', 'link_rel' => 'noopener noreferrer'),
        );
    }

    private function getPopularFamilyHomesMetaDefaults()
    {
        return array('section_title' => 'Popularne domy rodzinne');
    }

    private function getPopularFamilyHomesDefaults()
    {
        return array(
            array('project_id' => 920, 'label' => 'DLA RODZINY 2 + 1', 'image_url' => 'https://media.studioatrium.pl/project/920/realisation/budowa-65e03fcb50155.jpg', 'image_alt' => 'DLA RODZINY 2 + 1', 'link_url' => 'https://www.studioatrium.pl/wynik-wyszukiwania/?pok_par=2', 'link_title' => 'Projekty domów dla rodziny 2+1', 'link_rel' => 'noopener noreferrer'),
            array('project_id' => 948, 'label' => 'DLA RODZINY 2 + 2', 'image_url' => 'https://media.studioatrium.pl/project/948/realisation/budowa-5d69012a46fbe.jpg', 'image_alt' => 'DLA RODZINY 2 + 2', 'link_url' => 'https://www.studioatrium.pl/wynik-wyszukiwania/?pok_par=3', 'link_title' => 'Projekty domów dla rodziny 2+2', 'link_rel' => 'noopener noreferrer'),
            array('project_id' => 824, 'label' => 'DLA RODZINY 2 + 3', 'image_url' => 'https://media.studioatrium.pl/project/824/realisation/budowa-5e184f28bc334.jpg', 'image_alt' => 'DLA RODZINY 2 + 3', 'link_url' => 'https://www.studioatrium.pl/wynik-wyszukiwania/?pok_par=4', 'link_title' => 'Projekty domów dla rodziny 2+3', 'link_rel' => 'noopener noreferrer'),
            array('project_id' => 1258, 'label' => 'DWULOKALOWE', 'image_url' => 'https://media.studioatrium.pl/project/1258/realisation/budowa-5bfce6a922dac.jpg', 'image_alt' => 'DWULOKALOWE', 'link_url' => 'https://www.studioatrium.pl/projekty-domow/dwulokalowe/', 'link_title' => 'Projekty domów dwulokalowych', 'link_rel' => 'noopener noreferrer'),
        );
    }

    private function getInteriorPlansMetaDefaults()
    {
        return array('section_title' => 'Projekty domów z aranżacją wnętrz');
    }

    private function getInteriorPlansDefaults()
    {
        return array(
            array('project_id' => 1759, 'tag' => ''),
            array('project_id' => 1766, 'tag' => ''),
            array('project_id' => 1799, 'tag' => ''),
            array('project_id' => 1776, 'tag' => ''),
            array('project_id' => 1789, 'tag' => ''),
            array('project_id' => 1796, 'tag' => ''),
            array('project_id' => 1793, 'tag' => ''),
            array('project_id' => 1794, 'tag' => ''),
        );
    }

    private function fetchPopularCategories()
    {
        $metaDefaults = $this->getPopularCategoriesMetaDefaults();
        $itemDefaults = $this->getPopularCategoriesDefaults();
        try {
            $pdo = \Point7_WebApp::getRegistryObject('dbconnection::pdo1');
            if (!$pdo && method_exists('\Point7_WebApp', 'getPDO')) {
                $pdo = \Point7_WebApp::getPDO();
            }
            if (!$pdo) {
                return array('meta' => $metaDefaults, 'items' => $itemDefaults);
            }
            $meta = $metaDefaults;
            $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_popular_categories_meta'");
            if ($existsMeta && $existsMeta->fetchColumn()) {
                $stmt = $pdo->query('SELECT section_title FROM homepage_popular_categories_meta ORDER BY id ASC LIMIT 1');
                if ($stmt) {
                    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if ($row) {
                        $meta = $row;
                    }
                }
            }

            $items = $itemDefaults;
            $existsItems = $pdo->query("SHOW TABLES LIKE 'homepage_popular_categories'");
            if ($existsItems && $existsItems->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT * FROM homepage_popular_categories ORDER BY sorting ASC, id ASC'
                );
                if ($stmt) {
                    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    $filtered = array();
                    if (is_array($rows)) {
                        foreach ($rows as $row) {
                            $label = isset($row['label']) ? trim($row['label']) : '';
                            $imageUrl = isset($row['image_url']) ? trim($row['image_url']) : '';
                            $imagePath = isset($row['image_path']) ? trim($row['image_path']) : '';
                            $linkUrl = isset($row['link_url']) ? trim($row['link_url']) : '';
                            if ($label === '' && $imageUrl === '' && $imagePath === '' && $linkUrl === '') {
                                continue;
                            }
                            $filtered[] = $row;
                        }
                    }
                    if (!empty($filtered)) {
                        $items = $filtered;
                    }
                }
            }

            foreach ($items as $i => $item) {
                $items[$i]['image_url'] = $this->resolveHomepageImageUrl(
                    isset($item['image_url']) ? $item['image_url'] : '',
                    isset($item['image_path']) ? $item['image_path'] : ''
                );
                if (!isset($items[$i]['link_title']) || $items[$i]['link_title'] === '') {
                    $items[$i]['link_title'] = isset($item['label']) ? $item['label'] : '';
                }
                if (!isset($items[$i]['image_alt']) || $items[$i]['image_alt'] === '') {
                    $items[$i]['image_alt'] = isset($item['label']) ? $item['label'] : '';
                }
                if (!isset($items[$i]['link_rel']) || $items[$i]['link_rel'] === '') {
                    $items[$i]['link_rel'] = 'noopener noreferrer';
                }
            }

            return array(
                'meta'  => $meta,
                'items' => $items,
            );
        } catch (\Exception $e) {
            return array(
                'meta'  => $metaDefaults,
                'items' => $itemDefaults,
            );
        }
    }

    public function getPopularCategoriesHomepage()
    {
        return $this->fetchPopularCategories();
    }

    private function fetchProjectThumbnailUrl(\PDO $pdo, $projectId)
    {
        $projectId = (int) $projectId;
        if ($projectId <= 0) {
            return '';
        }
        $stmt = $pdo->prepare(
            "SELECT extra_data FROM project WHERE id = ? AND status = 'published' LIMIT 1"
        );
        $stmt->execute(array($projectId));
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) {
            return '';
        }
        $extraData = array();
        if (!empty($row['extra_data'])) {
            $decoded = json_decode($row['extra_data'], true);
            if (is_array($decoded)) {
                $extraData = $decoded;
            }
        }
        if (!empty($extraData['thumbnail'])) {
            return 'https://media.studioatrium.pl/project/' . str_replace('-200-', '-640-', $extraData['thumbnail']);
        }
        return 'https://media.studioatrium.pl/project/' . $projectId . '/render-box.jpg';
    }

    private function fetchPopularFamilyHomes()
    {
        $metaDefaults = $this->getPopularFamilyHomesMetaDefaults();
        $itemDefaults = $this->getPopularFamilyHomesDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $meta = $metaDefaults;
            $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_popular_family_homes_meta'");
            if ($existsMeta && $existsMeta->fetchColumn()) {
                $stmt = $pdo->query('SELECT section_title FROM homepage_popular_family_homes_meta ORDER BY id ASC LIMIT 1');
                if ($stmt) {
                    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if ($row) {
                        $meta = $row;
                    }
                }
            }

            $items = $itemDefaults;
            $existsItems = $pdo->query("SHOW TABLES LIKE 'homepage_popular_family_homes'");
            if ($existsItems && $existsItems->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT project_id, label, image_url, image_path, image_alt, link_url, link_title, link_rel
                     FROM homepage_popular_family_homes
                     ORDER BY sorting ASC, id ASC'
                );
                if ($stmt) {
                    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    if (!empty($rows)) {
                        $items = $rows;
                    }
                }
            }

            foreach ($items as $i => $item) {
                $items[$i]['image_url'] = $this->resolveHomepageImageUrl(
                    isset($item['image_url']) ? $item['image_url'] : '',
                    isset($item['image_path']) ? $item['image_path'] : ''
                );
                if ($items[$i]['image_url'] === '' && (int) $item['project_id'] > 0) {
                    $items[$i]['image_url'] = $this->fetchProjectThumbnailUrl($pdo, $item['project_id']);
                }
                if (!isset($items[$i]['link_title']) || $items[$i]['link_title'] === '') {
                    $items[$i]['link_title'] = $item['label'];
                }
                if (!isset($items[$i]['image_alt']) || $items[$i]['image_alt'] === '') {
                    $items[$i]['image_alt'] = $item['label'];
                }
            }

            return array(
                'meta'  => $meta,
                'items' => $items,
            );
        } catch (\Throwable $e) {
            return array(
                'meta'  => $metaDefaults,
                'items' => $itemDefaults,
            );
        }
    }

    private function fetchInteriorPlans()
    {
        $metaDefaults = $this->getInteriorPlansMetaDefaults();
        $itemDefaults = $this->getInteriorPlansDefaults();
        try {
            $pdo = \Point7_WebApp::getPDO();
            $meta = $metaDefaults;
            $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_interior_plans_meta'");
            if ($existsMeta && $existsMeta->fetchColumn()) {
                $stmt = $pdo->query('SELECT section_title FROM homepage_interior_plans_meta ORDER BY id ASC LIMIT 1');
                if ($stmt) {
                    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if ($row) {
                        $meta = $row;
                    }
                }
            }

            $rows = $itemDefaults;
            $existsItems = $pdo->query("SHOW TABLES LIKE 'homepage_interior_plans'");
            if ($existsItems && $existsItems->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT project_id, tag
                     FROM homepage_interior_plans
                     ORDER BY sorting ASC, id ASC
                     LIMIT 12'
                );
                if ($stmt) {
                    $dbRows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    if (!empty($dbRows)) {
                        $rows = $dbRows;
                    }
                }
            }

            $items = $this->buildBestsellerCards($pdo, $rows);

            return array(
                'meta'  => $meta,
                'items' => $items,
            );
        } catch (\Throwable $e) {
            return array(
                'meta'  => $metaDefaults,
                'items' => array(),
            );
        }
    }

    private function fetchNewsletter()
    {
        $metaDefaults = array(
            'contest_title'       => 'Konkurs fotograficzny',
            'contest_body'        => "Wybudowałeś dom z naszego projektu?\nWyślij zdjęcie domu jaki zbudowałeś i wygraj cenne nagrody!",
            'signup_title'        => "Zarejestruj się w naszym serwisie.\nNie przegap informacji o nowościach\ni promocjach.",
            'signup_body1'        => 'Zarejestruj się i korzystaj z dogodnych narzędzi wszędzie gdzie jesteś. Będziemy także zawiadamiać Cię o rabatach i promocjach.',
            'signup_body2'        => 'Twoje konto to swoboda korzystania z narzędzi gdziekolwiek jesteś.',
            'signup_button_label' => 'Zarejestruj się',
            'reward_line1'        => 'Odbierz',
            'reward_amount'       => '100 zł',
            'reward_line2'        => "na zakup\nprojektu domu",
        );
        $photoDefaults = array(
            array('image_url' => 'https://media.studioatrium.pl/stock/33/3105/69bbd5e2ca26a-projekty-domow-tanich-w-budowie.webp', 'image_alt' => 'Projekty domów tanich w budowie', 'pos_left_pct' => '0', 'pos_top_px' => -30, 'rotate_deg' => -8),
            array('image_url' => 'https://media.studioatrium.pl/stock/33/5409/69bbc6ce5167a-projekty-szkieletowe.webp', 'image_alt' => 'Projekty szkieletowe', 'pos_left_pct' => '30', 'pos_top_px' => -50, 'rotate_deg' => 4),
            array('image_url' => 'https://media.studioatrium.pl/stock/28/7964/68baea0b1474f-najlepsze-projekty-domow-parterowych.jpg', 'image_alt' => 'Najlepsze projekty domów parterowych', 'pos_left_pct' => '60', 'pos_top_px' => -20, 'rotate_deg' => 10),
        );
        try {
            $pdo = \Point7_WebApp::getPDO();
            $meta = $metaDefaults;
            $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_newsletter_meta'");
            if ($existsMeta && $existsMeta->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT contest_title, contest_body, signup_title, signup_body1, signup_body2,
                            signup_button_label, reward_line1, reward_amount, reward_line2
                     FROM homepage_newsletter_meta ORDER BY id ASC LIMIT 1'
                );
                if ($stmt) {
                    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if ($row) {
                        $meta = $row;
                    }
                }
            }

            $photos = $photoDefaults;
            $existsPhotos = $pdo->query("SHOW TABLES LIKE 'homepage_newsletter_photos'");
            if ($existsPhotos && $existsPhotos->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT image_url, image_path, image_alt, pos_left_pct, pos_top_px, rotate_deg
                     FROM homepage_newsletter_photos
                     ORDER BY sorting ASC, id ASC'
                );
                if ($stmt) {
                    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    if (!empty($rows)) {
                        foreach ($rows as $i => $row) {
                            $rows[$i]['image_url'] = $this->resolveHomepageImageUrl(
                                isset($row['image_url']) ? $row['image_url'] : '',
                                isset($row['image_path']) ? $row['image_path'] : ''
                            );
                            unset($rows[$i]['image_path']);
                        }
                        $photos = $rows;
                    }
                }
            }

            return array(
                'meta'   => $meta,
                'photos' => $photos,
            );
        } catch (\Throwable $e) {
            return array(
                'meta'   => $metaDefaults,
                'photos' => $photoDefaults,
            );
        }
    }

    private function resolveHomepageImageUrl($imageUrl, $imagePath = '')
    {
        $imagePath = trim((string) $imagePath);
        if ($imagePath !== '') {
            $stockUrl = \Point7_WebApp::getConfigParam('static.stock');
            if (!$stockUrl) {
                $stockUrl = 'https://media.studioatrium.pl/stock';
            }
            return rtrim($stockUrl, '/') . '/' . ltrim($imagePath, '/');
        }

        $imageUrl = trim((string) $imageUrl);
        if ($imageUrl === '') {
            return '';
        }
        if (preg_match('#^https?://#i', $imageUrl)) {
            return $imageUrl;
        }
        if (strpos($imageUrl, '/src/assets/') === 0) {
            return '';
        }

        return $imageUrl;
    }

    private function fetchBuildSteps()
    {
        $metaDefaults = array('section_title' => '4 kroki do budowy domu');
        $stepDefaults = array(
            array('step_number' => '1', 'step_title' => 'Wybór wymarzonego projektu', 'step_body' => 'Aliquam faucibus nibh nec felis pharetra interdum. Nam id nulla turpis. Etiam molestie elit turpis, placerat rhoncus sapien elementum vel. Duis vel sollicitudin neque. Aenean consequat nunc ipsum, in interdum orci aliquet vel. Proin nisi ante, porttitor at eleifend nec, consequat et risus. Ut et maximus metus. Nunc dapibus quam sit amet augue blandit, id congue turpis dapibus.'),
            array('step_number' => '2', 'step_title' => 'Dopasowanie go do działki', 'step_body' => 'Aliquam faucibus nibh nec felis pharetra interdum. Nam id nulla turpis. Etiam molestie elit turpis, placerat rhoncus sapien elementum vel. Duis vel sollicitudin neque. Aenean consequat nunc ipsum, in interdum orci aliquet vel. Proin nisi ante, porttitor at eleifend nec, consequat et risus. Ut et maximus metus. Nunc dapibus quam sit amet augue blandit, id congue turpis dapibus.'),
            array('step_number' => '3', 'step_title' => 'Wprowadzenie zmian i personalizacja jeśli sa konieczne', 'step_body' => 'Aliquam faucibus nibh nec felis pharetra interdum. Nam id nulla turpis. Etiam molestie elit turpis, placerat rhoncus sapien elementum vel. Duis vel sollicitudin neque. Aenean consequat nunc ipsum, in interdum orci aliquet vel. Proin nisi ante, porttitor at eleifend nec, consequat et risus. Ut et maximus metus. Nunc dapibus quam sit amet augue blandit, id congue turpis dapibus.'),
            array('step_number' => '4', 'step_title' => 'Przygotowanie formalności budowlanych', 'step_body' => 'Aliquam faucibus nibh nec felis pharetra interdum. Nam id nulla turpis. Etiam molestie elit turpis, placerat rhoncus sapien elementum vel. Duis vel sollicitudin neque. Aenean consequat nunc ipsum, in interdum orci aliquet vel. Proin nisi ante, porttitor at eleifend nec, consequat et risus. Ut et maximus metus. Nunc dapibus quam sit amet augue blandit, id congue turpis dapibus.'),
        );
        $expDefaults = array(
            'title'         => "Doświadczenie, które\ngwarantuje bezpieczeństwo",
            'body'          => "Od ponad 30 lat tworzymy projekty domów.\nJesteśmy właścicielami wszystkich projektów, więc najlepiej\nodpowiemy na Twoje pytania, doradzimy w wyborze\ni pomożemy wybrać najbardziej optymalne kosztowo\nrozwiązania.\n\nPamiętaj, że autor projektu najlepiej zna możliwości\nwprowadzenia zmian i oszczędności nie tylko podczas\nbudowy, ale w późniejszej eksploatacji domu.",
            'signature'     => 'arch. arch. Krzysztof Lelek i Piotr Godlewski',
            'button_label'  => 'Umów konsultację z architektem',
            'button_url'    => '/kontakt',
            'button_title'  => 'Umów konsultację z architektem Studio Atrium',
            'button_rel'    => 'noopener noreferrer',
            'image_url'     => '',
            'image_alt'     => 'arch. Krzysztof Lelek i Piotr Godlewski',
        );
        try {
            $pdo = \Point7_WebApp::getPDO();
            $meta = $metaDefaults;
            $steps = $stepDefaults;
            $experience = $expDefaults;

            $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_build_steps_meta'");
            if ($existsMeta && $existsMeta->fetchColumn()) {
                $stmt = $pdo->query('SELECT section_title FROM homepage_build_steps_meta ORDER BY id ASC LIMIT 1');
                if ($stmt) {
                    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if ($row) {
                        $meta = $row;
                    }
                }
            }

            $existsSteps = $pdo->query("SHOW TABLES LIKE 'homepage_build_steps'");
            if ($existsSteps && $existsSteps->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT step_number, step_title, step_body
                     FROM homepage_build_steps ORDER BY sorting ASC, id ASC'
                );
                if ($stmt) {
                    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    if (!empty($rows)) {
                        $steps = $rows;
                    }
                }
            }

            $existsExp = $pdo->query("SHOW TABLES LIKE 'homepage_build_experience'");
            if ($existsExp && $existsExp->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT title, body, signature, button_label, button_url, button_title, button_rel,
                            image_url, image_path, image_alt
                     FROM homepage_build_experience ORDER BY id ASC LIMIT 1'
                );
                if ($stmt) {
                    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if ($row) {
                        $row['image_url'] = $this->resolveHomepageImageUrl(
                            $row['image_url'],
                            isset($row['image_path']) ? $row['image_path'] : ''
                        );
                        unset($row['image_path']);
                        $experience = $row;
                    }
                }
            }

            return array(
                'meta'       => $meta,
                'steps'      => $steps,
                'experience' => $experience,
            );
        } catch (\Throwable $e) {
            return array(
                'meta'       => $metaDefaults,
                'steps'      => $stepDefaults,
                'experience' => $expDefaults,
            );
        }
    }

    private function fetchTestimonials()
    {
        $metaDefaults = array(
            'quote_text'   => "Mieszkamy w swoim wymarzonym domu,\nw którym mamy wszystko, co było nam do szczęścia potrzebne.\nTo naprawdę dobrze zaprojektowany dom, polecam!",
            'attribution'  => 'Pan Gracjan o projekcie SAMBA XI',
            'medals_title' => 'Jesteśmy dumni, że od lat nas cenicie',
        );
        $medalDefaults = array(
            array(
                'image_url' => '',
                'image_alt' => 'Konsumencki Lider Jakości 2024',
            ),
        );
        try {
            $pdo = \Point7_WebApp::getPDO();
            $meta = $metaDefaults;
            $medals = $medalDefaults;

            $existsMeta = $pdo->query("SHOW TABLES LIKE 'homepage_testimonials_meta'");
            if ($existsMeta && $existsMeta->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT quote_text, attribution, medals_title
                     FROM homepage_testimonials_meta ORDER BY id ASC LIMIT 1'
                );
                if ($stmt) {
                    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if ($row) {
                        $meta = $row;
                    }
                }
            }

            $existsMedals = $pdo->query("SHOW TABLES LIKE 'homepage_testimonials_medals'");
            if ($existsMedals && $existsMedals->fetchColumn()) {
                $stmt = $pdo->query(
                    'SELECT image_url, image_path, image_alt FROM homepage_testimonials_medals ORDER BY sorting ASC, id ASC LIMIT 1'
                );
                if ($stmt) {
                    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    if (!empty($rows)) {
                        foreach ($rows as $i => $row) {
                            $rows[$i]['image_url'] = $this->resolveHomepageImageUrl(
                                $row['image_url'],
                                isset($row['image_path']) ? $row['image_path'] : ''
                            );
                            unset($rows[$i]['image_path']);
                        }
                        $medals = $rows;
                    }
                }
            }

            return array(
                'meta'   => $meta,
                'medals' => $medals,
            );
        } catch (\Throwable $e) {
            return array(
                'meta'   => $metaDefaults,
                'medals' => $medalDefaults,
            );
        }
    }

    private function fetchHomepageContactSection()
    {
        $defaults = array(
            'call_title'           => 'ZADZWOŃ',
            'hostess_image_url'    => 'https://www.studioatrium.pl/img/hostess.webp',
            'hostess_image_alt'    => 'Obsługa klienta Studio Atrium',
            'phone1'               => '33 822 94 96',
            'phone2'               => '602 303 160',
            'hours_label'          => 'Jesteśmy do Twojej dyspozycji:',
            'hours_text'           => 'pon. – pt.:  8:00 – 17:00',
            'question_title'       => 'Masz pytanie?',
            'question_body'        => 'Sprawdź nasze projekty domów. Projektujemy domy nowoczesne i tradycyjne, które spełnią wszystkie Twoje oczekiwania. Jeśli potrzebujesz fachowej porady lub pomocy przy wyborze projektu - ZADZWOŃ LUB NAPISZ.',
            'email_placeholder'    => 'e-mail',
            'message_placeholder'  => 'Wiadomość',
            'consent_text'         => 'Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem.',
            'privacy_url'          => '/polityka-prywatnosci',
            'privacy_title'        => 'Szczegóły polityki prywatności',
            'privacy_rel'          => 'noopener noreferrer',
            'submit_label'         => 'WYŚLIJ',
        );
        try {
            $pdo = \Point7_WebApp::getPDO();
            $exists = $pdo->query("SHOW TABLES LIKE 'homepage_contact'");
            if (!($exists && $exists->fetchColumn())) {
                return $defaults;
            }
            $stmt = $pdo->query(
                'SELECT call_title, hostess_image_url, hostess_image_path, hostess_image_alt, phone1, phone2, hours_label, hours_text,
                        question_title, question_body, email_placeholder, message_placeholder, consent_text,
                        privacy_url, privacy_title, privacy_rel, submit_label
                 FROM homepage_contact ORDER BY id ASC LIMIT 1'
            );
            if (!$stmt) {
                return $defaults;
            }
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$row) {
                return $defaults;
            }
            $row['hostess_image_url'] = $this->resolveHomepageImageUrl(
                $row['hostess_image_url'],
                isset($row['hostess_image_path']) ? $row['hostess_image_path'] : ''
            );
            unset($row['hostess_image_path']);
            return $row;
        } catch (\Throwable $e) {
            return $defaults;
        }
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

        // Assign featured video / tips / offer sections
        $smarty->assign('featured_video', $this->fetchFeaturedVideo());
        $smarty->assign('porady', $this->fetchPorady());
        $smarty->assign('tips', $this->fetchTips());
        $smarty->assign('offer', $this->fetchOffer());

        // Assign hero slider + safety strip
        $smarty->assign('hero_slides', $this->fetchHeroSlides());
        $smarty->assign('safety', $this->fetchSafety());
        $smarty->assign('safety_items', $this->fetchSafetyItems());

        // Assign categories slider + bestsellers
        $smarty->assign('categories_meta', $this->fetchCategoriesMeta());
        $smarty->assign('categories', $this->fetchCategories());
        $smarty->assign('bestsellers_meta', $this->fetchBestsellersMeta());
        $smarty->assign('bestsellers', $this->fetchBestsellers());
        $popularCategories = $this->fetchPopularCategories();
        $smarty->assign('popular_categories_meta', $popularCategories['meta']);
        $smarty->assign('popular_categories', $popularCategories['items']);
        $smarty->assign('popular_family_homes', $this->fetchPopularFamilyHomes());
        $smarty->assign('interior_plans', $this->fetchInteriorPlans());

        // Assign products / partners / newsletter homepage sections
        $smarty->assign('products_sections', $this->fetchProductsSections());
        $smarty->assign('partners', $this->fetchPartners());
        $smarty->assign('newsletter', $this->fetchNewsletter());
        $smarty->assign('build_steps', $this->fetchBuildSteps());
        $smarty->assign('testimonials', $this->fetchTestimonials());
        $smarty->assign('homepage_contact', $this->fetchHomepageContactSection());

        // Assign footer menu columns (a/b/c) from footer_menus table
        $smarty->assign('footer_menus', $this->fetchMenuColumns());

        // Modifiers used in project listings
        $paramsHelper = new ProjectParamsHelper();
        $smarty->registerPlugin('modifier', 'hasFloor',       [$paramsHelper, 'mHasFloor']);
        $smarty->registerPlugin('modifier', 'hasLoft',        [$paramsHelper, 'mHasLoft']);
        $smarty->registerPlugin('modifier', 'isGroundFloor',  [$paramsHelper, 'mIsGroundFloor']);
        $smarty->registerPlugin('modifier', 'hasSkeletonOption', [$paramsHelper, 'mHasSkeletonOption']);
        $smarty->registerPlugin('modifier', 'isWithdrawn',    [$paramsHelper, 'mIsWithdrawn']);
        $smarty->registerPlugin('modifier', 'hasMirror',      [$paramsHelper, 'mHasMirror']);
        $smarty->registerPlugin('modifier', 'stairsChange',   [$paramsHelper, 'mStairsChange']);
        $smarty->registerPlugin('modifier', 'isAvailable',    [$paramsHelper, 'mIsAvailable']);
        $smarty->registerPlugin('modifier', 'isMultiApartment', [$paramsHelper, 'mIsMultiApartment']);
        $smarty->registerPlugin('modifier', 'oneFlatArea',    [$paramsHelper, 'mOneFlatArea']);
        $smarty->registerPlugin('modifier', 'oneFlatGarageArea', [$paramsHelper, 'mOneFlatGarageArea']);
        $smarty->registerPlugin('modifier', 'isReady7days',   [$paramsHelper, 'mIsReady7days']);
        $smarty->registerPlugin('modifier', 'isReady14days',  [$paramsHelper, 'mIsReady14days']);
        $smarty->registerPlugin('modifier', 'isWT2021needful', [$paramsHelper, 'mIsWT2021needful']);
        $smarty->registerPlugin('modifier', 'isWT2021needfulHeat', [$paramsHelper, 'mIsWT2021needfulHeat']);
        $smarty->registerPlugin('modifier', 'isWT2021ready',  [$paramsHelper, 'mIsWT2021ready']);
        $smarty->registerPlugin('modifier', 'isBlackWeek',    [$paramsHelper, 'mIsBlackWeek']);
        $smarty->registerPlugin('modifier', 'isChristmas',    [$paramsHelper, 'mIsChristmas']);
        $smarty->registerPlugin('modifier', 'panoramaLink',   [$paramsHelper, 'mPanoramaLink']);
        $smarty->registerPlugin('modifier', 'movieLink',      [$paramsHelper, 'mMovieLink']);
        $smarty->registerPlugin('modifier', 'isNarrowGarage', [$paramsHelper, 'mIsNarrowGarage']);
        $smarty->registerPlugin('modifier', 'isHalfPrice',    [$paramsHelper, 'mIsHalfPrice']);
        $smarty->registerPlugin('modifier', 'isDual',         [$paramsHelper, 'mIsDual']);
        $smarty->registerPlugin('modifier', 'lowestPrice',    [$paramsHelper, 'mLowestPrice']);
        $smarty->registerPlugin('modifier', 'pcforfree',      [$paramsHelper, 'mPCForFree']);
        $smarty->registerPlugin('modifier', 'costInfo',       [$paramsHelper, 'mCostInfo']);
        $smarty->registerPlugin('modifier', 'hasEnergyFactor', [$paramsHelper, 'mHasEnergyFactor']);
        $smarty->registerPlugin('modifier', 'epEnergyFactor', [$paramsHelper, 'mEpEnergyFactor']);
        $smarty->registerPlugin('modifier', 'ekEnergyFactor', [$paramsHelper, 'mEkEnergyFactor']);
        $smarty->registerPlugin('modifier', 'vatValue',       [$paramsHelper, 'mVatValue']);
        $smarty->registerPlugin('modifier', 'mapStorey',      [$paramsHelper, 'mMapStorey']);
        $smarty->registerPlugin('modifier', 'mapStoreyCatalog', [$paramsHelper, 'mMapStoreyCatalog']);
        $smarty->registerPlugin('modifier', 'usableArea',     [$paramsHelper, 'mUsableArea']);
        $smarty->registerPlugin('modifier', 'parcelWidth',    [$paramsHelper, 'mParcelWidth']);
        $smarty->registerPlugin('modifier', 'parcelHeight',   [$paramsHelper, 'mParcelHeight']);
        $smarty->registerPlugin('modifier', 'houseHeight',    [$paramsHelper, 'mHouseHeight']);
        $smarty->registerPlugin('modifier', 'roofAngle',      [$paramsHelper, 'mRoofAngle']);
        $smarty->registerPlugin('modifier', 'roomCount',      [$paramsHelper, 'mRoomCount']);
        $smarty->registerPlugin('modifier', 'isNew',          [$paramsHelper, 'mIsNew']);
        $smarty->registerPlugin('modifier', 'totalArea',      [$paramsHelper, 'mTotalArea']);
        $smarty->registerPlugin('modifier', 'buildArea',      [$paramsHelper, 'mBuildArea']);
        $smarty->registerPlugin('modifier', 'cubature',       [$paramsHelper, 'mCubature']);
        $smarty->registerPlugin('modifier', 'garageHeight',   [$paramsHelper, 'mGarageHeight']);
        $smarty->registerPlugin('modifier', 'arborHeight',    [$paramsHelper, 'mArborHeight']);
        $smarty->registerPlugin('modifier', 'carportHeight',  [$paramsHelper, 'mCarportHeight']);
        $smarty->registerPlugin('modifier', 'fenceSpanHeight',  [$paramsHelper, 'mFenceSpanHeight']);
        $smarty->registerPlugin('modifier', 'fenceRoofHeight',  [$paramsHelper, 'mFenceRoofHeight']);
        $smarty->registerPlugin('modifier', 'projectCatalog', [$this, 'mProjectCatalog']);
        $smarty->registerPlugin('modifier', 'projectType',    [$this, 'mProjectType']);
        $smarty->registerPlugin('modifier', 'linkTitle',      [$this, 'mLinkTitle']);
        $smarty->registerPlugin('modifier', 'inBasket',       [$this, 'mInBasket']);
        $smarty->registerPlugin('modifier', 'hideEmails',     [$this, 'mHideEmails']);
        $smarty->registerPlugin('modifier', 'fixArticleContent', [$this, 'mFixArticleContent']);
        $smarty->registerPlugin('modifier', 'avatar',         [$this, 'mAvatar']);
        $smarty->registerPlugin('modifier', 'replace',        function($str, $find, $replace) { return str_replace($find, $replace, $str); });
        $smarty->registerPlugin('modifier', 'unescape',       function($str) { return htmlspecialchars_decode((string) $str, ENT_QUOTES); });
        $smarty->registerPlugin('modifier', 'truncate',       function($str, $len = 80, $etc = '...') {
            $str = (string) $str;
            if (mb_strlen($str) <= $len) {
                return $str;
            }
            return mb_substr($str, 0, $len) . $etc;
        });
        $smarty->registerPlugin('modifier', 'floatval',       function($val) { return (float) $val; });
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
        $smarty->registerPlugin('modifier', 'mapUrlParam',    function($value, $type) { return \StudioAtrium\Application\Helper\UrlParamMap::getMapping($type, $value); });
    }
}
