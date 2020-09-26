<?php

namespace app\common\model\joinin;

use think\Model;
use traits\model\SoftDelete;

class Message extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'web_joinin_message';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [

    ];
    

    







}
