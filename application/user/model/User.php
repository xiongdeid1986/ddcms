<?php
namespace app\user\model;
use think\Model;
class User extends Model
{

    protected $pk = 'id';
    protected $autoWriteTimestamp = true;
    protected $type = [
        'ext' => 'json',
    ];

    public function currency()
    {
        return $this->hasOne('Currency','id','id');
    }

    public function currencylog()
    {
        return $this->hasMany('Currencylog','id');
    }

    public function message()
    {
        return $this->hasMany('Message');
    }

    protected function setEmailAttr($value)
    {
        return strtolower(trim($value));
    }

    protected function setPasswordAttr($value, $data)
    {
        return \ebcms\Func::crypt_pwd(trim($value), $this -> email);
    }

    protected function getSpaceUrlAttr($value, $data)
    {
        return \think\Url::build('user/space/index?id=' . $data['id']);
    }

    protected function getMessageCountAttr($value, $data)
    {
        static $count = null;
        if (null == $count) {
            $count = \think\Session::get('user_message_count');
            if (!\think\Cookie::get('user_message_expire')) {
                $where = [
                    'user_id' => \think\Session::get('user_id'),
                    'isread' => 0,
                    'status' => 1,
                ];
                $count = \think\Db::name('user_message')->where($where)->count();
                \think\Session::set('user_message_count',$count);
                \think\Cookie::set('user_message_expire',time(),10);
            }
        }
        return $count;
    }

    protected function getGradeTitleAttr($value, $data)
    {
        $grade = \ebcms\Config::get('user.base.grade.'.$data['grade']);
        return $grade?:'游客';
    }

}