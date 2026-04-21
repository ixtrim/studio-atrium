<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class Pdf extends WWW\AbstractModule 
{
	/**
	 * @var \StudioAtrium\Entity\Project\Finder
	 */
	protected $_projectFinder = null;
	
	
	/**
	 * @see \Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction($action,\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext)
	{
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
	
		if (!$request->isValid()) {
			$responseContext->set('error', 'Brak wymaganych parametrów.');
			$this->_exit();
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doProject(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		if (!$project = $this->_projectFinder->getById($request->getParam('id'))) {
			$responseContext->setErrorMessage('Nie znaleziono takiego projektu.');
			$this->_exit(false, 'project_not_found');
		}
		
		if($project->getStatus() != \StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED) {
			$responseContext->setErrorMessage('Nie znaleziono takiego projektu.');
			$this->_exit(false, 'project_not_found');
		}
	
		$params = $this->_daoRepository->getProjectParamFinder()->getListForProject('house', true)->toArray('', 'id');
		$projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($request->getParam('id'))->toArray('', 'project_param_id');
		
		$sketchParams = $this->_daoRepository->getSketchParamFinder()->getList()->toArray('', 'id');
		$projectSketchParams = $this->_daoRepository->getSketchParamFinder()->getParamsForProject($request->getParam('id'))->toArray();
	
		$pdf = new Helper\ProjectPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Studio Atrium');
		$pdf->SetTitle('Project');
		$pdf->SetSubject('Project');
		$pdf->SetKeywords('Project');
	
		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
	
		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setFooterHTML($smartyWrapper->render('Pdf/ProjectFooter.tpl'));
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
		// set margins
		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetMargins(5, 6, 5);
	
		// set auto page breaks
// 		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetAutoPageBreak(false, 0);
	
		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	
		// set font
		$pdf->SetFont('dejavusans', '', 9);
	
		// add a page
		$pdf->AddPage();
	
		$extras = json_decode($project->getExtraData(), true);
		
		//$smartyWrapper->assign('projectPath', \Point7_WebApp::getConfigParam('static.project'));
		$smartyWrapper->assign('projectPath', '../../2016.studioatrium.media/WebContent/project');
		$smartyWrapper->assign('project', $project->toArray());
		$smartyWrapper->assign('params', $params);
		$smartyWrapper->assign('projectParams', $projectParams);
		$smartyWrapper->assign('sketchParams', $sketchParams);
		$smartyWrapper->assign('projectSketchParams', $projectSketchParams);
		if ($project->getType() != 'skeleton') {
			$smartyWrapper->assign('costs', $this->_getCost($projectParams, $extras));
		}
		
		if($request->getParam('version') == 'mirror') {
			$smartyWrapper->assign('mirrorPathPrefix', \Point7_WebApp::getConfigParam('paths.mirror_prefix') . '/');
		}

		// print a block of text using Write()
		$pdf->writeHTML($smartyWrapper->render('Pdf/Project.tpl'), true, false, false, false, '');
		
		$casts = $project->getAttachmentsByType('ProjectSketch')->toArray();
		if ($project->getType() != 'garage') {
    		foreach($casts as $cast) {
    			
    			if($cast['title'] != 'Rzut parteru') {
    				$pdf->AddPage();
    				//$smartyWrapper->assign('projectPath', \Point7_WebApp::getConfigParam('static.project'));
					$smartyWrapper->assign('projectPath', '../../2016.studioatrium.media/WebContent/project');
    				$smartyWrapper->assign('cast', $cast);
    				$smartyWrapper->assign('sketchParams', $sketchParams);
    				$smartyWrapper->assign('projectSketchParams', $projectSketchParams);
    				
    				if($request->getParam('version') == 'mirror') {
    					$smartyWrapper->assign('mirrorPathPrefix', \Point7_WebApp::getConfigParam('paths.mirror_prefix') . '/');
    				}
    				
    				$pdf->writeHTML($smartyWrapper->render('Pdf/Storey.tpl'), true, false, false, false, '');
    			}
    		}
		}
		
		$responseContext->setHTTPResponseHeader('Content-Type', 'application/pdf');
		header('X-Robots-Tag: noindex');
		
		setcookie('fileDownloadToken', $request->getParam('token'), time() + 60, '/');
		
		if($request->getParam('version') == 'mirror') {
			$responseContext->setFileToSend($pdf->Output('Projekt ' . $project->getSymbolAlpha() . ' ' . $project->getSymbolNum() . ' ' . Helper\StringUtils::polishToLatin($project->getName()) . ' lustro.pdf', 'D'));
		} else {
			$responseContext->setFileToSend($pdf->Output('Projekt ' . $project->getSymbolAlpha() . ' ' . $project->getSymbolNum() . ' ' . Helper\StringUtils::polishToLatin($project->getName()) . '.pdf', 'D'));
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doPlot(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$project = $this->_projectFinder->getById($request->getParam('id'))) {
			$this->_exit(false, 'project_not_found');
		}
		
		if($project->getStatus() != \StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED) {
			$this->_exit(false, 'project_not_found');
		}
		
		$pdf = new Helper\ProjectPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Studio Atrium');
		$pdf->SetTitle('Wydruk szkicu działki');
		$pdf->SetSubject('Wydruk szkicu działki');
		$pdf->SetKeywords('Wydruk szkicu działki');

 		$img = str_replace('data:image/png;base64,', '', $request->getParam('img_data'));
// 		$img = str_replace(' ', '+', $request->getParam('img_data'));
 		$imgData = base64_decode($img);

 		$filename = $project->getId() . '_' . time() . '.png';
 		
 		if(!is_dir('img/tmp')) {
 			mkdir('img/tmp', 0775);
 		}
 		
		file_put_contents('img/tmp/' . $filename, $imgData);
		sleep(2);
		

		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');

		$smartyWrapper->assign('name', $project->getName());
//		$smartyWrapper->assign('img', $request->getParam('img_data'));
		
		$smartyWrapper->assign('img', $filename);

		// remove default header/footer
		$pdf->setPrintHeader(false);

		$pdf->setFooterHTML($smartyWrapper->render('Pdf/ProjectFooter.tpl'));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		// 		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetMargins(5, 6, 5);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('dejavusans', '', 9);

		// add a page
		$pdf->AddPage();

		// print a block of text using Write()
		$pdf->writeHTML($smartyWrapper->render('Pdf/Plot.tpl'), true, false, false, false, '');
		
		if(is_file('img/tmp/' . $filename)) {
			unlink('img/tmp/' . $filename);
		}
		
		$responseContext->setHTTPResponseHeader('Content-Type', 'application/pdf');
		
		$responseContext->setFileToSend($pdf->Output('Szkic ' . $project->getSymbolAlpha() . ' ' . $project->getSymbolNum() . ' ' . Helper\StringUtils::polishToLatin($project->getName()) . '.pdf', 'D'));
	}
}
