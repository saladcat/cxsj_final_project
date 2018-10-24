<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/23
 * Time: 15:58
 */

namespace Home\Model;

use Think\Model;

class UserModel extends Model {
    protected $trueTableName = 'user';

    public function __construct() {
        parent::__construct();
    }

}