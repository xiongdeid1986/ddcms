<?php
namespace app\user\controller\admin;
class User extends \app\ebcms\controller\Common
{
    
    public function index()
    {
        if (request()->isGet()) {
            return $this->fetch();
        }
    }

    public function add()
    {
        if (request()->isGet()) {
            return \ebcms\Form::fetch();
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = new \app\user\model\User();
                if (false === $obj -> validate('User.add')->save(input())) {
                    $this -> error($obj -> getError());
                }
                $obj -> currency() -> save([]);
            });
            $this -> success('操作成功！');
        }
    }

    public function edit()
    {
        if (request()->isGet()) {
            $obj = \app\user\model\User::get(input('id'));
            return \ebcms\Form::fetch($obj);
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = \app\user\model\User::get(input('id'));
                if (false === $obj -> validate('User.edit') -> allowfield(['nickname', 'grade', 'email', 'motto', 'avatar']) -> isUpdate(true) -> save(input())) {
                    $this -> error($obj -> getError());
                }
            });
            $this -> success('操作成功！');
        }
    }

    public function delete()
    {
        \think\Db::transaction(function(){
            $items = \app\user\model\User::where(['id'=>['in',input('ids')]]) -> select();
            foreach ($items as $key => $obj) {
                $obj -> currency -> delete();
                $obj -> delete();
            }
        });
        $this -> success('操作成功！');
    }

    // 重置密码
    public function password()
    {
        // 判断并获取账户
        $id = input('id', '', 'intval');
        if (!$user = \app\user\model\User::get($id)) {
            $this->error('账户提交错误，请确认是否正确！');
        }

        // 设置code
        $code = md5(rand().$user['email']);
        \think\Cache::set('password_code_'.$code,$user['email'],3600);

        // 发送连接到邮箱
        $pars = array(
            'code' => $code,
        );
        $url = request()->domain() . \think\Url::build('user/auth/password', $pars);
        $str = \ebcms\Func::render_tpl(htmlspecialchars_decode(\ebcms\Config::get('user.password.email_tpl')), array('url' => $url));
        if (\ebcms\Func::sendmail($user['email'], '尊敬的用户', '找回密码', $str)) {
            $this->success('重置密码链接已发送到对方邮箱！');
        } else {
            $this->error('邮件发送失败！请联系管理员！');
        }
    }

    public function status()
    {
        \think\Db::transaction(function(){
            \app\user\model\User::where(['id'=>['in',input('ids')]]) -> setField('status',in_array(input('value'), [0,1,99])?input('value'):0);
        });
        $this -> success('操作成功！');
    }

    // 财务变更
    public function currency()
    {
        if (request() -> isGet()) {
            return \ebcms\Form::fetch();
        }elseif (request() -> isPost()) {
            \think\Db::transaction(function(){
                $opt = [
                    'user_id'   =>  input('user_id'),
                    'remark'   =>  input('remark'),
                    'num'   =>  abs(input('num','intval')),
                    'currency'   =>  input('currency'),
                    'manager_id'   =>  \think\Session::get('manager_id'),
                ];
                $type = input('type');
                if ($type == 'inc') {
                    $res = \app\user\extend\Currency::inc($opt);
                }else{
                    $res = \app\user\extend\Currency::dec($opt);
                }
                if (true !== $res) {
                    $this -> error($res);
                }else{
                    // 消息通知
                    if (!$msg = input('msg')) {
                        $str = $type == 'inc'?'充值':'扣除';
                        $currency = \ebcms\Config::get('user.base.currency');
                        if ($type == 'inc') {
                            $msg = '系统已为您充值 ' . $opt['num'] . $currency[$opt['currency']] . ',若有疑问，请联系我们！';
                        }else{
                            $msg = '系统已扣除您 ' . $opt['num'] . $currency[$opt['currency']] . ',若有疑问，请联系我们！';
                        }
                    }
                    $data = [
                        'user_id'   =>  input('user_id'),
                        'topic'   =>  '系统消息',
                        'title'   =>  '财务变更通知！',
                        'content'   =>  $msg
                    ];
                    \app\user\extend\Message::add($data);
                }
            });
            $this -> success('操作成功！');
        }
    }

    // 消息
    public function msg()
    {
        if (request() -> isGet()) {
            return \ebcms\Form::fetch();
        }elseif (request() -> isPost()) {
            \think\Db::transaction(function(){
                if (false === \app\user\extend\Message::add(input())) {
                    $this -> error('发送失败！');
                }
            });
            $this -> success('发送成功！');
        }
    }

    // 显示用户信息
    public function info()
    {
        if ('baseinfo' == input('do')) {
            return $this->fetch('baseinfo');
        }else{
            return $this->fetch();
        }
    }

}