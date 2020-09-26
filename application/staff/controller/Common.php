<?php


namespace app\index\controller;


use app\common\controller\Frontend;
use app\common\controller\Staff;
use think\Db;

class Common extends Staff
{
    static public function GetBanner(){
        //banner
        $data['banner']  = Db::name('ad_banner')->where('status','normal')->order('weigh asc')->select();
        return $data['banner'];
    }


}