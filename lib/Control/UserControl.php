<?php

/**
  UserControl用户管理控制器
 */
class UserControl extends CoreControl {

    var $model;

    function show() {
        $userModel = new UserModel();
        $goods_info = $userModel->findAll();
        $test = 'Hello World';
        $this->display('test.tpl', array("test" => $test,'goods_info'=>$goods_info));
    }

    function addSave() {
        
    }

    function del() {
        
    }

    function update() {
        $userModel = new UserModel();
        $goods_info = $userModel->find("id=$_GET[id]");
        print_r($goods_info);
        $test = '用户修改表单';
        $this->display('UserEdit.php', array("goods_info" => $goods_info, "test" => $test));
    }

}

?>