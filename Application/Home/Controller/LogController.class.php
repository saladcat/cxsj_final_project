<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/24
 * Time: 12:02
 */

namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\UserModel;

class LogController extends RestController {
    public function postLogin() {
        $obj = json_decode($_POST["Content"]);

        $data = array();
        $data['user_id'] = $obj->user_id;
        $data['password'] = $obj->password;
        $output = $this->_login($data);
        $this->response($output, 'json');
    }

    public function _login($data) {
        //param user_id, password
        //output is_login,is_admin
        $user_id = $data['user_id'];
        $password = $data['password'];
        $output = array();
        $output['is_login'] = false;
        $output['is_admin'] = false;
        $sql = new UserModel();
        $sql_res = $sql->field("user_id,password,is_admin")->where("user_id=$user_id")->select();
        if ($sql_res[0]['password'] == $password) {
            $output['is_login'] = true;
        }
        if ($sql_res[0]['is_admin'] == true) {
            $output['is_admin'] = true;
        }
        return $output;
    }
}