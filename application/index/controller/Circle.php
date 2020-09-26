<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\index\controller\Common as Base;
use think\Db;

class Circle extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $enddate = time();
        //分类
        $circle = Db::name('circle')->alias('a')
            ->join('user b','a.user_id = b.id','left')
            ->where('a.status','2')
            ->field('a.id,a.content,a.image,a.createtime,a.images,a.user_id,a.favour,b.username,b.avatar')
            ->order('a.createtime desc')
            ->select();
        foreach ($circle as $key => $val){
            $circle[$key]['images'] = explode(',',$circle[$key]['images']);
        }
        foreach ($circle as $key => $val){
            $circle[$key]['issue'] = floor(($enddate - $circle[$key]['createtime'])/86400);
            if($circle[$key]['issue'] == '0'){
                $circle[$key]['issue'] = "今天";
            }else if($circle[$key]['issue'] == '1'){
                $circle[$key]['issue'] = '昨天';
            } else if($circle[$key]['issue'] < '1'|| $circle[$key]['issue'] < '8'){
                $circle[$key]['issue'] = $circle[$key]['issue'].'天前';
            }else{
                $circle[$key]['issue'] = "7天前";
            }
        }

        $this->assign('circle',$circle);
        return $this->view->fetch();
    }

}
