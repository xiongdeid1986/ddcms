<?php
namespace app\forum\controller;
class User extends \app\index\controller\Common{

    public function _initialize()
    {
        parent::_initialize();
        if (!\think\Session::get('user_id')) {
            \think\Session::set('go', \think\Request::instance() -> url(true));
            $this->redirect('user/auth/login');
        }
    }

    public function thread(){
        if (request() -> isGet()) {
            return $this -> fetch();
        }
    }

    public function rethread(){
        if (request() -> isGet()) {
            return $this -> fetch();
        }
    }

}