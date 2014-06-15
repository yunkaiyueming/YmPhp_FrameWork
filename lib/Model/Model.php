<?php

/**
  模型基类：实现数据库的增删查改功能
 * 单例模式
 */
class Model {

    var $localhost = HOSTNAME;
    var $user = USERNAME;
    var $pwd = PASSWORD;
    var $db = DATABASE;
    var $prefix = PREFIX;

    function __construct() {
        $conn = mysql_connect($this->localhost, $this->user, $this->pwd);
        if (!$conn)
            echo "服务器连接失败";
        $res = mysql_select_db($this->db);
        if (!$res)
            echo "数据库连接失败";
    }

    /*  功能：findAll 查询所有记录或有条件下所有记录
     * 
     *  参数
     *  $condition：  条件
     *  
     * 返回值：返回关联的二维数组
     */

    function findAll($condition = NULL) {
        $className = get_class($this);
        //echo $className;
        $className = str_replace("Model", '', $className);
        $tableName = $this->prefix . $className;
        $sql = "select * from $tableName";
        $sql.=$condition ? " $condition " : ''; //echo $sql;
        $res = mysql_query($sql);
        while ($info = mysql_fetch_assoc($res)) {
            $infoArray[] = $info;
        }
        return $infoArray;
    }
/*
    function add($arr) {
        extract($arr);
        $className = get_class($this);
        //echo $className;
        $className = str_replace("Model", '', $className);
        $tableName = $this->prefix . $className;
        //mysql_list_fields(DATABASE, $tableName); //查询表的字段并匹配与字段相同的变量作为所插入的记录值
        $fields = mysql_list_fields("test", "tp_good", $link);
        $columns = mysql_num_fields($fields);

        for ($i = 0; $i < $columns; $i++) {
            echo mysql_field_name($fields, $i) . "\n";
        }
        mysql_field_name()
        $sql = "insert into $tableName(,,,,,) values('','','','')";
    }
*/
    function update() {
        
    }

    function del() {
        
    }

}
