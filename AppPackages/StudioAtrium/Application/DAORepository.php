<?php

/* $Id: DAORepository.php 741 2013-03-26 08:41:59Z lukasz $ */

namespace StudioAtrium\Application;

use StudioAtrium\Entity as Entities;

/**
 */
class DAORepository extends \Point7_WebApp_DAORepository
{
	/**
	 * @var \StudioAtrium\Entity\Attachment
	 */
	private $_attachmentFinder = null;
	
	/**
	 * @var \StudioAtrium\Entity\User\Finder
	 */
	private $_userFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Project\Finder
	 */
	private $_projectFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Project\Similiar\Finder
	 */
	private $_projectSimiliarFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Project\Comment\Finder
	 */
	private $_projectCommentFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Project\Param\Finder
	 */
	private $_projectParamFinder = null;


	/**
	 * @var \StudioAtrium\Entity\SketchParam\Finder
	 */
	private $_sketchParamFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Project\ToParam\Finder
	 */
	private $_projectToParamFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Project\Category\Finder
	 */
	private $_projectCategoryFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\Project\Promo\Finder
	 */
	private $_projectPromoNotifyFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Activity\Finder
	 */
	private $_activityFinder = null;


	/**
	 * @var \StudioAtrium\Entity\ParamTemplate\Finder
	 */
	private $_paramTemplateFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Transaction\Finder
	 */
	private $_transactionFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\Transaction\Builder
	 */
	private $_transactionBuilder = null;


	/**
	 * @var \StudioAtrium\Entity\Dealer\Finder
	 */
	private $_dealerFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Representative\Finder
	 */
	private $_representativeFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Adwords\Finder
	 */
	private $_adwordsFinder = null;


	/**
	 * @var \StudioAtrium\Entity\HouseSituation\Finder
	 */
	private $_houseSituationFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Carousel\Finder
	 */
	private $_carouselFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Document\Finder
	 */
	private $_documentFinder = null;


	/**
	 * @var \StudioAtrium\Entity\HashTag\Finder
	 */
	private $_hashTagFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\NewsletterRecipient\Finder
	 */
	private $_newsletterRecipientFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Box\Finder
	 */
	private $_boxFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Extras\Finder
	 */
	private $_extrasFinder = null;


	/**
	 * @var \StudioAtrium\Entity\User\Message\Finder
	 */
	private $_userMessageFinder = null;


	/**
	 * @var \StudioAtrium\Entity\Discount\Finder
	 */
	private $_discountFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\About\Finder
	 */
	private $_aboutFinder = null;
	
	/**
	 * @var \StudioAtrium\Entity\WolfClicks\Finder
	 */
	private $_wolfClicksFinder = null;
	
	/**
	 * @var \StudioAtrium\Entity\ForumArchive\Finder
	 */
	private $_forumArchiveFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\Banner\Finder
	 */
	private $_bannerFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\CatalogMailing\Finder
	 */
	private $_catalogMailingFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\Settings\Finder
	 */
	private $_settingsFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\Discuss\Finder
	 */
	private $_discussFinder = null;
	
	/**
	 * @var \StudioAtrium\Entity\Selfie\Finder
	 */
	private $_selfieFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\Project\Files\Finder
	 */
	private $_projectFilesFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\SketchAuthorize\Finder
	 */
	private $_sketchAuthorizeFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\ShowroomProduct\Finder
	 */
	private $_showroomFinder = null;
	
	
	/**
	 * @var \StudioAtrium\Entity\RenderAuthorize\Finder
	 */
	private $_renderAuthorizeFinder = null;
	

	/**
	 * Return Attachment DAO
	 *
	 * @return \Point7_CMS_Attachment_DAO_Interface
	 */
	public function getAttachmentDAO()
	{
		return $this->_getDAO('dao::attachment');
	}


	/**
	* Return default User DAO
	*
	* @return \StudioAtrium_Entity_User_DAO_Interface
	*/
	public function getUserDAO()
	{
		return $this->_getDAO('dao::user');
	}


	/**
	* Return default Project DAO
	*
	* @return \StudioAtrium_Entity_Project_DAO_Interface
	*/
	public function getProjectDAO()
	{
		return $this->_getDAO('dao::project');
	}

		/**
		 * Return default Project Category DAO
		 *
		 * @return \StudioAtrium_Entity_Project_Category_DAO_Interface
		 */
		public function getProjectCategoryDAO()
		{
			return $this->_getDAO('dao::project_category');
		}


		/**
		* Return default Project Param DAO
		*
		* @return \StudioAtrium_Entity_Project_Param_DAO_Interface
		*/
		public function getProjectParamDAO()
		{
			return $this->_getDAO('dao::project_param');
		}


		/**
		* Return default Project Feature DAO
		*
		* @return \StudioAtrium_Entity_Project_Feature_DAO_Interface
		*/
		public function getProjectFeatureDAO()
		{
			return $this->_getDAO('dao::project_feature');
		}


		/**
		 * Return default Project Similiar DAO
		 *
		 * @return \StudioAtrium_Entity_Project_Similiar_DAO_Interface
		 */
		public function getProjectSimiliarDAO()
		{
			return $this->_getDAO('dao::project_similiar');
		}


		/**
		 * Return default Project Comment DAO
		 *
		 * @return \StudioAtrium_Entity_Project_Comment_DAO_Interface
		 */
		public function getProjectCommentDAO()
		{
			return $this->_getDAO('dao::project_comment');
		}

		/**
		* Return default Project ToParam DAO
		*
		* @return \StudioAtrium_Entity_Project_ToParam_DAO_Interface
		*/
		public function getProjectToParamDAO()
		{
			return $this->_getDAO('dao::project_to_param');
		}


		/**
		* Return default Project ToSketchParam DAO
		*
		* @return \StudioAtrium_Entity_Project_ToSketchParam_DAO_Interface
		*/
		public function getProjectToSketchParamDAO()
		{
			return $this->_getDAO('dao::project_to_sketch_param');
		}


			/**
			* Return default Project Param Option DAO
			*
			* @return \StudioAtrium_Entity_Project_Param_Option_DAO_Interface
			*/
			public function getProjectParamOptionDAO()
			{
				return $this->_getDAO('dao::project_param_option');
			}


			/**
			* Return default Project Param Listing DAO
			*
			* @return \StudioAtrium_Entity_Project_Param_Listing_DAO_Interface
			*/
			public function getProjectParamListingDAO()
			{
				return $this->_getDAO('dao::project_param_listing');
			}
			
	
		/**
		 * Return default Project Files Download DAO
		 *
		 * @return \StudioAtrium_Entity_Project_Files_Download_DAO_Interface
		 */
		public function getProjectFilesDownloadDAO()
		{
			return $this->_getDAO('dao::project_files_download');
		}
		
		
		/**
		 * Return default Project promo Notify DAO
		 *
		 * @return \StudioAtrium_Entity_Project_Promo_Notify_DAO_Interface
		 */
		public function getProjectpromoNotifyDAO()
		{
		    return $this->_getDAO('dao::project_promo_notify');
		}


	/**
	 * Return default Sketch Param DAO
	 *
	 * @return \StudioAtrium_Entity_SketchParam_DAO_Interface
	 */
	public function getSketchParamDAO()
	{
		return $this->_getDAO('dao::sketch_param');
	}


	/**
	 * Return default Transaction DAO
	 *
	 * @return \StudioAtrium_Entity_Transaction_DAO_Interface
	 */
	public function getTransactionDAO()
	{
		return $this->_getDAO('dao::transaction');
	}


		/**
		 * Return default Transaction Item DAO
		 *
		 * @return \StudioAtrium_Entity_Transaction_Item_DAO_Interface
		 */
		public function getTransactionItemDAO()
		{
			return $this->_getDAO('dao::transaction_item');
		}


		/**
		 * Return default Transaction User DAO
		 *
		 * @return \StudioAtrium_Entity_Transaction_User_DAO_Interface
		 */
		public function getTransactionUserDAO()
		{
			return $this->_getDAO('dao::transaction_user');
		}


	/**
	* Return default Activity DAO
	*
	* @return \StudioAtrium_Entity_Activity_DAO_Interface
	*/
	public function getActivityDAO()
	{
		return $this->_getDAO('dao::activity');
	}


	/**
	* Return default External DAO
	*
	* @return \StudioAtrium_Entity_External_DAO_Interface
	*/
	public function getExternalDAO()
	{
		return $this->_getDAO('dao::external');
	}


	/**
	 * Return default Param Template DAO
	 *
	 * @return \StudioAtrium_Entity_ParamTemplate_DAO_Interface
	 */
	public function getParamTemplateDAO()
	{
		return $this->_getDAO('dao::param_template');
	}


	/**
	 * Return default Dealer DAO
	 *
	 * @return \StudioAtrium_Entity_Dealer_DAO_Interface
	 */
	public function getDealerDAO()
	{
		return $this->_getDAO('dao::dealer');
	}

	/**
	 * Return default Representative DAO
	 *
	 * @return \StudioAtrium_Entity_Representative_DAO_Interface
	 */
	public function getRepresentativeDAO()
	{
		return $this->_getDAO('dao::representative');
	}


	/**
	 * Return default Adwords Campaigns DAO
	 *
	 * @return \StudioAtrium_Entity_Adwords_Campaigns_DAO_Interface
	 */
	public function getAdwordsCampaignsDAO()
	{
		return $this->_getDAO('dao::adwords_campaigns');
	}


	/**
	 * Return default Adwords Clicks DAO
	 *
	 * @return \StudioAtrium_Entity_Adwords_Clicks_DAO_Interface
	 */
	public function getAdwordsClicksDAO()
	{
		return $this->_getDAO('dao::adwords_clicks');
	}

	/**
	 * Return default Adwords Sales DAO
	 *
	 * @return \StudioAtrium_Entity_Adwords_Sales_DAO_Interface
	 */
	public function getAdwordsSalesDAO()
	{
		return $this->_getDAO('dao::adwords_sales');
	}


	/**
	 * Return default Selfie Projects DAO
	 *
	 * @return \StudioAtrium_Entity_Selfie_Projects_DAO_Interface
	 */
	public function getSelfieProjectsDAO()
	{
		return $this->_getDAO('dao::selfie_projects');
	}

	/**
	 * Return default Selfie Types DAO
	 *
	 * @return \StudioAtrium_Entity_Selfie_Types_DAO_Interface
	 */
	public function getSelfieTypesDAO()
	{
		return $this->_getDAO('dao::selfie_types');
	}

	/**
	 * Return default House Situation DAO
	 *
	 * @return \StudioAtrium_Entity_HouseSituation_DAO_Interface
	 */
	public function getHouseSituationDAO()
	{
		return $this->_getDAO('dao::house_situation');
	}

	/**
	 * Return default HouseSituation Rooms DAO
	 *
	 * @return \StudioAtrium_Entity_HouseSituation_Rooms_DAO_Interface
	 */
	public function getHouseSituationRoomsDAO()
	{
		return $this->_getDAO('dao::house_situation_rooms');
	}

	/**
	 * Return default Carousel DAO
	 *
	 * @return \StudioAtrium_Entity_Carousel_DAO_Interface
	 */
	public function getCarouselDAO()
	{
		return $this->_getDAO('dao::carousel');
	}

	/**
	 * Return default Document DAO
	 *
	 * @return \StudioAtrium_Entity_Document_DAO_Interface
	 */
	public function getDocumentDAO()
	{
		return $this->_getDAO('dao::document');
	}

	/**
	 * Return default Document_ToHashTag DAO
	 *
	 * @return \StudioAtrium_Entity_Document_ToHashTag_DAO_Interface
	 */
	public function getDocumentToHashTagDAO()
	{
		return $this->_getDAO('dao::document_to_hash_tag');
	}

	/**
	 * Return default HashTag DAO
	 *
	 * @return \StudioAtrium_Entity_HashTag_DAO_Interface
	 */
	public function getHashTagDAO()
	{
		return $this->_getDAO('dao::hash_tag');
	}
	
	
	/**
	 * Return default NewsletterRecipient DAO
	 *
	 * @return \StudioAtrium_Entity_NewsletterRecipient_DAO_Interface
	 */
	public function getNewsletterRecipientDAO()
	{
		return $this->_getDAO('dao::newsletter_recipient');
	}
	
	
	/**
	 * Return default Box DAO
	 *
	 * @return \StudioAtrium_Entity_Box_DAO_Interface
	 */
	public function getBoxDAO()
	{
		return $this->_getDAO('dao::box');
	}
	
	
	/**
	 * Return default Extras DAO
	 *
	 * @return \StudioAtrium_Entity_Extras_DAO_Interface
	 */
	public function getExtrasDAO()
	{
		return $this->_getDAO('dao::extras');
	}
	
	
	/**
	 * Return default Extras Listing DAO
	 *
	 * @return \StudioAtrium_Entity_Extras_Listing_DAO_Interface
	 */
	public function getExtrasListingDAO()
	{
		return $this->_getDAO('dao::extras_listing');
	}
	
	
	/**
	 * Return default User message DAO
	 *
	 * @return \StudioAtrium_Entity_User_Message_DAO_Interface
	 */
	public function getUserMessageDAO()
	{
		return $this->_getDAO('dao::user_message');
	}
	
	
	/**
	 * Return default Discount DAO
	 *
	 * @return \StudioAtrium_Entity_Discount_DAO_Interface
	 */
	public function getDiscountDAO()
	{
		return $this->_getDAO('dao::discount');
	}
	
	
	/**
	 * Return default About DAO
	 *
	 * @return \StudioAtrium_Entity_About_DAO_Interface
	 */
	public function getAboutDAO()
	{
		return $this->_getDAO('dao::about');
	}
	
		/**
		 * Return default About Gallery DAO
		 *
		 * @return \StudioAtrium_Entity_About_Gallery_DAO_Interface
		 */
		public function getAboutGalleryDAO()
		{
			return $this->_getDAO('dao::about_gallery');
		}
		
		
	/**
	 * Return default WolfClicks DAO
	 *
	 * @return \StudioAtrium_Entity_WolfClicks_DAO_Interface
	 */
	public function getWolfClicksDAO()
	{
		return $this->_getDAO('dao::wolf_clicks');
	}
	
	/**
	 * Return default ForumArchive DAO
	 *
	 * @return \StudioAtrium_Entity_ForumArchive_Post_DAO_Interface
	 */
	public function getForumArchiveDAO()
	{
		return $this->_getDAO('dao::forum_archive');
	}
	
	
	/**
	 * Return default Transaction Phone DAO
	 *
	 * @return \StudioAtrium_Entity_Transaction_Phone_DAO_Interface
	 */
	public function getTransactionPhoneDAO()
	{
		return $this->_getDAO('dao::transaction_phone');
	}
	
	/**
	 * Return default Contest DAO
	 *
	 * @return \StudioAtrium_Entity_Contest_DAO_Interface
	 */
	public function getContestDAO()
	{
		return $this->_getDAO('dao::contest');
	}
	
	/**
	 * Return default Banner DAO
	 *
	 * @return \StudioAtrium_Entity_Banner_DAO_Interface
	 */
	public function getBannerDAO()
	{
		return $this->_getDAO('dao::banner');
	}
	
	
	/**
	 * Return default CatalogMailing DAO
	 *
	 * @return \StudioAtrium_Entity_CatalogMailing_DAO_Interface
	 */
	public function getCatalogMailingDAO()
	{
		return $this->_getDAO('dao::catalog_mailing');
	}
	
	
	/**
	 * Return default Settings DAO
	 *
	 * @return \StudioAtrium_Entity_Settings_DAO_Interface
	 */
	public function getSettingsDAO()
	{
		return $this->_getDAO('dao::settings');
	}
	
	
	/**
	 * Return default DiscussPost DAO
	 *
	 * @return \StudioAtrium_Entity_Discuss_Post_DAO_Interface
	 */
	public function getDiscussPostDAO()
	{
		return $this->_getDAO('dao::discuss_post');
	}
	
	/**
	 * Return default DiscussNotify DAO
	 *
	 * @return \StudioAtrium_Entity_Discuss_Notify_DAO_Interface
	 */
	public function getDiscussNotifyDAO()
	{
		return $this->_getDAO('dao::discuss_notify');
	}
	
	
	/**
	 * Return default DiscussMessage DAO
	 *
	 * @return \StudioAtrium_Entity_Discuss_Message_DAO_Interface
	 */
	public function getDiscussMessageDAO()
	{
		return $this->_getDAO('dao::discuss_message');
	}
	
	
	/**
	 * Return default Promotion DAO
	 *
	 * @return \StudioAtrium_Entity_Promotion_DAO_Interface
	 */
	public function getPromotionDAO()
	{
		return $this->_getDAO('dao::promotion');
	}
	
	
	/**
	 * Return default Stats DAO
	 *
	 * @return \StudioAtrium_Entity_Promotion_DAO_Interface
	 */
	public function getStatsDAO()
	{
		return $this->_getDAO('dao::stats');
	}
	
	
	/**
	 * Return default SketchAuthorize DAO
	 *
	 * @return \StudioAtrium_Entity_SketchAuthorize_DAO_Interface
	 */
	public function getSketchAuthorizeDAO()
	{
		return $this->_getDAO('dao::sketch_authorize');
	}
	
	
	/**
	 * Return default SketchAuthorize Rooms DAO
	 *
	 * @return \StudioAtrium_Entity_SketchAuthorize_Rooms_DAO_Interface
	 */
	public function getSketchAuthorizeRoomsDAO()
	{
		return $this->_getDAO('dao::sketch_authorize_rooms');
	}

	
	/**
	 * Return default CRM_Contact DAO
	 *
	 * @return \StudioAtrium_Entity_CRM_Contact_DAO_Interface
	 */
	public function getCRMContactDAO()
	{
		return $this->_getDAO('dao::crm_contact');
	}

	
	/**
	 * Return default CRM_Conversation DAO
	 *
	 * @return \StudioAtrium_Entity_CRM_Conversation_DAO_Interface
	 */
	public function getCRMConversationDAO()
	{
		return $this->_getDAO('dao::crm_conversation');
	}

	
	/**
	 * Return default CRM_Notes DAO
	 *
	 * @return \StudioAtrium_Entity_CRM_Notes_DAO_Interface
	 */
	public function getCRMNotesDAO()
	{
		return $this->_getDAO('dao::crm_notes');
	}

	
	/**
	 * Return default Marketing DAO
	 *
	 * @return \StudioAtrium_Entity_Marketing_DAO_Interface
	 */
	public function getMarketingDAO()
	{
		return $this->_getDAO('dao::marketing');
	}
	
	
	/**
	 * Return default Showroom DAO
	 *
	 * @return \StudioAtrium_Entity_ShowroomProduct_DAO_Interface
	 */
	public function getShowroomDAO()
	{
	    return $this->_getDAO('dao::showroom');
	}
	
	
	/**
	 * Return default Render Authorize DAO
	 *
	 * @return \StudioAtrium_Entity_RenderAuthorize_DAO_Interface
	 */
	public function getRenderAuthorizeDAO()
	{
	    return $this->_getDAO('dao::render_authorize');
	}


	/**
	 * Return attachment Finder
	 *
	 * @return \StudioAtrium\Entity\Attachment\Finder
	 */
	public function getAttachmentFinder()
	{
 		if (is_null($this->_attachmentFinder)) {
			$this->_attachmentFinder = new Entities\Attachment\Finder($this->getAttachmentDAO());
		}
		return $this->_attachmentFinder;
	}


	/**
	 * Return user Finder
	 *
	 * @return \StudioAtrium\Entity\User\Finder
	 */
	public function getUserFinder()
	{
 		if (is_null($this->_userFinder)) {
			$this->_userFinder = new Entities\User\Finder();
			$this->_userFinder->configure(array(
				'dao_user' => $this->getUserDAO()
			));
		}
		return $this->_userFinder;
	}


	/**
	 * Return project Finder
	 *
	 * @return \StudioAtrium\Entity\Project\Finder
	 */
	public function getProjectFinder($clickSearchPath)
	{
 		if (is_null($this->_projectFinder)) {
			$this->_projectFinder = new Entities\Project\Finder($this->getPDO(), $clickSearchPath);
		}
		return $this->_projectFinder;
	}


	/**
	 * Return project similiar Finder
	 *
	 * @return \StudioAtrium\Entity\Project\Similiar\Finder
	 */
	public function getProjectSimiliarFinder()
	{
		if (is_null($this->_projectSimiliarFinder)) {
			$this->_projectSimiliarFinder = new Entities\Project\Similiar\Finder();
			$this->_projectSimiliarFinder->configure(array(
					'dao_project_similiar' => $this->getProjectSimiliarDAO()
			));
		}
		return $this->_projectSimiliarFinder;
	}


	/**
	 * Return project param Finder
	 *
	 * @return \StudioAtrium\Entity\Project\Param\Finder
	 */
	public function getProjectParamFinder()
	{
 		if (is_null($this->_projectParamFinder)) {
			$this->_projectParamFinder = new Entities\Project\Param\Finder();
			$this->_projectParamFinder->configure(array(
				'dao_project_param' => $this->getProjectParamDAO(),
				'dao_project_param_option' => $this->getProjectParamOptionDAO(),
				'dao_project_param_listing' => $this->getProjectParamListingDAO()
			));
		}
		return $this->_projectParamFinder;
	}


	/**
	 * Return project category Finder
	 *
	 * @return \StudioAtrium\Entity\Project\Category\Finder
	 */
	public function getProjectCategoryFinder()
	{
 		if (is_null($this->_projectCategoryFinder)) {
			$this->_projectCategoryFinder = new Entities\Project\Category\Finder($this->getPDO());
		}
		return $this->_projectCategoryFinder;
	}


	/**
	 * Return activity Finder
	 *
	 * @return \StudioAtrium\Entity\Activity\Finder
	 */
	public function getActivityFinder()
	{
 		if (is_null($this->_activityFinder)) {
			$this->_activityFinder = new Entities\Activity\Finder();
			$this->_activityFinder->configure(array(
				'dao_activity' => $this->getActivityDAO(),
				'dao_user' => $this->getUserDAO()
			));
		}
		return $this->_activityFinder;
	}


	/**
	 * Return param template Finder
	 *
	 * @return \StudioAtrium\Entity\ParamTemplate\Finder
	 */
	public function getParamTemplateFinder()
	{
		if (is_null($this->_paramTemplateFinder)) {
			$this->_paramTemplateFinder = new Entities\ParamTemplate\Finder();
			$this->_paramTemplateFinder->configure(array(
					'dao_param_template' => $this->getParamTemplateDAO()
			));
		}
		return $this->_paramTemplateFinder;
	}


	/**
	 * Return transaction Finder
	 *
	 * @return \StudioAtrium\Entity\Transaction\Finder
	 */
	public function getTransactionFinder()
	{
		if (is_null($this->_transactionFinder)) {
			$this->_transactionFinder = new Entities\Transaction\Finder();
			$this->_transactionFinder->configure(array(
					'dao_transaction' => $this->getTransactionDAO(),
					'dao_transaction_item' => $this->getTransactionItemDAO(),
					'dao_transaction_user' => $this->getTransactionUserDAO()
			));
		}
		return $this->_transactionFinder;
	}
	
	/**
	 * Return Transaction Builder
	 *
	 * @return \StudioAtrium\Entity\Transaction\Builder
	 */
	public function getTransactionBuilder()
	{
		if (is_null($this->_transactionBuilder)) {
			$this->_transactionBuilder = new Entities\Transaction\Builder();
			$this->_transactionBuilder->configure(array(
					'dao_transaction' => $this->getTransactionDAO(),
					'dao_user' => $this->getTransactionUserDAO(),
					'dao_item' => $this->getTransactionItemDAO()
			));
		}
		return $this->_transactionBuilder;
	}



	/**
	 * Return param template Finder
	 *
	 * @return \StudioAtrium\Entity\Project\ToParam\Finder
	 */
	public function getProjectToParamFinder()
	{
		if (is_null($this->_projectToParamFinder)) {
			$this->_projectToParamFinder = new Entities\Project\ToParam\Finder();
			$this->_projectToParamFinder->configure(array(
					'dao_project_to_param' => $this->getProjectToParamDAO()
			));
		}
		return $this->_projectToParamFinder;
	}


	/**
	 * Return sketch param Finder
	 *
	 * @return \StudioAtrium\Entity\SketchParam\Finder
	 */
	public function getSketchParamFinder()
	{
		if (is_null($this->_sketchParamFinder)) {
			$this->_sketchParamFinder = new Entities\SketchParam\Finder();
			$this->_sketchParamFinder->configure(array(
				'dao_sketch_param' => $this->getSketchParamDAO(),
				'dao_project_to_sketch_param' => $this->getProjectToSketchParamDAO()
			));
		}
		return $this->_sketchParamFinder;
	}


	/**
	 * Return project comment Finder
	 *
	 * @return \StudioAtrium\Entity\Project\Comment\Finder
	 */
	public function getProjectCommentFinder()
	{
		if (is_null($this->_projectCommentFinder)) {
			$this->_projectCommentFinder = new Entities\Project\Comment\Finder();
			$this->_projectCommentFinder->configure(array(
					'dao_project_comment' => $this->getProjectCommentDAO(),
					'dao_project' => $this->getProjectDAO(),
					'dao_user' => $this->getUserDAO(),
					'dao_attachments' => $this->getAttachmentDAO()
			));
		}
		return $this->_projectCommentFinder;
	}

	/**
	 * Return dealer Finder
	 *
	 * @return \StudioAtrium\Entity\Dealer\Finder
	 */
	public function getDealerFinder()
	{
		if (is_null($this->_dealerFinder)) {
			$this->_dealerFinder = new Entities\Dealer\Finder();
			$this->_dealerFinder->configure(array(
					'dao_dealer' => $this->getDealerDAO()
			));
		}
		return $this->_dealerFinder;
	}


	/**
	 * Return representative Finder
	 *
	 * @return \StudioAtrium\Entity\Representative\Finder
	 */
	public function getRepresentativeFinder()
	{
		if (is_null($this->_representativeFinder)) {
			$this->_representativeFinder = new Entities\Representative\Finder();
			$this->_representativeFinder->configure(array(
					'dao_representative' => $this->getRepresentativeDAO(),
					'dao_attachments' => $this->getAttachmentDAO()
					
			));
		}
		return $this->_representativeFinder;
	}


	/**
	 * Return adwords Finder
	 *
	 * @return \StudioAtrium\Entity\Adwords\Finder
	 */
	public function getAdwordsFinder()
	{
		if (is_null($this->_adwordsFinder)) {
			$this->_adwordsFinder = new Entities\Adwords\Finder();
			$this->_adwordsFinder->configure(array(
					'dao_adwords_campaigns' => $this->getAdwordsCampaignsDAO()
			));
		}
		return $this->_adwordsFinder;
	}


	/**
	 * Return App House Situation Finder
	 *
	 * @return \StudioAtrium\Entity\HouseSituation\Finder
	 */
	public function getHouseSituationFinder()
	{
		if (is_null($this->_houseSituationFinder)) {
			$this->_houseSituationFinder = new Entities\HouseSituation\Finder();
			$this->_houseSituationFinder->configure(array(
					'dao_house_situation' => $this->getHouseSituationDAO(),
					'dao_house_situation_rooms' => $this->getHouseSituationRoomsDAO()
			));
		}
		return $this->_houseSituationFinder;
	}


	/**
	 * Return Carousel Finder
	 *
	 * @return \StudioAtrium\Entity\Carousel\Finder
	 */
	public function getCarouselFinder()
	{
		if (is_null($this->_carouselFinder)) {
			$this->_carouselFinder = new Entities\Carousel\Finder($this->getPDO());
		}
		return $this->_carouselFinder;
	}


	/**
	 * Return Document Finder
	 *
	 * @return \StudioAtrium\Entity\Document\Finder
	 */
	public function getDocumentFinder()
	{
		if (is_null($this->_documentFinder)) {
			$this->_documentFinder = new Entities\Document\Finder($this->getPDO());
		}
		return $this->_documentFinder;
	}


	/**
	 * Return HashTag Finder
	 *
	 * @return \StudioAtrium\Entity\HashTag\Finder
	 */
	public function getHashTagFinder()
	{
		if (is_null($this->_hashTagFinder)) {
			// getHashTagDAO()/getDocumentToHashTagDAO() route through the old
			// _getDAO('dao::...') + DaoRegistry.include.xml + PDOMySQL-class
			// machinery, but StudioAtrium\Entity\HashTag\DAO\PDOMySQL and
			// StudioAtrium\Entity\Document\ToHashTag\DAO\PDOMySQL were never
			// written - same gap as getExtrasFinder() below. Built directly on
			// PDO instead, matching getDocumentFinder()'s pattern.
			$this->_hashTagFinder = new Entities\HashTag\Finder($this->getPDO());
		}
		return $this->_hashTagFinder;
	}
	
	
	/**
	 * Return NewsletterRecipient Finder
	 *
	 * @return \StudioAtrium\Entity\NewsletterRecipient\Finder
	 */
	public function getNewsletterRecipientFinder()
	{
		if (is_null($this->_newsletterRecipientFinder)) {
			$this->_newsletterRecipientFinder = new Entities\NewsletterRecipient\Finder();
			$this->_newsletterRecipientFinder->configure(array(
					'dao_newsletter_recipient' => $this->getNewsletterRecipientDAO()
			));
		}
		return $this->_newsletterRecipientFinder;
	}
	
	
	/**
	 * Return Box Finder
	 *
	 * @return \StudioAtrium\Entity\Box\Finder
	 */
	public function getBoxFinder()
	{
		if (is_null($this->_boxFinder)) {
			$this->_boxFinder = new Entities\Box\Finder($this->getPDO());
		}
		return $this->_boxFinder;
	}
	
	
	/**
	 * Return Extras Finder
	 *
	 * @return \StudioAtrium\Entity\Extras\Finder
	 */
	public function getExtrasFinder()
	{
		if (is_null($this->_extrasFinder)) {
			// getExtrasDAO()/getExtrasListingDAO() go through _getDAO('dao::extras')
			// et al, which need StudioAtrium\Entity\Extras\DAO\PDOMySQL classes that
			// were never written during the rewrite. Built directly on PDO instead,
			// matching getDocumentFinder()'s pattern.
			$this->_extrasFinder = new Entities\Extras\Finder($this->getPDO());
		}
		return $this->_extrasFinder;
	}
	
	
	/**
	 * Return User Message Finder
	 *
	 * @return \StudioAtrium\Entity\User\Message\Finder
	 */
	public function getUserMessageFinder()
	{
		if (is_null($this->_userMessageFinder)) {
			$this->_userMessageFinder = new Entities\User\Message\Finder();
			$this->_userMessageFinder->configure(array(
					'dao_user_message' => $this->getUserMessageDAO(),
					'dao_user' => $this->getUserDAO(),
					'dao_project' => $this->getProjectDAO(),
					'dao_attachments' => $this->getAttachmentDAO()
			));
		}
		return $this->_userMessageFinder;
	}
	
	
	/**
	 * Return Discount Finder
	 *
	 * @return \StudioAtrium\Entity\Discount\Finder
	 */
	public function getDiscountFinder()
	{
		if (is_null($this->_discountFinder)) {
			$this->_discountFinder = new Entities\Discount\Finder();
			$this->_discountFinder->configure(array(
					'dao_discount' => $this->getDiscountDAO()
			));
		}
		return $this->_discountFinder;
	}
	
	
	/**
	 * Return About Finder
	 *
	 * @return \StudioAtrium\Entity\About\Finder
	 */
	public function getAboutFinder()
	{
		if (is_null($this->_aboutFinder)) {
			$this->_aboutFinder = new Entities\About\Finder();
			$this->_aboutFinder->configure(array(
					'dao_about' => $this->getAboutDAO(),
					'dao_about_gallery' => $this->getAboutGalleryDAO()
			));
		}
		return $this->_aboutFinder;
	}
	
	
	/**
	 * Return WolfClicks Finder
	 *
	 * @return \StudioAtrium\Entity\WolfClicks\Finder
	 */
	public function getWolfClicksFinder()
	{
		if (is_null($this->_wolfClicksFinder)) {
			$this->_wolfClicksFinder = new Entities\WolfClicks\Finder();
			$this->_wolfClicksFinder->configure(array(
					'dao_wolf_clicks' => $this->getWolfClicksDAO()
			));
		}
		return $this->_wolfClicksFinder;
	}
	
	/**
	 * Return ForumArchive Finder
	 *
	 * @return \StudioAtrium\Entity\ForumArchive\Finder
	 */
	public function getForumArchiveFinder()
	{
		if (is_null($this->_forumArchiveFinder)) {
			$this->_forumArchiveFinder = new Entities\ForumArchive\Finder();
			$this->_forumArchiveFinder->configure(array(
				'dao_forum_archive' => $this->getForumArchiveDAO(),
				'dao_project' => $this->getProjectDAO()
			));
		}
		return $this->_forumArchiveFinder;
	}
	
	
	/**
	 * Return Banner Finder
	 *
	 * @return \StudioAtrium\Entity\Banner\Finder
	 */
	public function getBannerFinder()
	{
		if (is_null($this->_bannerFinder)) {
			$this->_bannerFinder = new Entities\Banner\Finder();
			$this->_bannerFinder->configure(array(
					'dao_banner' => $this->getBannerDAO()
			));
		}
		return $this->_bannerFinder;
	}
	
	
	/**
	 * Return Catalog Mailing Finder
	 *
	 * @return \StudioAtrium\Entity\CatalogMailing\Finder
	 */
	public function getCatalogMailingFinder()
	{
		if (is_null($this->_catalogMailingFinder)) {
			$this->_catalogMailingFinder = new Entities\CatalogMailing\Finder();
			$this->_catalogMailingFinder->configure(array(
					'dao_catalog_mailing' => $this->getCatalogMailingDAO()
			));
		}
		return $this->_catalogMailingFinder;
	}
	
	/**
	 * Return Settings Finder
	 *
	 * @return \StudioAtrium\Entity\Settings\Finder
	 */
	public function getSettingsFinder()
	{
		if (is_null($this->_settingsFinder)) {
			$this->_settingsFinder = new Entities\Settings\Finder($this->getPDO());
		}
		return $this->_settingsFinder;
	}
	
	
	/**
	 * Return Discuss Finder
	 *
	 * @return \StudioAtrium\Entity\Discuss\Finder
	 */
	public function getDiscussFinder()
	{
		if (is_null($this->_discussFinder)) {
			// NOTE: Entities\Discuss\Finder was never built; Entities\Discuss\Post\Finder
			// implements the only method callers currently use (getLastPosts()).
			$this->_discussFinder = new Entities\Discuss\Post\Finder($this->getPDO());
		}
		return $this->_discussFinder;
	}
	
	
	/**
	 * Return Selfie Finder
	 *
	 * @return \StudioAtrium\Entity\Selfie\Finder
	 */
	public function getSelfieFinder()
	{
		if (is_null($this->_selfieFinder)) {
			$this->_selfieFinder = new Entities\Selfie\Finder();
			$this->_selfieFinder->configure(array(
				'dao_selfie_projects' => $this->getSelfieProjectsDAO(),
				'dao_project' => $this->getProjectDAO()
			));
		}
		return $this->_selfieFinder;
	}
	
	
	/**
	 * Return Project Files Finder
	 *
	 * @return \StudioAtrium\Entity\Project\Files\Finder
	 */
	public function getProjectFilesFinder()
	{
		if (is_null($this->_projectFilesFinder)) {
			$this->_projectFilesFinder = new Entities\Project\Files\Finder();
			$this->_projectFilesFinder->configure(array(
				'dao_project_files_download' => $this->getProjectFilesDownloadDAO(),
				'dao_project' => $this->getProjectDAO()
			));
		}
		return $this->_projectFilesFinder;
	}
	
	
	/**
	 * Return Sketch Authorize Finder
	 *
	 * @return \StudioAtrium\Entity\SketchAuthorize\Finder
	 */
	public function getSketchAuthorizeFinder()
	{
		if (is_null($this->_sketchAuthorizeFinder)) {
			$this->_sketchAuthorizeFinder = new Entities\SketchAuthorize\Finder();
			$this->_sketchAuthorizeFinder->configure(array(
				'dao_sketch_authorize' => $this->getSketchAuthorizeDAO(),
				'dao_sketch_authorize_rooms' => $this->getSketchAuthorizeRoomsDAO(),
			));
		}
		return $this->_sketchAuthorizeFinder;
	}
	
	/**
	 * Return Sketch Authorize Finder
	 *
	 * @return \StudioAtrium\Entity\Project\Promo\Finder
	 */
	public function getProjectPromoNotifyFinder()
	{
	    if (is_null($this->_projectPromoNotifyFinder)) {
	        $this->_projectPromoNotifyFinder = new Entities\Project\Promo\Finder();
	        $this->_projectPromoNotifyFinder->configure(array(
	            'dao_project_promo_notify' => $this->getProjectpromoNotifyDAO(),
	            'dao_project' => $this->getProjectDAO()
	        ));
	    }
	    return $this->_projectPromoNotifyFinder;
	}
	
	
	/**
	 * Return Showroom Finder
	 *
	 * @return \StudioAtrium\Entity\ShowroomProduct\Finder
	 */
	public function getShowroomFinder()
	{	    
	    if (is_null($this->_showroomFinder)) {
	        $this->_showroomFinder = new Entities\ShowroomProduct\Finder();
	        $this->_showroomFinder->configure(array(
	            'dao_showroom' => $this->getShowroomDAO(),
	            'dao_attachments' => $this->getAttachmentDAO()
	        ));
	    }
	    return $this->_showroomFinder;
	}
	
	
	/**
	 * Return Showroom Finder
	 *
	 * @return \StudioAtrium\Entity\RenderAuthorize\Finder
	 */
	public function getRenderAuthorizeFinder()
	{
	    if (is_null($this->_renderAuthorizeFinder)) {
	        $this->_renderAuthorizeFinder = new Entities\RenderAuthorize\Finder();
	        $this->_renderAuthorizeFinder->configure(array(
	            'dao_render_authorize' => $this->getRenderAuthorizeDAO()
	        ));
	    }
	    return $this->_renderAuthorizeFinder;
	}
}