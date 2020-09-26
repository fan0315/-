<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Db;

class About extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $data = Db::name('web_about')->where('status','normal')->order('weigh desc')->find();
        return $this->view->fetch('',[
            'data'=>$data
        ]);
    }



}
