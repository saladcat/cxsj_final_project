<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/24
 * Time: 11:38
 */

namespace Home\Controller;

use Home\Model\TeamModel;
use Think\Controller\RestController;
use Home\Model\UserModel;
use Think\Model;

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
        $this->_addNewUser($user_id, $name, $phone, $gender, $email, $password, $department_id);
    }

    public function getInfoByUserID($id) {
        $data = $this->_getInfoByUserID($id);
        $this->response($data,'json');
    }

    public function getInfoByDepartID($id) {
        $data = $this->_getInfoByDepartID($id);
        $this->response($data,'json');
    }


    private function _addNewUser($user_id, $name, $phone, $gender, $email, $password, $department_id) {
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
        } else {
            $sql->add($data);
        }
    }

    private function _getInfoByUserID($id) {
        $info = array();
        $sql = new UserModel();
        $res = $sql->field('*')->where("user_id=$id")->select();
        return $res;
    }

    private function _getInfoByDepartID($id) {
        $info = array();
        $sql = new Model('college_name');
        $res = $sql->field('*')->where("department_id=$id")->select();
        foreach ($res as $key => $value) {
            $info[$key] = $value;
        }
        return $info;
    }
}