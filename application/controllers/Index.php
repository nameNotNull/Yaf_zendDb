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
        echo "</br>";
        //test smarty library
        $this->getView()->assign("contentaa", "Hello Worldssss");
        //test zendDb library
        $adapter = Yaf_Registry::get('db');

        //use adapter
        // $qi = function ($name) use ($adapter) {
            
        //     return $adapter->platform->quoteIdentifier($name);
        // };
        // $fp = function ($name) use ($adapter) {
            
        //     return $adapter->driver->formatParameterName($name);
        // };
        // $sql = 'select * from ' . $qi('usertest') . ' where' . $qi('user_id') . ' <' . $fp('user_id');
        // $statement = $adapter->query($sql);
        // $results = $statement->execute(array(
        //     'user_id' => 5
        // ));
        // //$row = $results->current();
        // $resultSet = new Zend\Db\ResultSet\ResultSet;
        // $resultSet->initialize($results);
        // var_dump($results->toArray());

        //use sql
        $sql = new Zend\Db\Sql\Sql($adapter);
        $select = $sql->select();
        $select->from('usertest');
        $select->where(array(
            'user_id <3'
        ));
        $selectString = $sql->getSqlStringForSqlObject($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        // var_dump($results);
        var_dump($results->toArray());
        echo "</br>";
        // var_dump($results);
        // $resultSet = new Zend\Db\ResultSet\ResultSet;
        // $resultSet->initialize($results);
        
    }
}
?>


