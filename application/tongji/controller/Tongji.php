<?php
namespace app\tongji\controller;
class Tongji extends \app\ebcms\controller\Common
{

    // 访问日志
    public function index()
    {
        if (request()->isGet()) {
            return $this->fetch();
        }
    }

    // 页面统计
    public function tj(){
        if (request()->isGet()) {
            return $this->fetch();
        }
    }

    public function delete()
    {
        $day = input('day', 0, 'intval');
        if ($day) {
            $end = time() - $day * 24 * 3600;
            $where = [
                'create_time' => ['between', [0, $end]],
            ];
            if (false !== \think\Db::name('tongji_tongji')->where($where)->delete()) {
                $this->success('删除成功！');
            } else {
                $this->error('删除失败！');
            }
        }
    }

}