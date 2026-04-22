<?php
namespace StudioAtrium\Entity\Banner;

class Finder
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function configure(array $config)
    {
    }

    public function getRandomBanner()
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM banner WHERE status = 'enabled' ORDER BY RAND() LIMIT 1"
        );
        $row = $stmt->fetch();
        if (!$row) {
            return null;
        }

        return array(
            'id'          => (int) $row['id'],
            'title'       => isset($row['title']) ? $row['title'] : '',
            'banner'      => isset($row['banner']) ? $row['banner'] : '',
            'link'        => isset($row['link']) ? $row['link'] : '',
            'height'      => isset($row['height']) ? $row['height'] : null,
            'width'       => isset($row['width']) ? $row['width'] : null,
            'create_date' => isset($row['create_date']) ? $row['create_date'] : '',
            'status'      => isset($row['status']) ? $row['status'] : 'enabled',
        );
    }
}
