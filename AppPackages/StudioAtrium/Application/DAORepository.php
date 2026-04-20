<?php
namespace StudioAtrium\Application;

/**
 * Central DAO facade.
 *
 * Each getXxxFinder() / getXxxDAO() method returns the corresponding DAO object.
 * Methods are populated as entity classes are built.  Any not-yet-built method
 * returns a NullDAO that throws a descriptive RuntimeException on first use.
 */
class DAORepository
{
    private ?\PDO $pdo;

    public function __construct(?\PDO $pdo = null)
    {
        $this->pdo = $pdo;
    }

    private function pdo(): \PDO
    {
        if (!$this->pdo) {
            throw new \RuntimeException('No PDO connection available in DAORepository.');
        }
        return $this->pdo;
    }

    // -----------------------------------------------------------------------
    // Built-in Point7 attachment DAO
    // -----------------------------------------------------------------------

    public function getAttachmentDAO(): \Point7_CMS_Attachment_DAO_PDOMySQL
    {
        $dao = new \Point7_CMS_Attachment_DAO_PDOMySQL();
        $dao->configure('pdo_handle', $this->pdo());
        return $dao;
    }

    /** Alias used by some modules as $this->_daoRepository->getAttachmentFinder() */
    public function getAttachmentFinder(): \Point7_CMS_Attachment_DAO_PDOMySQL
    {
        return $this->getAttachmentDAO();
    }

    // -----------------------------------------------------------------------
    // Entity DAOs — stub until entity classes are built
    // Each method below will be replaced when the corresponding Entity is ready.
    // -----------------------------------------------------------------------

    public function getAdwordsClicksDAO(): object
    {
        return $this->stub('AdwordsClicks');
    }

    public function getUserFinder(): object
    {
        return $this->stub('User');
    }

    public function getProjectFinder(?string $clicksearchSets = null): object
    {
        return $this->stub('Project');
    }

    public function getProjectCategoryFinder(): object
    {
        return $this->stub('ProjectCategory');
    }

    public function getProjectParamFinder(): object
    {
        return $this->stub('ProjectParam');
    }

    public function getProjectToParamFinder(): object
    {
        return $this->stub('ProjectToParam');
    }

    public function getSketchParamFinder(): object
    {
        return $this->stub('SketchParam');
    }

    public function getExtrasFinder(): object
    {
        return $this->stub('Extras');
    }

    public function getCarouselFinder(): object
    {
        return $this->stub('Carousel');
    }

    public function getBoxFinder(): object
    {
        return $this->stub('Box');
    }

    public function getDocumentFinder(): object
    {
        return $this->stub('Document');
    }

    public function getDiscussFinder(): object
    {
        return $this->stub('Discuss');
    }

    public function getSettingsDAO(): object
    {
        return $this->stub('Settings');
    }

    public function getOrderDAO(): object
    {
        return $this->stub('Order');
    }

    public function getTransactionDAO(): object
    {
        return $this->stub('Transaction');
    }

    public function getFavouriteDAO(): object
    {
        return $this->stub('Favourite');
    }

    public function getSelfieDAO(): object
    {
        return $this->stub('Selfie');
    }

    // -----------------------------------------------------------------------

    private function stub(string $name): object
    {
        return new class($name) {
            public function __construct(private string $dao) {}
            public function __call(string $method, array $args): mixed
            {
                throw new \RuntimeException(
                    "DAORepository::{$this->dao} is a stub — entity class not yet built. " .
                    "Called method: {$method}()"
                );
            }
        };
    }
}
