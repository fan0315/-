<?php

namespace app\staff\controller;

use app\admin\model\Circle;
use app\common\controller\Staff;
use app\common\library\Token;
use app\staff\controller\Common as Base;
use think\Db;

class Index extends Staff
{

    protected $noNeedLogin = ['login', 'register', 'third'];
    protected $noNeedRight = ['*'];
    protected $layout = '';

    public function index()
    {
        $user_id = $this->auth->id;
        /**
         * 查询最近审核通过的文章
         */

        $circle = Circle::where(['user_id'=>$user_id,'status'=>2])->field('id,status')->order('audittime desc')->find();
        $circle_id = $circle->id;
        return $this->view->fetch();
    }


}
