<?php

namespace app\staff\controller;

use app\admin\model\Circle;
use app\common\controller\Staff;
use app\common\library\Token;
use think\Db;

class Release extends Staff
{

    protected $noNeedLogin = ['login', 'register', 'third'];
    protected $noNeedRight = ['*'];
    protected $layout = '';

    public function index()
    {
        if($this->request->isPost()){
            $post = input();
//            array(3) {
//                ["content"] => string(21) "奥术大师大所多"
//                ["file"] => string(0) ""
//                ["pc_src"] => array(4) {
//                    [0] => string(60) "uploads/circle/20200926\80bc99a3dea4e1add4d7f537abe40bae.png"
//                    [1] => string(60) "uploads/circle/20200926\84970c4159490e5a821c877d95069ec5.png"
//                    [2] => string(60) "uploads/circle/20200926\7d56ea0260294c8e562df4f2a06d85c1.png"
//                    [3] => string(60) "uploads/circle/20200926\9d557f74b4349f2c050bea6536342987.png"
//  }
//}
            $post['pc_src'] = implode(',',$post['pc_src']);
            $data = [
                'content'=>$post['content'],
                'createtime'=>time(),
                'status'=>1,
                'images'=>$post['pc_src'],
                'user_id'=>$this->auth->id,
                'is_recommend'=>0,
                'favour'=>0
            ];
            $ciecle = new Circle();
            $result = $ciecle->save($data);

            if(!$result) return json(['code'=>0,'msg'=>'上传失败']);
            return json(['code'=>1,'msg'=>'上传成功']);
        }

        return $this->view->fetch();
    }


}
