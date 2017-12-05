<?php 
if (!defined('THINK_PATH')) exit();

/**
* 
* 温馨提醒
* 
* 开发助手提供四个方法管理数据
* 1.\ebcms\Install::exports('模块英文名称') 打包数据 （配置 权限节点 表单 菜单）
* 2.\ebcms\Install::imports('模块英文名称') 导入打包的数据 （配置 权限节点 表单 菜单）
* 3.\ebcms\Install::delete('模块英文名称')  删除数据库中相关数据 （配置 权限节点 表单 菜单）
* 4.\ebcms\Install::exec_sql_file('sql文件') 执行sql文件
* 
* 通过开发助手导出的相关数据统一存放在 当前应用路径/install/config.dat 里面
* 安装时 可以通过 \ebcms\Install::imports('模块英文名称') 导入
* 如果你有自建数据表，可以通过数据库管理软件将数据表导出，并将表前缀替换成{prefix}
* 然后通过 \ebcms\Install::exec_sql_file('sql文件') 执行
* 
* 当然，开发助手提供的方法只是作为参考，如果您不嫌繁琐，您也可以用您自己的方法导入导出数据。
* 
*/

/**
* 安装函数
* @return string|true 返回字符串表示错误信息 true表示安装成功！
*/
function ebcms_install(){

    $config = <<<'str'
{"html":"{switch name=&quot;$Request.param.form&quot;}\r\n\t{case value=&quot;multitextbox&quot;}\r\n\t\t&lt;textarea class=&quot;form-control&quot; id=&quot;{$field.unique}&quot; name=&quot;{$field.field}&quot; rows=&quot;{$field.config.height|default='5'}&quot; placeholder=&quot;{$field.config.prompt|default=''}&quot; {eq name='field.config.disabled' value='1'} disabled{\/eq} {eq name='field.config.readonly' value='1'} readonly{\/eq}&gt;{$field.value}&lt;\/textarea&gt;\r\n\t{\/case}\r\n\t{case value=&quot;ueditor&quot;}\r\n\t\t&lt;script&gt;\r\n\t\t\t$(function(){\r\n\t\t\t\tEBCMS.MYFUN.renderUE('{$field.unique}',{\r\n\t\t\t\t\tautoHeightEnabled:{$field.config.autoheightenabled|default='false'},\r\n\t\t\t\t\tmaximumWords:{$field.config.maximumwords|default='10000'},\r\n\t\t\t\t\twordCount:{$field.config.wordcount|default='true'},\r\n\t\t\t\t\telementPathEnabled:{$field.config.elementpathenabled|default='true'},\r\n\t\t\t\t\tinitialFrameHeight:{$field.config.initialframeheight|default='420'},\r\n\t\t\t\t});\r\n\t\t\t});\r\n\t\t&lt;\/script&gt;\r\n\t\t&lt;textarea name=&quot;{$field.field}&quot; id=&quot;{$field.unique}&quot;&gt;{$field.value}&lt;\/textarea&gt;\r\n\t{\/case}\r\n\t{case value=&quot;upload&quot;}\r\n\t\t{php}\r\n\t\t\t$field['config']['path'] = '\/mbzs'\r\n\t\t{\/php}\r\n\t\t&lt;script&gt;\r\n\t\t\t$(function(){\r\n\t\t\t\tEBCMS.MYFUN.renderUploader('#{$field.unique}_pick',function(file,res){\r\n\t\t\t\t\tif (res.code) {\r\n\t\t\t\t\t\t$('#{$field.unique}').val(res.data.pathname);\r\n\t\t\t\t\t}else{\r\n\t\t\t\t\t\tEBCMS.MSG.alert(res.msg);\r\n\t\t\t\t\t};\r\n\t\t\t\t},'{$field.config.extensions|default=&quot;&quot;}','{$field.config.path|default=&quot;&quot;}');\r\n\t\t\t});\r\n\t\t&lt;\/script&gt;\r\n\t\t&lt;table class=&quot;table&quot; style=&quot;margin-bottom: 0px;&quot;&gt;\r\n\t\t\t&lt;tr&gt;\r\n\t\t\t\t&lt;td style=&quot;padding: 0px !important;border-top: none;&quot;&gt;\r\n\t\t\t\t\t&lt;input id=&quot;{$field.unique}&quot; class=&quot;form-control&quot; name=&quot;{$field.field}&quot; value=&quot;{$field.value}&quot; placeholder=&quot;{$field.config.prompt|default=''}&quot; {eq name='field.config.disabled' value='1'} disabled{\/eq} {eq name='field.config.readonly' value='1'} readonly{\/eq}\/&gt;\r\n\t\t\t\t&lt;\/td&gt;\r\n\t\t\t\t&lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;border-top: none;&quot;&gt;\r\n\t\t\t\t\t&lt;div id=&quot;{$field.unique}_pick&quot;&gt;\u4e0a\u4f20&lt;\/div&gt;\r\n\t\t\t\t&lt;\/td&gt;\r\n\t\t\t&lt;\/tr&gt;\r\n\t\t&lt;\/table&gt;\r\n\t{\/case}\r\n\t{case value=&quot;tpl&quot;}\r\n\t\t&lt;textarea class=&quot;form-control&quot; id=&quot;{$field.unique}&quot; name=&quot;{$field.field}&quot; rows=&quot;{$field.config.height|default='5'}&quot; placeholder=&quot;{$field.config.prompt|default=''}&quot; {eq name='field.config.disabled' value='1'} disabled{\/eq} {eq name='field.config.readonly' value='1'} readonly{\/eq}&gt;{$field.value}&lt;\/textarea&gt;\r\n\t{\/case}\r\n{\/switch}"}
str;
    $category_id = \think\Db::name('form') -> where('name','mbzs_mbzs_add') -> value('id');
    \think\Db::name('formfield') -> where(['category_id'=>$category_id,'name'=>'value']) -> setField('config',$config);

    $config = <<<'str'
{"html":"{switch name=&quot;data.form&quot;}\r\n\t{case value=&quot;multitextbox&quot;}\r\n\t\t&lt;textarea class=&quot;form-control&quot; id=&quot;{$field.unique}&quot; name=&quot;{$field.field}&quot; rows=&quot;{$field.config.height|default='5'}&quot; placeholder=&quot;{$field.config.prompt|default=''}&quot; {eq name='field.config.disabled' value='1'} disabled{\/eq} {eq name='field.config.readonly' value='1'} readonly{\/eq}&gt;{$field.value}&lt;\/textarea&gt;\r\n\t{\/case}\r\n\t{case value=&quot;ueditor&quot;}\r\n\t\t&lt;script&gt;\r\n\t\t\t$(function(){\r\n\t\t\t\tEBCMS.MYFUN.renderUE('{$field.unique}',{\r\n\t\t\t\t\tautoHeightEnabled:{$field.config.autoheightenabled|default='false'},\r\n\t\t\t\t\tmaximumWords:{$field.config.maximumwords|default='10000'},\r\n\t\t\t\t\twordCount:{$field.config.wordcount|default='true'},\r\n\t\t\t\t\telementPathEnabled:{$field.config.elementpathenabled|default='true'},\r\n\t\t\t\t\tinitialFrameHeight:{$field.config.initialframeheight|default='420'},\r\n\t\t\t\t});\r\n\t\t\t});\r\n\t\t&lt;\/script&gt;\r\n\t\t&lt;textarea name=&quot;{$field.field}&quot; id=&quot;{$field.unique}&quot;&gt;{$field.value}&lt;\/textarea&gt;\r\n\t{\/case}\r\n\t{case value=&quot;upload&quot;}\r\n\t\t{php}\r\n\t\t\t$field['config']['path'] = '\/mbzs'\r\n\t\t{\/php}\r\n\t\t&lt;script&gt;\r\n\t\t\t$(function(){\r\n\t\t\t\tEBCMS.MYFUN.renderUploader('#{$field.unique}_pick',function(file,res){\r\n\t\t\t\t\tif (res.code) {\r\n\t\t\t\t\t\t$('#{$field.unique}').val(res.data.pathname);\r\n\t\t\t\t\t}else{\r\n\t\t\t\t\t\tEBCMS.MSG.alert(res.msg);\r\n\t\t\t\t\t};\r\n\t\t\t\t},'{$field.config.extensions|default=&quot;&quot;}','{$field.config.path|default=&quot;&quot;}');\r\n\t\t\t});\r\n\t\t&lt;\/script&gt;\r\n\t\t&lt;table class=&quot;table&quot; style=&quot;margin-bottom: 0px;&quot;&gt;\r\n\t\t\t&lt;tr&gt;\r\n\t\t\t\t&lt;td style=&quot;padding: 0px !important;border-top: none;&quot;&gt;\r\n\t\t\t\t\t&lt;input id=&quot;{$field.unique}&quot; class=&quot;form-control&quot; name=&quot;{$field.field}&quot; value=&quot;{$field.value}&quot; placeholder=&quot;{$field.config.prompt|default=''}&quot; {eq name='field.config.disabled' value='1'} disabled{\/eq} {eq name='field.config.readonly' value='1'} readonly{\/eq}\/&gt;\r\n\t\t\t\t&lt;\/td&gt;\r\n\t\t\t\t&lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;border-top: none;&quot;&gt;\r\n\t\t\t\t\t&lt;div id=&quot;{$field.unique}_pick&quot;&gt;\u4e0a\u4f20&lt;\/div&gt;\r\n\t\t\t\t&lt;\/td&gt;\r\n\t\t\t&lt;\/tr&gt;\r\n\t\t&lt;\/table&gt;\r\n\t{\/case}\r\n\t{case value=&quot;tpl&quot;}\r\n\t\t&lt;textarea class=&quot;form-control&quot; id=&quot;{$field.unique}&quot; name=&quot;{$field.field}&quot; rows=&quot;{$field.config.height|default='5'}&quot; placeholder=&quot;{$field.config.prompt|default=''}&quot; {eq name='field.config.disabled' value='1'} disabled{\/eq} {eq name='field.config.readonly' value='1'} readonly{\/eq}&gt;{$field.value}&lt;\/textarea&gt;\r\n\t{\/case}\r\n{\/switch}"}
str;
    $category_id = \think\Db::name('form') -> where('name','mbzs_mbzs_edit') -> value('id');
    \think\Db::name('formfield') -> where(['category_id'=>$category_id,'name'=>'value']) -> setField('config',$config);

	return true;
}

/**
* 卸载函数
* @return string|true 返回字符串表示错误信息 true表示卸载成功！
*/
function ebcms_uninstall(){

	// 执行sql
	\ebcms\Install::exec_sql_file(APP_PATH.'mbzs/install/uninstall.sql');

	// 删除与mbzs相关的数据（配置 权限节点 表单 菜单）
	\ebcms\Install::delete('mbzs');
	return true;
}