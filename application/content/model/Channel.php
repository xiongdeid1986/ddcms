<?php
namespace app\content\model;

use think\Model;

class Channel extends Model
{

    protected $name = 'content_channel';
    protected $pk = 'id';
    protected $autoWriteTimestamp = true;
    protected $type = [
        'eb_ext' => 'json',
    ];

    public function content()
    {
        return $this->hasMany('\app\content\model\Content', 'channel_id', 'id');
    }

    public function extend()
    {
        return $this->belongsTo('\app\ebcms\model\Extend', 'extend_id', 'id', '', 'LEFT');
    }

    // 栏目的内容列表
    public function lists($type='')
    {
        switch ($type) {
            case 'sub': // 子栏目
                $ids = \ebcms\Tree::subid($this -> getChannel(), $this -> id);
                return \app\content\model\Content::where(['channel_id' => ['in', $ids], 'status' => 1, 'eb_url'=>'']);
                break;
            case 'subs': // 所有子级栏目
                $ids = \ebcms\Tree::subtreeid($this -> getChannel(), $this -> id);
                return \app\content\model\Content::where(['channel_id' => ['in', $ids], 'status' => 1, 'eb_url'=>'']);
                break;
            case 'all': // 不限栏目
                return \app\content\model\Content::where(['status' => 1, 'eb_url'=>'']);
            default:
                return \app\content\model\Content::where(['channel_id' => $this -> id, 'status' => 1, 'eb_url'=>'']);
        }
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

    protected function getMetatitleAttr($value, $data)
    {
        if (!$data['eb_metatitle']) {
            return $data['title'];
        }
        return $data['eb_metatitle'];
    }

    // 获取扩展
    protected function getExtAttr($value, $data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        $ext = json_decode($data['eb_ext'],true);
        if (is_array($ext) && isset($ext['__config__'])) {
            unset($ext['__config__']);
        }
        return $res[$data['id']] = is_array($ext)?$ext:[];
    }
    
    protected function getUrlAttr($value, $data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        return $res[$data['id']] = \think\Url::build('content/index/channel?id='.$data['id']);
    }
    
    protected function getUrl2Attr($value, $data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        if ($data['eb_url']) {
            $url = htmlspecialchars_decode($data['eb_url']);
            return $res[$data['id']] = (strpos($url, '://') || 0 === strpos($url, '/')) ? $url : \think\Url::build($url);
        }
        return $res[$data['id']] = \think\Url::build('content/index/channel?id='.$data['id']);
    }

    protected function getRecontentAttr($value, $data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        $where = [
            'channel_id' => ['eq', $data['id']],
            'sort' => ['eq', 1],
            'status' => ['eq', 1],
        ];
        return $res[$data['id']] = \app\content\model\Content::where($where)->limit(100)->order('id desc')->select();
    }

    // 栏目的内容数
    protected function getCountAttr($value, $data)
    {
        static $res = [];
        if (isset($res[$data['id']])) {
            return $res[$data['id']];
        }
        $where = [
            'channel_id' => ['eq', $data['id']],
            'status' => ['eq', 1],
        ];
        return $res[$data['id']] = \app\content\model\Content::where($where)->count();
    }

    // 顶级栏目
    protected function getTopAttr($value, $data)
    {
        static $res;
        if (!isset($res[$data['id']]) || !$res[$data['id']]) {
            $pdatas = \ebcms\Tree::parent_data($this -> getChannel(), $data['id']);
            $res[$data['id']] = $pdatas?$pdatas[0]:$this -> getChannel($data['id']);
        }
        return $res[$data['id']];
    }

    // 父栏目
    protected function getParrentAttr($value, $data)
    {
        static $res;
        if (!isset($res[$data['id']]) || !$res[$data['id']]) {
            $res[$data['id']] = $this -> getChannel($data['pid']);
        }
        return $res[$data['id']];
    }

    // 父栏目
    protected function getSubsAttr($value, $data)
    {
        static $res;
        if (!isset($res[$data['id']]) || !$res[$data['id']]) {
            $res[$data['id']] = \ebcms\Tree::sub($this -> getChannel(), $data['id']);
        }
        return $res[$data['id']];
    }

    // 子栏目id
    protected function getSubIdsAttr($value, $data)
    {
        static $res;
        if (!isset($res[$data['id']]) || !$res[$data['id']]) {
            $res[$data['id']] = \ebcms\Tree::subid($this -> getChannel(), $data['id']);
        }
        return is_array($res[$data['id']])?$res[$data['id']]:[];
    }

    // 子栏目id以及自身id
    protected function getSubIdsAndSelfAttr($value, $data)
    {
        static $res;
        if (!isset($res[$data['id']]) || !$res[$data['id']]) {
            $res[$data['id']] = $this -> sub_ids;
            $res[$data['id']][] = $data['id'];
        }
        return $res[$data['id']];
    }

    // 所有子栏目id
    protected function getSubIdsTreeAttr($value, $data)
    {
        static $res;
        if (!isset($res[$data['id']]) || !$res[$data['id']]) {
            $res[$data['id']] = \ebcms\Tree::subtreeid($this -> getChannel(), $data['id']);
        }
        return is_array($res[$data['id']])?$res[$data['id']]:[];
    }

    // 所有子栏目id以及自身id
    protected function getSubIdsTreeAndSelfAttr($value, $data)
    {
        static $res;
        if (!isset($res[$data['id']]) || !$res[$data['id']]) {
            $res[$data['id']] = $this -> sub_ids_tree;
            $res[$data['id']][] = $data['id'];
        }
        return $res[$data['id']];
    }

}