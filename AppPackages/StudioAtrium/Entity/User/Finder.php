<?php
namespace StudioAtrium\Entity\User;

use StudioAtrium\Entity\EntityCollection;
use StudioAtrium\Entity\User;

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

    public function getById($id, $enabledOnly = true)
    {
        $sql = 'SELECT * FROM user WHERE id = :id';
        if ($enabledOnly) {
            $sql .= " AND status = 'enabled'";
        }
        $sql .= ' LIMIT 1';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(':id' => (int) $id));
        $row = $stmt->fetch();
        return $row ? $this->hydrate($row) : null;
    }

    public function getListById(array $ids, $enabledOnly = true)
    {
        $ids = array_values(array_filter(array_map('intval', $ids)));
        if (!$ids) {
            return new EntityCollection();
        }

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "SELECT * FROM user WHERE id IN ($placeholders)";
        if ($enabledOnly) {
            $sql .= " AND status = 'enabled'";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($ids);
        $rows = $stmt->fetchAll();

        $items = array();
        foreach ($rows as $row) {
            $items[] = $this->hydrate($row);
        }

        return new EntityCollection($items);
    }

    private function hydrate(array $row)
    {
        $user = new User();
        $user->setId((int) $row['id']);
        $user->setEmail(isset($row['email']) ? $row['email'] : '');
        $user->setPassword(isset($row['password']) ? $row['password'] : '');
        $user->setName(isset($row['name']) ? $row['name'] : '');
        $user->setSurname(isset($row['surname']) ? $row['surname'] : '');
        $user->setNick(isset($row['nick']) ? $row['nick'] : '');
        $user->setType(isset($row['type']) ? $row['type'] : User::TYPE_USER);
        $user->setStatus(isset($row['status']) ? $row['status'] : User::STATUS_ENABLED);

        if (method_exists($user, 'setProps')) {
            $props = array();
            if (!empty($row['props'])) {
                $decoded = json_decode($row['props'], true);
                if (is_array($decoded)) {
                    $props = $decoded;
                }
            }
            $user->setProps($props);
        }

        return $user;
    }
}
