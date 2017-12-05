<?php
namespace app\user\controller\admin;
class Comment extends \app\ebcms\controller\Common
{

    public function index()
    {
        if (request()->isGet()) {
            return $this->fetch();
        }
    }

    public function edit()
    {
        if (request()->isGet()) {
            $obj = \app\user\model\Comment::get(input('id'));
            return \ebcms\Form::fetch($obj);
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = \app\user\model\Comment::get(input('id'));
                if (false === $obj -> validate('Comment.edit') -> isUpdate(true) -> save(input())) {
                    $this -> error($obj -> getError());
                }
            });
            $this -> success('操作成功！');
        }
    }

    public function status(){
        \think\Db::transaction(function(){
            \app\user\model\Comment::where(['id'=>['in',input('ids')]]) -> setField('status',input('value')?1:0);
        });
        $this -> success('操作成功！');
    }

    public function delete()
    {
        \think\Db::transaction(function(){
            \app\user\model\Comment::where(['id'=>['in',input('ids')]]) -> delete();
        });
        $this -> success('删除成功！');
    }

}