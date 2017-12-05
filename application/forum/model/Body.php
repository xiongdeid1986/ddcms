<?php 
namespace app\forum\model;

use think\Model;

class Body extends Model
{

    protected $name = 'forum_thread_body';

    // 关闭自动时间写入
    protected $autoWriteTimestamp = false;

    public function thread()
    {
        return $this->belongsTo('Thread','id','id');
    }
}