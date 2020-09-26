<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\index\controller\Common as Base;
use think\Db;

class Product extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $data['banner'] = Base::GetBanner();

        //分类
        $category = Db::name('procategory')->field('id,name,image')->order('weigh asc')->select();
        //推荐产品
        $product['recommend'] = Db::name('product')->field('id,name,image')->where('is_recommend',1)->order('weigh asc')->limit(6)->select();
        //最新产品
        $product['newest'] = Db::name('product')->field('id,name,image')->order('createtime desc')->limit(9)->select();
        //合作伙伴 partner
        $product['partner'] = Db::name('pro_partner')->field('id,name,image')->order('weigh asc')->limit(9)->select();

        //赋值
        $this->assign('data',$data);
        $this->assign('category',$category);
        $this->assign('product',$product);
        return $this->view->fetch();
    }
    public function productList()
    {
        $pid = input('param.pid','0');
        $where = [];
        if($pid){
            $where = ['category_id'=>$pid];
        }else{
            $where = [];
        }
        $data = Db::name('product')->where($where)->order('weigh desc')->field('id,name,createtime,image,description')->select();

        return $this->view->fetch('',[
            'data'=>$data
        ]);
    }
    public function info(){
        $id = input('param.id','0','trim');

        $data = Db::name('product')->field('id,name,content,createtime,image,images,proparameter')->find($id);
        $images = $data['images'];

        $data['proparameter'] = json_decode($data['proparameter'],true);
        $data['images']  = explode(',',$images);

        return $this->view->fetch('',[
            'data'=>$data
        ]);
    }
}
