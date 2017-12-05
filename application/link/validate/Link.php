<?php
namespace app\link\validate;

use think\Validate;

class Link extends Validate
{

    protected $rule = [
        'group|分组' => 'require|max:25',
        'title|网站名称' => 'require|max:80',
        'url|网址' => 'require',
    ];

    protected $scene = [
        'add' => ['group', 'title', 'url'],
        'edit' => ['group', 'title', 'url'],
        'tougao' => ['group', 'title', 'url'],
    ];
}