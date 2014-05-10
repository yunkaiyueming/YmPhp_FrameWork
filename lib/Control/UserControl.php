<?php
class UserControl extends CoreControl{
  var $model;

  function show(){
	$userModel=new UserModel();
	$goods_info=$userModel->findAll();
	//print_r($goods_info);
	$test='用户显示列表';
	$this->display('UserShow.php',array("goods_info"=>$goods_info,"test"=>$test));
	//include "lib/View/UserShow.php";
  }

  function addSave(){
  
  }

  function del(){
  
  }

  function update(){
    $userModel=new UserModel();
	$goods_info=$userModel->find("id=$_GET[id]");print_r($goods_info);
	$test='用户修改表单';
	$this->display('UserEdit.php',array("goods_info"=>$goods_info,"test"=>$test));
  }

}
?>