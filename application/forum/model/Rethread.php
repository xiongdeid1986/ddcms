<?php 
namespace app\forum\model;

use think\Model;

class Rethread extends Model
{

    protected $name = 'forum_rethread';
    protected $auto = [];
    protected $insert = ['user_id', 'ip'];
    protected $autoWriteTimestamp = true;
    protected $type = [
        'eb_cache' => 'json',
    ];

    public function thread()
    {
        return $this->belongsTo('Thread','thread_id','id','','LEFT');
    }
    public function user()
    {
        return $this->belongsTo('\app\user\model\User','user_id','id','','LEFT');
    }
    protected function setUserIdAttr($value,$data)
    {
        if (is_login()) {
            return \think\Session::get('user_id');
        }else{
            return 0;
        }
    }
    protected function setIpAttr()
    {
        return request()->ip();
    }
    protected function getStatusUrlAttr($value,$data)
    {
        return url('forum/rethread/status',['id'=>$data['id']]);
    }
    protected function getEditAbleAttr($value,$data){
        if (!$user_id = \think\Session::get('user_id')) {
            return false;
        }
        if ($user_id == $data['user_id'] && $data['create_time'] + 48*3600 > time()) {
            return true;
        }
        return false;
    }
    protected function getEditUrlAttr($value,$data)
    {
        return url('forum/rethread/edit',['id'=>$data['id']]);
    }
    protected function getDeleteAbleAttr($value,$data){
        if (!$user_id = \think\Session::get('user_id')) {
            return false;
        }
        if ($user_id == $data['user_id'] && $data['create_time'] + 48*3600 > time()) {
            return true;
        }
        return false;
    }
    protected function getDeleteUrlAttr($value,$data)
    {
        return url('forum/rethread/delete',['id'=>$data['id']]);
    }

}