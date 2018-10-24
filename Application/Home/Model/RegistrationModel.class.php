<?php
/**
 * Created by PhpStorm.
 * User: zhu
 * Date: 2018/10/23
 * Time: 15:48
 */

namespace Home\Model;

use Think\Model;

class RegistrationModel extends Model {
    protected $trueTableName = 'registration';

    public function __construct() {
        parent::__construct();
    }

}
