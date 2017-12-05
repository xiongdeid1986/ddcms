<?php
namespace app\mbzs\controller;
class Mbzs extends \app\ebcms\controller\Common
{
    
    // 所有模板显示
    public function index()
    {
        if (request()->isGet()) {
            return $this->fetch();
        }
    }

    // 添加我的配置
    public function add(){
        if (request()->isGet()) {
            return \ebcms\Form::fetch();
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = new \app\mbzs\model\Mbzs();
                if (false === $obj ->validate('Mbzs.add')->save(input())) {
                    $this -> error($obj -> getError());
                }
            });
            \think\Cache::rm('ebcms_mbzs');
            $this -> success('操作成功！');
        }
    }

    // 编辑我的配置
    public function edit(){
        if (request()->isGet()) {
            $obj = \app\mbzs\model\Mbzs::get(input('id'));
            return \ebcms\Form::fetch($obj);
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = \app\mbzs\model\Mbzs::get(input('id'));
                if (false === $obj -> validate('Mbzs.edit') -> isUpdate(true) -> save(input())) {
                    $this -> error($obj -> getError());
                }
            });
            \think\Cache::rm('ebcms_mbzs');
            $this -> success('操作成功！');
        }
    }

    public function resort(){
        \think\Db::transaction(function(){
            \app\mbzs\model\Mbzs::where('id',input('id')) -> setField('sort',input('value'));
        });
        \think\Cache::rm('ebcms_mbzs');
        $this -> success('操作成功！');
    }

    public function status(){
        \think\Db::transaction(function(){
            \app\mbzs\model\Mbzs::where(['id'=>['in',input('ids')]]) -> setField('status',input('value')?1:0);
        });
        \think\Cache::rm('ebcms_mbzs');
        $this -> success('操作成功！');
    }
    
    public function delete()
    {
        \think\Db::transaction(function(){
            \app\mbzs\model\Mbzs::where(['id'=>['in',input('ids')]]) -> delete();
        });
        \think\Cache::rm('ebcms_mbzs');
        $this -> success('删除成功！');
    }
}