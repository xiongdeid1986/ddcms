<?php
namespace app\content\controller\admin;
class Attr extends \app\ebcms\controller\Common
{

    public function index()
    {
        return $this->fetch();
    }

    public function resort(){
        \think\Db::transaction(function(){
            $where = [
                'content_id'    =>  input('content_id'),
                'attr'    =>  input('attr'),
            ];
            \think\Db::name('content_attr') -> where($where) -> setField('sort',input('value'));
        });
        $this -> success('处理成功！');
    }

    public function remove(){
        \think\Db::transaction(function(){
            if ($attr = input('attr')) {
                $attrs = explode(',', $attr);
                foreach ($attrs as $key => $value) {
                    list($attr,$content_id) = explode('_', $value);
                    \think\Db::name('content_attr') -> where(['attr'=>$attr,'content_id'=>$content_id]) -> delete();
                }
            }
        });
        $this -> success('处理成功！');
    }
}