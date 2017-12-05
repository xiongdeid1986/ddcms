<?php
namespace app\superpay\model;

use think\Model;

class Buy extends Model
{

    protected $name = 'superpay';
    protected $pk = 'id';

    // 购买人
    public function user()
    {
        return $this->belongsTo('\app\user\model\User', 'user_id', 'id', '', 'LEFT');
    }

    // 获取货币名称
    protected function getCurrencyNameAttr()
    {
        $data = \ebcms\Config::get('user.base.currency');
        return isset($data[$this -> currency])?$data[$this -> currency]:$this -> currency;
    }

}