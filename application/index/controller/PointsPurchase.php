<?php


namespace app\index\controller;


use app\common\controller\Frontend;
use think\Db;

class PointsPurchase  extends Frontend
{
    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index(){
        if(request()->isPost()){
            $post = input('post.');
            $goods_id = $post["goods_id"];//商品ID
            $user_id = 1;
            $purchase_num = $post["purchase_num"];//商品数量
            $user = Db::name('user')->field('id,is_user,score')->find($user_id);
            if($user['is_user'] !== 1) return json(['code'=>'3','msg'=>'该用户不是会员，不能购买']);
            $goods = Db::name('integral_goods')->where('status',1)->field('id,name,integral,surplus_itystock')->find($goods_id);

            if($purchase_num > $goods['surplus_itystock'] )return json(['code'=>'3','msg'=>'库存不足，购买失败']);
            //计算提交过来的商品总积分
            $total_integral = bcmul($purchase_num ,$goods['integral']);
            //判断积分能否购买
            if($total_integral > $user['score']) return json(['code'=>'3','msg'=>'积分不足，购买失败']);
            return json(['code'=>'1','msg'=>'成功']);
        }
        return $this->view->fetch();
    }
}