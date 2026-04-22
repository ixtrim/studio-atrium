<?php
namespace StudioAtrium\Entity\Extras;

use StudioAtrium\Entity\EntityCollection;

/**
 * `StudioAtrium\Entity\Extras\Finder` didn't exist at all - Varia::doAddons()
 * and ProjectExtend::doAddons() both fatal on getExtrasFinder(). This class
 * was never ported during the rewrite; the old DAORepository::getExtrasFinder()
 * routed through DAO classes (StudioAtrium\Entity\Extras\DAO\PDOMySQL) that
 * were never written either, so it's built on raw PDO instead, matching
 * Document\Finder's pattern.
 */
class Finder
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Generic "dodatki" showcase page (Varia::doAddons / /dodatki/ listing) -
     * standalone add-ons, not tied to one project and not part of a
     * pick-one-of-these group.
     *
     * @param bool $generalOnly show_in_general = 1 (site's curated "featured
     *                          add-ons" flag) and exclude groups (is_group = 0)
     * @param bool $withAttachments kept for call-site compatibility; see note
     *                              below - always returns an empty attachment
     *                              list right now
     */
    public function getExtrasList(bool $generalOnly = true, bool $withAttachments = true): EntityCollection
    {
        $sql = 'SELECT id, name, description, price FROM extras';
        if ($generalOnly) {
            $sql .= ' WHERE show_in_general = 1 AND is_group = 0';
        }
        $sql .= ' ORDER BY id ASC';

        $stmt = $this->pdo->query($sql);
        $items = [];
        foreach ($stmt->fetchAll() as $row) {
            $items[] = [
                'id'          => (int)$row['id'],
                'name'        => $row['name'],
                'description' => $row['description'],
                'price'       => $row['price'],
                // No confirmed owner_uid/profile_name convention was found for
                // "extras" attachments (Point7_CMS_Attachment table), so images
                // aren't wired up - Views/Templates/Varia/Addons.tpl reads
                // $_extra.attachments.ExtrasImage[0] and will just show no image
                // rather than crash.
                'attachments' => ['ExtrasImage' => []],
            ];
        }

        return new EntityCollection($items);
    }

    /**
     * Project-specific add-ons upsell (ProjectExtend::doAddons / "dodatki do
     * projektu X"). The `extras_listing` table's package-matching rules
     * (`projects` / `projects_excluded` / the 'project_type' wildcard value -
     * see the column comments in SQL/studioatrium.sql) are real pricing/business
     * logic that needs product input to get right, not a guess. Left as an
     * empty result (renders as "no add-ons" instead of fataling) until that's
     * defined.
     */
    public function getListings($type, $status, bool $withExtras = true, $projectId = null): EntityCollection
    {
        return new EntityCollection([]);
    }
}
