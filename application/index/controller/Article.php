<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\index\controller\Common as Base;
use think\Db;

class Article extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $data = Db::name('web_news')->where('status',2)->order('weigh desc')->field('id,title,memo,createtime,image')->select();

        return $this->view->fetch('',[
            'data'=>$data
        ]);
    }

    public function info(){
        $id = $_GET['id'];
        $data = Db::name('web_news')->field('id,title,content,createtime,image')->find($id);

        return $this->view->fetch('',[
            'data'=>$data
        ]);
    }

}
