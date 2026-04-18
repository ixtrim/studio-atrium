<?php
/**
 * Point7_WebApp_DAORepository — base class for app-level DAO repositories.
 *
 * Subclasses (e.g. \StudioAtrium\Application\DAORepository) expose
 * getXxxDAO() methods that call $this->_getDAO('dao::key'). This base
 * class resolves those keys to concrete DAO instances and caches them.
 */
abstract class Point7_WebApp_DAORepository
{
    private array $daoInstances = [];

    public function __construct(private ?PDO $pdo = null)
    {
    }

    public function getPDO(): ?PDO
    {
        return $this->pdo;
    }

    /**
     * Resolve and cache a DAO instance by its 'dao::key' identifier.
     * Add a case here once the corresponding Entity DAO class exists.
     */
    protected function _getDAO(string $key): mixed
    {
        if (isset($this->daoInstances[$key])) {
            return $this->daoInstances[$key];
        }

        $dao = match ($key) {
            'dao::attachment' => $this->buildAttachmentDAO(),
            'dao::settings' => new \StudioAtrium\Entity\Settings\DAO($this->pdo),
            'dao::adwords_clicks' => new \StudioAtrium\Entity\Adwords\Clicks\DAO($this->pdo),
            default => null,
        };

        if ($dao === null) {
            throw new \RuntimeException(
                "DAO not implemented yet for key '{$key}'. Add a case to " .
                "Point7_WebApp_DAORepository::_getDAO() once the corresponding " .
                "Entity DAO class exists."
            );
        }

        return $this->daoInstances[$key] = $dao;
    }

    private function buildAttachmentDAO(): Point7_CMS_Attachment_DAO_PDOMySQL
    {
        $dao = new Point7_CMS_Attachment_DAO_PDOMySQL();
        $dao->configure('pdo_handle', $this->pdo);
        return $dao;
    }
}
