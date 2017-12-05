<?php
namespace app\content\controller\admin;
class Tag extends \app\ebcms\controller\Common
{

    public function index()
    {
        return $this->fetch();
    }

    public function edit()
    {
        if (request()->isGet()) {
            $obj = \app\content\model\Tag::get(input('id'));
            return \ebcms\Form::fetch($obj);
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $where = [
                    'id' => ['neq', input('id')],
                    'tag' => ['eq', input('tag')],
                ];
                if (\think\Db::name('content_tag')->where($where)->find()) {
                    $oldtag = \think\Db::name('content_tag')->where('id',input('id')) -> value('tag');
                    $this -> _merge($oldtag,input('tag'));
                }else{
                    \think\Db::name('content_tag') -> where('id',input('id')) -> setField('tag',input('tag'));
                }
            });
            $this -> success('操作成功！');
        }
    }

    // 改变标签样式
    public function style()
    {
        \think\Db::transaction(function(){
            if (!$tag = \app\content\model\Tag::get(input('id'))) {
                $this -> error('操作失败！');
            }
            $style = $tag['eb_style'];
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
            $tag -> eb_style = $style;
            if (false === $tag -> save()) {
                $this -> error('操作失败！');
            }
        });
        $this -> success('操作成功！');
    }

    public function recommend(){
        \think\Db::transaction(function(){
            \app\content\model\Tag::where(['id'=>['in',input('ids')]]) -> setField('recommend',input('value')?1:0);
        });
        $this -> success('操作成功！');
    }

    public function delete()
    {
        if (request()->isPost()) {
            \think\Db::transaction(function(){
                $items = \app\content\model\Tag::where(['id'=>['in',input('ids')]]) -> select();
                foreach ($items as $key => $obj) {
                    $obj -> content() -> detach(true);
                    $obj -> delete();
                }
            });
            $this -> success('删除成功！');
        }
    }

    // 标签合并
    public function merge()
    {

        if (request()->isGet()) {
            return \ebcms\Form::fetch();
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $this -> _merge(input('tag1'),input('tag2'));
            });
            $this -> success('操作成功！');
        }
    }

    private function _merge($tag1,$tag2){
        $tag1 = str_replace(' ', ',', $tag1);
        $tag1 = array_unique(explode(',', $tag1));
        if (false !== $key = array_search('', $tag1)) {
            unset($tag1[$key]);
        }

        if(false !== $key = array_search($tag2,$tag1)){
            unset($tag1[$key]);
        }

        if (!$tag1 || !$tag2) {
            $this->error('操作失败！');
        }

        // 获取tag1的ids
        $where = [];
        $where['tag'] = ['in', $tag1];
        if ($tag1_ids = \think\Db::name('content_tag')->where($where)->column('id')) {

            // 判断tag2是否存在，不存在就创建
            if (!$tag2_id = \think\Db::name('content_tag')->where(['tag' => $tag2])->value('id')) {
                // 创建tag2 并获取其id
                $data = [
                    'tag' => $tag2,
                    'count' => 0,
                ];
                $tag = new \app\content\model\Tag();
                $tag -> isUpdate(false) -> save($data);
                $tag2_id = $tag -> id;
            }

            // 获取内容id集
            $tag_ids = $tag1_ids;
            $tag_ids[] = $tag2_id;
            $c_ids = \think\Db::name('content_tags')->where('tag_id', 'in', $tag_ids)->column('c_id');
            $c_ids = array_unique($c_ids);

            // 如果有关联内容id的话就删掉管理数据并添加新数据
            if ($c_ids) {
                // 删除旧数据 关联表
                \think\Db::name('content_tags')->where('tag_id', 'in', $tag_ids)->delete();
                // 插入新数据 关联表
                $ins = [];
                foreach ($c_ids as $value) {
                    $ins[] = [
                        'tag_id' => $tag2_id,
                        'c_id' => $value,
                    ];
                }
                \think\Db::name('content_tags')->insertAll($ins);
                // 更新tag表
                \think\Db::name('content_tag')->where(['id' => $tag2_id])->setField('count', count($c_ids));
            }
            // 删除旧数据
            \think\Db::name('content_tag')->where(['id' => ['in', $tag1_ids]])->delete();
        }
    }

}