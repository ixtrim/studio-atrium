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

		$raw = $request->getParam('validate_data');
		$data = is_array($raw) ? $raw : json_decode((string)$raw, true);
		if (!is_array($data)) {
			$data = [];
		}

		$result = \Point7_WebApp::validateModuleActionData(
			(string)$request->getParam('validate_module'),
			(string)$request->getParam('validate_action'),
			$data
		);

		$responseContext->setJSONResponse('form', $request->getParam('validate_form'));
		$formId = $request->getParam('validate_form_id');
		if ($formId) {
			$responseContext->setJSONResponse('form_id', $formId);
		}
		$responseContext->setJSONResponse('status', $result['status']);
		if (!empty($result['errors'])) {
			$responseContext->setJSONResponse('errors', $result['errors']);
		}
	}
}
