<?php

/* $Id: Authenticate.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW\AbstractModule;
use StudioAtrium\Application\WWW\AppContext;
use StudioAtrium\Application\WWW\ResponseContext;

/**
 * Static pages
 *
 */
class Developer extends AbstractModule 
{
	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doPage(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	){
		$responseContext->setMeta('Oferta projektów domów dla deweloperów - Studio Atrium', '');
	}
}
