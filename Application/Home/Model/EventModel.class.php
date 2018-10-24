<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/23
 * Time: 15:09
 */

namespace Home\Model;

use Think\Model;

class EventModel extends Model {
    protected $trueTableName = 'event';

    public function __construct() {
        parent::__construct();
    }

}