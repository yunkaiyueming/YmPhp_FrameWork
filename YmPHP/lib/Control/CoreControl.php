<?php
/**
核心控制器CoreControl:调用相应的模块和方法

注意访问路由规则：http://localhost/index.php?control=aaa&method=bbbb&id=111

*/
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
   include "lib/Template/MyTpl.php";
 }


 function perform(){
   $this->GetCoreFile();
   $controlName=$this->control."Control";
   $methodName=$this->method;
   $controlObj=new $controlName;
   $controlObj->$methodName();
 }
  
 function display($view,$valueArr){
  $tpl=new MyTpl('lib/View/','lib/Template/Compile/');
  foreach($valueArr as $k=>$v)
    $tpl->assign($k,$v);

  $tpl->display($view);
 }

 function redirect($url){
   head($url);  
 }

}
?>