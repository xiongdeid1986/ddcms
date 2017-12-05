<?php
namespace app\content\controller;
class Search extends \app\index\controller\Common
{

    public function index()
    {
        if (request()->isGet()) {
            $q = trim(input('q'));
            \ebcms\Position::add(['title' => '搜索', 'url' => \think\Url::build('content/search/index')]);
            if ($q) {
                // seo设置
                $this->assign('seo', [
                    'title' => '搜索：' . $q . ' - ' . $this->seo['sitename'],
                    'keywords' => $q,
                    'description' => $q,
                ]);
            } else {
                // seo设置
                $this->assign('seo', [
                    'title' => '搜索 - ' . $this->seo['sitename'],
                    'keywords' => '搜索',
                    'description' => '搜索',
                ]);
            }
            $this->assign('q', $q);
            return $this->fetch();
        }
    }

}