<?php
namespace app\link\controller;
class Index extends \app\index\controller\Common
{

	public function index()
	{
		if (true !== \ebcms\Config::get('link.apply')) {
			$this->error('系统已经关闭友情链接申请！');
		}
		if (request()->isGet()) {

			// 位置
			\ebcms\Position::add(['title' => '申请友情链接', 'url' => \think\Url::build('link/index/index')]);

			// seo
			$this->assign('seo', [
				'title' => '申请友情链接' . ' - ' . $this->seo['sitename'],
				'keywords' => '申请友情链接',
				'description' => '申请友情链接',
			]);

			return $this->fetch();

		} elseif (request()->isPost()) {
			if (false !== \ebcms\Config::get('link.captcha')) {
				if (!\ebcms\Func::check_captcha(input('captcha'))) {
					$this->error('验证码错误！');
				}
			}
			$data = input();
			$data['group'] = '友情链接';
			if ($file = request()->file('logo')) {
				$info = $file -> validate([
					'size'  =>  2048000,
					'ext'  =>  ['jpg','gif','png'],
				]) -> move('./upload/link');
				if (false !== $info) {
					$data['logo'] = substr(str_replace('\\', '/', $info->getPath() . '/' . $info->getBasename()), strlen('./upload'));
				}else{
					$this -> error($file -> getError());
				}
			}
			\think\Db::transaction(function() use($data){
				$link = new \app\link\model\Link();
				if (false === $link->allowField(['group', 'title', 'description', 'logo', 'url']) -> validate('Link.tougao') ->save($data)) {
					$this -> error($link -> getError());
				}
			});
			$this->success('提交成功，请等待审核！', 'index/index/index');
		}

	}
}