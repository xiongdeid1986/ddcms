<?php
namespace app\content\validate;

use think\Validate;

class Tag extends Validate
{
    protected $rule = [
        'tag|标签名称' => 'require|max:80',
    ];

    protected $scene = [
        'add' => ['tag'],
        'edit' => ['tag'],
    ];
}