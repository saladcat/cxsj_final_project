<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/24
 * Time: 11:38
 */

namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\UserModel;

class UserController extends RestController {
    public function postNewUser() {
        $obj = json_decode($_POST["Content"]);
        $user_id = $obj->user_id;
        $name = $obj->name;
        $phone = $obj->phone;
        $gender = $obj->gender;
        $email = $obj->email;
        $department_id = $obj->department_id;
        $password = $obj->password;
        $this->_addNewUser($user_id, $name, $phone, $gender, $email,$password, $department_id);
    }

    private function _addNewUser($user_id, $name, $phone, $gender, $email,$password, $department_id) {
        $data = array();
        $data['user_id'] = $user_id;
        $data['name'] = $name;
        $data['phone'] = $phone;
        $data['gender'] = $gender;
        $data['email'] = $email;
        $data['department_id'] = $department_id;
        $data['password'] = $password;
        $sql = new UserModel();
        $info = $sql->field('*')->where("user_id=$user_id")->select();
        if ($info[0] == null) {
            $this->response(array("is_exist" => false), 'json');
        }else{
            $sql->add($data);
        }
    }
}