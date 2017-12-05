<?php 
namespace app\forum\validate;
use think\Validate;
class Forum extends Validate
{
    protected $rule = [
        'title|标题'  =>  'require|max:80',
    ];

    protected $scene = [
        'add'   =>  ['title'],
        'edit'  =>  ['title'],
    ];
}