<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;

class Css extends WWW\AbstractModule {


	/**
	 * @param \Point7_WebApp_Context_Response_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response_Filtered $responseContext
	 */
	public function doMainPageStyles(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		header("Content-type: text/css; charset: UTF-8");
	
		//get main page boxes
		$boxes = $this->_daoRepository->getBoxFinder()->getList(true, true);
		
		$styles = '';
		foreach ($boxes as $k => $box) {
			if ($box->getBgColor()) {
				$styles .= '.mainPageBox_' . $box->getId() . ' > div {background-color: ' . $box->getBgColor() . ';}';				
				$styles .= '.mainPageBox_' . $box->getId() . ' > div:hover {background-color: ' . $box->getBgColorHover() . ';}';				
			}

		}
		
		$stylesMobile = '@media all and (max-width: 650px) {';
		
		//get main page carousel styles
		$carousel = $this->_daoRepository->getCarouselFinder()->getList(true);
		foreach ($carousel as $slide) {
			$extraData = $slide->getExtraData(true);
			if (!empty($extraData['text1_bg'])) {
				$styles .= '.slideText1_' . $slide->getId() .' {background-color: ' . $extraData['text1_bg'] . ' !important;}';
			}
			if (!empty($extraData['text1_opacity'])) {
				$styles .= '.slideText1_' . $slide->getId() .' {opacity: ' . $extraData['text1_opacity'] . ' !important;}';
			}
			if (!empty($extraData['text2_bg'])) {
				$styles .= '.slideText2_' . $slide->getId() .' {background-color: ' . $extraData['text2_bg'] . ' !important;}';
			}
			if (!empty($extraData['text2_opacity'])) {
				$styles .= '.slideText2_' . $slide->getId() .' {opacity: ' . $extraData['text2_opacity'] . ' !important;}';
			}
			if (!empty($extraData['text3_bg'])) {
				$styles .= '.slideText3_' . $slide->getId() .' {background-color: ' . $extraData['text3_bg'] . ' !important;}';
			}
			if (!empty($extraData['text3_opacity'])) {
				$styles .= '.slideText3_' . $slide->getId() .' {opacity: ' . $extraData['text3_opacity'] . ' !important;}';
			}
			
			$stylesMobile .= '.slideText2_' . $slide->getId() .' {font-size: 4.8rem !important;}';
			$stylesMobile .= '.slideText3_' . $slide->getId() .' {font-size: 4.8rem !important;}';
			$stylesMobile .= '#jssor_1 div.box span {font-size: 4.8rem !important;}';
			$stylesMobile .= '#jssor_1 div.box strong {font-size: 4.8rem !important;}';
		}
		
		$stylesMobile .= '}';
		
		echo ($styles . $stylesMobile);
	}
}