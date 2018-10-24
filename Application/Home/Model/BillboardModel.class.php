<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/23
 * Time: 12:56
 */

namespace Home\Model;

use Think\Model;

class BillboardModel extends Model {
    protected $trueTableName = 'billboard';

    public function __construct() {
        parent::__construct();
    }

}