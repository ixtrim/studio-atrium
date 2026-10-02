<?php
namespace StudioAtrium\Entity\Discount;

use StudioAtrium\Entity\Discount;
use StudioAtrium\Entity\EntityCollection;

/**
 * Discount codes — PDO Finder (DAO class was never ported).
 */
class Finder
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Kept for DAORepository configure() compatibility; ignored when PDO is injected.
     *
     * @param array $config
     */
    public function configure(array $config = array())
    {
        if (!empty($config['pdo_handle']) && $config['pdo_handle'] instanceof \PDO) {
            $this->pdo = $config['pdo_handle'];
        }
        return $this;
    }

    /**
     * Validate / resolve a promo code for cart projects.
     *
     * @param string $code
     * @param array|null $projectList cart project ids
     * @return Discount|null
     */
    public function getByCode($code, $projectList = null)
    {
        $code = trim((string) $code);
        if ($code === '') {
            return null;
        }

        $sql = 'SELECT * FROM discount
            WHERE code = :code
              AND status = :status
              AND (start_date IS NULL OR start_date <= CURDATE())
              AND (stop_date IS NULL OR stop_date >= CURDATE())
            LIMIT 1';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ':code' => $code,
            ':status' => Discount::STATUS_ENABLED,
        ));
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }

        $discount = Discount::fromRow($row);

        // If code is limited to specific projects, require overlap with cart
        if ($discount->getProjectsId() && is_array($projectList) && count($projectList)) {
            $allowed = array_filter(array_map('intval', explode(',', $discount->getProjectsId())));
            $cart = array_filter(array_map('intval', $projectList));
            if ($allowed && !array_intersect($allowed, $cart)) {
                return null;
            }
        }

        return $discount;
    }

    /**
     * Panel promo list for a user (and optionally public panel codes).
     *
     * @param string $status
     * @param bool $activeOnly date window
     * @param mixed $projectsId unused (kept for signature compatibility)
     * @param bool|null $showInPanel
     * @param int|null $userId
     * @return EntityCollection
     */
    public function getList(
        $status = Discount::STATUS_ENABLED,
        $activeOnly = true,
        $projectsId = null,
        $showInPanel = null,
        $userId = null
    ) {
        $where = array('status = :status');
        $params = array(':status' => $status);

        if ($activeOnly) {
            $where[] = '(start_date IS NULL OR start_date <= CURDATE())';
            $where[] = '(stop_date IS NULL OR stop_date >= CURDATE())';
        }

        if ($showInPanel !== null) {
            $where[] = 'show_in_panel = :show_in_panel';
            $params[':show_in_panel'] = $showInPanel ? 1 : 0;
        }

        if ($userId !== null) {
            $where[] = '(user_id = :user_id OR (user_id IS NULL OR user_id = 0))';
            $params[':user_id'] = (int) $userId;
        }

        $sql = 'SELECT * FROM discount WHERE ' . implode(' AND ', $where) . ' ORDER BY id DESC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        $items = array();
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $items[] = Discount::fromRow($row);
        }

        return new EntityCollection($items);
    }
}
