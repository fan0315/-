<?php

namespace app\index\controller;
use app\common\controller\Frontend;
use app\index\controller\Common as Base;
use think\Db;

class Points  extends Frontend
{
    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index(){
        $data = Db::name('integral_goods')->where('status',1)->order('weigh desc')->field('id,name,image,integral,price,specs,weigh,status')->select();
        return $this->view->fetch('',['data'=>$data]);
    }
    public function info(){
        $id = input('param.id','0','trim');
        $data = Db::name('integral_goods')->find($id);
        $images = $data['images'];
        $data['images']  = explode(',',$images);

        return $this->view->fetch('',['data'=>$data]);
    }
}