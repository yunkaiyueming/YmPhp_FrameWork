<?php
class Model{
	var $localhost="localhost";
	var $user="root";
	var $pwd="123456";
	var $db="test";
 function __construct(){
  $conn=mysql_connect($this->localhost,$this->user,$this->pwd);
  if(!$conn) echo "服务器连接失败";
  $res=mysql_select_db($this->db);
  if(!$res) echo "数据库连接失败";
 }

 function findAll(){
   $className=get_class($this);
   //echo $className;
   $className=str_replace("Model",'',$className);
   $tableName="tp_".$className;
   $sql="select * from $tableName";//echo $sql;
   $res=mysql_query($sql);
   while($info=mysql_fetch_assoc($res)){
	   $infoArray[]=$info;
   }
   return $infoArray;
 }
  
 function find($condition){
  $className=get_class($this);
   //echo $className;
   $className=str_replace("Model",'',$className);
   $tableName="tp_".$className;
   $sql="select * from $tableName where $condition";echo $sql;
   $res=mysql_query($sql);
   $info=mysql_fetch_assoc($res);
   return $info;
 }

 function insert(){
 
 }

 function update(){
 
 }

 function del(){
 
 }

}
