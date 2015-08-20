<?php

class IndexController extends Yaf_Controller_Abstract {
    public function indexAction() { //默认Action
        //test db library
        $dbObj = new Db_Table('test', 'user');
        $res = $dbObj->getCount('id=3');
        var_dump($res);
        $field = array();
        $whereArr = array(
            'order' => 'id',
            'limit' => '3'
        );
        $res = $dbObj->getAll($field, $whereArr);
        var_dump($res);
        //test smarty library
        $this->getView()->assign("contentaa", "Hello Worldssss");
        //test zendDb library
        $db = Yaf_Registry::get('db');
        $sql = $db->quoteInto('select * from usertest where user_id <?', '3');
        $result = $db->query($sql);
        $res = $result->fetchAll();

        
        var_dump($res);
        /*
        $adapter = new Zend_Db_Table();
        $adapter->setDefaultAdapter($db);
        $obj = new UserTableModel();
        $data = array(
            'id' => '1',
            'name' => 'King',
            'author' => 'Arthur',
            'color' => 'blue'
        );
        $obj->insert($data);*/
    }
}
?>

