<?php
namespace app\forum\controller;
class Thread extends \app\index\controller\Common{
    // 帖子详情
    public function index(){
        if (request() -> isGet()) {
            $id = input('id',0,'intval');
            if (!$thread = \app\forum\model\Thread::with('user,body') -> find($id)) {
                $this -> error('帖子不存在!');
            }
            $forum = $thread['forum'];
            if ($forum['status'] != 1) {
                $this -> error('该板块未开放！');
            }
            if (!auth(explode(',',$forum['auth']),0)) {
                $this -> error('您没有该板块的权限');
            }
            if ($thread['status'] != 1) {
                if (!is_me($thread['user_id']) && !moderator_auth($forum['id'])) {
                    switch ($thread['status']) {
                        case 0:
                            $this -> error('帖子未通过审核！');
                            break;
                        case 99:
                            $this -> error('帖子正在审核中！');
                            break;
                        default:
                            $this -> error('帖子暂不可浏览！');
                            break;
                    }
                }
            }
            // 跳转到多少页
            if ($goto = input('goto',0,'intval')) {
                $_where = [
                    'thread_id'=>$id,
                    'status'=>1,
                    'id'=>['elt',$goto],
                ];
                $count = \think\Db::name('forum_rethread') -> where($_where) -> count();
                $page = ceil($count/10);
                $this -> redirect($thread['url'].'?page='.$page.'#rethread_'.$goto);
            }
            // 路径
            \ebcms\Position::add(['title'=>'论坛','url'=>\think\Url::build('forum/index/index')]);
            \ebcms\Position::add(['title'=>$forum['title'],'url'=>$forum['url']]);
            \ebcms\Position::add(['title'=>$thread['title'],'url'=>$thread['url']]);
            // seo设置
            $this -> assign('seo',[
                'title' => $thread['title'] . ' - 论坛 - ' . $this -> seo['sitename'],
                'keywords' => $thread['keywords'],
                'description' => $thread['description'],
                ]);
            $this -> assign('thread',$thread);
            $this -> assign('forum',$forum);
            $this -> assign('user',$thread['user']);
            // 更新浏览量
            \think\Db::name('forum_thread') -> where('id',$thread['id']) -> setInc('views',1,60);
            return $this -> fetch();
        }
    }
    // 发帖
    static public function add($id = null){
        $id = $id ? $id : input('id',0,'intval');
        if (true !== \ebcms\Config::get('forum.open')) {
            $this -> error('系统已关闭发帖！');
        }
        $forum = \app\forum\model\Forum::get($id);
        if ($forum['status'] != 1) {
            $this -> error('该板块未开放！');
        }
        if ($forum['open'] != 1) {
            $this -> error('该板块禁止发帖！');
        }
        if (!auth(explode(',',$forum['auth']),10)) {
            $this -> error('您没有该板块权限');
        }
        if (request() -> isGet()) {
            // 路径
            \ebcms\Position::add(['title'=>'论坛','url'=>\think\Url::build('forum/index/index')]);
            \ebcms\Position::add(['title'=>$forum['title'],'url'=>$forum['url']]);
            \ebcms\Position::add(['title'=>'发帖','url'=>'']);
            // seo设置
            $this -> assign('seo',[
                'title' => '发帖' . ' - 论坛 - ' . $this -> seo['sitename'],
                'keywords' => '发帖',
                'description' => '发帖',
                ]);
            $this -> assign('forum',$forum);
            return $this -> fetch();
        }elseif (request() -> isPost()) {
            if (!auth(explode(',',$forum['auth']),12)) {
                if (!\ebcms\Func::check_captcha(input('captcha'))) {
                    $this->error('验证码错误！');
                }
            }

            $status = auth($forum,11) ? 1 : 99;
            $title = input('title');
            $detail = input('detail','','str2br,safe_html,htmlspecialchars');
            
            // 敏感词处理
            $badwords_handle = \ebcms\Config::get('forum.badwords_handle');
            switch ($badwords_handle) {
                case 0://禁止提交
                    if (check_badwords(input('title','',null).input('detail','',null))) {
                        $this -> error('有敏感词！禁止提交');
                    }
                    break;
                case 1://进入审核
                    if (check_badwords(input('title','',null).input('detail','',null))) {
                        $status = 99;
                    }
                    break;
                case 2://直接替换
                    $title = input('title','','replace_badwords,htmlspecialchars');
                    $detail = input('detail','','replace_badwords,str2br,safe_html,htmlspecialchars');
                    break;
                case 99://不处理
                    break;
                
                default:
                    if (check_badwords(input('title','',null).input('detail','',null))) {
                        $this -> error('有敏感词！禁止提交');
                    }
                    break;
            }

            // 内容单独验证
            $result = $this->validate([
                'detail'  => $detail,
            ],[
                'detail|内容'  => 'require|min:10',
            ]);
            if(true !== $result){
                $this -> error($result);
            }

            $data = [
                'forum_id'  =>  $id,
                'title'  =>  $title,
                'status'  =>  $status,
            ];
            $body = [
                'detail'    =>  $detail,
            ];
            $thread = new \app\forum\model\Thread();
            \think\Db::transaction(function() use($thread,$data,$body){

                // 发帖
                if (false === $thread -> validate('thread.add') -> save($data)) {
                    $this -> error($thread -> getError());
                }
                $thread -> body() -> save($body);

                // 发帖奖励
                if (is_login()) {
                    $jiangli = \ebcms\Config::get('forum.thread_add_currency');
                    foreach ($jiangli as $key => $value) {
                        $opt = [
                            'user_id'   =>  \think\Session::get('user_id'),
                            'currency'   =>  $key,
                            'num'   =>  $value,
                            'remark'   =>  '发帖奖励',
                        ];
                        \app\user\extend\Currency::inc($opt);
                    }
                }
                atuser(htmlspecialchars_decode($body['detail']), '<a href="' . $thread['url'] . '" target="_blank" style="color:red;">[详情]</a>');

            });
            $this -> success('发帖成功', $thread['url']);
        }
    }

    public function edit($id){

        if (true !== \ebcms\Config::get('forum.open')) {
            $this -> error('系统已关闭发帖！');
        }

        $id = input('id',0,'intval');
        if (!$thread = \app\forum\model\Thread::get($id)) {
            $this -> error('帖子不存在！');
        }
        if (!$thread['edit_able'] && !moderator_auth($thread['forum_id'],'edit')) {
            $this -> error('帖子不可编辑！');
        }

        $forum = $thread['forum'];
        if ($forum['status'] != 1) {
            $this -> error('该板块未开放！');
        }
        if ($forum['open'] != 1) {
            $this -> error('该板块禁止发帖！');
        }
        if (!auth(explode(',',$forum['auth']),10)) {
            $this -> error('您没有该板块权限');
        }

        if (request() -> isGet()) {

            // 路径
            \ebcms\Position::add(['title'=>'论坛','url'=>\think\Url::build('forum/index/index')]);
            \ebcms\Position::add(['title'=>$forum['title'],'url'=>$forum['url']]);
            \ebcms\Position::add(['title'=>$thread['title'],'url'=>$thread['url']]);
            \ebcms\Position::add(['title'=>'编辑','url'=>'']);

            // seo设置
            $this -> assign('seo',[
                'title' => '编辑帖子' . ' - 论坛 - ' . $this -> seo['sitename'],
                'keywords' => '编辑帖子',
                'description' => '编辑帖子',
                ]);

            $this -> assign('thread',$thread);
            $this -> assign('forum',$forum);
            return $this -> fetch();
        }elseif (request() -> isPost()) {

            if (!auth(explode(',',$forum['auth']),12)) {
                if (!\ebcms\Func::check_captcha(input('captcha'))) {
                    $this->error('验证码错误！');
                }
            }
            $status = auth($forum,11)?1:99;
            $title = input('title');
            $detail = input('detail','','str2br,safe_html,htmlspecialchars');
            // 敏感词处理
            $badwords_handle = \ebcms\Config::get('forum.badwords_handle');
            switch ($badwords_handle) {
                case 0://禁止提交
                    if (check_badwords(input('title','',null).input('detail','',null))) {
                        $this -> error('有敏感词！禁止提交');
                    }
                    break;
                case 1://进入审核
                    if (check_badwords(input('title','',null).input('detail','',null))) {
                        $status = 99;
                    }
                    break;
                case 2://直接替换
                    $title = input('title','','replace_badwords,htmlspecialchars');
                    $detail = input('detail','','replace_badwords,str2br,safe_html,htmlspecialchars');
                    break;
                case 99://不处理
                    break;
                
                default:
                    if (check_badwords(input('title','',null).input('detail','',null))) {
                        $this -> error('有敏感词！禁止提交');
                    }
                    break;
            }
            // 内容单独验证
            $result = $this->validate([
                'detail'  => $detail,
            ],[
                'detail|内容'  => 'require|min:10',
            ]);
            if(true !== $result){
                $this -> error($result);
            }
            $thread -> title = $title;
            $thread -> status = $status;
            $body = [
                'detail'    =>  $detail,
            ];
            \think\Db::transaction(function() use($thread,$body){
                if (false === $thread -> validate('thread.edit') -> save()) {
                    $this -> error($thread -> getError());
                }
                $thread -> body -> save($body);
                atuser(htmlspecialchars_decode($body['detail']), '<a href="' . $thread['url'] . '" target="_blank" style="color:red;">[详情]</a>');
            });
            
            $this -> success('编辑成功', $thread['url']);
        }
    }
    public function status(){
        $id = input('id',0,'intval');
        if (!$thread = \app\forum\model\Thread::get($id)) {
            $this -> error('帖子不存在！');
        }
        if (!moderator_auth($thread['forum_id'],'status')) {
            $this -> error('没有权限');
        }
        $thread -> status = input('status')?1:0;
        \think\Db::transaction(function() use($thread){
            $thread -> save();
        });
        $this -> success('操作成功！', $thread['url']);
    }

    public function best(){
        $id = input('id',0,'intval');
        if (!$thread = \app\forum\model\Thread::get($id)) {
            $this -> error('帖子不存在！');
        }
        if (!moderator_auth($thread['forum_id'],'best')) {
            $this -> error('没有权限');
        }
        $thread -> best = input('best')?:0;
        \think\Db::transaction(function() use($thread){
            $thread -> save();
        });
        $this -> success('操作成功！', $thread['url']);
    }

    public function top(){
        $id = input('id',0,'intval');
        $top = input('top');
        if (!$thread = \app\forum\model\Thread::get($id)) {
            $this -> error('帖子不存在！');
        }
        if ($thread['top'] && !moderator_auth($thread['forum_id'],'top'.$thread['top'])) {
            $this -> error('没有权限');
        }
        if ($top && !moderator_auth($thread['forum_id'], 'top'.$top)) {
            $this -> error('没有权限');
        }
        $thread -> top = $top?:0;
        \think\Db::transaction(function() use($thread){
            $thread -> save();
        });
        $this -> success('操作成功！', $thread['url']);
    }

    public function delete(){
        $id = input('id',0,'intval');
        if (!$thread = \app\forum\model\Thread::get($id)) {
            $this -> error('帖子不存在！');
        }
        if (!$thread['delete_able'] && !moderator_auth($thread['forum_id'],'delete')) {
            $this -> error('没有权限');
        }
        \think\Db::transaction(function() use($thread){
            $thread -> rethread() -> delete();
            $thread -> body -> delete();
            $thread -> delete();
        });
        $this -> success('删除成功！', $thread['forum']['url']);
    }

}