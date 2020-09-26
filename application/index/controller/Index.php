<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\index\controller\Common as Base;
use think\Db;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $data['banner'] = Base::GetBanner();
        //关于我们
        $data['web_about']  = Db::name('web_about')->where('status','normal')->order('weigh asc')->find();
        //圈子
        $circle = Db::name('circle')->alias('a')
                ->join('user b','a.user_id = b.id','left')
                ->where('a.is_recommend','1')
                ->order('a.id asc')
                ->field('a.*,b.username,b.avatar')
                ->find();

        $circle['images'] = explode(',',$circle['images']);
        //综合分类
        $data['category'] = Db::name('category')->where(['pid'=>'14','status'=>'normal'])->order('weigh asc')->field('id,pid,name,image')->select();
        //员工风采
        $data['staff'] = Db::name('web_staff')->where(['status'=>'2'])->order('weigh asc')->field('id,content,image')->find();
        //关于我们
        $data['join'] = Db::name('web_join')->where(['status'=>'normal'])->order('weigh asc')->field('id,image')->find();

        $data['contact'] = Db::name('web_contact')->field('id,address,email,image')->find();

        $this->assign('data',$data);
        $this->assign('circle',$circle);
        return $this->view->fetch();
    }

    public function demo(){
        echo Base::GetBanner();
    }

}
