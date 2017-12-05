<?php
namespace app\content\controller;
class Tag extends \app\index\controller\Common
{

    public function index()
    {
        if (request()->isGet()) {
            if ($tag = input('tag')) {
                // 查看详细标签
                if ($tag = \app\content\model\Tag::where('tag', $tag)->find()) {
                    $this->assign('tag', $tag);
                    // position设置
                    \ebcms\Position::add(['title' => '标签', 'url' => \think\Url::build('content/tag/index')]);
                    \ebcms\Position::add(['title' => $tag['tag'], 'url' => \think\Url::build('content/tag/index', ['tag' => $tag['tag']])]);
                    // seo设置
                    $this->assign('seo', [
                        'title' => '标签：' . $tag['tag'] . ' - ' . $this->seo['sitename'],
                        'keywords' => $tag['tag'],
                        'description' => $tag['tag'],
                    ]);
                    return $this->fetch();
                } else {
                    $this->error('标签不存在！');
                }
            } else {
                // position设置
                \ebcms\Position::add(['title' => '标签', 'url' => \think\Url::build('content/tag/index')]);
                // seo设置
                $this->assign('seo', [
                    'title' => '标签 - ' . $this->seo['sitename'],
                    'keywords' => '标签',
                    'description' => '标签',
                ]);
                return $this->fetch();
            }
        }
    }

}