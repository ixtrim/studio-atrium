<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class Api extends WWW\AbstractModule 
{
	/**
	 * @var \StudioAtrium\Entity\Project\Finder
	 */
	protected $_projectFinder = null;
	
	/**
	 * @see Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction($action, \Point7_WebApp_Request $request, $appContext, $responseContext): void
	{
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
	}
	
	
	/**
	 * @param \Point7_WebApp_Context_Response_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response_Filtered $responseContext
	 */
	public function doProject(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		
		if ($request->isValid() && ($project = $this->_projectFinder->getById($request->getParam('id')))) {
			if ($request->getParam('signature') == \Point7_WebApp::getConfigParam('secret')) {
				$data = $project->toArray();
				
				unset($data['_uid']);
				unset($data['id_old']);
				unset($data['status']);
				unset($data['meta_title']);
				unset($data['meta_description']);
				unset($data['extra_data']);
				unset($data['params_list']);
 				$data['url'] = \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project);

 				$attachments = array();
 				foreach ($data['attachments'] as $attachmentProfile => $attachmentArray) {
 					foreach ($attachmentArray as $key => $attachment) {
	 					$attachments[$attachmentProfile][$key]['origin']['url'] = \Point7_WebApp::getConfigParam('static.project') . '/' .
	 	 						$attachment['path'] . '/' . $attachment['filename'];
	 					
	 	 				if ($attachmentProfile == 'ProjectRender' || $attachmentProfile == 'ProjectElevation' || $attachmentProfile == 'ProjectSketch')	{
	 	 					$attachments[$attachmentProfile][$key]['origin']['url_mirror'] = \Point7_WebApp::getConfigParam('static.project') . '/' .
	 	 							$attachment['path'] . '/' . \Point7_WebApp::getConfigParam('paths.mirror_prefix') . '/' . $attachment['filename'];
	 	 				}
	 	 						
	 	 				$attachments[$attachmentProfile][$key]['origin']['title'] = $attachment['title'];
	 	 				
	 	 				if ($attachmentProfile == 'ProjectSketch') {
		 	 				$attachments[$attachmentProfile][$key]['origin']['id'] = $attachment['id'];
	 	 				}
	 	 				
	 	 				if (!empty($attachment['childAttachments'])) {
	 	 					foreach ($attachment['childAttachments'] as $size => $childArray) {
	 	 						foreach ($childArray as $child) {
		 	 						$attachments[$attachmentProfile][$key][$size]['url'] = \Point7_WebApp::getConfigParam('static.project') . '/' .
		 	 	 						$child['path'] . '/' . $child['filename'];
		 	 						
		 	 	 						if ($attachmentProfile == 'ProjectRender' && $size == 'presentation')	{
		 	 	 							$attachments[$attachmentProfile][$key][$size]['url_mirror'] = \Point7_WebApp::getConfigParam('static.project') . '/' .
		 	 	 									$child['path'] . '/' . \Point7_WebApp::getConfigParam('paths.mirror_prefix') . '/' . $child['filename'];
		 	 	 						}
	 	 						}
	 	 					}
	 	 				}
 					}
 				}
 				$data['attachments'] = $attachments;
 				
 				$params = $this->_daoRepository->getProjectParamFinder()->getListForProject($project->getType(), true)->toArray('', 'id');
 				$projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($request->getParam('id'))->toArray('', 'project_param_id');
 				
 				$paramsArray = array();
 				foreach ($projectParams as $projectParam) {
 					$paramsArray[$projectParam['project_param_id']]['name'] = $params[$projectParam['project_param_id']]['name'];
 					$paramsArray[$projectParam['project_param_id']]['unit'] = $params[$projectParam['project_param_id']]['unit'];
 					if ($params[$projectParam['project_param_id']]['value_type'] == 'number' || $params[$projectParam['project_param_id']]['value_type'] == 'value') {
	 					$paramsArray[$projectParam['project_param_id']]['value'] = $projectParam['num_value'];
 					} else {
	 					$paramsArray[$projectParam['project_param_id']]['value'] = $projectParam['string_value'];
 					}
 				}
 				
 				$data['params'] = $paramsArray;
 				
 				$sketchParams = $this->_daoRepository->getSketchParamFinder()->getList()->toArray('', 'id');
 				$projectSketchParams = $this->_daoRepository->getSketchParamFinder()->getParamsForProject($request->getParam('id'))->toArray();
 				$sketchArray = array();
 				foreach ($projectSketchParams as $projectSketchParam) {
 					$sketchArray[$projectSketchParam['sketch_id']][$projectSketchParam['sorting']]['name'] = $sketchParams[$projectSketchParam['sketch_param_id']]['name'];
 					$sketchArray[$projectSketchParam['sketch_id']][$projectSketchParam['sorting']]['type'] = $sketchParams[$projectSketchParam['sketch_param_id']]['type'];
 					$sketchArray[$projectSketchParam['sketch_id']][$projectSketchParam['sorting']]['area'] = $projectSketchParam['area'];
 					$sketchArray[$projectSketchParam['sketch_id']][$projectSketchParam['sorting']]['room_no'] = (!empty($projectSketchParam['room_no'])) ? $projectSketchParam['room_no'] : '';
 					$sketchArray[$projectSketchParam['sketch_id']][$projectSketchParam['sorting']]['storey'] = $projectSketchParam['storey'];
 				}
 					
 				$data['sketch_params'] = $sketchArray;
				$responseContext->setJSONResponse('project', $data);
			} else {
				$responseContext->setJSONResponse('project' , null);
				$responseContext->setJSONResponse('error' , 'Wrong signature');
				$this->_exit();
			}
		} else {
			$responseContext->setJSONResponse('project' , null);
			$this->_exit();
		}
	
	}
	
	/**
	 * @param \Point7_WebApp_Context_Response_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response_Filtered $responseContext
	 */
	public function doList(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		#TODO
	}
}
