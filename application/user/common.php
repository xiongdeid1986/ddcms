<?php 
// 是否有评论权限
function comment_auth(){
    if (in_array(user('grade')?:0, (Array)\ebcms\Config::get('user.comment.auth'))) {
        return true;
    }
    return false;
}
// 是否不需要验证码
function comment_captcha(){
    if (in_array(user('grade')?:0, (Array)\ebcms\Config::get('user.comment.captcha'))) {
        return true;
    }
    return false;
}
// 替换敏感词
function replace_badwords($str){
    $badwords = \ebcms\Config::get('user.comment.badwords');
    return str_replace(array_keys($badwords), array_values($badwords), $str);
}

// @用户
function atuser($str,$end_str='',$start_str=''){
    $preg='/@([\S+]{1,30})(\s|$)/';
    $str = strip_tags($str);
    if (preg_match_all($preg, $str, $matchs)){
        $users = \think\Db::name('user') -> where(['nickname'=>['in',$matchs[1]]]) -> select();
        $msg = [];
        foreach ($users as $key => $user) {
            $msg[] = [
                'user_id'       =>  $user['id'],
                'topic'         =>  '消息提醒',
                'title'         =>  '有人@你',
                'content'       =>  $start_str . $str . $end_str,
                'create_time'   =>  time(),
                'update_time'   =>  time(),
                'sort'          =>  0,
                'status'        =>  1,
                'isread'        =>  0,
            ];
        }
        \think\Db::name('user_message')->insertAll($msg);
    }
}