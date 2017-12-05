<?php
namespace app\content\behavior;

class Click
{
    public function run(&$params)
    {
        \app\content\model\Content::where(['id' => \think\Config::get('content_tongji_id')])->setInc('click', 1);
    }
}