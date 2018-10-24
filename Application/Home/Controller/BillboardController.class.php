<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/23
 * Time: 13:00
 */

namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\BillboardModel;

class BillboardController extends RestController {
    protected $allowMethod = array('get', 'post');
    protected $allowType = array('html', 'xml', 'json');

    public function getAllID() {
        $data = $this->_getAllID();
        $this->response($data, "json");
    }

    public function getInfoByID($id) {
        $data = $this->_getInfoByID($id);
        $this->response($data, 'json');
    }

    public function getAllInfo() {
        $IDs = $this->_getAllID();
        $datas = array();
        foreach ($IDs as $ID) {
            $data = $this->_getInfoByID($ID['ad_id']);
            array_push($datas, $data);
        }
        $this->response($datas, "json");
    }

    public function postNewBillboard() {
        $obj = json_decode($_POST["Content"]);
//        $arr = array($obj);
        $title = $obj->title;
        $content = $obj->content;
        $this->_addBillboard($title, $content);
    }

    private function _getAllID() {
        $sql = new BillboardModel();
        $data = $sql->field('ad_id')->where("is_delete=0")->select();
        return $data;
    }

    private function _getInfoByID($id) {
        $sql = new BillboardModel();
        $data = $sql->field("ad_id,ad_name,ad_content,ad_data_time")->where("ad_id=$id and is_delete=0")->select();
        return $data;
    }

    private function _addBillboard($title, $content) {
        $sql = new BillboardModel();
        $data = array();
        $data['ad_name'] = $title;
        $data['ad_content'] = $content;
        $sql->add($data);
    }

    private function _delBillboard($ID) {
        $sql = new BillboardModel();
        $sql->where("ad_id=$ID")->save(array('is_delete' => 1));
    }

    private function _updateBillboard($ID, $title, $content) {
        $sql = new BillboardModel();
        $data = array();
        $data['ad_name'] = $title;
        $data['ad_content'] = $content;
        $sql->where("ad_id=$ID")->save($data);
    }
}
