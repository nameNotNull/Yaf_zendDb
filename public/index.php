<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/../')); /* 指向public的上一级 */
define("APPLICATION_PATH",  realpath(APP_PATH.'/application'));
define("LIBRARY_PATH",  realpath(APP_PATH.'/application/library'));
define("SMARTY_PATH",  realpath(APP_PATH.'/application/library'));
define("SMARTY_SYSPLUGINS_DIR",  realpath(APP_PATH.'/application/library/sysplugins'));
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini",'product');
$app->bootstrap()->run();

