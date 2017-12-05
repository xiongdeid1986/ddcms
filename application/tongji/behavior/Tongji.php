<?php
namespace app\tongji\behavior;

class Tongji
{
    public function run(&$params)
    {
        if (defined('IS_INDEX') && IS_INDEX) {
            if (true === \ebcms\Config::get('tongji.on')) {
                $pos = \ebcms\Position::getLast();
                $data = [
                    'user_id' => \think\Session::get('user_id') ? \think\Session::get('user_id') : 0,
                    'title' => $pos['title'],
                    'url' => request()->url(true),
                    'from' => request()->server('HTTP_REFERER')?:'',
                    'ip' => request()->ip(0, true),
                    'create_time' => time(),
                ];
                \app\tongji\model\Tongji::create($data);
            }
        }
    }
}