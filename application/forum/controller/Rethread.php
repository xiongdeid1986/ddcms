<?php
namespace app\forum\controller;
class Rethread extends \app\index\controller\Common{

    public function add($thread_id){

        // 是否临时关闭评论
        if (true !== \ebcms\Config::get('forum.open')) {
            $this -> error('系统已关闭发帖！');
        }

        // 检查权限
        $thread = \app\forum\model\Thread::get(input('thread_id'));
        if ($thread['status'] != 1) {
            switch ($thread['status']) {
                case 0:
                    $this -> error('该帖子未通过审核，暂时无法评论！');
                    break;
                case 99:
                    $this -> error('该帖子正在审核，暂时无法评论！');
                    break;
                
                default:
                    $this -> error('该帖子暂时无法评论！');
                    break;
            }
        }

        $forum = \app\forum\model\Forum::get($thread['forum_id']);
        if ($forum['status'] != 1) {
            $this -> error('该板块未开放！');
        }
        if ($forum['open'] != 1) {
            $this -> error('该板块禁止发帖！');
        }
        if (!auth($forum,40)) {
            $this -> error('您没有该板块相应权限！');
        }

        if (request()->isGet()) {
            return $this -> fetch();
        }elseif (request()->isPost()) {
            
            // 验证码
            if (!auth($forum,42)) {
                if (!\ebcms\Func::check_captcha(input('captcha'))) {
                    $this->error('验证码错误！');
                }
            }

            $status = auth($forum,41)?1:99;
            $content = input('content','','str2br,safe_html,htmlspecialchars');

            // 敏感词处理
            $badwords_handle = \ebcms\Config::get('forum.badwords_handle');
            switch ($badwords_handle) {
                case 0://禁止提交
                    if (check_badwords(input('content','',null))) {
                        $this -> error('有敏感词！禁止提交');
                    }
                    break;
                case 1://进入审核
                    if (check_badwords(input('content','',null))) {
                        $status = 99;
                    }
                    break;
                case 2://直接替换
                    $content = input('content','','replace_badwords,str2br,safe_html,htmlspecialchars');
                    break;
                case 99://不用处理
                    break;
                
                default:
                    if (check_badwords(input('content','',null))) {
                        $this -> error('有敏感词！禁止提交');
                    }
                    break;
            }

            // 添加数据
            $data = [
                'thread_id' => input('thread_id'),
                'content' => $content,
                'status'  => $status,
            ];
            \think\Db::transaction(function() use($thread,$data){
                $rethread = new \app\forum\model\Rethread();
                if(false === $rethread -> validate('Rethread.add') -> save($data)){
                    $this -> error($rethread->getError());
                }

                // 更新帖子最后回复时间
                $thread -> rethread_time = time();
                $thread -> save();

                // 回帖奖励
                if (is_login()) {
                    $jiangli = \ebcms\Config::get('forum.rethread_add_currency');
                    foreach ($jiangli as $key => $value) {
                        $opt = [
                            'user_id'   =>  \think\Session::get('user_id'),
                            'currency'   =>  $key,
                            'num'   =>  $value,
                            'remark'   =>  '回帖奖励',
                        ];
                        \app\user\extend\Currency::inc($opt);
                    }
                }
                // 消息通知帖主
                if ($thread['user_id'] && $thread['user_id'] != \think\Session::get('user_id')) {
                    $msg = '您的帖子有新的回复，<a href="'.$thread['url'].'?goto=' . $rethread -> id . '">点击查看</a>';
                    $data = [
                        'user_id'   =>  $thread['user_id'],
                        'topic'     =>  '论坛消息',
                        'title'     =>  '您的帖子有新回复啦！',
                        'content'   =>  $msg
                    ];
                    \app\user\extend\Message::add($data);
                }
                atuser(htmlspecialchars_decode($data['content']),'<a href="' . $thread['url'].'?goto='.$rethread->id . '" target="_blank" style="color:red;">[详情]</a>');
            });
            $this -> success('回帖成功！', $thread['url']);
        }
    }

    public function edit($id){
        if (!$rethread = \app\forum\model\Rethread::get($id)) {
            $this -> error('帖子不存在！');
        }
        $thread = $rethread['thread'];
        if (!$rethread['edit_able'] && !moderator_auth($thread['forum_id'],'edit')) {
            $this -> error('不可编辑！');
        }
        $forum = $thread['forum'];
        if (request() -> isGet()) {

            // 路径
            \ebcms\Position::add(['title'=>'论坛','url'=>\think\Url::build('forum/index/index')]);
            \ebcms\Position::add(['title'=>$forum['title'],'url'=>$forum['url']]);
            \ebcms\Position::add(['title'=>$thread['title'],'url'=>$thread['url']]);
            \ebcms\Position::add(['title'=>'编辑帖子','url'=>'']);

            // seo设置
            $this -> assign('seo',[
                'title' => '编辑帖子' . ' - 论坛 - ' . $this -> seo['sitename'],
                'keywords' => '编辑帖子',
                'description' => '编辑帖子',
                ]);

            $this -> assign('rethread',$rethread);
            $this -> assign('forum',$forum);
            return $this -> fetch();
        }elseif (request() -> isPost()) {
            // 验证码
            if (!auth($forum,42)) {
                if (!\ebcms\Func::check_captcha(input('captcha'))) {
                    $this->error('验证码错误！');
                }
            }

            $status = auth($forum,41)?1:99;
            $content = input('content','','str2br,safe_html,htmlspecialchars');

            // 敏感词处理
            $badwords_handle = \ebcms\Config::get('forum.badwords_handle');
            switch ($badwords_handle) {
                case 0://禁止提交
                    if (check_badwords(input('content','',null))) {
                        $this -> error('有敏感词！禁止提交');
                    }
                    break;
                case 1://进入审核
                    if (check_badwords(input('content','',null))) {
                        $status = 99;
                    }
                    break;
                case 2://直接替换
                    $content = input('content','','replace_badwords,str2br,safe_html,htmlspecialchars');
                    break;
                case 99://不用处理
                    break;
                
                default:
                    if (check_badwords(input('content','',null))) {
                        $this -> error('有敏感词！禁止提交');
                    }
                    break;
            }

            // 更新数据
            $data = [
                'content'   =>  $content,
                'status'   =>  $status,
            ];
            \think\Db::transaction(function() use($thread,$rethread,$data,$content){
                if(false === $rethread -> validate('Rethread.edit') -> save($data)){
                    $this -> error($rethread->getError());
                }
                atuser(htmlspecialchars_decode($content), '<a href="' . $thread['url'].'?goto='.$rethread->id . '" target="_blank" style="color:red;">[详情]</a>');
            });
            $this -> success('编辑成功！', $thread['url']);
        }
    }

    public function status($id,$status){
        if (!$rethread = \app\forum\model\Rethread::get($id)) {
            $this -> error('帖子不存在！');
        }
        $thread = $rethread['thread'];
        if (!moderator_auth($thread['forum_id'],'status')) {
            $this -> error('没有权限！');
        }
        $rethread -> status = $status?1:0;
        \think\Db::transaction(function() use($rethread){
            $rethread -> save();
        });
        $this -> success('处理成功！');
    }

    public function delete($id){
        if (!$rethread = \app\forum\model\Rethread::get($id)) {
            $this -> error('帖子不存在！');
        }
        $thread = $rethread['thread'];
        if (!$rethread['delete_able'] && !moderator_auth($thread['forum_id'],'delete')) {
            $this -> error('没有权限！');
        }
        \think\Db::transaction(function() use($rethread){
            $rethread -> delete();
        });
        $this -> success('删除成功！');
    }

}