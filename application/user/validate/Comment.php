<?php
namespace app\user\validate;

use think\Validate;

class Comment extends Validate
{
    protected $rule = [
        'content|评论内容' => 'require|min:5',
    ];

    protected $scene = [
        'add' => ['content'],
        'edit' => ['content'],
    ];
}