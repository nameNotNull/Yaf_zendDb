<?php /* *model类要继承的类 * */
class Db_Table extends Db_Base {
    protected $_dataBaseName; //数据库名称
    protected $_tableName; //表名
    protected $_primaryKey; //主键
    protected $_db; //数据库链接
    //构造函数
    public function __construct($dbName,$tableName) {
        $this->_db = Db_Base::factory();
        $this->_dataBaseName = $dbName;
        $this->_tableName = $tableName;
    }
    //获取数据库名称和对应的表名
    public function _getDataBaseTableName() {
       
        //有一个为空就是错误的
        if (!(empty($this->_dataBaseName) || empty($this->_tableName))) {
            
            return $this->_dataBaseName . '.' . $this->_tableName;
        } else {
            throw new Exception("'The dataBaseName or tableName isn't empty!");
        }
    }
    //获取对应的记录数
    public function getCount($where = '') {
        $count = array();
        $sql = '';
        if (empty($where)) {
            $sql = 'select count(*) as count from ' . $this->_getDataBaseTableName();
        } else {
            $sql = 'select count(*) as count from ' . $this->_getDataBaseTableName() . ' where ' . $where;
        }
        $count = $this->_db->fetchRow($sql);
        
        return $count['count'];
    }
    /*
     功能   ：获取多条记录获取
     参数说明：$field = array('field1','field2',...);//如果是全部的字段 $field = array();空数组
     $whereArr = array('where'=>'','order'=->'','limit')；//条件数组
     *
     */
    public function getAll($fieldArr = array() , $whereArr = array()) {
        //不是数组就报错
        if (!is_array($whereArr) || !is_array($fieldArr)) {
            //throw new Exception("'The whereArr  or fieldArr isn't array!");
        }
        if (!empty($fieldArr)) {
            $fieldStr = $this->getFieldStr($fieldArr);
        } else {
            $fieldStr = '*';
        }
        
        //where 条件
        isset($whereArr['where']) ? $whereStr = ' where ' . $whereArr['where'] : $whereStr = ' where 1=1 ';
        //order条件
        isset($whereArr['order']) ? $orderStr = ' order by ' . $whereArr['order'] : $orderStr = ' ';
        //limit条件
        isset($whereArr['limit']) ? $limitStr = ' limit ' . $whereArr['limit'] : $limitStr = ' limit 10 ';
        $sql = 'SELECT ' . $fieldStr . ' from ' . $this->_getDataBaseTableName() . $whereStr . $orderStr . $limitStr;

        
        return $this->_db->fetchAssoc($sql);
    }
}
