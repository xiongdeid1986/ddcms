<?php
namespace app\mbzs\validate;

use think\Validate;

class Mbzs extends Validate
{
    protected $rule = [
        'group|分组' => 'require|max:25',
        'title|标题' => 'require|max:80',
        'name|名称' => 'require|max:40',
        'form|表单' => 'require',
    ];

    protected $scene = [
        'add' => ['group', 'title', 'name', 'form'],
        'edit' => ['group', 'title', 'name'],
    ];
}