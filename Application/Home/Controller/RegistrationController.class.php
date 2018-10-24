<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/24
 * Time: 11:31
 */

namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\RegistrationModel;

class RegistrationController extends RestController {
    public function postNewRegistration() {
        $obj = json_decode($_POST["Content"]);
//        $arr = array($obj);
        $team_id = $obj->team_id;
        $event_id = $obj->team_id;
        $this->_registerEvent($team_id, $event_id);

    }

    private function _registerEvent($team_id, $event_id) {
        $sql = new RegistrationModel();
        $data = array();
        $data['team_id'] = $team_id;
        $data['event_id'] = $event_id;
        $sql->add($data);
    }
}