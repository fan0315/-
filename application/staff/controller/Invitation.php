<?php

namespace app\staff\controller;

use app\admin\model\Circle;
use app\common\controller\Frontend;
use app\common\controller\Staff;
use app\index\controller\Common as Base;
use think\Db;

class Invitation extends Staff
{

    protected $layout = '';
    protected $noNeedLogin = ['login', 'register', 'third'];
    protected $noNeedRight = ['*'];

    public function index()
    {
        $user_id = $this->auth->id;
        //审核中
        $circle_list = $this->GetCircle($user_id,1);
        return $this->view->fetch('index',[
            'circle_list'=>$circle_list,
        ]);
    }

    public function GetCircle($user_id,$status ){
        $list = Db::name('circle')->alias('a')
            ->join('employee_account b','a.user_id = b.id','left')
            ->where('a.user_id',$user_id)
            ->field('a.*,b.accountname,b.photo')
            ->order('a.createtime desc')
            ->select();
        foreach($list as $key=>$val){
            $list[$key]['images'] = explode(',',$list[$key]['images']);
        }
        return $list;
    }
}
