<?php
namespace app\user\model;
use think\Model;
class Currencylog extends Model
{

    protected $name = 'user_currency_log';
    protected $pk = 'id';
    protected $autoWriteTimestamp = true;

    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id', '', 'LEFT');
    }

    public function manager()
    {
        return $this->belongsTo('\app\ebcms\model\Manager', 'manager_id', 'id', '', 'LEFT');
    }

    protected function getCurrencyNameAttr($value,$data){
        $x = \ebcms\Config::get('user.base.currency');
        return isset($x[$data['currency']])?$x[$data['currency']]:$data['currency'];
    }

}