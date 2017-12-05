<?php
namespace app\content\model;

use think\Model;

class Content extends Model
{

    protected $name = 'content_content';
    protected $pk = 'id';
    protected $autoWriteTimestamp = true;
    protected $type = [
        'ext' => 'json',
        'eb_style' => 'json',
    ];

    // 关联
    public function body()
    {
        return $this->hasOne('Body', 'id', 'id');
    }

    public function channel()
    {
        return $this->belongsTo('Channel', 'channel_id');
    }

    public function attr()
    {
        return $this->hasMany('Attr','content_id','id');
    }

    public function tag()
    {
        return $this->belongsToMany('Tag', 'content_tags', 'tag_id', 'c_id');
    }

    // 获取某个属性下面的文章
    public function attrlist($attr,$limit=10){
        $content_ids = \think\Db::name('content_attr') -> where('attr',$attr) -> order('sort desc') -> column('content_id');
        $where = [
            'id'        =>  ['in',$content_ids],
            'status'    =>  1,
        ];
        $res = [];
        $tmp = \app\content\model\Content::where($where) -> select();
        foreach ($tmp as $key => $value) {
            $res[$value['id']] = $value;
        }
        array_multisort($res,$content_ids);
        return array_slice($res, 0, $limit);
    }

    // 获取相关文章
    public function relations()
    {
        static $res = [];
        $id = $this -> id;
        if (!isset($res[$id])) {
            $res[$id] = [];
            $where = [
                'c_id' => ['eq', $id],
            ];
            $tag_ids = \think\Db::name('content_tags')->where($where)->limit(20)->column('tag_id');
            $where = [
                'tag_id' => array('in', array_unique($tag_ids)?array_unique($tag_ids):['']),
                'c_id' => array('neq', $id),
            ];
            $c_ids = \think\Db::name('content_tags')->where($where)->column('c_id');
            $extends = $this -> getChannel('extend');
            $where = [
                'id' => ['in', $c_ids?:['']],
                'status' => ['eq', 1],
                'channel_id' => ['in', $extends[$this -> channel -> extend_id]]
            ];
            $res[$id] = \app\content\model\Content::with('channel')->where($where)->order('id desc');
        }
        return $res[$id];
    }

    public function getChannel($type = '')
    {
        static $res;
        if (!$res && !$res = \think\Cache::get('content_channels')) {
            $x = \app\content\model\Channel::with('')->order('sort desc,id asc')->select();
            $channels_status = [];
            $channels_extend = [];
            $channels = [];
            foreach ($x as $channel) {
                $channels[$channel['id']] = $channel;
                if ($channel['status']) {
                    $channels_status[$channel['id']] = $channel;
                    $channels_extend[$channel['extend_id']][] = $channel['id'];
                }
            }
            $res['channels'] = $channels;
            $res['channels_status'] = $channels_status;
            $res['channels_extend'] = $channels_extend;
            \think\Cache::set('content_channels', $res);
        }
        if (!$res) {
            return false;
        }
        if (is_numeric($type)) {
            return isset($res['channels'][$type]) ? $res['channels'][$type] : false;
        } elseif ('all' == $type) {
            return $res['channels'];
        } elseif ('extend' == $type) {
            return $res['channels_extend'];
        } else {
            return $res['channels_status'];
        }
    }

    // 设置简介
    protected function setDescriptionAttr($value, $data)
    {
        if (!$value) {
            $input = input();
            return mb_substr(str_replace([' ', '&nbsp;', '　', "\r", "\n", "\t"], '', strip_tags(htmlspecialchars_decode($input['body']['body']))), 0, 200);
        } else {
            return $value;
        }
    }

    // 设置缩略图
    protected function setThumbAttr($value, $data)
    {
        if (!$value) {
            $pattern = "/<[img|IMG].*?src=[\'|\"]" . preg_quote(request() -> root(true) . '/upload', '/') . "(.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
            if (preg_match($pattern, htmlspecialchars_decode($data['body']['body']), $match)) {
                if ($pos = strpos($match[1], '!')) {
                    return mb_substr($match[1], 0, $pos);
                } else {
                    return $match[1];
                }
            }
            return '';
        } else {
            return $value;
        }
    }

    // 获取META标题
    protected function getMetatitleAttr($value, $data)
    {
        if (!$data['eb_metatitle']) {
            return $data['title'];
        }
        return $data['eb_metatitle'];
    }

    // 获取短标题
    protected function getShorttitleAttr($value, $data)
    {
        if (!$data['eb_shorttitle']) {
            return $data['title'];
        }
        return $data['eb_shorttitle'];
    }

    // 获取短标题
    protected function getTagsAttr($value, $data)
    {
        $res = [];
        $tag = $this -> tag;
        foreach ($tag as $key => $value) {
            $res[] = $value['tag'];
        }
        return implode(',', $res);
    }

    // 获取样式
    protected function getStyleAttr($value, $data)
    {
        $style = json_decode($data['eb_style'],true);
        $str = '';
        if (is_array($style)) {
            if (isset($style['color']) && $style['color']) {
                $str .= 'color:' . $style['color'] . ';';
            }
            if (isset($style['bold']) && $style['bold']) {
                $str .= 'font-weight:' . $style['bold'] . ';';
            }
            if (isset($style['size']) && $style['size']) {
                $str .= 'font-size:' . $style['size'] . 'px;';
            }
        }
        return $str;
    }

    // 获取栏目（缓存）
    protected function getCateAttr($value, $data)
    {
        return $this -> getChannel($data['channel_id']);
    }

    // 获取链接
    protected function getUrlAttr($value, $data)
    {

        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }

        $url_model = \ebcms\Config::get('content.url_model');

        if ($url_model == 2) {
            if ($data['filename'] && is_string($data['filename'])) {
                $res[$data['id']] = \think\Url::build('content/index/detail?channel_id=' . $data['channel_id'], ['filename' => $data['filename']]);
            } else {
                $res[$data['id']] = \think\Url::build('content/index/detail?channel_id=' . $data['channel_id'], ['id' => $data['id']]);
            }
        } else if ($url_model == 1) {
            if ($data['filename'] && is_string($data['filename'])) {
                $res[$data['id']] = \think\Url::build('content/index/detail', ['filename' => $data['filename']]);
            } else {
                $res[$data['id']] = \think\Url::build('content/index/detail', ['id' => $data['id']]);
            }
        } else {
            $res[$data['id']] = \think\Url::build('content/index/detail', ['id' => $data['id']]);
        }

        return $res[$data['id']];
    }

    // 获取上一篇
    protected function getPrevAttr($value, $data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        $where = [
            'id' => ['gt', $data['id']],
            'channel_id' => ['eq', $data['channel_id']],
            'status' => ['eq', 1]
        ];
        return $res[$data['id']] = \app\content\model\Content::where($where)->find() ?: [];
    }

    // 获取下一篇
    protected function getNextAttr($value, $data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        $where = [
            'id' => ['lt', $data['id']],
            'channel_id' => ['eq', $data['channel_id']],
            'status' => ['eq', 1]
        ];
        return $res[$data['id']] = \app\content\model\Content::where($where)->order('id desc')->find() ?: [];
    }

}