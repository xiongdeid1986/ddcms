<?php
namespace app\user\model;
use think\Model;
class Message extends Model
{

    protected $name = 'user_message';
    protected $pk = 'id';
    protected $autoWriteTimestamp = true;

}