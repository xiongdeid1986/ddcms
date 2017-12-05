<?php
namespace app\user\behavior;

class PromoteReg
{
    public function run(&$user)
    {
        if (!\ebcms\Config::get('user.promote.promote_closed') && \think\Session::has('PromoteRegUserId')) {
            //访问奖励
            $promote_reg_ncentive = \ebcms\Config::get('user.promote.promote_reg_ncentive');
            foreach ($promote_reg_ncentive as $key => $value) {
                $opt = [
                    'user_id' => \think\Session::get('PromoteRegUserId'),
                    'remark' => '推广注册奖励（ID:'.$user['id'].')',
                    'num' => abs(intval($value)),
                    'currency' => $key,
                    'manager_id' => 0,
                ];
                \app\user\extend\Currency::inc($opt);
            }
            //标记奖励状态
            \think\Session::delete('PromoteRegUserId');
        }
    }
}