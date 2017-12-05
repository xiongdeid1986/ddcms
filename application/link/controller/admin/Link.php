<?php
namespace app\link\controller\admin;
class Link extends \app\ebcms\controller\Common
{

    public function index()
    {
        if (request()->isGet()) {
            return $this->fetch();
        }
    }

    public function add(){
        if (request()->isGet()) {
            return \ebcms\Form::fetch();
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = new \app\link\model\Link();
                if (false === $obj ->validate('Link.add')->save(input())) {
                    $this -> error($obj -> getError());
                }
            });
            $this -> success('操作成功！');
        }
    }

    public function edit(){
        if (request()->isGet()) {
            $obj = \app\link\model\Link::get(input('id'));
            return \ebcms\Form::fetch($obj);
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = \app\link\model\Link::get(input('id'));
                if (false === $obj -> validate('Link.edit') -> isUpdate(true) -> save(input())) {
                    $this -> error($obj -> getError());
                }
            });
            $this -> success('操作成功！');
        }
    }

    public function resort(){
        \think\Db::transaction(function(){
            \app\link\model\Link::where('id',input('id')) -> setField('sort',input('value'));
        });
        $this -> success('操作成功！');
    }

    public function status(){
        \think\Db::transaction(function(){
            \app\link\model\Link::where(['id'=>['in',input('ids')]]) -> setField('status',input('value')?1:0);
        });
        $this -> success('操作成功！');
    }
    
    public function delete()
    {
        \think\Db::transaction(function(){
            \app\link\model\Link::where(['id'=>['in',input('ids')]]) -> delete();
        });
        $this -> success('删除成功！');
    }

}