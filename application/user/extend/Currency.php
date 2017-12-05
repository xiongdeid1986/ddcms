<?php
namespace app\user\extend;
class Currency
{

    // 增加
    public static function inc($opt)
    {
        $currencys = \ebcms\Config::get('user.base.currency');
        if (!isset($opt['currency']) || !isset($currencys[$opt['currency']])) {
            return '币种不存在，请确认！';
        }
        // 
        \think\Db::name('user_currency') -> where('id',$opt['user_id']) -> setInc($opt['currency'],abs($opt['num']));
        // 流水
        $data = [
            'user_id'   =>  $opt['user_id'],
            'remark'   =>  $opt['remark'],
            'num'   =>  $opt['num'],
            'currency'   =>  $opt['currency'],
            'manager_id'   =>  isset($opt['manager_id'])?$opt['manager_id']:0,
            'create_time'   =>  time(),
            'update_time'   =>  time(),
            'ip'    =>  request()->ip(0, true),
            'sort'   =>  0,
            'status'   =>  1,
        ];
        \think\Db::name('user_currency_log') -> insert($data);
        return true;
    }

    // 减少
    public static function dec($opt)
    {

        $currencys = \ebcms\Config::get('user.base.currency');
        if (!isset($opt['currency']) || !isset($currencys[$opt['currency']])) {
            return '币种不存在，请确认！';
        }
        
        // 判断余额知否足够
        if (!isset($opt['noauth']) || true != $opt['noauth']) {
            $yue = \think\Db::name('user_currency') -> where('id',$opt['user_id']) -> value($opt['currency']);
            if ($yue < abs($opt['num'])) {
                return '余额不足！';
            }
        }

        \think\Db::name('user_currency') -> where('id',$opt['user_id']) -> setDec($opt['currency'],abs($opt['num']));
        // 流水
        $data = [
            'user_id'   =>  $opt['user_id'],
            'remark'   =>  $opt['remark'],
            'num'   =>  -abs($opt['num']),
            'currency'   =>  $opt['currency'],
            'manager_id'   =>  isset($opt['manager_id'])?$opt['manager_id']:0,
            'create_time'   =>  time(),
            'update_time'   =>  time(),
            'ip'    =>  request()->ip(0, true),
            'sort'   =>  0,
            'status'   =>  1,
        ];
        \think\Db::name('user_currency_log') -> insert($data);
        return true;
    }

}