<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/23
 * Time: 15:10
 */

namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\EventModel;
use Home\Model\RegistrationModel;
use Home\Model\TeamModel;
use Home\Model\UserModel;

use Think\Model;

class EventController extends RestController {
    public function getInfoByID($ID) {
        $data = $this->_getInfoByID($ID);
        $this->response($data, 'json');
    }

    public function getAllID() {
        $data = $this->_getAllID();
        $this->response($data, 'json');
    }

    # post method
    public function addEvent() {
        # todo
    }

    public function getState() {
        $data = $this->_getState();
        $this->response($data, 'json');
    }

    private function _getInfoByID($ID) {
        $sql = new EventModel();
        $field = "event_id,event_name,max_team_member,min_team_member,team_limit,year,is_delete";
        $data = $sql->field($field)->where("event_id=$ID")->select();
        return $data;
    }

    private function _getAllID() {
        $sql = new EventModel();
        $data = $sql->field("event_id")->select();
        return $data;
    }

    private function _addEvent($data) {
        # data 是一个array，有index如下
        # event_name,max_team_member,min_team_member,team_limit,year
        $sql = new EventModel();
        $sql->save($data);
    }

    private function _delEvent($ID) {
        $sql = new EventModel();
        $sql->where("ad_id=$ID")->save(array("is_delete" => 1));
    }

    private function _updateEvent($ID, $data) {
        $sql = new EventModel();
        $sql->where("ad_id=$ID")->save($data);
    }

    private function _getState() {
        $sqlEvent = new EventModel();
        $sqlUser = new UserModel();
        $sqlReg = new RegistrationModel();
        $sqlTeam = new TeamModel();
        $data = array();
        $event_ids = $this->_getAllID();
        foreach ($event_ids as $event_id) {
            $event_id = $event_id['event_id'];
            $data[$event_id] = array();
            $team_ids = $sqlReg->field("team_id")->where("event_id=$event_id")->select();
            foreach ($team_ids as $team_id) {
                $team_id = $team_id['team_id'];
                $data[$event_id][$team_id] = array();
                $user_ids = $sqlTeam->field("user_id")->where("team_id=$team_id")->select();
                foreach ($user_ids as $user_id) {
                    $user_id = $user_id['user_id'];
                    $user_name = $sqlUser->field('name')->where("user_id=$user_id")->select();
                    $user_name = $user_name['name'];
                    $data[$event_id][$team_id][$user_id] = $user_name;
                }
            }
        }
        return $data;
    }
}