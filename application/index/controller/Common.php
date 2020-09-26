<?php


namespace app\index\controller;


use app\common\controller\Frontend;
use think\Db;

class Common extends Frontend
{
    static public function GetBanner(){
        //banner
        $data['banner']  = Db::name('ad_banner')->where('status','normal')->order('weigh asc')->select();
        return $data['banner'];
    }


}