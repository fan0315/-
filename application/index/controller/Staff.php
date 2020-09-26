<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\index\controller\Common as Base;
use think\Db;

class Staff extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $data = Db::name('web_staff')->order('weigh desc')->field('id,title,year,monthday,createtime,images')->select();
        foreach ($data as $key => $val){
            $data[$key]['images'] = explode(',',$data[$key]['images']);
        }
        return $this->view->fetch('',[
            'data'=>$data
        ]);
    }



}
