<?php
namespace app\tongji\model;

use think\Model;

class Tongji extends Model
{

    protected $name = 'tongji_tongji';
    protected $pk = 'id';
    protected $autoWriteTimestamp = true;
    protected $type = [
        'request' => 'serialize',
    ];
    protected $updateTime = false;

}