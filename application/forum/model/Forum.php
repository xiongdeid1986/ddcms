<?php 
namespace app\forum\model;

use think\Model;

class Forum extends Model
{

    protected $name = 'forum';
    protected $type = [
        'eb_ext'    =>  'json',
        'config'    =>  'json',
    ];

    public function thread()
    {
        return $this->hasMany('Thread','forum_id','id');
    }
    public function moderator()
    {
        return $this->belongsToMany('\app\user\model\User', 'forum_moderator', 'user_id', 'forum_id');
    }

    protected function getMetatitleAttr($value, $data)
    {
        if (!$data['eb_metatitle']) {
            return $data['title'];
        }
        return $data['eb_metatitle'];
    }

    protected function getExtAttr($value, $data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        $ext = json_decode($data['eb_ext'],true);
        if (is_array($ext) && isset($ext['__config__'])) {
            unset($ext['__config__']);
        }
        return $res[$data['id']] = is_array($ext)?$ext:[];
    }

    protected function getUrlAttr($value,$data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        return $res[$data['id']] = \think\Url::build('forum/index/index',['id'=>$data['id']]);
    }

    protected function getCountAttr($value, $data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        $where = [
            'forum_id' => ['eq', $data['id']],
            'status' => ['eq', 1],
        ];
        return $res[$data['id']] = \think\Db::name('forum_thread') -> where($where) -> cache(30) -> count();
    }

}