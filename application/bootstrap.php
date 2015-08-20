<?php

class Bootstrap extends Yaf_Bootstrap_Abstract {
    public function _initConfig() {
        $arrConfig = Yaf_Application::app()->getConfig(); //把配置保存起来
        Yaf_Registry::set('config', $arrConfig);
    }
    public function _initSmarty(Yaf_Dispatcher $dispatcher) {
        $smarty = new Smarty_Adapter(null, Yaf_Application::app()->getConfig()->smarty);
        Yaf_Dispatcher::getInstance()->setView($smarty);
    }
    public function _initZendDb(Yaf_Dispatcher $dispatcher) {
        $arrConfig = Yaf_Application::app()->getConfig();
        $zendDb = new Zend_Db();
        $params = array(
            'host' => $arrConfig->mysql->read->host,
            'username' => $arrConfig->mysql->read->username,
            'password' => $arrConfig->mysql->read->password,
            'dbname' => $arrConfig->mysql->read->dbname,
            'port' => $arrConfig->mysql->read->port
        );
        $db = $zendDb->factory('PDO_MYSQL', $params);
        Yaf_Registry::set('db', $db);
    }
}
?>


