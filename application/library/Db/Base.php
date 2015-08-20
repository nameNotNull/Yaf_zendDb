<?php
/*
 数据库操作基础类
 *
*/

class Db_Base {
    private static $_instance = null; //唯一实例.
    private $_db; //数据库连接
    private $_read_db = null; //读数据库连接
    private $_write_db = null; //写数据库连接
    private $_read_config; //读库的配置
    private $_write_config; //写库的配置
    ///////下面的函数主要是主从分离和获取数据库的链接操作
    public function __construct() {
        $config = Yaf_Registry::get('config')->mysql; //获取配置文件
        $this->_read_config = $config->read; //读配置文件
        $this->_write_config = $config->write; //写配置文件
        $this->readConntection(); //默认的为读库链接
        
    }
    //获取数据库的读写配置
    public static function factory() {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        
        return self::$_instance;
    }
    //读库时的数据库链接
    public function readConntection() {
        if ($this->_read_db != null) {
            $this->_db = $this->_read_db;
            
            return;
        }
        $this->_read_db = $this->getConnection($this->_read_config);
        $this->_db = $this->_read_db;
        $this->_read_db->query("SET NAMES '{$this->_read_config['charset']}'");
    }
    //写库时的数据库链接
    public function witeConntection() {
        if ($this->_write_db != null) {
            $this->_db = $this->_write_db;
            
            return;
        }
        $this->_write_db = $this->getConnection($this->_write_config);
        $this->_db = $this->_write_db;
        $this->_write_db->query("SET NAMES '{$this->_read_config['charset']}'");
    }
    //创建数据库链接
    public function getConnection($DbconfigArr = array()) {
        if (is_array($DbconfigArr)) {
            throw new Exception("The DbcofigArr is not a array");
        }
        $db = new mysqli($DbconfigArr['host'], $DbconfigArr['username'], $DbconfigArr['password'], $DbconfigArr['dbname'], $DbconfigArr['port']);
        if (mysqli_connect_errno()) {
            throw new Exception('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
        }
        
        return $db;
    }
    public function query($sqlUrl) {
        //读写分离
        if (preg_match('/^\s*select/i', $sqlUrl)) {
            $this->readConntection();
        } else {
            $this->witeConntection();
        }
        $result = $this->_db->query($sqlUrl);
        //最后一次调用产生的错误代码 返回0代表没有错误发生
        if ($this->_db->errno) {
            throw new Exception('Query Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
        }
        
        return $result;
    }
    //////下面的函数主要是根据需求获取不同查询需求：
    ////// 1.获取信息(单条、多条) 2.insert操作 3.update操作 4.delete操作 （批量操作） 5.获取相关信息的总数
    ///// 函数参数说明:1.数据库字段以array('field1','field2'...)获取，2：sql语句完善where部分
    //获取结果中所有的行
    public function fetchAssoc($sql) {
        $returnArr = array();
        $result = $this->query($sql);
        
        while ($row = $result->fetch_assoc()) {
            $returnArr[] = $row;
        }
        $result->free();
        
        return $returnArr;
    }
    //获取结果中的第一行的值
    public function fetchRow($sql) {
        $row = array();
        $returnArr = array();
        $result = $this->query($sql);
        $row = $result->fetch_array(MYSQL_ASSOC); //获取第一条数据
        if (empty($row)) {
            
            return array();
        }
        
        return $row;
    }
    //插入操作
    public function insert($sql) {
        $this->witeConntection();
        $result = $this->_db->query($sql);
        
        return $this->_db->insert_id;
    }
    //更新删除操作
    public function modify($sql) {
        $this->witeConntection();
        $this->_db->query($sql);
        
        return $this->_db->affected_rows;
    }
    public function getFieldStr($arrayField = array()) {
        $newArr = array();
        
        foreach ($arrayField as $v) {
            $newArr[] = "`$v`";
        }
        
        return join(',', $newArr);
    }
}

