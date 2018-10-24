<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/24
 * Time: 17:30
 */


namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\TeamModel;
use Think\Model;

class TeamController extends RestController {
    public function postNewTeam() {
        $obj = json_decode($_POST["Content"]);
        $team_members = array();
        $team_name = $obj->team_name;
        //todo
        $res = $this->_addNewTeam($team_name, $team_members);
        $this->response($res, 'json');

    }

    public function getJoinedTeamIDByUserID($ID) {
        $res = $this->_getJoinedTeamIDByUserID($ID);
        $this->response($res, 'json');

    }

    public function getMembersIDByTeamID($ID) {
        $IDs = $this->_getMembersIDByTeamID($ID);
        $datas = array();
        foreach ($IDs as $ID) {
            array_push($datas, $ID);

        }
        $this->response($datas, "json");
    }

    public function getTeamNameByTeamID($ID) {
        $team_name = $this->_getTeamNameByTeamID($ID);
        $this->response($team_name, "json");
    }

    private function _getMembersIDByTeamID($ID) {
        $sql = new TeamModel();
        $sql_res = $sql->field("user_id")->where("team_id=$ID")->select();
        return $sql_res;
    }

    private function _getTeamNameByTeamID($ID) {
        $sql = new Model('team_name');
        $sql_res = $sql->where("team_id=$ID")->select();
        return $sql_res;
    }

    private function _getJoinedTeamIDByUserID($ID) {
        $sql = new TeamModel();
        $sql_res = $sql->field('team_id')->where("is_delete=0 and user_id=$ID")->select();
        $result = array();
        foreach ($sql_res as $row) {
            array_push($result, $row['team_id']);
        }
        return $result;
    }

    private function _addNewTeam($name, $team_members) {
        $sql = new Model("team_name");
        $sql->add(array("team_name" => $name));
        $team_id = $sql->getLastInsID();
        $sql = new TeamModel();
        foreach ($team_members as $member) {
            $sql->add(array("team_id" => $team_id,
                "user_id" => $member));
        }
        return $team_id;
    }
}