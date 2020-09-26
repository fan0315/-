<?php

namespace app\staff\controller;

use app\common\controller\Frontend;
use app\common\controller\Staff;
use think\Lang;

/**
 * Ajax异步请求接口
 * @internal
 */
class Ajax extends Staff
{

    protected $noNeedLogin = ['lang'];
    protected $noNeedRight = ['*'];
    protected $layout = '';

    /**
     * 加载语言包
     */
    public function lang()
    {
        header('Content-Type: application/javascript');
        header("Cache-Control: public");
        header("Pragma: cache");

        $offset = 30 * 60 * 60 * 24; // 缓存一个月
        header("Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT");

        $controllername = input("controllername");
        $this->loadlang($controllername);
        //强制输出JSON Object
        $result = jsonp(Lang::get(), 200, [], ['json_encode_param' => JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE]);
        return $result;
    }

    /**
     * 上传文件
     */
    public function upload()
    {

        return action('api/common/upload');
    }

    /**
     * 多图上传
     */
    public function moreUpload(){
            if($this->request->isPost()){
                $res['code']=1;
                $res['msg'] = '上传成功！';
                $file = $this->request->file('file');
                $info = $file->validate(['size'=>204800,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads/circle');
              //  $info = $file->move('uploads/circle/');
                if($info){
                    $res['name'] = $info->getFilename();
                    $res['filepath'] = '/uploads/circle/'.$info->getSaveName();
                }else{
                    $res['code'] = 0;
                    $res['msg'] = '上传失败！'.$file->getError();
                }
                return $res;
            }
        }
}
