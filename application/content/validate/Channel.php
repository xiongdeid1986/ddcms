<?php
namespace app\content\validate;

use think\Validate;

class Channel extends Validate
{
    protected $rule = [
        'title|标题' => 'require|max:80',
        'name|名称' => 'require|max:25',
    ];

    protected $scene = [
        'add' => ['title', 'name'],
        'edit' => ['title', 'name'],
    ];
}