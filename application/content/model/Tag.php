<?php
namespace app\content\model;

use think\Model;

class Tag extends Model
{

    protected $name = 'content_tag';
    protected $pk = 'id';
    protected $type = [
        'eb_style' => 'json',
    ];

    public function content()
    {
        return $this->belongsToMany('Content', 'content_tags', 'c_id', 'tag_id');
    }

    public function contents()
    {
        $ids = \think\Db::name('content_tags')->where('tag_id', $this -> id) -> column('c_id');
        $where = [
            'id' => ['in', $ids?:['']],
            'status' => ['eq', 1],
        ];
        return \app\content\model\Content::where($where);
    }

    protected function getUrlAttr($value, $data)
    {
        return \think\Url::build('content/tag/index', ['tag' => $data['tag']]);
    }

    protected function getCountAttr($value, $data)
    {
        if (!$value) {
            $value = \think\Db::name('content_tags')->where('tag_id', $data['id'])->count();
            $this -> count = $value;
            $this -> save();
        }
        return $value;
    }

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
}