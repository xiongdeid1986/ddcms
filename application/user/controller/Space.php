<?php
namespace app\user\controller;
class Space extends \app\index\controller\Common
{

    // 空间首页
    public function index()
    {
        if (request()->isGet()) {
            $id = input('id',0,'intval');
            if ($user = \think\Db::name('user')->find($id)) {

                // 位置
                \ebcms\Position::add(['title' => $user['nickname'], 'url' => \think\Url::build('user/space/index', ['id' => $id])]);

                // seo设置
                $this->assign('seo', [
                    'title' => $user['nickname'] . ' - ' . $this->seo['sitename'],
                    'keywords' => $user['nickname'] . '的个人中心',
                    'description' => $user['nickname'] . '的个人中心',
                ]);

                if (1 != $user['status']) {
                    $this->error('用户异常！');
                }

                $this->assign('user', $user);
                return $this->fetch();
            } else {
                $this->error('用户不存在！');
            }
        }
    }

}