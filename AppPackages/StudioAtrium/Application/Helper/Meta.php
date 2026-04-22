<?php
namespace StudioAtrium\Application\Helper;

use StudioAtrium\Application\WWW\ResponseContext;

/**
 * `StudioAtrium\Application\Helper\Meta` didn't exist at all - every content
 * page (Page::doDisplay404, Project::doHouse/doGarage/doOther,
 * ProjectExtend::doPlan/doSketch/doAddons, Selfie, Varia::doAgent*,
 * Article::doHashTag/doItem, ForumArchive::doList, Discuss::doCategory/doThread)
 * fatals as soon as it calls one of these four methods.
 *
 * This only sets `pageTitle` and `pageMetaDescription` (the two things every
 * call site actually needs to stop fataling and get a real <title>/<meta
 * description> instead of the site default). Anything a module already sets
 * itself directly (canonicalUrl, schemaBreadcrumbs, schemaProduct, ogTags,
 * noindex, ...) is left alone here.
 *
 * The original copy this replaced lived in the pre-rewrite Point7 packages
 * directory (outside this repo, never captured - see
 * StudioAtrium_PHP83_UpgradePlan.docx and Application/Helper/Url.php's header
 * for the same situation), so exact wording couldn't be recovered. Titles/
 * descriptions below are generated from real entity data (name, short
 * description, meta_title/meta_description where present) rather than
 * reconstructed from memory.
 */
class Meta
{
    private const SUFFIX = ' - Studio Atrium';

    /**
     * @param string $module      module name ($this->_name), or the literal "404"
     * @param string $action
     * @param mixed  $entity      Project entity for Project/ProjectExtend/Selfie
     * @param int|null $page
     * @param mixed  $extra1      meaning depends on $module/$action - see call sites
     * @param mixed  $extra2      meaning depends on $module/$action - see call sites
     */
    public static function prepareMeta(
        ResponseContext $responseContext,
        string $module,
        string $action,
        $entity = null,
        $page = null,
        $extra1 = null,
        $extra2 = null
    ): void {
        [$title, $description] = self::buildMeta($module, $action, $entity, $page, $extra1, $extra2);
        self::apply($responseContext, $title, $description);
    }

    /**
     * @param string $tagOrTitle  a tag label (HashTag/List actions) or, for
     *                            Article::doItem, an explicit title override
     *                            passed as the 4th arg's mirror at position 7
     * @param string|null $titleOverride  Article::doItem's 7th positional arg
     */
    public static function prepareArticleMeta(
        ResponseContext $responseContext,
        string $module,
        string $action,
        $tagOrTitle = null,
        $page = null,
        $pages = null,
        $titleOverride = null
    ): void {
        if ($titleOverride) {
            $title = $titleOverride . self::SUFFIX;
            self::apply($responseContext, $title, (string)$tagOrTitle);
            return;
        }

        if ($tagOrTitle) {
            $label = (string)$tagOrTitle;
            $title = ucfirst($label) . self::pageSuffix($page, $pages) . self::SUFFIX;
            $description = 'Artykuły i porady ' . mb_strtolower($label, 'UTF-8') . ' w bazie wiedzy Studio Atrium.';
        } else {
            // Also reused by Project.php for its realizations/listing pager
            // titles (module="Project", empty tag) - Article/ForumArchive get
            // their normal labels, anything else falls back to a humanized
            // action name rather than a hardcoded "Artykuły".
            $label = $module === 'ForumArchive' ? 'Forum' : ($module === 'Article' ? 'Artykuły' : ucfirst(str_replace('_', ' ', $action ?? '')));
            $title = $label . self::pageSuffix($page, $pages) . self::SUFFIX;
            $description = $label . ' - Studio Atrium.';
        }
        self::apply($responseContext, $title, $description);
    }

    public static function prepareDiscussMeta(
        ResponseContext $responseContext,
        string $module,
        string $action,
        $category = null,
        $page = null,
        $pages = null,
        $topic = null
    ): void {
        if ($action === 'Thread' && $topic) {
            $title = $topic . self::pageSuffix($page, $pages) . self::SUFFIX;
            $description = 'Wątek "' . $topic . '" na forum Studio Atrium.';
        } else {
            $catLabel = is_array($category) ? implode(', ', $category) : (string)$category;
            $title = ($catLabel !== '' ? $catLabel . ' - ' : '') . 'Forum' . self::pageSuffix($page, $pages) . self::SUFFIX;
            $description = 'Forum dyskusyjne Studio Atrium' . ($catLabel !== '' ? ' - ' . $catLabel : '') . '.';
        }
        self::apply($responseContext, $title, $description);
    }

    /**
     * @param array $params  e.g. ['#region#' => 'województwo śląskie', '#page#' => ' - strona 2']
     */
    public static function prepareMetaWithExtraParams(
        ResponseContext $responseContext,
        string $module,
        string $action,
        array $params = []
    ): void {
        $template = self::templateFor($module, $action);
        $title = strtr($template['title'], $params) . self::SUFFIX;
        $description = strtr($template['description'], $params);
        self::apply($responseContext, $title, $description);
    }

    private static function apply(ResponseContext $responseContext, string $title, string $description): void
    {
        $responseContext->set('pageTitle', trim($title));
        $responseContext->set('pageMetaDescription', trim($description));
    }

    private static function pageSuffix($page, $pages): string
    {
        $page = (int)$page;
        if ($page > 1) {
            return $pages ? " - strona {$page} z {$pages}" : " - strona {$page}";
        }
        return '';
    }

    private static function templateFor(string $module, string $action): array
    {
        $templates = [
            'Varia:Agent' => [
                'title' => 'Przedstawiciele handlowi - #region##page#',
                'description' => 'Lista przedstawicieli handlowych Studio Atrium w #region#.',
            ],
            'Varia:AgentDetail' => [
                'title' => 'Przedstawiciel handlowy #name#',
                'description' => 'Dane kontaktowe przedstawiciela handlowego Studio Atrium: #name#.',
            ],
        ];
        return $templates["{$module}:{$action}"] ?? [
            'title' => ucfirst($module) . ' ' . $action,
            'description' => '',
        ];
    }

    /**
     * @return array{0:string,1:string} [title, description]
     */
    private static function buildMeta(string $module, string $action, $entity, $page, $extra1, $extra2): array
    {
        if ($module === '404') {
            return ['Nie znaleziono strony' . self::SUFFIX, 'Szukana strona nie istnieje lub została przeniesiona.'];
        }

        $project = $entity; // Project entity, for every action below that receives one

        switch ("{$module}:{$action}") {
            case 'Project:House':
            case 'Project:Garage':
            case 'Project:Other':
                return self::projectMeta($project, (bool)$extra1, $action);

            case 'ProjectExtend:Plan':
                return [
                    'Usytuowanie projektu ' . self::projectName($project) . self::SUFFIX,
                    'Propozycja usytuowania projektu ' . self::projectName($project) . ' na działce.',
                ];

            case 'ProjectExtend:Sketch':
                $mirror = $extra1 ? ' - odbicie lustrzane' : '';
                $floor = $extra2 ?: null;
                $floorLabel = $floor ? "Rzut {$floor}" : 'Rzut kondygnacji';
                return [
                    "{$floorLabel} projektu " . self::projectName($project) . $mirror . self::SUFFIX,
                    "{$floorLabel} projektu " . self::projectName($project) . '.',
                ];

            case 'ProjectExtend:Addons':
                return [
                    'Dodatki do projektu ' . self::projectName($project) . self::SUFFIX,
                    'Dodatki i opcje dostępne do projektu ' . self::projectName($project) . '.',
                ];

            case 'Selfie:Display':
                return [
                    'Selfie z projektem ' . self::projectName($project) . self::SUFFIX,
                    'Zobacz, jak wygląda selfie z projektem domu ' . self::projectName($project) . '.',
                ];

            default:
                // Selfie's plain pager calls ($this->_action varies) and any
                // other not-yet-audited action: fall back to a page/pages
                // based title rather than the empty default.
                $title = $module . ($page ? self::pageSuffix($page, $extra1) : '');
                return [trim($title) . self::SUFFIX, ''];
        }
    }

    private static function projectMeta($project, bool $mirror, string $action): array
    {
        if (!$project) {
            return ['Projekt' . self::SUFFIX, ''];
        }

        $typeLabel = Project::getTypes($project->getType());
        $name = self::projectName($project);
        $mirrorSuffix = $mirror ? ' - odbicie lustrzane' : '';

        $paramsGeneral = json_decode((string)$project->getParamsGeneral(), true);
        $area = (is_array($paramsGeneral) && !empty($paramsGeneral['usable_area'])) ? $paramsGeneral['usable_area'] : null;

        $title = "{$typeLabel} {$name}{$mirrorSuffix}" . self::SUFFIX;

        $description = $project->getShortDescription() ?: "{$typeLabel} {$name}.";
        if ($area) {
            $description = "{$typeLabel} {$name} o powierzchni użytkowej {$area} m2. " . $description;
        }

        return [$title, $description];
    }

    private static function projectName($project): string
    {
        if (!$project) {
            return '';
        }
        return method_exists($project, 'getName') ? (string)$project->getName() : '';
    }
}
