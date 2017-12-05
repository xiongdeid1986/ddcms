<?php
namespace app\user\controller;
class Gradebuy extends \app\index\controller\Common
{

    public function index()
    {
        // 需要登陆
        if (!\think\Session::get('user_id')) {
            \think\Session::set('go', 'user/index/index');
            $this->redirect('user/auth/login');
        }

        if (request() -> isGet()) {
            // 位置
            \ebcms\Position::add(['title' => '会员中心', 'url' => \think\Url::build('user/index/index')]);
            \ebcms\Position::add(['title' => '会员自助升级', 'url' => \think\Url::build('user/gradebuy/index')]);

            // seo设置
            $this->assign('seo', [
                'title' => '会员自助升级 - ' . $this->seo['sitename'],
                'keywords' => '会员自助升级',
                'description' => '会员自助升级',
            ]);

            $grades = \ebcms\Config::get('user.base.grade');
            $config = \ebcms\Config::get('user.gradebuy.config');
            $user = \app\user\model\User::get(\think\Session::get('user_id'));

            $next_grade = '';
            foreach ($grades as $key => $value) {
                if ($key > $user['grade']) {
                    $next_grade = $key;
                    break;
                }
            }
            $currencys = \ebcms\Config::get('user.base.currency');

            $this -> assign('user',$user);
            $this -> assign('next_grade',$next_grade);
            $this -> assign('currencys',$currencys);
            $this -> assign('grades',$grades);
            $this -> assign('config',$config);

            return $this->fetch();
        }elseif (request() -> isPost()) {
            if (true !== \ebcms\Config::get('user.gradebuy.allow')) {
                $this -> error('已关闭会员自助升级');
            }
            
            $config = \ebcms\Config::get('user.gradebuy.config');
            $user = \app\user\model\User::get(\think\Session::get('user_id'));
            $grades = \ebcms\Config::get('user.base.grade');
            foreach ($grades as $key => $value) {
                if ($key > $user['grade']) {
                    $next_grade = $key;
                    break;
                }
            }
            if (!isset($config[$next_grade]['currency']) || !isset($config[$next_grade]['value'])) {
                $this -> error('暂时不可升级，请稍后再试！');
            }
            $price = (Int)$config[$next_grade]['value'];
            if ($price < 1) {
                $this -> error('暂时不可升级，请稍后再试！');
            }
            $currency = $config[$next_grade]['currency'];
            $currencys = \ebcms\Config::get('user.base.currency');
            if (!isset($currencys[$currency])) {
                $this -> error('暂时不可升级，请稍后再试！');
            }
            $opt = [
                'user_id'   =>  $user['id'],
                'remark'   =>  '自主账户升级',
                'num'   =>  $price,
                'currency'   =>  $currency
            ];
            if (true !== $res = \app\user\extend\Currency::dec($opt)) {
                $this -> error($res);
            }

            $user -> grade = $next_grade;
            $user -> save();
            $this->success('升级成功！');
        }
    }
}