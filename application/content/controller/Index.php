<?php
namespace app\content\controller;
class Index extends \app\index\controller\Common
{

    public function index()
    {
        return $this -> fetch();
    }

    public function channel($id)
    {
        if (request() -> isGet()) {
            if ($channel = \app\content\model\Channel::get($id)) {

                if (1 != $channel['status']) {
                    $this->error('栏目不存在！');
                }

                if ($channel['eb_url']) {
                    $this->redirect(htmlspecialchars_decode($channel['eb_url']), 302);
                }
                
                // 路径
                $channels = $channel -> getChannel('all');
                $pdatas = \ebcms\Tree::parent_data($channels, $id);
                \think\Config::set('topcateid',$pdatas?$pdatas[0]['id']:$channel['id']);
                foreach ($pdatas as $value) {
                    \ebcms\Position::add(['title' => $value['title'], 'url' => $value['url']]);
                }
                \ebcms\Position::add(['title' => $channel['title'], 'url' => $channel['url']]);

                // seo设置
                $this->assign('seo', [
                    'title' => $channel['metatitle'] . ' - ' . $this->seo['sitename'],
                    'keywords' => $channel['keywords'],
                    'description' => $channel['description'],
                ]);

                $this->assign('channel', $channel);
                return $this->fetch($channel['tpl']);
            } else {
                $this->error('栏目不存在');
            }
        }
    }

    public function detail()
    {
        if ($filename = input('filename')) {
            $where = [
                'filename' => $filename
            ];
        } else {
            $where = [
                'id' => input('id', 0, 'intval')
            ];
        }
        if ($content = \app\content\model\Content::where($where)->find()) {

            if (1 != $content['status']) {
                $this->error('内容未审核！');
            }

            if ($content['cate']['status'] != 1) {
                $this->error('内容未审核！');
            }

            if ($content['eb_url']) {
                $this->redirect(htmlspecialchars_decode($content['eb_url']), 302);
            }


            // 统计点击次数
            if (false !== \ebcms\Config::get('content.click_record')) {
                \think\Config::set('content_tongji_id',$content['id']);
                \think\Hook::add('app_end', 'app\\content\\behavior\\Click');
            }

            // 路径
            $channels = $content -> getChannel('all');
            $pdatas = \ebcms\Tree::parent_data($channels, $content['channel_id']);
            \think\Config::set('topcateid',$pdatas?$pdatas[0]['id']:$content['channel_id']);
            foreach ($pdatas as $value) {
                \ebcms\Position::add(['title' => $value['title'], 'url' => $value['url']]);
            }
            \ebcms\Position::add(['title' => $channels[$content['channel_id']]['title'], 'url' => $channels[$content['channel_id']]['url']]);
            \ebcms\Position::add(['title' => $content['title'], 'url' => $content['url']]);

            // seo设置
            $this->assign('seo', [
                'title' => $content['metatitle'] . ' - ' . $this->seo['sitename'],
                'keywords' => $content['keywords'],
                'description' => $content['description'],
            ]);
            $this->assign('site',$this->site);
            $this->assign('content', $content);

            $catetpl = isset($channels[$content['channel_id']]) ? $channels[$content['channel_id']]['tpl_detail'] : '';
            return $this->fetch($content['tpl'] ?: $catetpl);
        } else {
            $this->error('内容不存在');
        }
    }

}