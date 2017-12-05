<?php
namespace app\user\model;

use think\Model;

class Comment extends Model
{

    protected $name = 'user_comment';
    protected $pk = 'id';
    protected $autoWriteTimestamp = true;

    // 留言人
    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id', '', 'LEFT');
    }

    // 回复对象
    public function touser()
    {
        return $this->belongsTo('User', 'to_user_id', 'id', '', 'LEFT');
    }
}