<?php
namespace StudioAtrium\Application\WWW;

/**
 * {image} Smarty function — real ProjectRender / ProjectInterior / ProjectSketch URLs.
 * The previous stub invented paths like /project/{id}/render-list.jpg which do not exist
 * on media.studioatrium.pl (actual files are e.g. muna-iii-wizualizacja-476-….jpg).
 */
class ImageHelper
{
    private $mediaBase = 'https://media.studioatrium.pl/project';

    /**
     * @param array $params
     * @param mixed $tpl
     * @return string
     */
    public function fImage(array $params, $tpl = null): string
    {
        $type    = isset($params['type']) ? (string) $params['type'] : 'render';
        $project = isset($params['project']) ? $params['project'] : array();
        $size    = isset($params['size']) ? (string) $params['size'] : 'box';
        $storey  = isset($params['storey']) ? $params['storey'] : null;
        $mirror  = !empty($params['mirror']);
        $no      = isset($params['no']) ? (int) $params['no'] : 0;

        $mediaBase = $this->mediaBase;
        try {
            $cfg = \Point7_WebApp::getConfigParam('static.project');
            if ($cfg) {
                $mediaBase = rtrim((string) $cfg, '/');
            }
        } catch (\Throwable $e) {
            // keep default
        }

        $id = $this->resolveProjectId($project);
        if (!$id) {
            return '';
        }

        if ($type === 'render' || $type === 'interior') {
            $profile = ($type === 'interior') ? 'ProjectInterior' : 'ProjectRender';
            $attachments = $this->loadProfileAttachments($project, $id, $profile);
            if (!empty($attachments)) {
                if (!isset($attachments[$no])) {
                    $no = 0;
                }
                if (isset($attachments[$no])) {
                    $url = $this->urlFromAttachment($attachments[$no], $mediaBase, $size, $mirror);
                    if ($url !== '') {
                        return $url;
                    }
                }
                // Any usable child/parent from first render
                foreach ($attachments as $att) {
                    foreach (array($size, 'list', 'box', 'thumb', 'presentation', null) as $trySize) {
                        $url = $this->urlFromAttachment($att, $mediaBase, $trySize, $mirror);
                        if ($url !== '') {
                            return $url;
                        }
                    }
                }
            }

            return $mediaBase . '/' . $id . '/render-box.jpg';
        }

        if ($type === 'sketch') {
            $attachments = $this->loadProfileAttachments($project, $id, 'ProjectSketch');
            if (!empty($attachments)) {
                $att = $attachments[0];
                if ($storey !== null && $storey !== '') {
                    foreach ($attachments as $candidate) {
                        $props = isset($candidate['props']) ? $candidate['props'] : array();
                        if (is_string($props)) {
                            $decoded = json_decode($props, true);
                            $props = is_array($decoded) ? $decoded : array();
                        }
                        if (isset($props['storey']) && (string) $props['storey'] === (string) $storey) {
                            $att = $candidate;
                            break;
                        }
                    }
                }
                $url = $this->urlFromAttachment($att, $mediaBase, $size ?: 'presentation', $mirror);
                if ($url !== '') {
                    return $url;
                }
            }
            $suffix = $storey ? 'sketch-' . $storey : 'sketch';
            return $mediaBase . '/' . $id . '/' . $suffix . '.jpg';
        }

        return '';
    }

    /**
     * @param mixed $project
     * @return int
     */
    private function resolveProjectId($project)
    {
        if (is_array($project)) {
            return (int) (isset($project['id']) ? $project['id'] : 0);
        }
        if (is_object($project)) {
            if ($project instanceof \ArrayAccess && isset($project['id'])) {
                return (int) $project['id'];
            }
            if (method_exists($project, 'getId')) {
                return (int) $project->getId();
            }
        }
        return 0;
    }

    /**
     * @param mixed $project
     * @param int $id
     * @param string $profile
     * @return array
     */
    private function loadProfileAttachments($project, $id, $profile)
    {
        // Array already hydrated with attachments (rare)
        if (is_array($project) && !empty($project['attachments'][$profile]) && is_array($project['attachments'][$profile])) {
            return array_values($project['attachments'][$profile]);
        }

        // Live Project entity
        if (is_object($project) && method_exists($project, 'getAttachments')) {
            try {
                $grouped = $project->getAttachments()->toArray();
                if (!empty($grouped[$profile]) && is_array($grouped[$profile])) {
                    return array_values($grouped[$profile]);
                }
            } catch (\Throwable $e) {
                // fall through to DAO load
            }
        }

        // Cart / list pass plain arrays — load attachments by owner_uid
        try {
            $entity = new \StudioAtrium\Entity\Project();
            $entity->setId((int) $id);
            $grouped = $entity->getAttachments()->toArray();
            if (!empty($grouped[$profile]) && is_array($grouped[$profile])) {
                return array_values($grouped[$profile]);
            }
        } catch (\Throwable $e) {
            return array();
        }

        return array();
    }

    /**
     * @param array $attachment
     * @param string $mediaBase
     * @param string|null $preferChild  list|box|thumb|presentation|null
     * @param bool $mirror
     * @return string
     */
    private function urlFromAttachment(array $attachment, $mediaBase, $preferChild = 'list', $mirror = false)
    {
        $path = '';
        $file = '';

        if ($preferChild && !empty($attachment['childAttachments'][$preferChild][0]['filename'])) {
            $child = $attachment['childAttachments'][$preferChild][0];
            $path = isset($child['path']) ? trim((string) $child['path'], '/') : '';
            $file = $child['filename'];
        } elseif (!empty($attachment['filename'])) {
            $path = isset($attachment['path']) ? trim((string) $attachment['path'], '/') : '';
            $file = $attachment['filename'];
        }

        if ($file === '') {
            return '';
        }

        $parts = array();
        if ($path !== '') {
            $parts[] = $path;
        }
        if ($mirror) {
            $parts[] = 'mirror';
        }
        $parts[] = $file;

        return $mediaBase . '/' . implode('/', $parts);
    }
}
