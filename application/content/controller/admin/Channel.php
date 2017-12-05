<?php
namespace app\content\controller\admin;
class Channel extends \app\ebcms\controller\Common
{

    public function index()
    {
        return $this->fetch();
    }

   public function add(){
        if (request()->isGet()) {
            return \ebcms\Form::fetch();
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = new \app\content\model\Channel();
                if (false === $obj ->validate('Channel.add')->save(input())) {
                    $this -> error($obj -> getError()); 
                }
            });
            $this -> success('操作成功！');
        }
    }

    public function edit(){
        if (request()->isGet()) {
            $obj = \app\content\model\Channel::get(input('id'));
            return \ebcms\Form::fetch($obj);
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = \app\content\model\Channel::get(input('id'));
                if (false === $obj -> validate('Channel.edit') -> isUpdate(true) -> save(input())) {
                    $this -> error($obj -> getError());
                }
            });
            $this -> success('操作成功！');
        }
    }

    public function resort(){
        \think\Db::transaction(function(){
            \app\content\model\Channel::where('id',input('id')) -> setField('sort',input('value'));
        });
        $this -> success('操作成功！');
    }

    public function status(){
        \think\Db::transaction(function(){
            \app\content\model\Channel::where(['id'=>['in',input('ids')]]) -> setField('status',input('value')?1:0);
        });
        $this -> success('操作成功！');
    }

    public function delete()
    {
        \think\Db::transaction(function(){
            $items = \app\content\model\Channel::where(['id'=>['in',input('ids')]]) -> select();
            foreach ($items as $key => $obj) {
                foreach ($obj['content'] as $key => $content) {
                    $content -> body -> delete();
                    $content -> tag() -> detach(true);
                    $content -> attr() -> delete();
                }
                $obj -> content() -> delete();
                $obj -> delete();
            }
        });
        $this -> success('删除成功！');
    }

    public function merge()
    {
        if (request()->isGet()) {
            return \ebcms\Form::fetch();
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $ids = array_unique(explode(',', input('ids')));
                $id = input('id');
                if ($ids && $id && !in_array($id, $ids)) {
                    // 判断目标栏目是否存在
                    if ($channel = \think\Db::name('content_channel')->find($id)) {
                        // 移动内容
                        \think\Db::name('content_content')->where(['channel_id' => ['in', $ids]])->setField('channel_id', $id);
                        // 删除栏目
                        \think\Db::name('content_channel')->where(['id' => ['in', $ids]])->delete();
                    }
                }else{
                    $this->error('操作失败！');
                }
            });
            $this->success('操作成功！');
        }
    }

}