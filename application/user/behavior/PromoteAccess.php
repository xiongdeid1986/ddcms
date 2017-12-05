<?php
namespace app\user\behavior;

class PromoteAccess
{
    public function run(&$params)
    {
        $ip = \think\Request::instance()->ip();
        if (!\ebcms\Config::get('user.promote.promote_closed') && \think\Request::instance()->has('promote', 'get')) {
            if (!\think\Cache::has('PromoteAccess_' . $ip)) {
                //访问奖励
                $promote_access_ncentive = \ebcms\Config::get('user.promote.promote_access_ncentive');
                foreach ($promote_access_ncentive as $key => $value) {
                    $opt = [
                        'user_id' => \think\Request::instance()->get('promote'),
                        'remark' => '推广访问奖励(ip:'.$ip.')',
                        'num' => abs(intval($value)),
                        'currency' => $key,
                        'manager_id' => 0,
                    ];
                    \app\user\extend\Currency::inc($opt);
                }
                //标记奖励状态
                \think\Cache::set('PromoteAccess_' . $ip, 1, 86400);
            }
            // 设置推广用户id 用于注册成功后赠送奖励
            \think\Session::set('PromoteRegUserId', \think\Request::instance()->get('promote'));
        }
    }
}