<?php
namespace StudioAtrium\Entity\Project\Param;

use StudioAtrium\Entity\EntityCollection;

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

    public function getById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM project_param WHERE id = :id LIMIT 1');
        $stmt->execute(array(':id' => (int) $id));
        $row = $stmt->fetch();
        if (!$row) {
            return null;
        }

        return new Param($row, $this->loadOptionsForParam((int) $row['id']));
    }

    public function getListForProject($projectType, $withOptions = false)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM project_param
             WHERE project_type IN ('general', :project_type)
             ORDER BY id ASC"
        );
        $stmt->execute(array(':project_type' => $projectType));
        $rows = $stmt->fetchAll();

        $optionsByParam = array();
        if ($withOptions && $rows) {
            $paramIds = array();
            foreach ($rows as $row) {
                $paramIds[] = (int) $row['id'];
            }
            $optionsByParam = $this->loadOptionsForParams($paramIds);
        }

        $items = array();
        foreach ($rows as $row) {
            $paramId = (int) $row['id'];
            $options = isset($optionsByParam[$paramId]) ? $optionsByParam[$paramId] : array();
            $items[] = new Param($row, $options);
        }

        return new EntityCollection($items);
    }

    public function getListingByAlternateName($alternateName)
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM project_param_listing WHERE alternate_name = :alternate_name LIMIT 1'
        );
        $stmt->execute(array(':alternate_name' => $alternateName));
        $row = $stmt->fetch();
        if (!$row) {
            $listing = new Listing(array('id' => 0, 'name' => '', 'alternate_name' => $alternateName, 'params' => '[]'));
            return $listing;
        }

        return new Listing($row);
    }

    private function loadOptionsForParam($paramId)
    {
        $map = $this->loadOptionsForParams(array($paramId));
        return isset($map[$paramId]) ? $map[$paramId] : array();
    }

    private function loadOptionsForParams(array $paramIds)
    {
        if (!$paramIds) {
            return array();
        }

        $placeholders = implode(',', array_fill(0, count($paramIds), '?'));
        $stmt = $this->pdo->prepare(
            "SELECT * FROM project_param_option
             WHERE project_param_id IN ($placeholders)
             ORDER BY sorting ASC, id ASC"
        );
        $stmt->execute(array_values($paramIds));
        $rows = $stmt->fetchAll();

        $grouped = array();
        foreach ($rows as $row) {
            $paramId = (int) $row['project_param_id'];
            if (!isset($grouped[$paramId])) {
                $grouped[$paramId] = array();
            }
            $grouped[$paramId][] = array(
                'id'           => (int) $row['id'],
                'project_param_id' => $paramId,
                'name'         => isset($row['name']) ? $row['name'] : '',
                'string_value' => isset($row['string_value']) ? $row['string_value'] : null,
                'num_value'    => isset($row['num_value']) ? $row['num_value'] : null,
                'sorting'      => isset($row['sorting']) ? (int) $row['sorting'] : 0,
            );
        }

        return $grouped;
    }
}
