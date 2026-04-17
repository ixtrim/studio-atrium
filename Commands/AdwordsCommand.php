<?php

class AdwordsCommand extends Point7_WebApp_Command_Abstract
{
	/**
	 * @see Packages/7Point/WebApp/Command/Point7_WebApp_Command_Abstract::_doExecute()
	 * @todo cache categories
	 */
	protected function _doExecute(Point7_WebApp_Request $request, Point7_WebApp_Context_Application $appContext, Point7_WebApp_Context_Response $responseContext)
	{
		if (!empty($_SERVER['REQUEST_URI']) && preg_match('/adw=([0-9]*)/', $_SERVER['REQUEST_URI'], $found)) {
			    if (is_numeric($found[1])) {
				
				if (!empty($_COOKIE['adw'])) {
					$clickCounter = unserialize($_COOKIE['adw']);
					if (!empty($clickCounter[$found[1]])) {
						$clickCounter[$found[1]]['amount'] = $clickCounter[$found[1]]['amount'] + 1;
						$clickCounter[$found[1]]['last'] = date('Y-m-d');
					} else { 
						$clickCounter[$found[1]]['amount'] = 1;
						$clickCounter[$found[1]]['first'] = date('Y-m-d');
						$clickCounter[$found[1]]['last'] = date('Y-m-d');
					}
				} else {
					$clickCounter[$found[1]]['amount'] = 1;
					$clickCounter[$found[1]]['first'] = date('Y-m-d');
					$clickCounter[$found[1]]['last'] = date('Y-m-d');
				}
				
				$fp = new \Point7_AbstractDAO_FinderParams();
				$fp->addFilter('click_date', date('Y-m-d'));
				$fp->addFilter('campaign_no', $found[1]);
				
				$entry = \Point7_WebApp::getDAORepository()->getAdwordsClicksDAO()->find($fp);
				if ($entry && $entry->count() == 1) {
					$adwordsClick = $entry[0];
					
					$clicksMobile = $adwordsClick->getClicksMobile();
					$clicksTablet = $adwordsClick->getClicksTablet();
					$clicksDesktop = $adwordsClick->getClicksDesktop();
				} else {
					$adwordsClick = new \StudioAtrium\Entity\Adwords\Clicks();
					$adwordsClick->setClickDate(date('Y-m-d'));
					$adwordsClick->setCampaignNo($found[1]);
					
					$clicksMobile = $clicksTablet = $clicksDesktop = 0;
				}
				
				$detect = new \Mobile_Detect;

				if ($detect->isMobile()) {
					$adwordsClick->setClicksMobile($clicksMobile + 1);
				} elseif ($detect->isTablet()) {
					$adwordsClick->setClicksTablet($clicksTablet + 1);
				} else {
					$adwordsClick->setClicksDesktop($clicksDesktop + 1);
				}
				
				\Point7_WebApp::getDAORepository()->getAdwordsClicksDAO()->store($adwordsClick);
				
				setcookie('adw', serialize($clickCounter), time() + 31536000, '/');
				
				//$addr = \Point7_WebApp::getConfigParam('domain.www') . str_replace(array('&adw=' . $found[1], '?adw=' . $found[1]), "", $_SERVER['REQUEST_URI']);
				$addr = \Point7_WebApp::getConfigParam('domain.www') . str_replace(array('&adw=' . $found[1], '?adw=' . $found[1]), array("","?a=1"), $_SERVER['REQUEST_URI']);
				header("Location: " . $addr);
			}		
		}
		
		return self::STATE_OK;
	}
}