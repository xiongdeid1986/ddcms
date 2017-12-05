<?php
namespace app\user\validate;
use think\Validate;
class User extends Validate
{

    protected $rule = [
        'email|邮箱' => 'require|email|unique:user',
        'nickname|昵称' => 'require|max:20|unique:user',
        'motto|座右铭' => 'max:255',
        'password|密码' => 'require|min:6|max:12',
    ];

    protected $scene = [
        'add' => ['email', 'nickname', 'motto', 'password'],
        'edit' => ['email', 'nickname', 'motto'],
        'useredit' => ['nickname', 'motto'],
        'reg' => ['nickname', 'email','password'],
    ];
}