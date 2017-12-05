<?php
namespace app\user\model;
use think\Model;
class Currency extends Model
{

    protected $name = 'user_currency';
    protected $pk = 'id';
    protected $autoWriteTimestamp = false;

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function currencylog()
    {
        return $this->hasMany('Currencylog', 'user_id', 'id');
    }

    protected function getTongjiAttr($value,$data){
        static $res;
        if ($res) {
            return $res;
        }
        $currency = \ebcms\Config::get('user.base.currency');
        $res = [];
        foreach ($currency as $key => $value) {
            $where = [
                'user_id'   =>  ['eq',$data['id']],
                'currency'  =>  ['eq',$key],
                'num'       =>  ['gt',0],
            ];
            $res[$key]['in'] = $this -> currencylog() -> where($where) -> sum('num');
            $where = [
                'user_id'   =>  ['eq',$data['id']],
                'currency'  =>  ['eq',$key],
                'num'       =>  ['lt',0],
            ];
            $res[$key]['out'] = $this -> currencylog() -> where($where) -> sum('num');
        }
        return $res;
    }

}