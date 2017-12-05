<?php
namespace app\user\extend;
class Message
{

    public static function add($data)
    {
        $data['create_time'] = time();
        $data['update_time'] = time();
        $data['sort'] = 0;
        $data['status'] = 1;
        $data['isread'] = 0;
        if (false !== \think\Db::name('user_message')->insert($data)) {
            return true;
        }else{
            return false;
        }
    }

    public static function adds($datas)
    {
        if (false !== \think\Db::name('user_message')->insertAll($datas)) {
        	return true;
        }else{
        	return false;
        }
    }

}