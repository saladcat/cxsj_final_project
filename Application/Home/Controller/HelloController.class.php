<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/8
 * Time: 19:42
 */

namespace Home\Controller;

use Think\Controller\RestController;

class HelloController extends RestController {
    public function sayHello() {
        $this->response("朱世杨ddd");
    }

    public function sayHello2($name) {
        $this->response("djsakld:::" . $name);

    }
}