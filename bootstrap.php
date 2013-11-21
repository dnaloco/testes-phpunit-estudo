<?php 
$ini = parse_ini_file("confs.ini", true);
$mode = $ini['general']['mode'];
$ini = $ini[$mode];

ini_set('display_errors', $ini['d_errors']);
error_reporting($ini['e_errors']);
date_default_timezone_set($ini['tz']);

define('DS', DIRECTORY_SEPARATOR);
define('APP_ROOT', realpath(__DIR__));

$composer_autoload = APP_ROOT . DS . 'vendor' . DS . 'autoload.php';

if(!require_once($composer_autoload)) die("install composer");
