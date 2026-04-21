<?php
namespace StudioAtrium\Entity\Adwords\Clicks;

use StudioAtrium\Entity\Adwords\Clicks;
use StudioAtrium\Entity\EntityCollection;

class DAO
{
    public function __construct(private \PDO $pdo) {}

    public function find(\Point7_AbstractDAO_FinderParams $params): EntityCollection|false
    {
        $result = $params->buildWhere();
        $whereClause = $result['sql'] ?? '';
        $bindings    = $result['params'] ?? [];

        $sql = 'SELECT * FROM adwords_clicks';
        if ($whereClause) $sql .= ' ' . $whereClause;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($bindings);
        $rows = $stmt->fetchAll();
        if (!$rows) return false;
        return new EntityCollection(array_map([$this, 'hydrate'], $rows));
    }

    public function store(Clicks $c): void
    {
        if ($c->getId()) {
            $stmt = $this->pdo->prepare(
                'UPDATE adwords_clicks SET click_date=:d,campaign_no=:cn,clicks_desktop=:cd,clicks_tablet=:ct,clicks_mobile=:cm WHERE id=:id'
            );
            $stmt->execute([':d'=>$c->getClickDate(),':cn'=>$c->getCampaignNo(),':cd'=>$c->getClicksDesktop(),':ct'=>$c->getClicksTablet(),':cm'=>$c->getClicksMobile(),':id'=>$c->getId()]);
        } else {
            $stmt = $this->pdo->prepare(
                'INSERT INTO adwords_clicks (click_date,campaign_no,clicks_desktop,clicks_tablet,clicks_mobile) VALUES (:d,:cn,:cd,:ct,:cm)'
            );
            $stmt->execute([':d'=>$c->getClickDate(),':cn'=>$c->getCampaignNo(),':cd'=>$c->getClicksDesktop(),':ct'=>$c->getClicksTablet(),':cm'=>$c->getClicksMobile()]);
            $c->setId((int)$this->pdo->lastInsertId());
        }
    }

    private function hydrate(array $row): Clicks
    {
        $c = new Clicks();
        $c->setId((int)$row['id']);
        $c->setClickDate($row['click_date'] ?? null);
        $c->setCampaignNo(isset($row['campaign_no']) ? (int)$row['campaign_no'] : null);
        $c->setClicksDesktop((int)($row['clicks_desktop'] ?? 0));
        $c->setClicksTablet((int)($row['clicks_tablet'] ?? 0));
        $c->setClicksMobile((int)($row['clicks_mobile'] ?? 0));
        return $c;
    }
}
