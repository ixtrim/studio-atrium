<?php
namespace StudioAtrium\Application\WWW;

class ImageHelper
{
    private $mediaBase = 'https://media.studioatrium.pl';
    /**
     * {image} Smarty function — generates image URL for a project.
     * Types: 'render', 'sketch'
     */
    public function fImage(array $params, $tpl = null): string
    {
        $type    = $params['type']    ?? 'render';
        $project = $params['project'] ?? [];
        $size    = $params['size']    ?? 'box';
        $storey  = $params['storey']  ?? null;

        $id = 0;
        if (is_array($project)) {
            $id = (int)($project['id'] ?? 0);
        } elseif (is_object($project)) {
            if ($project instanceof \ArrayAccess && isset($project['id'])) {
                $id = (int)$project['id'];
            } elseif (method_exists($project, 'getId')) {
                $id = (int)$project->getId();
            }
        }
        if (!$id) return '';

        if ($type === 'render') {
            return $this->mediaBase . '/project/' . $id . '/render-' . $size . '.jpg';
        }

        if ($type === 'sketch') {
            $suffix = $storey ? 'sketch-' . $storey : 'sketch';
            return $this->mediaBase . '/project/' . $id . '/' . $suffix . '.jpg';
        }

        return '';
    }
}
