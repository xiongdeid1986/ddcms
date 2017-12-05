<?php
namespace app\user\controller\admin;
class Currencylog extends \app\ebcms\controller\Common
{

    public function index()
    {
        if (request()->isGet()) {
            return $this->fetch();
        }
    }

    public function delete()
    {
        \think\Db::transaction(function(){
            \app\user\model\Currencylog::where(['id'=>['in',input('ids')]]) -> delete();
        });
        $this -> success('操作成功！');
    }

}