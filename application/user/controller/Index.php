<?php
namespace app\user\controller;
class Index extends \app\index\controller\Common
{

	public function _initialize()
	{
		parent::_initialize();
		if (!\think\Session::get('user_id')) {
			\think\Session::set('go', 'user/index/index');
			$this->redirect('user/auth/login');
		}
	}

	// 会员中心
	public function index()
	{
		if (request()->isGet()) {

			// 位置
			\ebcms\Position::add(['title' => '会员中心', 'url' => \think\Url::build('user/index/index')]);

			// seo设置
			$this->assign('seo', [
				'title' => '会员中心 - ' . $this->seo['sitename'],
				'keywords' => '会员中心',
				'description' => '会员中心',
			]);

			return $this->fetch();
		}
	}

	// 修改信息
	public function info()
	{
		if (request()->isGet()) {

			// 位置
			\ebcms\Position::add(['title' => '会员中心', 'url' => \think\Url::build('user/index/index')]);
			\ebcms\Position::add(['title' => '修改基本信息', 'url' => \think\Url::build('user/index/info')]);

			// seo设置
			$this->assign('seo', [
				'title' => '修改基本信息 - 会员中心 - ' . $this->seo['sitename'],
				'keywords' => '修改基本信息',
				'description' => '修改基本信息',
			]);

			$this->assign('user', \app\user\model\User::find(\think\Session::get('user_id')));
			return $this->fetch();
		} elseif (request()->isPost()) {
			// 验证码判断
			if (false !== \ebcms\Config::get('user.edit.captcha')) {
				if (!\ebcms\Func::check_captcha(input('captcha'))) {
					$this->error('验证码错误！');
				}
			}

			$data = input();
			$data['id'] = \think\Session::get('user_id');

			// 上传动作
			if ($file = request()->file('avatar')) {
				$info = $file -> validate([
					'size'  =>  102400,
					'ext'  =>  ['jpg','gif','png'],
				]) -> move('./upload/avatar');
				if (false === $info) {
					$this->error($file -> getError());
				} else {
					$data['avatar'] = substr(str_replace('\\', '/', $info->getPath() . '/' . $info->getBasename()), strlen('./upload'));
				}
			}

			\think\Db::transaction(function() use($data){
				$m = new \app\user\model\User();
				if (false === $m -> allowField(['nickname', 'avatar', 'motto']) -> validate('User.useredit')->save($data, ['id' => \think\Session::get('user_id')])) {
					$this->error($m -> getError());
				}
			});
			$this->success('修改成功', 'user/index/index');
		}
	}

	// 修改密码
	public function password()
	{
		if (request()->isGet()) {

			// 位置
			\ebcms\Position::add(['title' => '会员中心', 'url' => \think\Url::build('user/index/index')]);
			\ebcms\Position::add(['title' => '修改密码', 'url' => \think\Url::build('user/index/password')]);

			// seo设置
			$this->assign('seo', [
				'title' => '修改密码 - 会员中心 - ' . $this->seo['sitename'],
				'keywords' => '修改密码',
				'description' => '修改密码',
			]);

			return $this->fetch();
		} elseif (request()->isPost()) {

			// 验证码判断
			if (false !== \ebcms\Config::get('user.password.captcha')) {
				if (!\ebcms\Func::check_captcha(input('captcha'))) {
					$this->error('验证码错误！');
				}
			}

			$oldpassword = input('oldpassword');
			$password = input('password');
			$password2 = input('password2');
			if ($password2 != $password) {
				$this->error('两次密码输入不一致');
			}
			
			$id = \think\Session::get('user_id');
			$user = \app\user\model\User::get($id);
			if (\ebcms\Func::crypt_pwd($oldpassword, $user['email']) !== $user['password']) {
				$this->error('密码错误');
			}
			$user -> password = $password;

			\think\Db::transaction(function() use($user){
				if (false === $user -> save()) {
					$this->error('修改失败！请稍后再试！');
				}
			});

			$this->success('密码修改成功', 'user/index/index');
		}
	}

	// 消息
	public function message()
	{
		if (request()->isGet()) {
			$where = [
				'user_id' => \think\Session::get('user_id'),
			];
			if (\think\Request::instance()->has('isread')) {
				$where['isread'] = input('isread')?1:0;
			}
			$lists = \app\user\model\Message::where($where)->order('id desc')->paginate(20);
			$this->assign('page', $lists->render());
			$this->assign('lists', $lists);

			// 位置
			\ebcms\Position::add(['title' => '会员中心', 'url' => \think\Url::build('user/index/index')]);
			\ebcms\Position::add(['title' => '我的消息', 'url' => \think\Url::build('user/index/message')]);

			// seo设置
			$this->assign('seo', [
				'title' => '我的消息 - 会员中心 - ' . $this->seo['sitename'],
				'keywords' => '我的消息',
				'description' => '我的消息',
			]);

			return $this->fetch();
		} elseif (request()->isPost()) {
			$do = input('do');
			switch ($do) {
				case 'delete':
					\think\Db::transaction(function(){
						$where = [
							'user_id' => \think\Session::get('user_id'),
							'id' => ['in', input('ids/a')],
						];
						\think\Db::name('user_message')->where($where)->delete();
					});
					break;
				case 'read':
					\think\Db::transaction(function(){
						$isread = input('isread', 1, 'intval') ? 1 : 0;
						$where = [
							'user_id' => \think\Session::get('user_id'),
							'id' => ['in', input('ids/a')],
						];
						\think\Db::name('user_message')->where($where)->setField('isread', $isread);
					});
					break;
				
				default:
					$this -> error('非法操作！');
					break;
			}
			$this->success('操作成功！');
		}
	}
}