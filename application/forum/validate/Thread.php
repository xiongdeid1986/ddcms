<?php 
namespace app\forum\validate;
use think\Validate;
class Thread extends Validate
{
    protected $rule = [
        'title|标题'  =>  'require|max:80|min:5',
    ];

    protected $scene = [
        'add'   =>  ['title'],
        'edit'  =>  ['title'],
    ];
}