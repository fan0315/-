<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\index\controller\Common as Base;

use think\Db;

class service extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index(){
        $data['banner'] = Base::GetBanner();
        //综合分类
        $data['category'] = Db::name('category')->where(['pid'=>'14','status'=>'normal'])->order('weigh asc')->field('id,pid,name,image')->select();
        //经典案例
        $data['case'] = Db::name('web_case')->order('is_recommend desc')->order('weigh desc')->field('id,description,name,image,is_recommend')->select();
        //关于我们
        $this->assign('data',$data);
        return $this->view->fetch();
    }
    public function serviceList()
    {
        $pid = input('param.pid','0');
        $where = [];
        if($pid){
            $where = ['category_id'=>$pid];
        }else{
            $where = [];
        }
        $data = Db::name('web_service')->where($where)->order('weigh desc')->field('id,title,createtime,image,description')->select();

        return $this->view->fetch('',[
            'data'=>$data
        ]);
    }
    public function info(){
        $id = $_GET['id'];
        $data = Db::name('web_service')->field('id,title,content,createtime,image')->find($id);
        return $this->view->fetch('',[
            'data'=>$data
        ]);
    }

}
