<?php
namespace StudioAtrium\Entity\Project\ToParam;

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

    public function getParamsForProject($projectId)
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM project_to_param WHERE project_id = :project_id ORDER BY project_param_id ASC'
        );
        $stmt->execute(array(':project_id' => (int) $projectId));
        $rows = $stmt->fetchAll();

        $items = array();
        foreach ($rows as $row) {
            $items[] = new Value($row);
        }

        return new EntityCollection($items);
    }

    public function getParamForProject($projectId, $paramId)
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM project_to_param
             WHERE project_id = :project_id AND project_param_id = :project_param_id
             LIMIT 1'
        );
        $stmt->execute(array(
            ':project_id' => (int) $projectId,
            ':project_param_id' => (int) $paramId,
        ));
        $row = $stmt->fetch();
        return $row ? new Value($row) : null;
    }
}
