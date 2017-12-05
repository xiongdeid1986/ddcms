<?php
namespace app\content\validate;

use think\Validate;

class Content extends Validate
{
    protected $rule = [
        'title|标题' => 'require|max:80',
    ];

    protected $scene = [
        'add' => ['title'],
        'edit' => ['title'],
    ];
}