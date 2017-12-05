<?php
namespace app\user\controller;
class Auth extends \app\index\controller\Common
{

    // 登录
    public function login()
    {
        // 登陆页面
        if (request()->isGet()) {
            if (!\think\Session::has('go')) {
                if (input('?server.HTTP_REFERER')) {
                    \think\Session::set('go', input('server.HTTP_REFERER'));
                }
            }
            // 位置
            \ebcms\Position::add(['title' => '登录', 'url' => \think\Url::build('user/auth/login')]);
            // seo设置
            $this->assign('seo', [
                'title' => '登录 - ' . $this->seo['sitename'],
                'keywords' => '登录',
                'description' => '登录',
            ]);
            return $this->fetch();
        } elseif (request()->isPost()) {
            // 验证验证码
            if (false !== \ebcms\Config::get('user.login.captcha')) {
                if (!\ebcms\Func::check_captcha(input('captcha'))) {
                    $this->error('验证码错误！');
                }
            }

            \think\Db::transaction(function(){
                // 读取该账户
                $_where = array(
                    'email' => input('email'),
                );
                $m = new \app\user\model\User();
                if (!$user = $m->where($_where)->find()) {
                    $this->error('该邮箱未注册！');
                }
                // 判断账户状态
                if ($user['status'] == 0) {
                    $this->error('账户未通过审核！');
                }
                // 判断密码是否正确
                if ($user['password'] !== \ebcms\Func::crypt_pwd(input('password'), $user['email'])) {
                    $this->error('密码不匹配！');
                }

                $last_login_time = $user['login_time'];

                // 更新数据库
                $data = array(
                    'login_ip' => request()->ip(),
                    'login_time' => time(),
                    'id' => $user['id'],
                    'login_times' => $user['login_times'] + 1
                );
                $user -> save($data);
                
                // 登陆奖励
                if (date('Y-m-d',$last_login_time) != date('Y-m-d')) {
                    $jiangli = \ebcms\Config::get('user.login.jiangli');
                    foreach ($jiangli as $key => $value) {
                        $opt = [
                            'user_id'   =>  $user['id'],
                            'remark'   =>  '登陆奖励',
                            'currency'   =>  $key,
                            'num'   =>  $value,
                        ];
                        \app\user\extend\Currency::inc($opt);
                    }
                }
                // 写入新session
                \think\Session::set('user_id', $user['id']);
            });

            $url = \think\Session::has('go') ? \think\Session::pull('go') : 'index/index/index';
            $this->success('登陆成功!', $url);
        }
    }

    // 注册
    public function reg()
    {
        if (true !== \ebcms\Config::get('user.reg.on')) {
            $this->error('系统关闭新注册！');
        }
        if (request()->isGet()) {
            \ebcms\Position::add(['title' => '注册', 'url' => \think\Url::build('user/auth/reg')]);
            // seo设置
            $this->assign('seo', [
                'title' => '注册 - ' . $this->seo['sitename'],
                'keywords' => '注册',
                'description' => '注册',
            ]);
            return $this->fetch();
        } elseif (request()->isPost()) {
            // 验证验证码
            if (false !== \ebcms\Config::get('user.reg.captcha')) {
                if (!\ebcms\Func::check_captcha(input('captcha'))) {
                    $this->error('验证码错误！');
                }
            }
            // 邮箱证码
            if (\ebcms\Config::get('user.reg.email_verify')) {
                $reg_code = \think\Session::get('reg_code');
                if (!$reg_code || $reg_code != input('reg_code')) {
                    $this -> error('认证码错误！');
                }
            }

            \think\Db::transaction(function(){
                $reg_grade = \ebcms\Config::get('user.reg.grade');
                $data = [
                    'email'         =>  trim(input('email')),
                    'nickname'      =>  trim(input('nickname')),
                    'password'      =>  trim(input('password')),
                    'grade'         =>  $reg_grade?:0,
                    'login_times'   =>  1,
                    'status'        =>  1,
                ];

                $obj = new \app\user\model\User();
                if (false === $obj -> validate('User.reg')->save($data)) {
                    $this -> error($obj -> getError());
                }
                $currencys = array_keys(\ebcms\Config::get('user.base.currency'));
                $obj -> currency() -> save([$currencys[0]=>0]);

                // 注册初始奖励
                $jiangli = \ebcms\Config::get('user.reg.jiangli');
                foreach ($jiangli as $key => $value) {
                    $opt = [
                        'user_id'   =>  $obj['id'],
                        'remark'   =>  '注册奖励',
                        'currency'   =>  $key,
                        'num'   =>  $value,
                    ];
                    \app\user\extend\Currency::inc($opt);
                }

                // 发送注册成功信息！
                $reg_success = \ebcms\Func::render_tpl(\ebcms\Config::get('user.reg.success_msg'), ['user'=>$obj]);

                $data = [
                    'user_id'   =>  $obj['id'],
                    'topic'   =>  '系统消息',
                    'title'   =>  '欢迎您的到来！',
                    'content'   =>  $reg_success
                ];
                \app\user\extend\Message::add($data);

                // 写入新session
                \think\Session::set('user_id', $obj['id']);

                // 发送注册邮件信息
                \ebcms\Func::sendmail($obj['email'], '尊敬的用户', '会员信息', $reg_success);

                \think\Hook::listen('user_reg_success_init', $obj);
                
            });

            $this -> success('注册成功！', 'user/index/index');
        }
    }

    public function regcode(){
        $email = input('email');

        // 判断是否注册
        if (\app\user\model\User::where('email', $email) -> find()) {
            $this -> error('该邮箱已经注册过了！');
        }

        $code = md5(rand() . $email);
        // 发送连接到邮箱
        $str = \ebcms\Func::render_tpl(\ebcms\Config::get('user.reg.email_tpl'), ['code' => $code]);
        if (\ebcms\Func::sendmail($email, '账户注册', '邮箱认证', $str)) {

            // 设置code验证
            \think\Session::set('reg_code', $code);

            $this->success('你好，邮箱认证码已经发送到您的邮箱，请登录邮箱查看！');
        } else {
            $this->error('邮件发送失败！请联系管理员！');
        }
    }

    // 找回密码
    public function password()
    {
        if (request()->isGet()) {
            \ebcms\Position::add(['title' => '找回密码', 'url' => \think\Url::build('user/auth/password')]);
            // seo设置
            $this->assign('seo', [
                'title' => '找回密码 - ' . $this->seo['sitename'],
                'keywords' => '找回密码',
                'description' => '找回密码',
            ]);
            return $this->fetch();
        } elseif (request()->isPost()) {

            // 验证验证码
            if (false !== \ebcms\Config::get('user.password.captcha')) {
                if (!\ebcms\Func::check_captcha(input('captcha'))) {
                    $this->error('验证码错误！');
                }
            }

            // 邮箱认证
            $password_code = \think\Session::get('password_code');
            if (!$password_code || $password_code != input('password_code')) {
                $this -> error('认证码错误！');
            }

            \think\Db::transaction(function(){
                $password = input('password');
                if (strlen($password) < 6 || strlen($password) > 10) {
                    $this->error('密码长度请控制在6-10位!');
                }
                $_where = array(
                    'email' => input('email'),
                );
                if (!$user = \think\Db::name('user') -> where($_where) -> find()) {
                    $this->error('账户不存在！');
                }
                
                $user['password'] = \ebcms\Func::crypt_pwd($password, $user['email']);
                if (false === \think\Db::name('user')->update($user)) {
                    $this->error('密码修改失败！');
                }
                // 发送系统消息
                $data = [
                    'user_id'   =>  $user['id'],
                    'topic'   =>  '系统消息',
                    'title'   =>  '您的密码已修改成功！',
                    'content'   =>  '您的密码已修改成功，请妥善保管！'
                ];
                \app\user\extend\Message::add($data);

            });
            
            $this->success('密码修改成功！', 'user/index/index');
        }
    }

    // 找回账户
    public function passwordcode(){
        $email = input('email');
        // 判断是否注册
        if (!\app\user\model\User::where('email', $email) -> find()) {
            $this -> error('该邮箱尚未注册！');
        }

        $code = md5(rand() . $email);
        // 发送连接到邮箱
        $str = \ebcms\Func::render_tpl(\ebcms\Config::get('user.password.email_tpl'), ['code' => $code]);
        if (\ebcms\Func::sendmail($email, '找回密码', '邮箱认证', $str)) {

            // 设置code验证
            \think\Session::set('password_code', $code);

            $this->success('你好，邮箱认证码已经发送到您的邮箱，请登录邮箱查看！');
        } else {
            $this->error('邮件发送失败！请联系管理员！');
        }
    }

    // 退出
    public function logout()
    {
        if (request()->isGet()) {
            \think\Session::clear();
            $this->success('退出成功');
        }
    }

}