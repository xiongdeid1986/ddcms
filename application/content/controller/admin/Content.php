<?php
namespace app\content\controller\admin;
class Content extends \app\ebcms\controller\Common
{

    public function index()
    {
        return $this->fetch(input('?channel_id')?'lists':'');
    }

    public function add()
    {
        if (request()->isGet()) {
            $channel = \think\Db::name('content_channel')->where('id=' . input('channel_id'))->find();
            if ($channel) {
                return \ebcms\Form::fetch(['channel' => $channel], ['ext_id' => $channel['extend_id']]);
            }else{
                $this -> error('请选择栏目！');
            }
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = new \app\content\model\Content();
                if (false === $id = $obj ->validate('Content.add')->allowfield(true)->save(input())) {
                    $this -> error($obj -> getError());
                }
                $obj -> body()->save(input('body/a'));
                $this -> update_tags($id);
            });
            $this -> success('操作成功！');
        }
    }

    public function edit()
    {
        if (request()->isGet()) {
            $obj = \app\content\model\Content::get(input('id'));
            return \ebcms\Form::fetch($obj, ['ext_id' => $obj['channel']['extend_id']]);
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = \app\content\model\Content::get(input('id'));
                if (false === $obj -> validate('Content.edit') -> allowfield(true) -> isUpdate(true) -> together(['body' => input('body/a')]) -> save(input())) {
                    $this -> error($obj -> getError());
                }
                $this -> update_tags(input('id'));
            });
            $this -> success('操作成功！');
        }
    }

    public function style()
    {
        \think\Db::transaction(function(){
            if (!$obj = \app\content\model\Content::get(input('id'))) {
                $this -> error('操作失败！');
            }
            $style = $obj['eb_style'];
            if (\think\Request::instance()->has('bold')) {
                if (input('bold')) {
                    $style['bold'] = input('bold');
                }else{
                    unset($style['bold']);
                }
            }
            if (\think\Request::instance()->has('color')) {
                if (input('color')) {
                    $style['color'] = input('color');
                }else{
                    unset($style['color']);
                }
            }
            $obj -> eb_style = $style;
            if (false === $obj -> save()) {
                $this -> error('操作失败！');
            }
        });
        $this -> success('操作成功！');
    }

    public function status(){
        \think\Db::transaction(function(){
            \app\content\model\Content::where(['id'=>['in',input('ids')]]) -> setField('status',input('value')?1:0);
        });
        $this -> success('操作成功！');
    }

    public function move()
    {
        if (request()->isGet()) {
            return \ebcms\Form::fetch();
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $ids = explode(',', input('ids'));
                $channel_id = input('channel_id');
                \app\content\model\Content::where(['id'=>['in',$ids]]) -> setField('channel_id',$channel_id);
            });
            $this -> success('处理成功！');
        }
    }

    public function attr(){
        \think\Db::transaction(function(){
            $id = input('id');
            \think\Db::name('content_attr') -> where('content_id',$id) -> delete();
            $attrs = explode(',', str_replace(' ', ',', input('attrs')));
            $data = [];
            foreach ($attrs as $key => $value) {
                if ($value) {
                    $data[] = [
                        'content_id'    =>  $id,
                        'attr'          =>  $value,
                        'sort'          =>  0,
                    ];
                }
            }
            if ($data) {
                \think\Db::name('content_attr') -> insertAll($data);
            }
        });
        $this -> success('操作成功！');
    }

    public function delete()
    {
        \think\Db::transaction(function(){
            $items = \app\content\model\Content::where(['id'=>['in',input('ids')]]) -> select();
            foreach ($items as $key => $obj) {
                $obj -> tag() -> detach(true);
                $obj -> attr() -> delete();
                if ($obj -> body) {
                    $obj -> body -> delete();
                }
                $obj -> delete();
            }
        });
        $this -> success('删除成功！');
    }

    // 更新处理tag标签
    protected function update_tags($id)
    {

        $oldtagid = \think\Db::name('content_tags')->where(['c_id' => $id])->column('tag_id');
        // 删除旧数据
        \think\Db::name('content_tags') -> where(['c_id' => $id]) -> delete();

        // 若有新数据 更新新数据
        if ($tags = input('tags')) {
            $tags = str_replace(' ', ',', $tags);
            $tags = explode(',', $tags);
            $tags = array_unique($tags);
            // 写入新的tag标签
            $m = \think\Db::name('content_tag');
            $tagsid = array();
            foreach ($tags as $key => $tag) {
                if (trim($tag)) {
                    if (!$data = $m->where(['tag' => $tag])->find()) {
                        $insid = $m->insertGetId(['tag' => $tag]);
                        $tagsid[] = array(
                            'c_id' => $id,
                            'tag_id' => $insid,
                        );
                        $oldtagid[] = $insid;
                    } else {
                        $tagsid[] = array(
                            'c_id' => $id,
                            'tag_id' => $data['id'],
                        );
                        $oldtagid[] = $data['id'];
                    }
                }
            }
            // 插入新的额tag关联
            \think\Db::name('content_tags') -> insertAll($tagsid);
        }

        // 对改动数据重置count
        \think\Db::name('content_tag')->where('id','in',array_unique($oldtagid)?:[''])->setField('count', 0);
    }

}