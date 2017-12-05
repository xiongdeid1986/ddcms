<?php
namespace app\user\controller;
class Comment extends \app\index\controller\Common
{

    public function index()
    {
        if (request()->isGet()) {
            $comment_config = [
                'group' =>  input('group','test'),
                'key'   =>  input('key','test'),
                'size'  =>  input('size',10),
                'type'  =>  input('type','','intval'),
            ];
            $this -> assign('comment_config',$comment_config);
            return $this -> fetch('type'.$comment_config['type']);
        } elseif (request()->isPost()) {
            $size = input('size', 5, 'intval') ?: 5;
            $size = min($size, 50);

            $with = 'touser,user';
            $where = [
                'key' => input('key'),
                'pid' => 0,
            ];
            $order = 'id desc';

            $lists = \app\user\model\Comment::with($with)->where($where)->order($order)->paginate($size);
            $ids = [];
            foreach ($lists as $v) {
                $ids[] = $v->id;
            }
            $sublists = [];
            if ($ids) {

                $subwhere = ['top_id' => ['in', $ids]];

                $x = \app\user\model\Comment::with($with)->where($subwhere)->order($order)->select();
                foreach ($x as $key => $v) {
                    $sublists[] = $v->toArray();
                }
            }
            $this->success('加载成功！', '', [
                'page' => $lists->render(),
                'comments' => $lists->toArray(),
                'subcomments' => $sublists,
            ]);
        }
    }

    // 添加评论
    public function add()
    {

        if (true !== \ebcms\Config::get('user.comment.on')) {
            $this->error('评论已关闭！');
        }

        if (request()->isPost()) {

            // 验证验证码
            if (true !== comment_captcha()) {
                $comment_key = input('reply_id')?'comment_reply':'comment_add';
                if (!\ebcms\Func::check_captcha(input('captcha'),$comment_key)) {
                    $this->error('验证码错误！');
                }
            }

            // 权限验证
            if (true !== comment_auth()) {
                $this->error('没有权限！');
            }
            
            \think\Db::transaction(function(){

                // 插入数据
                $data = [
                    'user_id' => \think\Session::get('user_id')?:0,
                    'content' => input('content'),
                    'status' => 1,
                    'ip' => request()->ip(0, true),
                ];
                if ($reply_id = input('reply_id')) {
                    $comment_p = \app\user\model\Comment::get($reply_id);
                    $data['to_user_id'] = $comment_p['user_id'];
                    $data['top_id'] = $comment_p['top_id'] ?: $comment_p['id'];
                    $data['pid'] = $comment_p['id'];
                    $data['group'] = $comment_p['group'];
                    $data['key'] = $comment_p['key'];
                }else{
                    $data['to_user_id'] = 0;
                    $data['top_id'] = 0;
                    $data['pid'] = 0;
                    $data['group'] = input('group');
                    $data['key'] = input('key');
                }

                // 敏感词处理
                $badwords_handle = \ebcms\Config::get('user.comment.badwords_handle');
                switch ($badwords_handle) {
                    case 0://禁止提交
                        if ($this -> check_badwords(input('content','',null))) {
                            $this -> error('有敏感词！禁止提交');
                        }
                        break;
                    case 1://进入审核
                        if ($this -> check_badwords(input('content','',null))) {
                            $data['status'] = 99;
                        }
                        break;
                    case 2://直接替换
                        $data['content'] = input('content','','replace_badwords,htmlspecialchars');
                        break;
                    case 99://不处理
                        break;
                    
                    default:
                        if ($this -> check_badwords(input('content','',null))) {
                            $this -> error('有敏感词！禁止提交');
                        }
                        break;
                }

                $comment = new \app\user\model\Comment();
                if (false === $comment ->validate('Comment.add')->save($data)) {
                    $this -> error($comment -> getError());
                }

                // 评论奖励
                if (\think\Session::get('user_id') && $jiangli = \ebcms\Config::get('user.comment.jiangli')) {
                    foreach ($jiangli as $key => $value) {
                        $opt = [
                            'user_id'   =>  \think\Session::get('user_id'),
                            'remark'   =>  '内容评论奖励',
                            'currency'   =>  $key,
                            'num'   =>  $value,
                        ];
                        \app\user\extend\Currency::inc($opt);
                    }
                }

                // 消息提醒
                if ($reply_id && $comment_p['user_id'] && \think\Session::get('user_id') != $comment_p['user_id']) {
                    $param = [
                        'comment_p' => $comment_p,
                        'comment' => $comment,
                    ];
                    $content = \ebcms\Func::render_tpl(htmlspecialchars_decode(\ebcms\Config::get('user.comment.notice_tpl')), $param);
                    $msg = [
                        'user_id' => $comment_p['user_id'],
                        'topic' => '消息提醒',
                        'title' => '有人回复了你！',
                        'content' => $content,
                    ];
                    \app\user\extend\Message::add($msg);
                }
                atuser($comment['content']);
            });
            $this->success('评论成功！');
        }
    }

    private function check_badwords($str){
        $badwords = \ebcms\Config::get('user.comment.badwords');
        $badwords = array_keys($badwords);
        foreach($badwords as $word){
            if(strstr($str,$word)!=''){
                return true;
            }
        }
        return false;
    }
}