<?php 
namespace app\forum\model;

use think\Model;

class Thread extends Model
{

    protected $name = 'forum_thread';
    protected $auto = ['description'];
    protected $insert = ['user_id', 'ip'];
    protected $autoWriteTimestamp = true;
    protected $type = [
        'eb_style' => 'json',
        'eb_cache' => 'json',
    ];

    // 关联
    public function body()
    {
        return $this->hasOne('Body','id','id','','LEFT');
    }
    public function forum()
    {
        return $this->belongsTo('Forum','forum_id','id','','LEFT');
    }
    public function user()
    {
        return $this->belongsTo('\app\user\model\User','user_id','id','','LEFT');
    }
    public function rethread()
    {
        return $this->hasMany('Rethread','thread_id');
    }
    protected function setDescriptionAttr($value,$data)
    {
        if (!$value) {
            return mb_substr(str_replace([' ', '&nbsp;', '　', "\r", "\n", "\t"], '', strip_tags(htmlspecialchars_decode(input('detail')))), 0, 200);
        } else {
            return $value;
        }
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
    protected function getUrlAttr($value,$data)
    {
        return url('forum/thread/index',['id'=>$data['id']]);
    }
    protected function getStatusAbleAttr($value,$data)
    {
        if (!$user_id = \think\Session::get('user_id')) {
            return false;
        }
        return false;
    }
    protected function getStatusUrlAttr($value,$data)
    {
        return url('forum/thread/status',['id'=>$data['id']]);
    }
    protected function getEditAbleAttr($value,$data)
    {
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
        return url('forum/thread/edit',['id'=>$data['id']]);
    }
    protected function getDeleteAbleAttr($value,$data)
    {
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
        return url('forum/thread/delete',['id'=>$data['id']]);
    }
    protected function getTopUrlAttr($value,$data)
    {
        return url('forum/thread/top',['id'=>$data['id']]);
    }
    protected function getBestUrlAttr($value,$data)
    {
        return url('forum/thread/best',['id'=>$data['id']]);
    }
    protected function getStyleAttr($value, $data)
    {
        switch ($data['best']) {
            case '1':
                $str = 'font-weight: bolder;';
                break;
            case '2':
                $str = 'color:red;';
                break;
            case '3':
                $str = 'font-weight: bolder;color:red;';
                break;
            
            default:
                $str = '';
                break;
        }
        return $str;
    }
    protected function getRethreads2Attr($value,$data)
    {
        $cache = json_decode($data['eb_cache'],true);
        if (!isset($cache['rethreads_time']) || $cache['rethreads_time']+60<time()) {
            $rethreads = \think\Db::name('forum_rethread') -> where(['thread_id'=>$data['id'],'status'=>1]) -> count();
            \think\Db::name('forum_thread') -> update(['id'=>$data['id'],'rethreads'=>$rethreads,'eb_cache'=>json_encode(['rethreads_time'=>time()])]);
            return $rethreads;
        }else{
            return $data['rethreads'];
        }
    }

}