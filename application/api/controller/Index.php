<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\Db;

/**
 * 首页接口
 */
class Index extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 首页
     *
     */
    public function index()
    {
        //调用banner图
//        return $this->ImgUrl();die;
        $banner = Db::name('ad_banner')->where('status','normal')->field('id,title,image,createtime,weigh,status')->order('weigh desc')->limit(3)->select();
        foreach ($banner as $val =>$key){
            $banner[$val]['image'] = $this->ImgUrl().$key['image'];
        }
        if(!$banner) $this->error('获取banner失败');

        //公司简介
        $about = Db::name('web_about')->where('status','normal')->field('id,title,content,image,description')->order('weigh desc')->limit(1)->find();
        $about['image'] = $this->ImgUrl().$about['image'];
        if(!$about) $this->error('获取公司简介失败');

        //
        $data = [
           'banner'=>$banner,
           'about'=>$about
        ];

        $this->success('请求成功',$data);

    }

    /**
     * 首页_获取banner
     */
    public function getBanner(){
        $res =Db::name('ad_banner')->where('status','normal')->order('weigh desc')->limit(3)->select();
        if(!$res) $this->error('获取失败');
        $this->success('请求成功',$res);
    }

}
