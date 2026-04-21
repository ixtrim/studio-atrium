<?php
//header("Location: przerwa.html");
//die();
/* supress declaraton of warnings */
if (PHP_MAJOR_VERSION >= 7) {
    set_error_handler(function ($errno, $errstr) {
       return strpos($errstr, 'Declaration of') === 0;
    }, E_WARNING);
}

/* $Id$ */

define('APP_PATH', realpath(__DIR__ . '/../'));
define('ROOT_PATH', __DIR__);
define('POINT7_PACKAGES', include_once APP_PATH . '/Conf/point7_path.php');
define('APP_PACKAGES', include_once APP_PATH . '/Conf/packages_path.php');
define('VENDORS_PACKAGES', include_once APP_PATH . '/Conf/vendors_path.php');
define('LOG_PATH', APP_PATH . '/Log');

ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . POINT7_PACKAGES  . PATH_SEPARATOR . VENDORS_PACKAGES);

require_once 'Common.lib.php';
require_once 'Point7.php';
Point7::load('WebApp');
Point7::load('AbstractDAO');
require_once APP_PACKAGES . '/StudioAtrium.php';
require_once VENDORS_PACKAGES . '/autoload.php';

try {
	setlocale(LC_ALL, 'pl_PL.utf8');
	Point7_WebApp::init(new \StudioAtrium\Application\WWW\InitConfig());
	Point7_WebApp::run();
} catch (Exception $e) {
	$h = new \StudioAtrium\Application\Exception\Handler();
	$h->handleException($e);
	die();
}