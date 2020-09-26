<?php


namespace app\index\controller;


use app\common\controller\Frontend;
use function fast\e;
use think\Db;

class Merchants extends Frontend
{
    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index(){
        if(request()->isPost()){
           $post = input('post.');
           if($post['name'] == '' || $post['name'] == null ){
               json(['code'=>'2','msg'=>'姓名不能为空']);
           }
            if($post['phone'] == '' || $post['phone'] == null ){
                json(['code'=>'2','msg'=>'电话不能为空']);
            }
           $isPhone = self::VayPhone($post['phone']);
           if($isPhone == false) return json(['code'=>'2','msg'=>'电话号码不正确']);

           $data = [
               'name'=>$post['name'],
               'sex'=>$post['sex'],
               'phone'=>$post['phone'],
               'corporate_name'=>$post['corporate_name'],
               'involved'=>$post['industry'],
               'industry_two'=>$post['industry_two'],
               'province'=>$post['province'],
               'city'=>$post['city'],
               'county'=>$post['county'],
               'address'=>$post['address'],
               'company_size'=>$post['company_size'],
               'createtime'=>time()
           ];
            $res = Db::name('web_joinin_message')->insert($data);
            if(!$res){
                return json(['code'=>'2','msg'=>'留言失败']);
            }
            return json(['code'=>'1','msg'=>'留言成功']);
        }
        $data = Db::name('web_joinin_article')->where('status','normal')->order('weigh asc')->find();
        return $this->view->fetch('',['data'=>$data]);
    }

    public function addForm(){
        $area = Db::name('area')->where('level',1)->order('first asc')->select();
        foreach ($area as $key => $val){
            $area[$key]['level_two'] = Db::name('area')->where('pid',$val['id'])->order('first asc')->select();
            foreach ($area[$key]['level_two'] as $k => $v){
                $area[$key]['level_two'][$k]['level_three'] = Db::name('area')->where('pid',$v['id'])->order('first asc')->select();
            }
        }

        $this->assign('area',$area);
        return $this->view->fetch();
    }
    // 省市区三级联动------------
    //读取省
    public function privance()
    {
        $list = Db::name('area')->where('level',1)->select();
        return $list;
    }

    //读取市
    public function city($provinceid)
    {

        if ($provinceid) {
            $where = "pid = $provinceid";
        } else {
            $where = "pid = 1";
        }
        $list = Db::name('area')->where($where)->order('first asc')->select();
        return $list;
    }

    //读取区
    public function area($cityid)
    {

        if ($cityid) {
            $where = "pid = $cityid";
        } else {
            $where = "pid = 2";
        }

        $list = Db::name('area')->where($where)->select();
        return $list;
    }

    //行业
    public function industry(){
        $list = Db::name('industry')->where('pid',0)->select();
        return $list;
    }
    //读取二级行业
    public function industry_two($industry_id)
    {

        if ($industry_id) {
            $where = ['pid' => $industry_id];
        } else {
            $where = ["pid" => "A"];
        }
        $list = Db::name('industry')->where($where)->select();
        return $list;
    }
}