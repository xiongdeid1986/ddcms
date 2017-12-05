<?php
namespace app\forum\validate;

use think\Validate;

class Body extends Validate
{
    protected $rule = [
        'detail|内容' => 'require|min:5',
    ];

    protected $scene = [
        'add' => ['detail'],
        'edit' => ['detail'],
    ];
}