<?php
namespace StudioAtrium\Application;

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
    // Attachment
    // -----------------------------------------------------------------------

    public function getAttachmentDAO(): \Point7_CMS_Attachment_DAO_PDOMySQL
    {
        $dao = new \Point7_CMS_Attachment_DAO_PDOMySQL();
        $dao->configure('pdo_handle', $this->pdo());
        return $dao;
    }

    public function getAttachmentFinder(): \Point7_CMS_Attachment_DAO_PDOMySQL
    {
        return $this->getAttachmentDAO();
    }

    // -----------------------------------------------------------------------
    // Carousel
    // -----------------------------------------------------------------------

    public function getCarouselFinder(): \StudioAtrium\Entity\Carousel\Finder
    {
        return new \StudioAtrium\Entity\Carousel\Finder($this->pdo());
    }

    // -----------------------------------------------------------------------
    // Box
    // -----------------------------------------------------------------------

    public function getBoxFinder(): \StudioAtrium\Entity\Box\Finder
    {
        return new \StudioAtrium\Entity\Box\Finder($this->pdo());
    }

    // -----------------------------------------------------------------------
    // Document
    // -----------------------------------------------------------------------

    public function getDocumentFinder(): \StudioAtrium\Entity\Document\Finder
    {
        return new \StudioAtrium\Entity\Document\Finder($this->pdo());
    }

    // -----------------------------------------------------------------------
    // Discuss
    // -----------------------------------------------------------------------

    public function getDiscussFinder(): \StudioAtrium\Entity\Discuss\Post\Finder
    {
        return new \StudioAtrium\Entity\Discuss\Post\Finder($this->pdo());
    }

    // -----------------------------------------------------------------------
    // Project
    // -----------------------------------------------------------------------

    public function getProjectFinder(?string $clicksearchSets = null): \StudioAtrium\Entity\Project\Finder
    {
        return new \StudioAtrium\Entity\Project\Finder($this->pdo(), $clicksearchSets);
    }

    public function getProjectCategoryFinder(): \StudioAtrium\Entity\Project\Category\Finder
    {
        return new \StudioAtrium\Entity\Project\Category\Finder($this->pdo());
    }

    // -----------------------------------------------------------------------
    // Project params / sketch params (stubs for now — used by PDF module)
    // -----------------------------------------------------------------------

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

    // -----------------------------------------------------------------------
    // Settings
    // -----------------------------------------------------------------------

    public function getSettingsDAO(): \StudioAtrium\Entity\Settings\DAO
    {
        return new \StudioAtrium\Entity\Settings\DAO($this->pdo());
    }

    // -----------------------------------------------------------------------
    // Adwords
    // -----------------------------------------------------------------------

    public function getAdwordsClicksDAO(): \StudioAtrium\Entity\Adwords\Clicks\DAO
    {
        return new \StudioAtrium\Entity\Adwords\Clicks\DAO($this->pdo());
    }

    // -----------------------------------------------------------------------
    // User finder (used by Authenticate module)
    // -----------------------------------------------------------------------

    public function getUserFinder(): object
    {
        return $this->stub('User');
    }

    // -----------------------------------------------------------------------
    // Remaining stubs
    // -----------------------------------------------------------------------

    public function getBannerFinder(): object { return $this->stub('Banner'); }
    public function getHashTagFinder(): object { return $this->stub('HashTag'); }
    public function getProjectCommentFinder(): object { return $this->stub('ProjectComment'); }
    public function getProjectFeatureFinder(): object { return $this->stub('ProjectFeature'); }
    public function getProjectPromoNotifyFinder(): object { return $this->stub('ProjectPromoNotify'); }
    public function getContestFinder(): object { return $this->stub('Contest'); }
    public function getTransactionFinder(): object { return $this->stub('Transaction'); }
    public function getTransactionItemFinder(): object { return $this->stub('TransactionItem'); }
    public function getRepresentativeFinder(): object { return $this->stub('Representative'); }
    public function getNewsletterRecipientFinder(): object { return $this->stub('NewsletterRecipient'); }
    public function getDealerFinder(): object { return $this->stub('Dealer'); }
    public function getProjectFilesDownloadFinder(): object { return $this->stub('ProjectFilesDownload'); }
    public function getRenderAuthorizeFinder(): object { return $this->stub('RenderAuthorize'); }
    public function getSketchAuthorizeFinder(): object { return $this->stub('SketchAuthorize'); }
    public function getSelfieProjectsFinder(): object { return $this->stub('SelfieProjects'); }
    public function getShowroomProductFinder(): object { return $this->stub('ShowroomProduct'); }
    public function getCRMContactFinder(): object { return $this->stub('CRMContact'); }
    public function getDiscountFinder(): object { return $this->stub('Discount'); }
    public function getPromotionFinder(): object { return $this->stub('Promotion'); }
    public function getStatsFinder(): object { return $this->stub('Stats'); }
    public function getForumFinder(): object { return $this->stub('Forum'); }
    public function getProjectSimilarFinder(): object { return $this->stub('ProjectSimilar'); }
    public function getProjectExtrasListingFinder(): object { return $this->stub('ProjectExtrasListing'); }
    public function getHouseSituationFinder(): object { return $this->stub('HouseSituation'); }
    public function getHouseSituationRoomsFinder(): object { return $this->stub('HouseSituationRooms'); }
    public function getUserMessageFinder(): object { return $this->stub('UserMessage'); }

    private function stub(string $name): object
    {
        return new class($name) {
            public function __construct(private string $name) {}
            public function __call(string $method, array $args): never
            {
                throw new \RuntimeException(
                    "DAORepository::{$this->name} is a stub — entity class not yet built. Called method: {$method}()"
                );
            }
        };
    }
}
