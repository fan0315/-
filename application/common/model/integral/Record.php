<?php

namespace app\common\model\integral;

use think\Model;


class Record extends Model
{
    // 表名
    protected $name = 'integral_record';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'points_buy_time_text',
        'exchange_time_text'
    ];
    

    public function getPointsBuyTimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['points_buy_time']) ? $data['points_buy_time'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getExchangeTimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['exchange_time']) ? $data['exchange_time'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setPointsBuyTimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }

    protected function setExchangeTimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }


}
