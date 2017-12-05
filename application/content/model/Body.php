<?php
namespace app\content\model;

use think\Model;

class Body extends Model
{

    protected $name = 'content_body';
    protected $pk = 'id';
    protected $autoWriteTimestamp = false;

    public function content()
    {
        return $this->belongsTo('Content', 'id', 'id');
    }
}