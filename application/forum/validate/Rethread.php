<?php 
namespace app\forum\validate;
use think\Validate;
class Rethread extends Validate
{
    protected $rule = [
        'content|内容'  =>  'require|min:5',
    ];

    protected $scene = [
        'add'   =>  ['content'],
        'edit'   =>  ['content'],
    ];
}