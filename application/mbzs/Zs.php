<?php
namespace app\mbzs;

class Zs
{
    public static function get($name,$render = true)
    {
        static $config;

        if (!$config) {
            $config = self::config();
        }

        $name = strtolower($name);
        if (!isset($config[$name])) {
            return null;
        }
        dump( htmlspecialchars_decode( $config[$name]['value'] ) );
        return $render ? $config[$name]['val'] : $config[$name]['value'];
    }

    public static function config($refresh = false)
    {

        if ($refresh || !$config = \think\Cache::get('ebcms_mbzs')) {
            $config = self::build();
            \think\Cache::set('ebcms_mbzs', $config);
        }
        return $config;
    }

    private static function build()
    {
        $configs = \think\Db::name('mbzs') -> where('status',1) -> column(true,'name');
        foreach ($configs as $key => $value) {
            $configs[$key] = self::render_config($value);
        }
        return $configs;
    }

    private static function render_config($config)
    {
        switch ($config['form']) {
            case 'multitextbox':
                $config['val'] = $config['value'];
                break;
            case 'ueditor':
                $config['val'] = htmlspecialchars_decode($config['value']);
                break;
            case 'upload':
                $config['val'] = thumb($config['value']);
                break;
            case 'tpl':
                $config['val'] = \ebcms\Func::render_tpl(htmlspecialchars_decode($config['value']));
                break;

            default:
                $config['val'] = null;
                break;
        }
        return $config;
    }

}