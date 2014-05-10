<?php
//http://localhost/index.php?control=aaa&method=bbbb&id=111
class CoreControl{
	var $control;
	var $method;
	var $id;

 function __construct(){
	$this->control=$_GET['control'];
	$this->method=$_GET['method'];
	$this->id=$_GET['id'];
 }


 function __call ($name,$arguments ){
  echo "方法名:",$name,"<br>";
  echo "所属类：",get_class($this),"<br>";
  echo "错误原因：",get_class($this),"类中不存在或访问不可访问的方法",$name;
 }

 function getControl(){
   $this->control=$_GET['control'];
   return $_GET['control'];
 }

 function getMethod(){
	$this->method=$_GET['method'];
	return $_GET['method'];
 }

 function getId(){
	$this->id=$_GET['id'];
	return $_GET['id'];
 }

 function GetCoreFile(){
   $controlFile=$this->control."Control.php";
   $modelFile=$this->control."Model.php";
   $method=$this->method;
   include "lib/Model/Model.php";
   include "lib/Control/".$controlFile;
   include "lib/Model/$modelFile";
 }


 function perform(){
   $this->GetCoreFile();
   $controlName=$this->control."Control";
   $methodName=$this->method;
   $controlObj =new $controlName;

   //call_user_func_array(array($controlObj, "show"),array()); 也可以调用   //$controlObj->username;$controlObj->show();
   $controlObj->$methodName();

 }
  
 function display($view,$valueArr){
  extract($valueArr);
  include "lib/View/$view";
 }

 function redirect($url){
   head($url);  
 }

}
?>