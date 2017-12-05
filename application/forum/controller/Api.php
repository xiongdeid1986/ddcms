<?php
namespace app\forum\controller;
class Api extends \app\index\controller\Common{

    // xheditor上传
    public function xhupload(){
        \think\Config::set('default_return_type', 'json');
        if (true !== \ebcms\Config::get('forum.open')) {
            return [
                'err'   =>  '系统已关闭发帖！',
                'msg'   =>  ''
            ];
        }
        if (!\think\Session::get('user_id') && (true !== \ebcms\Config::get('forum.guest_upload'))) {
            return [
                'err'   =>  '请登陆后上传！',
                'msg'   =>  ''
            ];
        }
        $filename = '';
        $extension = '';
        $localname = '';
        $extension_allow = \ebcms\Config::get('forum.upload_ext');
        
        if ($_SERVER['HTTP_CONTENT_DISPOSITION'] && preg_match('/attachment;\s+name="(.+?)";\s+filename="(.+?)"/i',$_SERVER['HTTP_CONTENT_DISPOSITION'],$info)) {
            // flash上传
            $localname = urldecode($info[2]);
            $extension=pathinfo($localname,PATHINFO_EXTENSION);
            if (!in_array($extension, $extension_allow)) {
                return [
                    'err'   =>  '只允许上传'.implode(',', $extension_allow).'格式的文件！',
                    'msg'   =>  ''
                ];
            }
            $dir = './upload/forum/';
            if (!is_dir($dir)) {
                @mkdir($dir, 0777);
            }
            $dir = './upload/forum/'.date('Ymd').'/';
            if (!is_dir($dir)) {
                @mkdir($dir, 0777);
            }
            $file = md5(uniqid()) . '.' . $extension;
            file_put_contents($dir . $file, file_get_contents("php://input"));
            $filename = request() -> root(true) . '/upload/forum/' . date('Ymd') . '/' . $file;
        }elseif ($file = request() -> file('filedata')) {
            // html5上传
            $info = $file->validate([
                'size'  =>  2048000,
                'ext'  =>  $extension_allow,
            ]) -> move('./upload/forum');
            if (false !== $info) {
                $filename = request() -> root(true) . substr(str_replace('\\', '/', $info->getPath() . '/' . $info->getBasename()), 1);
                $localname = $info -> getFilename();
            }else{
                return [
                    'err'   =>  $file->getError(),
                    'msg'   =>  ''
                ];
            }
        }
        if ($filename) {
            return [
                'err'       =>  '',
                'msg'       =>  [
                    'url'       =>  '!'.$filename,
                    'localfile' =>  $localname,
                ]
            ];
        }else{
            return [
                'err'   =>  '上传错误！请稍后再试！',
                'msg'   =>  ''
            ];
        }

    }

}