<?php
namespace app\user\controller;
class Currency extends \app\index\controller\Common
{

    public function _initialize()
    {
        parent::_initialize();
        if (!\think\Session::get('user_id')) {
            \think\Session::set('go', 'user/index/index');
            $this->redirect('user/auth/login');
        }
    }

    // 账户首页
    public function index()
    {
        if (request()->isGet()) {

            // 位置
            \ebcms\Position::add(['title' => '会员中心', 'url' => \think\Url::build('user/index/index')]);
            \ebcms\Position::add(['title' => '账户概况', 'url' => \think\Url::build('user/currency/index')]);

            // seo设置
            $this->assign('seo', [
                'title' => '账户管理 - 会员中心 - ' . $this->seo['sitename'],
                'keywords' => '账户管理',
                'description' => '账户管理',
            ]);

            return $this->fetch();
        }
    }

    // 流水
    public function log()
    {
        if (request()->isGet()) {

            // 位置
            \ebcms\Position::add(['title' => '会员中心', 'url' => \think\Url::build('user/index/index')]);
            \ebcms\Position::add(['title' => '账户流水', 'url' => \think\Url::build('user/currency/log')]);

            // seo设置
            $this->assign('seo', [
                'title' => '账户流水 - 账户管理 - ' . $this->seo['sitename'],
                'keywords' => '账户流水',
                'description' => '账户流水',
            ]);

            return $this->fetch();
        }
    }

}