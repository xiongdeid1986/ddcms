<?php
namespace app\content\model;
use think\Model;
class Attr extends Model
{
    protected $name = 'content_attr';
    public function content()
    {
        return $this->belongsTo('Content');
    }
}