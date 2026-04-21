<?php
/**
 * $Id: Validator.php 762 2013-04-03 11:55:02Z radek $
 */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;


class Validator extends WWW\AbstractModule {

	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doExecute(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setJSONResponse('status', 'error');
			$this->_exit();
		}

		$filters = \Point7_WebApp::getRegistryObject('controller::moduleRepository')
			->getRequestFiltersConfig(
				\StringHelper::camelize($request->getParam('validate_module')),
				\StringHelper::camelize($request->getParam('validate_action'))
			);
		$requestFiltered = new \Point7_WebApp_Request_Filtered(
			new \Point7_WebApp_Request_JSON($request->getParam('validate_data')),
			$filters
		);
		$responseContext->setJSONResponse('form', $request->getParam('validate_form'));
		if (!$requestFiltered->isValid()) {
			$responseContext->setJSONResponse('status', 'error');
			$responseContext->setJSONResponse('errors', $requestFiltered->getErrorMessages());
		} else {
			$responseContext->setJSONResponse('status', 'ok');
		}
	}
}