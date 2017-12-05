<?php
namespace app\forum\controller\admin;
class Forum extends \app\ebcms\controller\Common
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
                $obj = new \app\forum\model\Forum();
                if (false === $obj ->validate('Forum.add')->save(input())) {
                    $this -> error($obj -> getError()); 
                }
            });
            $this -> success('操作成功！');
        }
    }

    public function edit(){
        if (request()->isGet()) {
            $obj = \app\forum\model\Forum::get(input('id'));
            return \ebcms\Form::fetch($obj);
        } elseif (request()->isPost()) {
            \think\Db::transaction(function(){
                $obj = \app\forum\model\Forum::get(input('id'));
                if (false === $obj -> validate('Forum.edit') -> isUpdate(true) -> save(input())) {
                    $this -> error($obj -> getError());
                }
            });
            $this -> success('操作成功！');
        }
    }

    public function resort(){
        \think\Db::transaction(function(){
            \app\forum\model\Forum::where('id',input('id')) -> setField('sort',input('value'));
        });
        $this -> success('操作成功！');
    }

    public function status(){
        \think\Db::transaction(function(){
            \app\forum\model\Forum::where(['id'=>['in',input('ids')]]) -> setField('status',input('value')?1:0);
        });
        $this -> success('操作成功！');
    }

    public function delete(){
        \think\Db::transaction(function(){
            $items = \app\forum\model\Forum::where(['id'=>['in',input('ids')]]) -> select();
            foreach ($items as $key => $obj) {
                foreach ($obj['thread'] as $key => $thread) {
                    $thread -> body -> delete();
                    $thread -> rethread() -> delete();
                }
                $obj -> thread() -> delete();
                $obj -> delete();
            }
        });
        $this -> success('删除成功！');
    }

    // 此操作不受锁定影响！
    public function merge(){
        if (request() -> isGet()) {
            return \ebcms\Form::fetch();
        }elseif (request()->isPost()) {
            $ids = array_unique(explode(',', input('ids')));
            $id = input('id');
            if (!$ids || !$id || in_array($id, $ids)) {
                $this -> error('操作失败！');
            }
            \think\Db::transaction(function() use($id,$ids){
                // 判断目标栏目是否存在
                $category = \think\Db::name('forum') -> find($id);
                // 移动内容
                \think\Db::name('forum_thread') -> where(['forum_id'=>['in',$ids]]) -> setField('forum_id',$id);
                // 删除栏目
                \think\Db::name('forum') -> where(['id'=>['in',$ids]]) -> delete();
            });
            $this -> success('操作成功！');
        }
    }

    // 权限设置
    public function auth(){
        if (request() -> isGet()) {
            return \ebcms\Form::fetch();
        }elseif (request()->isPost()) {
            $data = [
                'id'    =>  input('id'),
                'auth'    =>  implode(',', input('auth/a',[]))
            ];
            \think\Db::name('forum') -> update($data);
            $this -> success('设置成功！');
        }
    }

    public function open(){
        \think\Db::transaction(function(){
            \think\Db::name('forum') -> where(['id'=>['in',input('ids')]]) -> setField('open',input('value')?1:0);
        });
        $this -> success('处理成功！');
    }

    public function add_moderator(){
        if (request() -> isGet()) {
            return \ebcms\Form::fetch();
        }elseif (request() -> isPost()) {
            if (\think\Db::name('forum_moderator') -> where(['forum_id'=>input('forum_id'),'user_id'=>input('user_id')]) -> find()) {
                $this -> error('该用户已是版主，无须重复添加！');
            }
            if (!\think\Db::name('user') -> find(input('user_id'))) {
                $this -> error('账户不存在！');
            }
            \think\Db::transaction(function(){
                $data = [
                    'forum_id'  =>  input('forum_id'),
                    'user_id'   =>  input('user_id'),
                    'auth'      =>  json_encode(input('auth/a'))
                ];
                \think\Db::name('forum_moderator') -> insert($data);
            });
            $this -> success('添加成功！');
        }
    }

    public function edit_moderator(){
        if (request() -> isGet()) {
            $data = \think\Db::name('forum_moderator') -> find(input('id'));
            $data['auth'] = json_decode($data['auth'],true);
            return \ebcms\Form::fetch($data);
        }elseif (request() -> isPost()) {
            \think\Db::transaction(function(){
                \think\Db::name('forum_moderator') -> where('id',input('id')) -> setField('auth',json_encode(input('auth/a')));
            });
            $this -> success('操作成功！');
        }
    }

    public function delete_moderator(){
        \think\Db::transaction(function(){
            \think\Db::name('forum_moderator') -> delete(input('id'));
        });
        $this -> success('删除成功！');
    }

}