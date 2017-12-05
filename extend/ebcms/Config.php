<?php
namespace ebcms;

class Config
{
    public static function get($name)
    {
        static $config;
        if (!$config) {
            $config = self::config();
        }
        return self::get_point_value($config, $name);
    }

    public static function config($refresh = false)
    {
        if ($refresh || !$config = \think\Cache::get('ebcms_config')) {
            $config = self::build();
            \think\Cache::set('ebcms_config', $config);
        }
        return $config;
    }


    public static function get_global($name)
    {

        static $global_config;

        if (!$global_config) {
            $global_config = self::global_config();
        }
        return $global_config;
    }


    public static function global_config($refresh = false)
    {
        if ($refresh || !$global_config = \think\Cache::get('ebcms_global_config')) {
            $global_config = self::build_global();
            \think\Cache::set('ebcms_global_config', $global_config);
        }
        return $global_config;
    }
    //前端获取全部后台配置
    private static function build_global()
    {
        $categorys = \think\Db::name('configcate')->column('name', 'id');
        $configs = \think\Db::name('config')->order('sort desc')->column('category_id,group,name,value,render', 'id');
        $res = [];
        foreach($configs as $k => $v){
            $v['value'] = htmlspecialchars_decode($v['value']);
            $category_name = $categorys[$v["category_id"]];
            $group = @explode('@', $v['group'])[1];
            $group = $group ? $group : "default";
            if(
                $v['category_id'] != 1 && $group != "base" ||
                $v['category_id'] != 1 && $group != "email" ||
                $v['category_id'] != 2 && $group != "captcha" ||
                $v['category_id'] != 2 && $group != "captcha"
            ){
                $res[$category_name][$group][$v['name']] = self::render_config($v['value'], $v['render']);
            }
        }
        return $res;
    }


    private static function build()
    {
        $categorys = \think\Db::name('configcate')->column('name', 'id');
        $configs = \think\Db::name('config')->order('sort desc')->column('category_id,group,name,value,render', 'id');
        $res = [];
        foreach ($configs as $key => $value) {
            $value['value'] = htmlspecialchars_decode($value['value']);
            $cate = $categorys[$value['category_id']];
            if (strpos($value['group'], '@')) {
                list($str,$group) = explode('@', $value['group']);
                $res[$cate][$group][$value['name']] = self::render_config($value['value'], $value['render']);
            }else{
                $res[$cate][$value['name']] = self::render_config($value['value'], $value['render']);
            }
        }
        return $res;
    }


    // 根据类型解析配置文档
    private static function render_config($data, $render)
    {
        switch ($render) {
            case 'string':
                $tmp = self::unicode_decode($data);
                break;
            case 'number':
                $tmp = (int)$data;
                break;
            case 'bool':
                $tmp = (boolean)$data;
                break;
            case 'float':
                $tmp = (float)$data;
                break;
            case 'item':
                $tmp = self::render_item($data);
                break;
            case 'json':
                $tmp = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", $data), true);
                break;
            case 'ini':
                $tmp = parse_ini_string($data);
                break;
            case 'yaml':
                $tmp = yaml_parse($data);
                break;
            case 'xml':
                $tmp = (array)simplexml_load_string($data);
                break;
            case 'array':
                $data = ltrim($data,"[");
                $data = rtrim($data,"]");
                $data = trim($data,'"');
                $data = explode('","',$data);
                foreach ($data as $k => $v){
                    $data[$k] = self::unicode_decode($v);
                }
                $tmp = $data;
                break;

            default:
                break;
        }

        return $tmp;
    }

    public static function unicode_decode($name){
        if(empty($name)) return '';
        $json = '{"str":"'.$name.'"}';
        $arr = json_decode($json,true);
        if(empty($arr)) return '';
        return $arr['str'];
    }

    // 解析枚举类型
    // 类型1：abc:标题|链接
    // 类型2：高度|30cm
    private static function render_item($str)
    {
        if (!$str) {
            return null;
        }
        $arr = explode(PHP_EOL, \ebcms\Func::streol($str));
        $array = array();
        foreach ($arr as $key => $value) {
            if ($value) {
                if (strpos($value, ':')) {
                    $tmp = explode(':', $value);
                    if (strpos($tmp[1], '|')) {
                        $temp = explode('|', $tmp[1]);
                        foreach ($temp as $k => $v) {
                            $temp[$k] = $v;
                        }
                        $tmp[1] = $temp;
                    } else {
                        $tmp[1] = $tmp[1];
                    }
                    $array[$tmp[0]] = $tmp[1];
                } else {
                    if (strpos($value, '|')) {
                        $temp = explode('|', $value);
                        foreach ($temp as $k => $v) {
                            $temp[$k] = $v;
                        }
                        $array[] = $temp;
                    } else {
                        $array[] = $value;
                    }
                }
            }
        }
        return $array;
    }

    // 获取数组中点语法的值
    private static function get_point_value($data = [], $str)
    {
        $pos = strpos($str, '.');
        if (false === $pos) {
            return isset($data[$str]) ? $data[$str] : null;
        } else {
            $key = mb_substr($str, 0, $pos);
            if (isset($data[$key])) {
                return self::get_point_value($data[$key], mb_substr($str, $pos + 1));
            } else {
                return null;
            }
        }
    }

}