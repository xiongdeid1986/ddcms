<?php
namespace app\forum\controller;
class Index extends \app\index\controller\Common{

    public function index(){
        if (request() -> isGet()) {
            if ($id = input('id',0,'intval')) {
                if ($forum = \app\forum\model\Forum::get($id)) {
                    if (1 != $forum['status']) {
                        $this -> error('该板块未开放！');
                    }

                    if (!auth(explode(',',$forum['auth']),0)) {
                        $this -> error('没有权限');
                    }

                    // 跳转
                    if (isset($forum['ext']['eb_url'])) {
                        $this->redirect($forum['ext']['eb_url'], 302);
                    }

                    // 路径
                    \ebcms\Position::add(['title'=>'论坛','url'=>\think\Url::build('forum/index/index')]);
                    \ebcms\Position::add(['title'=>$forum['title'],'url'=>$forum['url']]);

                    // seo设置
                    $this -> assign('seo',[
                        'title' => $forum['metatitle'] . ' - 论坛 - ' . $this -> seo['sitename'],
                        'keywords' => $forum['keywords'],
                        'description' => $forum['description'],
                        ]);

                    $this -> assign('forum',$forum);

                    return $this -> fetch('list');
                }else{
                    $this -> error('该板块不存在');
                }
            }else{
                // 路径
                \ebcms\Position::add(['title'=>'论坛','url'=>\think\Url::build('forum/index/index')]);
                // seo设置
                $this -> assign('seo',[
                    'title' => '论坛' . ' - ' . $this -> seo['sitename'],
                    'keywords' => '论坛',
                    'description' => '论坛',
                    ]);
                return $this -> fetch();
            }
        }
    }

}