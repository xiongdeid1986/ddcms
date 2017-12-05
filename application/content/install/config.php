<?php 
if (!defined('THINK_PATH')) exit();
return array (
  'config' => 
  array (
    398 => 
    array (
      'id' => 398,
      'group' => '应用配置',
      'title' => '内容管理系统',
      'name' => 'content',
      'remark' => '',
      'status' => 1,
      'sort' => 1,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 1708,
          'group' => '常规配置',
          'category_id' => 398,
          'title' => 'URL模式',
          'name' => 'url_model',
          'value' => '1',
          'render' => 'number',
          'form' => 'form_radio',
          'config' => '{"disabled":"0","readonly":"0","values":"普通模式|0\\r\\n标准模式|1\\r\\n高级模式|2"}',
          'status' => 1,
          'remark' => '普通模式不走路由，标准模式是常规路由，高级模式支持自定义文件夹和文件名。',
          'sort' => 30,
        ),
        1 => 
        array (
          'id' => 1709,
          'group' => '常规配置',
          'category_id' => 398,
          'title' => '是否记录点击',
          'name' => 'click_record',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 9,
        ),
        2 => 
        array (
          'id' => 1710,
          'group' => '常规配置',
          'category_id' => 398,
          'title' => '内容属性',
          'name' => 'attr',
          'value' => '头条
幻灯
请在设置中心设置默认数据',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 0,
        ),
      ),
    ),
  ),
  'form' => 
  array (
    3099 => 
    array (
      'id' => 3099,
      'group' => '内容管理',
      'title' => '添加分类',
      'name' => 'content_admin.channel_add',
      'remark' => '',
      'sort' => 350,
      'html' => NULL,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 20806,
          'category_id' => 3099,
          'group' => '基本信息',
          'title' => '父级',
          'name' => 'pid',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'pid',
          'type' => 'form_database',
          'config' => '{"model":"content\\/channel","editable":"0","disabled":"0","readonly":"0","rootitem":"1","group":"0","tree":"1","prompt":"","queryparams":"","pid":"","titlefield":"","valuefield":"","width":""}',
          'remark' => '',
          'sort' => 90,
        ),
        1 => 
        array (
          'id' => 20807,
          'category_id' => 3099,
          'group' => '基本信息',
          'title' => '标题',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => '{"required":"0","editable":"1","maxlength":"80","minlength":"","validtype":"","readonly":"0","disabled":"0","prompt":"","width":""}',
          'remark' => '',
          'sort' => 85,
        ),
        2 => 
        array (
          'id' => 20808,
          'category_id' => 3099,
          'group' => '基本信息',
          'title' => '名称',
          'name' => 'name',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => '{"required":"1","editable":"1","maxlength":"20","minlength":"2","validtype":"","readonly":"0","disabled":"0","prompt":"请填写英文字符","width":""}',
          'remark' => '请填写英文字符，对应栏目路径，高级模式生效',
          'sort' => 80,
        ),
        3 => 
        array (
          'id' => 20809,
          'category_id' => 3099,
          'group' => '高级设置',
          'title' => 'meta标题',
          'name' => 'eb_metatitle',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '不填则默认为标题',
          'sort' => 74,
        ),
        4 => 
        array (
          'id' => 20810,
          'category_id' => 3099,
          'group' => '基本信息',
          'title' => '关键字',
          'name' => 'keywords',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => '{"readonly":"0","disabled":"0","prompt":""}',
          'remark' => '空格或英文的逗号分割',
          'sort' => 74,
        ),
        5 => 
        array (
          'id' => 20811,
          'category_id' => 3099,
          'group' => '基本信息',
          'title' => '摘要',
          'name' => 'description',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => '{"required":"0","height":"","width":"","editable":"1","maxlength":"255","minlength":"","validtype":"","prompt":"","readonly":"0","disabled":"0"}',
          'remark' => '',
          'sort' => 73,
        ),
        6 => 
        array (
          'id' => 20812,
          'category_id' => 3099,
          'group' => '高级设置',
          'title' => '模型扩展',
          'name' => 'extend_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_database',
          'config' => '{"model":"ebcms\\/extend","editable":"0","disabled":"0","readonly":"0","rootitem":"1","group":"1","tree":"0","prompt":"","queryparams":"","pid":"","titlefield":"","valuefield":"","width":""}',
          'remark' => '在 【系统管理 =&gt; 模型扩展】 里面设置
可以根据自身网站需要扩展出 产品模型 图集模型 下载模型等等',
          'sort' => 41,
        ),
        7 => 
        array (
          'id' => 20813,
          'category_id' => 3099,
          'group' => '高级设置',
          'title' => '列表页模板',
          'name' => 'tpl',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => '{"prompt":"不填写 默认为channel"}',
          'remark' => '只填写文件名，不要写填写后缀
模板文件位于 application/content/view/index/下面',
          'sort' => 22,
        ),
        8 => 
        array (
          'id' => 20814,
          'category_id' => 3099,
          'group' => '高级设置',
          'title' => '内容页模板',
          'name' => 'tpl_detail',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => '{"prompt":"不填写默认为 detail"}',
          'remark' => '只填写文件名，不要写填写后缀
模板文件位于 application/content/view/index/下面',
          'sort' => 21,
        ),
        9 => 
        array (
          'id' => 20815,
          'category_id' => 3099,
          'group' => '高级设置',
          'title' => '跳转链接',
          'name' => 'eb_url',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '常规写法：http://www.ebcms.com/news.html
以及系统写法：content/index/channel?id=3',
          'sort' => 5,
        ),
        10 => 
        array (
          'id' => 20816,
          'category_id' => 3099,
          'group' => '个性扩展',
          'title' => '个性扩展',
          'name' => 'eb_ext',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_custom',
          'config' => '{"html":"&lt;script&gt;\\r\\n    Namespace.register(&quot;EBCMS.Form_{$field.unique}&quot;);\\r\\n    $(function() {\\r\\n\\r\\n        \\/*改名名称*\\/\\r\\n        EBCMS.Form_{$field.unique}.changename = function(id,value){\\r\\n            if ($(id).is(\'div\')) {\\r\\n                \\/*编辑器*\\/\\r\\n                $(id).next().attr(\'name\',\'{$field.field}[\'+value+\']\');\\r\\n            }else{\\r\\n                $(id).attr(\'name\',\'{$field.field}[\'+value+\']\');\\r\\n            }\\r\\n            $(id+\'__config__\').attr(\'name\',\'{$field.field}[__config__][\'+value+\']\');\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.up = function(dom){\\r\\n            var thisdom = $(dom).parent().parent().parent();\\r\\n            if (thisdom.prev().length) {\\r\\n                thisdom.insertBefore(thisdom.prev());\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.down = function(dom){\\r\\n            var thisdom = $(dom).parent().parent().parent();\\r\\n            if (thisdom.next().length) {\\r\\n                thisdom.next().insertBefore(thisdom);\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render = function(name,value,target){\\r\\n            if (EBCMS.Form_{$field.unique}.config[name]) {\\r\\n                \\r\\n            }else{\\r\\n                EBCMS.Form_{$field.unique}.config[name] = \'text\';\\r\\n            }\\r\\n            if (EBCMS.Form_{$field.unique}[\'render_\'+EBCMS.Form_{$field.unique}.config[name]]) {\\r\\n                EBCMS.Form_{$field.unique}[\'render_\'+EBCMS.Form_{$field.unique}.config[name]](name,value,target);\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_text = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; value=&quot;\'+opt.value+\'&quot; placeholder=&quot;填写内容&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;text&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_textarea = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;textarea class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; rows=&quot;3&quot; placeholder=&quot;填写内容&quot;&gt;\'+opt.value+\'&lt;\\/textarea&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;textarea&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_file = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;table class=&quot;table&quot; style=&quot;margin-bottom: 0px;&quot;&gt;\';\\r\\n            str += \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;padding: 0px !important;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; value=&quot;\'+opt.value+\'&quot; placeholder=&quot;填写内容&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;file&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;&quot;&gt;\';\\r\\n            str += \'&lt;div id=&quot;\'+opt.id+\'_pick&quot;&gt;上传&lt;\\/div&gt;\';\\r\\n            str += \'&lt;script&gt;\';\\r\\n            str += \'$(function(){\';\\r\\n            str += \'    EBCMS.MYFUN.renderUploader(\\\\\'#\'+opt.id+\'_pick\\\\\',function(file,res){ if (res.code) { $(\\\\\'#\'+opt.id+\'\\\\\').val(res.data.pathname); }else{ EBCMS.MSG.alert(res.msg);};});\';\\r\\n            str += \'});\';\\r\\n            str += \'&lt;\\\\\\/script&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            str += \'&lt;\\/table&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_ueditor = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;textarea id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; &gt;\'+opt.value+\'&lt;\\/textarea&gt;\';\\r\\n            str += \'&lt;script&gt;\';\\r\\n            str += \'$(function(){\';\\r\\n            str += \'    EBCMS.MYFUN.renderUE(&quot;\'+opt.id+\'&quot;,{\';\\r\\n            str += \'          autoHeightEnabled:false,\';\\r\\n            str += \'          maximumWords:99999,\';\\r\\n            str += \'          wordCount:true,\';\\r\\n            str += \'          elementPathEnabled:true,\';\\r\\n            str += \'          initialFrameHeight:400,\';\\r\\n            str += \'    });\';\\r\\n            str += \'});\';\\r\\n            str += \'&lt;\\\\\\/script&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;ueditor&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        \\r\\n        var forms = {$field.value|json_encode};\\r\\n        if (typeof forms!=\'object\') {\\r\\n            forms = {};\\r\\n        }\\r\\n        EBCMS.Form_{$field.unique}.config = forms[\'__config__\']||{};\\r\\n        delete forms[\'__config__\'];\\r\\n        $.each(forms, function(name, val) {\\r\\n            EBCMS.Form_{$field.unique}.render(name,val,\'#{$field.unique}_container\');\\r\\n        });\\r\\n    });\\r\\n&lt;\\/script&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;{$field.title}&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;div class=&quot;btn-group&quot; role=&quot;group&quot; aria-label=&quot;...&quot;&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_text(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;单行文本&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_textarea(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;多行文本&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_file(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;文件&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_ueditor(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;编辑框&lt;\\/button&gt;\\r\\n        &lt;\\/div&gt;\\r\\n        {notempty name=\'field.remark\'}\\r\\n            &lt;p class=&quot;help-block&quot;&gt;{$field.remark}&lt;\\/p&gt;\\r\\n        {\\/notempty}\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;div class=&quot;table-responsive&quot; style=&quot;border: 1px solid #ddd;&quot;&gt;\\r\\n            &lt;table class=&quot;table table-noborder&quot; id=&quot;{$field.unique}_container&quot;&gt;&lt;\\/table&gt;\\r\\n            &lt;input type=&quot;hidden&quot; name=&quot;{$field.field}[__config__][__test__]&quot; value=\'test\'&gt;\\r\\n        &lt;\\/div&gt;\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;"}',
          'remark' => '',
          'sort' => 1,
        ),
      ),
    ),
    3098 => 
    array (
      'id' => 3098,
      'group' => '内容管理',
      'title' => '添加内容',
      'name' => 'content_admin.content_add',
      'remark' => '',
      'sort' => 39,
      'html' => NULL,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 20794,
          'category_id' => 3098,
          'group' => '基本信息',
          'title' => '标题',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 600,
        ),
        1 => 
        array (
          'id' => 20795,
          'category_id' => 3098,
          'group' => '高级设置',
          'title' => 'META标题',
          'name' => 'eb_metatitle',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '用作seo标题设置，不填则默认为标题',
          'sort' => 300,
        ),
        2 => 
        array (
          'id' => 20796,
          'category_id' => 3098,
          'group' => '高级设置',
          'title' => '短标题',
          'name' => 'eb_shorttitle',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '一般用作 首页 列表页调用 没有则调用标题',
          'sort' => 70,
        ),
        3 => 
        array (
          'id' => 20797,
          'category_id' => 3098,
          'group' => '高级设置',
          'title' => '摘要',
          'name' => 'description',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 50,
        ),
        4 => 
        array (
          'id' => 20798,
          'category_id' => 3098,
          'group' => '基本信息',
          'title' => '关键字',
          'name' => 'keywords',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_custom',
          'config' => '{"html":"&lt;script&gt;\\r\\n    $(function() {\\r\\n        EBCMS.CORE.myfun(\'suggest_keywords\',function(container,content,strong){\\r\\n            if (content) {\\r\\n                if (content != 0) {\\r\\n                    if ($(container).val()) {\\r\\n                        var keywords = $(container).val().split(\',\');\\r\\n                        var ue = UE.getEditor(content);\\r\\n                        var contents = ue.getContent().split(\'，\');\\r\\n                        var num = Math.min(keywords.length,contents.length-1);\\r\\n                        var nums = EBCMS.FN.random_num(num,0,contents.length-1);\\r\\n                        $.each(nums, function(index, val) {\\r\\n                            if (strong == 1) {\\r\\n                                contents[val] = contents[val]+\'，&lt;strong&gt;\'+keywords[index]+\'&lt;\\/strong&gt;\';\\r\\n                            }else{\\r\\n                                contents[val] = contents[val]+\'，\'+keywords[index];\\r\\n                            }\\r\\n                        });\\r\\n                        ue.setContent(contents.join(\'，\'));\\r\\n                    }\\r\\n                }else{\\r\\n                    EBCMS.MSG.notice(\'未配置接收字段！\');\\r\\n                }\\r\\n            }else{\\r\\n                EBCMS.MSG.tips(\'获取中...\');\\r\\n                $.ajax({\\r\\n                    url: \'{:url(\'ebcms\\/api\\/index\')}\',\\r\\n                    type: \'POST\',\\r\\n                    dataType: \'json\',\\r\\n                    data: {\\r\\n                        api: \'suggest_keywords\',\\r\\n                        k:$(container).val(),\\r\\n                    },\\r\\n                    success:function(res){\\r\\n                        if (res.data &amp;&amp; res.data.length) {\\r\\n                            EBCMS.MSG.tips(\'获取成功...\',0.5);\\r\\n                            $(container).val($(container).val()+\',\'+res.data.join(\',\'));\\r\\n                        }else{\\r\\n                            EBCMS.MSG.tips(\'暂无内容...\');\\r\\n                        }\\r\\n                    },\\r\\n                    error:function(){\\r\\n                        EBCMS.MSG.alert(\'服务器忙，请稍后再试！\');\\r\\n                    }\\r\\n                });\\r\\n            }\\r\\n        });\\r\\n    });\\r\\n&lt;\\/script&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;{$field.title}&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;table class=&quot;table&quot; style=&quot;margin-bottom: 0px;&quot;&gt;\\r\\n            &lt;tr&gt;\\r\\n                &lt;td style=&quot;padding: 0px !important;&quot;&gt;\\r\\n                    &lt;input id=&quot;{$field.unique}&quot; class=&quot;form-control&quot; name=&quot;{$field.field}&quot; value=&quot;{$field.value}&quot; placeholder=&quot;{$field.config.prompt|default=\'\'}&quot; {eq name=\'field.config.disabled\' value=\'1\'} disabled{\\/eq} {eq name=\'field.config.readonly\' value=\'1\'} readonly{\\/eq}\\/&gt;\\r\\n                &lt;\\/td&gt;\\r\\n                &lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;&quot;&gt;\\r\\n                    &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-block&quot; onclick=&quot;EBCMS.MYFUN.suggest_keywords(\'#{$field.unique}\');&quot;&gt;长尾关键词&lt;\\/button&gt;\\r\\n                &lt;\\/td&gt;\\r\\n                &lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;&quot;&gt;\\r\\n                    &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-block&quot; onclick=&quot;EBCMS.MYFUN.suggest_keywords(\'#{$field.unique}\',\'{$groups[\'基本信息\'][\'body[body]\'][\'unique\']}\',1);&quot;&gt;插入到内容&lt;\\/button&gt;\\r\\n                &lt;\\/td&gt;\\r\\n            &lt;\\/tr&gt;\\r\\n        &lt;\\/table&gt;\\r\\n        {notempty name=\'field.remark\'}\\r\\n        &lt;p class=&quot;help-block&quot;&gt;{$field.remark}&lt;\\/p&gt;\\r\\n        {\\/notempty}\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;"}',
          'remark' => '空格或英文的逗号分割',
          'sort' => 50,
        ),
        5 => 
        array (
          'id' => 20799,
          'category_id' => 3098,
          'group' => '基本信息',
          'title' => '标签',
          'name' => 'tags',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '空格或英文的逗号分割',
          'sort' => 42,
        ),
        6 => 
        array (
          'id' => 20800,
          'category_id' => 3098,
          'group' => '高级设置',
          'title' => '模板',
          'name' => 'tpl',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => '{"prompt":"不填默认为detail"}',
          'remark' => '只填写文件名，不要写后缀
模板位于 application/content/view/index/下',
          'sort' => 40,
        ),
        7 => 
        array (
          'id' => 20801,
          'category_id' => 3098,
          'group' => '高级设置',
          'title' => '文件名',
          'name' => 'filename',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '默认为文章id',
          'sort' => 30,
        ),
        8 => 
        array (
          'id' => 20802,
          'category_id' => 3098,
          'group' => '基本信息',
          'title' => '缩略图',
          'name' => 'thumb',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_upload',
          'config' => '{"disabled":"0","readonly":"0","extensions":"","path":"\\/content","prompt":""}',
          'remark' => '',
          'sort' => 30,
        ),
        9 => 
        array (
          'id' => 20803,
          'category_id' => 3098,
          'group' => '基本信息',
          'title' => '内容',
          'name' => 'body',
          'subtable' => '',
          'extfield' => 'body',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_ueditor',
          'config' => 'null',
          'remark' => '',
          'sort' => 20,
        ),
        10 => 
        array (
          'id' => 20804,
          'category_id' => 3098,
          'group' => '高级设置',
          'title' => '外部链接',
          'name' => 'eb_url',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => '{"required":"0","readonly":"0","disabled":"0","maxlength":"","minlength":"","validtype":"0","prompt":"http:\\/\\/"}',
          'remark' => '常规写法：http://www.ebcms.com/news.html
系统写法：content/index/channel?id=1',
          'sort' => 10,
        ),
        11 => 
        array (
          'id' => 20805,
          'category_id' => 3098,
          'group' => '基本信息',
          'title' => '分类',
          'name' => 'channel_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'channel_id',
          'type' => 'form_hidden',
          'config' => '{"model":"content\\/channel","editable":"0","disabled":"0","readonly":"0","rootitem":"0","tree":"1","prompt":"","queryparams":"extend_id|eq|($)channel.extend_id","pid":"","titlefield":"","valuefield":"","width":""}',
          'remark' => '',
          'sort' => 0,
        ),
      ),
    ),
    3097 => 
    array (
      'id' => 3097,
      'group' => '内容管理',
      'title' => '标签合并',
      'name' => 'content_admin.tag_merge',
      'remark' => '',
      'sort' => 17,
      'html' => NULL,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 20792,
          'category_id' => 3097,
          'group' => '基本信息',
          'title' => '将标签',
          'name' => 'tag1',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'tag1',
          'type' => 'form_textbox',
          'config' => '{"required":"1","readonly":"0","disabled":"0","maxlength":"","minlength":"","validtype":"0","prompt":""}',
          'remark' => '多个标签 请用空格分隔',
          'sort' => 9,
        ),
        1 => 
        array (
          'id' => 20793,
          'category_id' => 3097,
          'group' => '基本信息',
          'title' => '合并到',
          'name' => 'tag2',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'tag2',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '不存在则自动创建',
          'sort' => 1,
        ),
      ),
    ),
    3096 => 
    array (
      'id' => 3096,
      'group' => '内容管理',
      'title' => '合并',
      'name' => 'content_admin.channel_merge',
      'remark' => '',
      'sort' => 48,
      'html' => NULL,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 20790,
          'category_id' => 3096,
          'group' => '基本信息',
          'title' => '栏目id',
          'name' => 'ids',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'ids',
          'type' => 'form_multitextbox',
          'config' => '{"required":"1","disabled":"0","readonly":"1","height":"","width":"","maxlength":"","minlength":"","prompt":""}',
          'remark' => '',
          'sort' => 9,
        ),
        1 => 
        array (
          'id' => 20791,
          'category_id' => 3096,
          'group' => '基本信息',
          'title' => '合并到',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_database',
          'config' => '{"model":"content\\/channel","editable":"0","disabled":"0","readonly":"0","rootitem":"0","tree":"1","prompt":"","queryparams":"id|notin|(I)ids","pid":"","titlefield":"","valuefield":"","width":""}',
          'remark' => '不同模型之间的栏目合并，如果和目标栏目模型不一样，会造成这些栏目下面的内容的自定义扩展数据丢失，但主体内容不受影响！',
          'sort' => 1,
        ),
      ),
    ),
    3095 => 
    array (
      'id' => 3095,
      'group' => '内容管理',
      'title' => '修改标签',
      'name' => 'content_admin.tag_edit',
      'remark' => '',
      'sort' => 18,
      'html' => NULL,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 20788,
          'category_id' => 3095,
          'group' => '基本信息',
          'title' => '标签',
          'name' => 'tag',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'tag',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '若标签存在，将执行合并',
          'sort' => 9,
        ),
        1 => 
        array (
          'id' => 20789,
          'category_id' => 3095,
          'group' => '基本信息',
          'title' => 'id',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => 'null',
          'remark' => '',
          'sort' => 1,
        ),
      ),
    ),
    3094 => 
    array (
      'id' => 3094,
      'group' => '内容管理',
      'title' => '修改分类',
      'name' => 'content_admin.channel_edit',
      'remark' => '',
      'sort' => 49,
      'html' => NULL,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 20776,
          'category_id' => 3094,
          'group' => '基本信息',
          'title' => '父级',
          'name' => 'pid',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'pid',
          'type' => 'form_database',
          'config' => '{"model":"content\\/channel","editable":"0","disabled":"0","rootitem":"1","tree":"1","prompt":"","queryparams":"","pid":"","titlefield":"","valuefield":"","width":""}',
          'remark' => '',
          'sort' => 90,
        ),
        1 => 
        array (
          'id' => 20777,
          'category_id' => 3094,
          'group' => '基本信息',
          'title' => '标题',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'title',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 85,
        ),
        2 => 
        array (
          'id' => 20778,
          'category_id' => 3094,
          'group' => '基本信息',
          'title' => '名称',
          'name' => 'name',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'name',
          'type' => 'form_textbox',
          'config' => '{"required":"1","editable":"1","maxlength":"","minlength":"","validtype":"","readonly":"0","disabled":"0","prompt":"","width":""}',
          'remark' => '请填写英文字符，对应栏目路径，高级模式生效',
          'sort' => 80,
        ),
        3 => 
        array (
          'id' => 20779,
          'category_id' => 3094,
          'group' => '基本信息',
          'title' => '关键字',
          'name' => 'keywords',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'keywords',
          'type' => 'form_textbox',
          'config' => '{"readonly":"0","disabled":"0","prompt":""}',
          'remark' => '用空格或英文的逗号”,“分割',
          'sort' => 74,
        ),
        4 => 
        array (
          'id' => 20780,
          'category_id' => 3094,
          'group' => '高级设置',
          'title' => 'meta标题',
          'name' => 'eb_metatitle',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'eb_metatitle',
          'type' => 'form_textbox',
          'config' => '{"required":"0","readonly":"0","disabled":"0","maxlength":"","minlength":"","validtype":"","prompt":""}',
          'remark' => '不填则默认为标题',
          'sort' => 74,
        ),
        5 => 
        array (
          'id' => 20781,
          'category_id' => 3094,
          'group' => '基本信息',
          'title' => '摘要',
          'name' => 'description',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'description',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 73,
        ),
        6 => 
        array (
          'id' => 20782,
          'category_id' => 3094,
          'group' => '高级设置',
          'title' => '模型扩展',
          'name' => 'extend_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'extend_id',
          'type' => 'form_database',
          'config' => '{"model":"ebcms\\/extend","editable":"0","disabled":"0","readonly":"0","rootitem":"1","group":"1","tree":"0","prompt":"","queryparams":"","pid":"","titlefield":"","valuefield":"","width":""}',
          'remark' => '在 【系统管理 =&gt; 模型扩展】 里面设置
可以根据自身网站需要扩展出 产品模型 图集模型 下载模型等等',
          'sort' => 41,
        ),
        7 => 
        array (
          'id' => 20783,
          'category_id' => 3094,
          'group' => '高级设置',
          'title' => '列表页模板',
          'name' => 'tpl',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'tpl',
          'type' => 'form_textbox',
          'config' => '{"prompt":"不填写 默认为channel"}',
          'remark' => '只填写文件名，不要写填写后缀
模板文件位于 application/content/view/index/下面',
          'sort' => 22,
        ),
        8 => 
        array (
          'id' => 20784,
          'category_id' => 3094,
          'group' => '高级设置',
          'title' => '内容页模板',
          'name' => 'tpl_detail',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'tpl_detail',
          'type' => 'form_textbox',
          'config' => '{"prompt":"不填写 默认为detail"}',
          'remark' => '只填写文件名，不要写填写后缀
模板文件位于 application/content/view/index/下面',
          'sort' => 21,
        ),
        9 => 
        array (
          'id' => 20785,
          'category_id' => 3094,
          'group' => '高级设置',
          'title' => '跳转链接',
          'name' => 'eb_url',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'eb_url',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '常规写法：http://www.ebcms.com/news.html
以及系统写法：content/index/channel?id=3',
          'sort' => 5,
        ),
        10 => 
        array (
          'id' => 20786,
          'category_id' => 3094,
          'group' => '基本信息',
          'title' => 'id',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => 'null',
          'remark' => '',
          'sort' => 1,
        ),
        11 => 
        array (
          'id' => 20787,
          'category_id' => 3094,
          'group' => '个性扩展',
          'title' => '扩展字段',
          'name' => 'eb_ext',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'eb_ext',
          'type' => 'form_custom',
          'config' => '{"html":"&lt;script&gt;\\r\\n    Namespace.register(&quot;EBCMS.Form_{$field.unique}&quot;);\\r\\n    $(function() {\\r\\n\\r\\n        \\/*改名名称*\\/\\r\\n        EBCMS.Form_{$field.unique}.changename = function(id,value){\\r\\n            if ($(id).is(\'div\')) {\\r\\n                \\/*编辑器*\\/\\r\\n                $(id).next().attr(\'name\',\'{$field.field}[\'+value+\']\');\\r\\n            }else{\\r\\n                $(id).attr(\'name\',\'{$field.field}[\'+value+\']\');\\r\\n            }\\r\\n            $(id+\'__config__\').attr(\'name\',\'{$field.field}[__config__][\'+value+\']\');\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.up = function(dom){\\r\\n            var thisdom = $(dom).parent().parent().parent();\\r\\n            if (thisdom.prev().length) {\\r\\n                thisdom.insertBefore(thisdom.prev());\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.down = function(dom){\\r\\n            var thisdom = $(dom).parent().parent().parent();\\r\\n            if (thisdom.next().length) {\\r\\n                thisdom.next().insertBefore(thisdom);\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render = function(name,value,target){\\r\\n            if (EBCMS.Form_{$field.unique}.config[name]) {\\r\\n                \\r\\n            }else{\\r\\n                EBCMS.Form_{$field.unique}.config[name] = \'text\';\\r\\n            }\\r\\n            if (EBCMS.Form_{$field.unique}[\'render_\'+EBCMS.Form_{$field.unique}.config[name]]) {\\r\\n                EBCMS.Form_{$field.unique}[\'render_\'+EBCMS.Form_{$field.unique}.config[name]](name,value,target);\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_text = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; value=&quot;\'+opt.value+\'&quot; placeholder=&quot;填写内容&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;text&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_textarea = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;textarea class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; rows=&quot;3&quot; placeholder=&quot;填写内容&quot;&gt;\'+opt.value+\'&lt;\\/textarea&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;textarea&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_file = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;table class=&quot;table&quot; style=&quot;margin-bottom: 0px;&quot;&gt;\';\\r\\n            str += \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;padding: 0px !important;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; value=&quot;\'+opt.value+\'&quot; placeholder=&quot;填写内容&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;file&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;&quot;&gt;\';\\r\\n            str += \'&lt;div id=&quot;\'+opt.id+\'_pick&quot;&gt;上传&lt;\\/div&gt;\';\\r\\n            str += \'&lt;script&gt;\';\\r\\n            str += \'$(function(){\';\\r\\n            str += \'    EBCMS.MYFUN.renderUploader(\\\\\'#\'+opt.id+\'_pick\\\\\',function(file,res){ if (res.code) { $(\\\\\'#\'+opt.id+\'\\\\\').val(res.data.pathname); }else{ EBCMS.MSG.alert(res.msg);};});\';\\r\\n            str += \'});\';\\r\\n            str += \'&lt;\\\\\\/script&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            str += \'&lt;\\/table&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_ueditor = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;textarea id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; &gt;\'+opt.value+\'&lt;\\/textarea&gt;\';\\r\\n            str += \'&lt;script&gt;\';\\r\\n            str += \'$(function(){\';\\r\\n            str += \'    EBCMS.MYFUN.renderUE(&quot;\'+opt.id+\'&quot;,{\';\\r\\n            str += \'          autoHeightEnabled:false,\';\\r\\n            str += \'          maximumWords:99999,\';\\r\\n            str += \'          wordCount:true,\';\\r\\n            str += \'          elementPathEnabled:true,\';\\r\\n            str += \'          initialFrameHeight:400,\';\\r\\n            str += \'    });\';\\r\\n            str += \'});\';\\r\\n            str += \'&lt;\\\\\\/script&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;ueditor&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        \\r\\n        var forms = {$field.value|json_encode};\\r\\n        if (typeof forms!=\'object\') {\\r\\n            forms = {};\\r\\n        }\\r\\n        EBCMS.Form_{$field.unique}.config = forms[\'__config__\']||{};\\r\\n        delete forms[\'__config__\'];\\r\\n        $.each(forms, function(name, val) {\\r\\n            EBCMS.Form_{$field.unique}.render(name,val,\'#{$field.unique}_container\');\\r\\n        });\\r\\n    });\\r\\n&lt;\\/script&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;{$field.title}&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;div class=&quot;btn-group&quot; role=&quot;group&quot; aria-label=&quot;...&quot;&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_text(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;单行文本&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_textarea(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;多行文本&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_file(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;文件&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_ueditor(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;编辑框&lt;\\/button&gt;\\r\\n        &lt;\\/div&gt;\\r\\n        {notempty name=\'field.remark\'}\\r\\n            &lt;p class=&quot;help-block&quot;&gt;{$field.remark}&lt;\\/p&gt;\\r\\n        {\\/notempty}\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;div class=&quot;table-responsive&quot; style=&quot;border: 1px solid #ddd;&quot;&gt;\\r\\n            &lt;table class=&quot;table table-noborder&quot; id=&quot;{$field.unique}_container&quot;&gt;&lt;\\/table&gt;\\r\\n            &lt;input type=&quot;hidden&quot; name=&quot;{$field.field}[__config__][__test__]&quot; value=\'test\'&gt;\\r\\n        &lt;\\/div&gt;\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;"}',
          'remark' => '',
          'sort' => 1,
        ),
      ),
    ),
    3093 => 
    array (
      'id' => 3093,
      'group' => '内容管理',
      'title' => '内容批量移动',
      'name' => 'content_admin.content_move',
      'remark' => '',
      'sort' => 37,
      'html' => NULL,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 20774,
          'category_id' => 3093,
          'group' => '基本信息',
          'title' => '内容id',
          'name' => 'ids',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'ids',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 9,
        ),
        1 => 
        array (
          'id' => 20775,
          'category_id' => 3093,
          'group' => '基本信息',
          'title' => '移动到',
          'name' => 'channel_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'channel_id',
          'type' => 'form_database',
          'config' => '{"model":"content\\/channel","editable":"0","disabled":"0","readonly":"0","rootitem":"0","tree":"1","prompt":"","queryparams":"","pid":"","titlefield":"","valuefield":"","width":""}',
          'remark' => '如果移动的内容和移动到的栏目的模型不一样，会造成移动的内容中模型不一样的那一部分数据的自定义扩展内容数据丢失，但主体内容数据不会丢失！
非超级管理员操作，会自动排除已经锁定的数据。',
          'sort' => 1,
        ),
      ),
    ),
    3092 => 
    array (
      'id' => 3092,
      'group' => '内容管理',
      'title' => '修改内容',
      'name' => 'content_admin.content_edit',
      'remark' => '',
      'sort' => 38,
      'html' => NULL,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 20762,
          'category_id' => 3092,
          'group' => '基本信息',
          'title' => '标题',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'title',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 600,
        ),
        1 => 
        array (
          'id' => 20763,
          'category_id' => 3092,
          'group' => '高级设置',
          'title' => 'META标题',
          'name' => 'eb_metatitle',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'eb_metatitle',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '用作seo标题设置，不填则默认为标题',
          'sort' => 300,
        ),
        2 => 
        array (
          'id' => 20764,
          'category_id' => 3092,
          'group' => '高级设置',
          'title' => '短标题',
          'name' => 'eb_shorttitle',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'eb_shorttitle',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '一般用作 首页 列表页调用 没有则调用标题',
          'sort' => 70,
        ),
        3 => 
        array (
          'id' => 20765,
          'category_id' => 3092,
          'group' => '基本信息',
          'title' => '关键字',
          'name' => 'keywords',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'keywords',
          'type' => 'form_custom',
          'config' => '{"html":"&lt;script&gt;\\r\\n    $(function() {\\r\\n        EBCMS.CORE.myfun(\'suggest_keywords\',function(container,content,strong){\\r\\n            if (content) {\\r\\n                if (content != 0) {\\r\\n                    if ($(container).val()) {\\r\\n                        var keywords = $(container).val().split(\',\');\\r\\n                        var ue = UE.getEditor(content);\\r\\n                        var contents = ue.getContent().split(\'，\');\\r\\n                        var num = Math.min(keywords.length,contents.length-1);\\r\\n                        var nums = EBCMS.FN.random_num(num,0,contents.length-1);\\r\\n                        $.each(nums, function(index, val) {\\r\\n                            if (strong == 1) {\\r\\n                                contents[val] = contents[val]+\'，&lt;strong&gt;\'+keywords[index]+\'&lt;\\/strong&gt;\';\\r\\n                            }else{\\r\\n                                contents[val] = contents[val]+\'，\'+keywords[index];\\r\\n                            }\\r\\n                        });\\r\\n                        ue.setContent(contents.join(\'，\'));\\r\\n                    }\\r\\n                }else{\\r\\n                    EBCMS.MSG.notice(\'未配置接收字段！\');\\r\\n                }\\r\\n            }else{\\r\\n                EBCMS.MSG.tips(\'获取中...\');\\r\\n                $.ajax({\\r\\n                    url: \'{:url(\'ebcms\\/api\\/index\')}\',\\r\\n                    type: \'POST\',\\r\\n                    dataType: \'json\',\\r\\n                    data: {\\r\\n                        api: \'suggest_keywords\',\\r\\n                        k:$(container).val(),\\r\\n                    },\\r\\n                    success:function(res){\\r\\n                        if (res.data &amp;&amp; res.data.length) {\\r\\n                            EBCMS.MSG.tips(\'获取成功...\',0.5);\\r\\n                            $(container).val($(container).val()+\',\'+res.data.join(\',\'));\\r\\n                        }else{\\r\\n                            EBCMS.MSG.tips(\'暂无内容...\');\\r\\n                        }\\r\\n                    },\\r\\n                    error:function(){\\r\\n                        EBCMS.MSG.alert(\'服务器忙，请稍后再试！\');\\r\\n                    }\\r\\n                });\\r\\n            }\\r\\n        });\\r\\n    });\\r\\n&lt;\\/script&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;{$field.title}&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;table class=&quot;table&quot; style=&quot;margin-bottom: 0px;&quot;&gt;\\r\\n            &lt;tr&gt;\\r\\n                &lt;td style=&quot;padding: 0px !important;&quot;&gt;\\r\\n                    &lt;input id=&quot;{$field.unique}&quot; class=&quot;form-control&quot; name=&quot;{$field.field}&quot; value=&quot;{$field.value}&quot; placeholder=&quot;{$field.config.prompt|default=\'\'}&quot; {eq name=\'field.config.disabled\' value=\'1\'} disabled{\\/eq} {eq name=\'field.config.readonly\' value=\'1\'} readonly{\\/eq}\\/&gt;\\r\\n                &lt;\\/td&gt;\\r\\n                &lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;&quot;&gt;\\r\\n                    &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-block&quot; onclick=&quot;EBCMS.MYFUN.suggest_keywords(\'#{$field.unique}\');&quot;&gt;长尾关键词&lt;\\/button&gt;\\r\\n                &lt;\\/td&gt;\\r\\n                &lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;&quot;&gt;\\r\\n                    &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-block&quot; onclick=&quot;EBCMS.MYFUN.suggest_keywords(\'#{$field.unique}\',\'{$groups[\'基本信息\'][\'body[body]\'][\'unique\']}\',1);&quot;&gt;插入到内容&lt;\\/button&gt;\\r\\n                &lt;\\/td&gt;\\r\\n            &lt;\\/tr&gt;\\r\\n        &lt;\\/table&gt;\\r\\n        {notempty name=\'field.remark\'}\\r\\n        &lt;p class=&quot;help-block&quot;&gt;{$field.remark}&lt;\\/p&gt;\\r\\n        {\\/notempty}\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;"}',
          'remark' => '',
          'sort' => 60,
        ),
        4 => 
        array (
          'id' => 20766,
          'category_id' => 3092,
          'group' => '高级设置',
          'title' => '摘要',
          'name' => 'description',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'description',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 50,
        ),
        5 => 
        array (
          'id' => 20767,
          'category_id' => 3092,
          'group' => '高级设置',
          'title' => '模板',
          'name' => 'tpl',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'tpl',
          'type' => 'form_textbox',
          'config' => '{"prompt":"不填写 默认为detail"}',
          'remark' => '只填写文件名，不要写后缀
模板位于 application/content/view/index/下',
          'sort' => 40,
        ),
        6 => 
        array (
          'id' => 20768,
          'category_id' => 3092,
          'group' => '基本信息',
          'title' => '标签',
          'name' => 'tags',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'tags',
          'type' => 'form_textbox',
          'config' => '{"required":"0","readonly":"0","disabled":"0","maxlength":"","minlength":"","prompt":""}',
          'remark' => '',
          'sort' => 35,
        ),
        7 => 
        array (
          'id' => 20769,
          'category_id' => 3092,
          'group' => '高级设置',
          'title' => '文件名',
          'name' => 'filename',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'filename',
          'type' => 'form_textbox',
          'config' => '{"prompt":""}',
          'remark' => '默认为文章id',
          'sort' => 30,
        ),
        8 => 
        array (
          'id' => 20770,
          'category_id' => 3092,
          'group' => '基本信息',
          'title' => '缩略图',
          'name' => 'thumb',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'thumb',
          'type' => 'form_upload',
          'config' => '{"disabled":"0","readonly":"0","extensions":"","path":"\\/content","prompt":""}',
          'remark' => '',
          'sort' => 20,
        ),
        9 => 
        array (
          'id' => 20771,
          'category_id' => 3092,
          'group' => '高级设置',
          'title' => '外部链接',
          'name' => 'eb_url',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'eb_url',
          'type' => 'form_textbox',
          'config' => '{"required":"0","readonly":"0","disabled":"0","maxlength":"","minlength":"","validtype":"0","prompt":"http:\\/\\/"}',
          'remark' => '常规写法：http://www.ebcms.com/news.html
系统写法：content/index/channel?id=1',
          'sort' => 10,
        ),
        10 => 
        array (
          'id' => 20772,
          'category_id' => 3092,
          'group' => '基本信息',
          'title' => '内容',
          'name' => 'body',
          'subtable' => 'body',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'body',
          'type' => 'form_ueditor',
          'config' => 'null',
          'remark' => '',
          'sort' => 10,
        ),
        11 => 
        array (
          'id' => 20773,
          'category_id' => 3092,
          'group' => '高级设置',
          'title' => 'id',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => 'null',
          'remark' => '',
          'sort' => 0,
        ),
      ),
    ),
  ),
  'rule' => 
  array (
    0 => 
    array (
      'id' => 6985,
      'pid' => 0,
      'title' => '内容管理系统',
      'name' => 'content',
      'type' => 1,
      'condition' => '',
      'sort' => 200,
      'app' => 'content',
      'opstr' => '内容管理系统',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 7002,
          'pid' => 6985,
          'title' => '内容管理',
          'name' => 'content_admin.content_index',
          'type' => 1,
          'condition' => '',
          'sort' => 0,
          'app' => 'content',
          'opstr' => '内容管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 7003,
              'pid' => 7002,
              'title' => '添加',
              'name' => 'content_admin.content_add',
              'type' => 1,
              'condition' => '',
              'sort' => 9,
              'app' => 'content',
              'opstr' => '添加内容',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 7004,
              'pid' => 7002,
              'title' => '编辑',
              'name' => 'content_admin.content_edit',
              'type' => 1,
              'condition' => '',
              'sort' => 8,
              'app' => 'content',
              'opstr' => '编辑内容',
              'rows' => 
              array (
              ),
            ),
            2 => 
            array (
              'id' => 7006,
              'pid' => 7002,
              'title' => '批量移动',
              'name' => 'content_admin.content_move',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '批量移动',
              'rows' => 
              array (
              ),
            ),
            3 => 
            array (
              'id' => 7005,
              'pid' => 7002,
              'title' => '更改样式',
              'name' => 'content_admin.content_style',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '更改样式',
              'rows' => 
              array (
              ),
            ),
            4 => 
            array (
              'id' => 7009,
              'pid' => 7002,
              'title' => '删除',
              'name' => 'content_admin.content_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '内容删除',
              'rows' => 
              array (
              ),
            ),
            5 => 
            array (
              'id' => 7008,
              'pid' => 7002,
              'title' => '设置属性',
              'name' => 'content_admin.content_attr',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '设置内容属性',
              'rows' => 
              array (
              ),
            ),
            6 => 
            array (
              'id' => 7007,
              'pid' => 7002,
              'title' => '变更状态',
              'name' => 'content_admin.content_status',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '变更内容状态',
              'rows' => 
              array (
              ),
            ),
          ),
        ),
        1 => 
        array (
          'id' => 6995,
          'pid' => 6985,
          'title' => '栏目管理',
          'name' => 'content_admin.channel_index',
          'type' => 1,
          'condition' => '',
          'sort' => 0,
          'app' => 'content',
          'opstr' => '栏目管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6996,
              'pid' => 6995,
              'title' => '添加',
              'name' => 'content_admin.channel_add',
              'type' => 1,
              'condition' => '',
              'sort' => 9,
              'app' => 'content',
              'opstr' => '添加栏目',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 6998,
              'pid' => 6995,
              'title' => '编辑',
              'name' => 'content_admin.channel_edit',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '编辑栏目',
              'rows' => 
              array (
              ),
            ),
            2 => 
            array (
              'id' => 6999,
              'pid' => 6995,
              'title' => '栏目合并',
              'name' => 'content_admin.channel_merge',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '合并栏目',
              'rows' => 
              array (
              ),
            ),
            3 => 
            array (
              'id' => 7000,
              'pid' => 6995,
              'title' => '删除',
              'name' => 'content_admin.channel_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '删除栏目',
              'rows' => 
              array (
              ),
            ),
            4 => 
            array (
              'id' => 7001,
              'pid' => 6995,
              'title' => '排序',
              'name' => 'content_admin.channel_resort',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '栏目排序',
              'rows' => 
              array (
              ),
            ),
            5 => 
            array (
              'id' => 6997,
              'pid' => 6995,
              'title' => '变更状态',
              'name' => 'content_admin.channel_status',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '变更栏目状态',
              'rows' => 
              array (
              ),
            ),
          ),
        ),
        2 => 
        array (
          'id' => 6989,
          'pid' => 6985,
          'title' => '标签管理',
          'name' => 'content_admin.tag_index',
          'type' => 1,
          'condition' => '',
          'sort' => 0,
          'app' => 'content',
          'opstr' => '标签管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6993,
              'pid' => 6989,
              'title' => '删除',
              'name' => 'content_admin.tag_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '删除内容标签',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 6994,
              'pid' => 6989,
              'title' => '编辑',
              'name' => 'content_admin.tag_edit',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '编辑内容标签',
              'rows' => 
              array (
              ),
            ),
            2 => 
            array (
              'id' => 6992,
              'pid' => 6989,
              'title' => '推荐',
              'name' => 'content_admin.tag_recommend',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '对内容标签执行推荐操作',
              'rows' => 
              array (
              ),
            ),
            3 => 
            array (
              'id' => 6991,
              'pid' => 6989,
              'title' => '修改样式',
              'name' => 'content_admin.tag_style',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '修改内容标签样式',
              'rows' => 
              array (
              ),
            ),
            4 => 
            array (
              'id' => 6990,
              'pid' => 6989,
              'title' => '合并',
              'name' => 'content_admin.tag_merge',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '合并内容标签',
              'rows' => 
              array (
              ),
            ),
          ),
        ),
        3 => 
        array (
          'id' => 6986,
          'pid' => 6985,
          'title' => '属性管理',
          'name' => 'content_admin.attr_index',
          'type' => 1,
          'condition' => '',
          'sort' => 0,
          'app' => 'content',
          'opstr' => '属性管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6988,
              'pid' => 6986,
              'title' => '内容移除',
              'name' => 'content_admin.attr_remove',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '内容移除',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 6987,
              'pid' => 6986,
              'title' => '内容排序',
              'name' => 'content_admin.attr_resort',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'content',
              'opstr' => '内容排序',
              'rows' => 
              array (
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'menu' => 
  array (
    0 => 
    array (
      'id' => 1617,
      'pid' => 0,
      'title' => '内容',
      'url' => '',
      'sort' => 5000,
      'app' => 'content',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 1618,
          'pid' => 1617,
          'title' => '内容管理',
          'url' => 'content/admin.content/index',
          'sort' => 9,
          'app' => 'content',
          'rows' => 
          array (
          ),
        ),
        1 => 
        array (
          'id' => 1619,
          'pid' => 1617,
          'title' => '栏目管理',
          'url' => 'content/admin.channel/index',
          'sort' => 8,
          'app' => 'content',
          'rows' => 
          array (
          ),
        ),
        2 => 
        array (
          'id' => 1620,
          'pid' => 1617,
          'title' => '标签管理',
          'url' => 'content/admin.tag/index',
          'sort' => 7,
          'app' => 'content',
          'rows' => 
          array (
          ),
        ),
        3 => 
        array (
          'id' => 1621,
          'pid' => 1617,
          'title' => '属性管理',
          'url' => 'content/admin.attr/index',
          'sort' => 0,
          'app' => 'content',
          'rows' => 
          array (
          ),
        ),
      ),
    ),
    1 => 
    array (
      'id' => 1622,
      'pid' => 936,
      'title' => '内容管理',
      'url' => 'content/admin.content/index',
      'sort' => 3,
      'app' => 'content',
      'rows' => 
      array (
      ),
    ),
  ),
  'datadict' => 
  array (
  ),
  'extend' => 
  array (
    6 => 
    array (
      'id' => 6,
      'group' => '内容模块',
      'title' => '测试扩展',
      'remark' => '测试测试',
      'sort' => 1,
      'status' => 1,
      'app' => 'content',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 11,
          'category_id' => 6,
          'group' => '扩展信息',
          'title' => '再来字段',
          'name' => 'test',
          'value' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 700,
          'status' => 1,
        ),
        1 => 
        array (
          'id' => 12,
          'category_id' => 6,
          'group' => '扩展信息',
          'title' => '测试字段',
          'name' => 'ziduan',
          'value' => '',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 15,
          'status' => 1,
        ),
      ),
    ),
  ),
  'nav' => 
  array (
    0 => 
    array (
      'id' => 6,
      'group' => '主导航',
      'pid' => 0,
      'title' => '内容系统',
      'eb_url' => 'content/index/index',
      'target' => '',
      'eb_ext' => NULL,
      'sort' => 2,
      'status' => 1,
      'app' => 'content',
      'rows' => 
      array (
      ),
    ),
  ),
);