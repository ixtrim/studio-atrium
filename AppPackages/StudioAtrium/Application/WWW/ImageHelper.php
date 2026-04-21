<?php
namespace StudioAtrium\Application\WWW;

class ImageHelper
{
    private string $mediaBase = 'https://media.studioatrium.pl';

    /**
     * {image} Smarty function — generates image URL for a project.
     * Types: 'render', 'sketch'
     */
    public function fImage(array $params, mixed $tpl = null): string
    {
        $type    = $params['type']    ?? 'render';
        $project = $params['project'] ?? [];
        $size    = $params['size']    ?? 'box';
        $storey  = $params['storey']  ?? null;

        $id = is_array($project) ? (int)($project['id'] ?? 0) : 0;
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
