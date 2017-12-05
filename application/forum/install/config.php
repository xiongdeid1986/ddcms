<?php 
if (!defined('THINK_PATH')) exit();
return array (
  'config' => 
  array (
    3 => 
    array (
      'id' => 3,
      'group' => '应用配置',
      'title' => '简易论坛',
      'name' => 'forum',
      'remark' => '',
      'status' => 1,
      'sort' => 0,
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 1420,
          'group' => '基本配置',
          'category_id' => 3,
          'title' => '开启论坛',
          'name' => 'open',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '特殊时期可关闭，关闭后，不能发帖，不能跟帖，不能评论，只能查看！',
          'sort' => 20,
        ),
        1 => 
        array (
          'id' => 1421,
          'group' => '基本配置',
          'category_id' => 3,
          'title' => '游客附件上传',
          'name' => 'guest_upload',
          'value' => '0',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '通常请不要让游客上传附件。',
          'sort' => 19,
        ),
        2 => 
        array (
          'id' => 1422,
          'group' => '基本配置',
          'category_id' => 3,
          'title' => '敏感词处理方式',
          'name' => 'badwords_handle',
          'value' => '1',
          'render' => 'number',
          'form' => 'form_radio',
          'config' => '{"values":"禁止提交|0\\r\\n进入审核|1\\r\\n直接替换|2\\r\\n不用处理|99"}',
          'status' => 1,
          'remark' => '',
          'sort' => 10,
        ),
        3 => 
        array (
          'id' => 1423,
          'group' => '奖励配置',
          'category_id' => 3,
          'title' => '发帖奖励',
          'name' => 'thread_add_currency',
          'value' => 'jifen:10',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '根据您配置的币种类型，自定义奖励，支持多种币种同时奖励，例如：
jifen:10
jinbi:1',
          'sort' => 10,
        ),
        4 => 
        array (
          'id' => 1424,
          'group' => '基本配置',
          'category_id' => 3,
          'title' => '敏感词',
          'name' => 'badwords',
          'value' => '麻痹=***
共产党=***
你妈=我妈
狗日=***
日你=日我
傻逼=***我是傻逼***',
          'render' => 'ini',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '一行一个，用 = 分割：例如
你麻痹=***
共产党=***
草你妈=草我马',
          'sort' => 9,
        ),
        5 => 
        array (
          'id' => 1425,
          'group' => '奖励配置',
          'category_id' => 3,
          'title' => '跟帖奖励',
          'name' => 'rethread_add_currency',
          'value' => 'jifen:1',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '根据您配置的币种类型，自定义奖励，支持多种币种同时奖励，例如：
jifen:10
jinbi:1',
          'sort' => 8,
        ),
        6 => 
        array (
          'id' => 1426,
          'group' => '基本配置',
          'category_id' => 3,
          'title' => '附件类型',
          'name' => 'upload_ext',
          'value' => 'jpg
png
gif
jpeg
zip
rar',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '一行一个，例如：
jpg
png
gif',
          'sort' => 0,
        ),
      ),
    ),
  ),
  'form' => 
  array (
    3053 => 
    array (
      'id' => 3053,
      'group' => '简易论坛',
      'title' => '添加板块',
      'name' => 'forum_admin.forum_add',
      'remark' => '',
      'sort' => 300,
      'html' => '',
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 21596,
          'category_id' => 3053,
          'group' => '基本信息',
          'title' => '分组',
          'name' => 'group',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '默认分组',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 30,
        ),
        1 => 
        array (
          'id' => 21597,
          'category_id' => 3053,
          'group' => '高级设置',
          'title' => '列表模板',
          'name' => 'tpl_list',
          'subtable' => '',
          'extfield' => 'config',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '默认为 list',
          'sort' => 20,
        ),
        2 => 
        array (
          'id' => 21598,
          'category_id' => 3053,
          'group' => '数据扩展',
          'title' => '数据扩展',
          'name' => 'eb_ext',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_custom',
          'config' => '{"html":"&lt;script&gt;\\r\\n    Namespace.register(&quot;EBCMS.Form_{$field.unique}&quot;);\\r\\n    $(function() {\\r\\n\\r\\n        \\/*改名名称*\\/\\r\\n        EBCMS.Form_{$field.unique}.changename = function(id,value){\\r\\n            if ($(id).is(\'div\')) {\\r\\n                \\/*编辑器*\\/\\r\\n                $(id).next().attr(\'name\',\'{$field.field}[\'+value+\']\');\\r\\n            }else{\\r\\n                $(id).attr(\'name\',\'{$field.field}[\'+value+\']\');\\r\\n            }\\r\\n            $(id+\'__config__\').attr(\'name\',\'{$field.field}[__config__][\'+value+\']\');\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.up = function(dom){\\r\\n            var thisdom = $(dom).parent().parent().parent();\\r\\n            if (thisdom.prev().length) {\\r\\n                thisdom.insertBefore(thisdom.prev());\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.down = function(dom){\\r\\n            var thisdom = $(dom).parent().parent().parent();\\r\\n            if (thisdom.next().length) {\\r\\n                thisdom.next().insertBefore(thisdom);\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render = function(name,value,target){\\r\\n            if (EBCMS.Form_{$field.unique}.config[name]) {\\r\\n                \\r\\n            }else{\\r\\n                EBCMS.Form_{$field.unique}.config[name] = \'text\';\\r\\n            }\\r\\n            if (EBCMS.Form_{$field.unique}[\'render_\'+EBCMS.Form_{$field.unique}.config[name]]) {\\r\\n                EBCMS.Form_{$field.unique}[\'render_\'+EBCMS.Form_{$field.unique}.config[name]](name,value,target);\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_text = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; value=&quot;\'+opt.value+\'&quot; placeholder=&quot;填写内容&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;text&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_textarea = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;textarea class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; rows=&quot;3&quot; placeholder=&quot;填写内容&quot;&gt;\'+opt.value+\'&lt;\\/textarea&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;textarea&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_file = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;table class=&quot;table&quot; style=&quot;margin-bottom: 0px;&quot;&gt;\';\\r\\n            str += \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;padding: 0px !important;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; value=&quot;\'+opt.value+\'&quot; placeholder=&quot;填写内容&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;file&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;&quot;&gt;\';\\r\\n            str += \'&lt;div id=&quot;\'+opt.id+\'_pick&quot;&gt;上传&lt;\\/div&gt;\';\\r\\n            str += \'&lt;script&gt;\';\\r\\n            str += \'$(function(){\';\\r\\n            str += \'    EBCMS.MYFUN.renderUploader(\\\\\'#\'+opt.id+\'_pick\\\\\',function(file,res){ if (res.code) { $(\\\\\'#\'+opt.id+\'\\\\\').val(res.data.pathname); }else{ EBCMS.MSG.alert(res.msg);};});\';\\r\\n            str += \'});\';\\r\\n            str += \'&lt;\\\\\\/script&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            str += \'&lt;\\/table&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_ueditor = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;textarea id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; &gt;\'+opt.value+\'&lt;\\/textarea&gt;\';\\r\\n            str += \'&lt;script&gt;\';\\r\\n            str += \'$(function(){\';\\r\\n            str += \'    EBCMS.MYFUN.renderUE(&quot;\'+opt.id+\'&quot;,{\';\\r\\n            str += \'          autoHeightEnabled:false,\';\\r\\n            str += \'          maximumWords:99999,\';\\r\\n            str += \'          wordCount:true,\';\\r\\n            str += \'          elementPathEnabled:true,\';\\r\\n            str += \'          initialFrameHeight:400,\';\\r\\n            str += \'    });\';\\r\\n            str += \'});\';\\r\\n            str += \'&lt;\\\\\\/script&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;ueditor&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        \\r\\n        var forms = {$field.value|json_encode};\\r\\n        if (typeof forms!=\'object\') {\\r\\n            forms = {};\\r\\n        }\\r\\n        EBCMS.Form_{$field.unique}.config = forms[\'__config__\']||{};\\r\\n        delete forms[\'__config__\'];\\r\\n        $.each(forms, function(name, val) {\\r\\n            EBCMS.Form_{$field.unique}.render(name,val,\'#{$field.unique}_container\');\\r\\n        });\\r\\n    });\\r\\n&lt;\\/script&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;{$field.title}&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;div class=&quot;btn-group&quot; role=&quot;group&quot; aria-label=&quot;...&quot;&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_text(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;单行文本&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_textarea(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;多行文本&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_file(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;文件&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_ueditor(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;编辑框&lt;\\/button&gt;\\r\\n        &lt;\\/div&gt;\\r\\n        {notempty name=\'field.remark\'}\\r\\n            &lt;p class=&quot;help-block&quot;&gt;{$field.remark}&lt;\\/p&gt;\\r\\n        {\\/notempty}\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;div class=&quot;table-responsive&quot; style=&quot;border: 1px solid #ddd;&quot;&gt;\\r\\n            &lt;table class=&quot;table table-noborder&quot; id=&quot;{$field.unique}_container&quot;&gt;&lt;\\/table&gt;\\r\\n            &lt;input type=&quot;hidden&quot; name=&quot;{$field.field}[__config__][__test__]&quot; value=\'test\'&gt;\\r\\n        &lt;\\/div&gt;\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;"}',
          'remark' => '',
          'sort' => 10,
        ),
        3 => 
        array (
          'id' => 21599,
          'category_id' => 3053,
          'group' => '基本信息',
          'title' => '标题',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 9,
        ),
        4 => 
        array (
          'id' => 21600,
          'category_id' => 3053,
          'group' => '基本信息',
          'title' => 'META标题',
          'name' => 'eb_metatitle',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 8,
        ),
        5 => 
        array (
          'id' => 21601,
          'category_id' => 3053,
          'group' => '高级设置',
          'title' => '帖子模板',
          'name' => 'tpl_thread',
          'subtable' => '',
          'extfield' => 'config',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '默认为 thread',
          'sort' => 8,
        ),
        6 => 
        array (
          'id' => 21602,
          'category_id' => 3053,
          'group' => '基本信息',
          'title' => '关键词',
          'name' => 'keywords',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 7,
        ),
        7 => 
        array (
          'id' => 21603,
          'category_id' => 3053,
          'group' => '基本信息',
          'title' => '简介',
          'name' => 'description',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 6,
        ),
      ),
    ),
    3054 => 
    array (
      'id' => 3054,
      'group' => '简易论坛',
      'title' => '移动帖子',
      'name' => 'forum_admin.thread_move',
      'remark' => '',
      'sort' => 0,
      'html' => '',
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 21604,
          'category_id' => 3054,
          'group' => '基本信息',
          'title' => '帖子ID',
          'name' => 'ids',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'ids',
          'type' => 'form_multitextbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 9,
        ),
        1 => 
        array (
          'id' => 21605,
          'category_id' => 3054,
          'group' => '基本信息',
          'title' => '移动到',
          'name' => 'forum_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_database',
          'config' => '{"model":"forum\\/forum","editable":"0","disabled":"0","readonly":"0","rootitem":"1","group":"1","tree":"0","prompt":"","queryparams":"","pid":"","titlefield":"","valuefield":"","width":""}',
          'remark' => '',
          'sort' => 8,
        ),
      ),
    ),
    3055 => 
    array (
      'id' => 3055,
      'group' => '简易论坛',
      'title' => '添加版主',
      'name' => 'forum_admin.forum_add_moderator',
      'remark' => '',
      'sort' => 5,
      'html' => NULL,
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 21606,
          'category_id' => 3055,
          'group' => '基本信息',
          'title' => '用户ID',
          'name' => 'user_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_numberbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 8,
        ),
        1 => 
        array (
          'id' => 21607,
          'category_id' => 3055,
          'group' => '基本信息',
          'title' => '权限',
          'name' => 'auth',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_checkbox',
          'config' => '{"values":"删除|delete\\r\\n编辑|edit\\r\\n审核|status\\r\\n精华|best\\r\\n置顶|top1\\r\\n全局置顶|top2"}',
          'remark' => '',
          'sort' => 7,
        ),
        2 => 
        array (
          'id' => 21608,
          'category_id' => 3055,
          'group' => '基本信息',
          'title' => '论坛id',
          'name' => 'forum_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'forum_id',
          'type' => 'form_hidden',
          'config' => NULL,
          'remark' => '',
          'sort' => 0,
        ),
      ),
    ),
    3056 => 
    array (
      'id' => 3056,
      'group' => '简易论坛',
      'title' => '编辑板块',
      'name' => 'forum_admin.forum_edit',
      'remark' => '',
      'sort' => 9,
      'html' => '',
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 21609,
          'category_id' => 3056,
          'group' => '基本信息',
          'title' => '分组',
          'name' => 'group',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'group',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 30,
        ),
        1 => 
        array (
          'id' => 21610,
          'category_id' => 3056,
          'group' => '高级设置',
          'title' => '列表模板',
          'name' => 'tpl_list',
          'subtable' => '',
          'extfield' => 'config',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'tpl_list',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 20,
        ),
        2 => 
        array (
          'id' => 21611,
          'category_id' => 3056,
          'group' => '数据扩展',
          'title' => '数据扩展',
          'name' => 'eb_ext',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'eb_ext',
          'type' => 'form_custom',
          'config' => '{"html":"&lt;script&gt;\\r\\n    Namespace.register(&quot;EBCMS.Form_{$field.unique}&quot;);\\r\\n    $(function() {\\r\\n\\r\\n        \\/*改名名称*\\/\\r\\n        EBCMS.Form_{$field.unique}.changename = function(id,value){\\r\\n            if ($(id).is(\'div\')) {\\r\\n                \\/*编辑器*\\/\\r\\n                $(id).next().attr(\'name\',\'{$field.field}[\'+value+\']\');\\r\\n            }else{\\r\\n                $(id).attr(\'name\',\'{$field.field}[\'+value+\']\');\\r\\n            }\\r\\n            $(id+\'__config__\').attr(\'name\',\'{$field.field}[__config__][\'+value+\']\');\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.up = function(dom){\\r\\n            var thisdom = $(dom).parent().parent().parent();\\r\\n            if (thisdom.prev().length) {\\r\\n                thisdom.insertBefore(thisdom.prev());\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.down = function(dom){\\r\\n            var thisdom = $(dom).parent().parent().parent();\\r\\n            if (thisdom.next().length) {\\r\\n                thisdom.next().insertBefore(thisdom);\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render = function(name,value,target){\\r\\n            if (EBCMS.Form_{$field.unique}.config[name]) {\\r\\n                \\r\\n            }else{\\r\\n                EBCMS.Form_{$field.unique}.config[name] = \'text\';\\r\\n            }\\r\\n            if (EBCMS.Form_{$field.unique}[\'render_\'+EBCMS.Form_{$field.unique}.config[name]]) {\\r\\n                EBCMS.Form_{$field.unique}[\'render_\'+EBCMS.Form_{$field.unique}.config[name]](name,value,target);\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_text = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; value=&quot;\'+opt.value+\'&quot; placeholder=&quot;填写内容&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;text&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_textarea = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;textarea class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; rows=&quot;3&quot; placeholder=&quot;填写内容&quot;&gt;\'+opt.value+\'&lt;\\/textarea&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;textarea&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_file = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;table class=&quot;table&quot; style=&quot;margin-bottom: 0px;&quot;&gt;\';\\r\\n            str += \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;padding: 0px !important;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; value=&quot;\'+opt.value+\'&quot; placeholder=&quot;填写内容&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;file&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width: 100px;padding: 0px 0px 0px 10px !important;&quot;&gt;\';\\r\\n            str += \'&lt;div id=&quot;\'+opt.id+\'_pick&quot;&gt;上传&lt;\\/div&gt;\';\\r\\n            str += \'&lt;script&gt;\';\\r\\n            str += \'$(function(){\';\\r\\n            str += \'    EBCMS.MYFUN.renderUploader(\\\\\'#\'+opt.id+\'_pick\\\\\',function(file,res){ if (res.code) { $(\\\\\'#\'+opt.id+\'\\\\\').val(res.data.pathname); }else{ EBCMS.MSG.alert(res.msg);};});\';\\r\\n            str += \'});\';\\r\\n            str += \'&lt;\\\\\\/script&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            str += \'&lt;\\/table&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        EBCMS.Form_{$field.unique}.render_ueditor = function(name,value,target){\\r\\n            name = name||\'EB_\' + EBCMS.FN.random_str(6);\\r\\n            opt = {\\r\\n                name:name,\\r\\n                value:value||\'\',\\r\\n                id:\'{$field.unique}_\' + EBCMS.FN.random_str(15),\\r\\n            };\\r\\n\\r\\n            var str = \'&lt;tr&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:180px;&quot;&gt;\';\\r\\n            str += \'&lt;div class=&quot;btn-group&quot;&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;$(this).parent().parent().parent().remove();&quot;&gt;删除&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.up(this);&quot;&gt;上移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; onclick=&quot;EBCMS.Form_{$field.unique}.down(this);&quot;&gt;下移&lt;\\/button&gt;\';\\r\\n            str += \'&lt;\\/div&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td style=&quot;width:120px;&quot;&gt;\';\\r\\n            str += \'&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;\'+opt.name+\'&quot; onKeyUp=&quot;EBCMS.Form_{$field.unique}.changename(\\\\\'#\'+opt.id+\'\\\\\',$(this).val());&quot; placeholder=&quot;填写名称&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;td&gt;\';\\r\\n            str += \'&lt;textarea id=&quot;\'+opt.id+\'&quot; name=&quot;{$field.field}[\'+opt.name+\']&quot; &gt;\'+opt.value+\'&lt;\\/textarea&gt;\';\\r\\n            str += \'&lt;script&gt;\';\\r\\n            str += \'$(function(){\';\\r\\n            str += \'    EBCMS.MYFUN.renderUE(&quot;\'+opt.id+\'&quot;,{\';\\r\\n            str += \'          autoHeightEnabled:false,\';\\r\\n            str += \'          maximumWords:99999,\';\\r\\n            str += \'          wordCount:true,\';\\r\\n            str += \'          elementPathEnabled:true,\';\\r\\n            str += \'          initialFrameHeight:400,\';\\r\\n            str += \'    });\';\\r\\n            str += \'});\';\\r\\n            str += \'&lt;\\\\\\/script&gt;\';\\r\\n            str += \'&lt;input type=&quot;hidden&quot; id=&quot;\'+opt.id+\'__config__&quot; name=&quot;{$field.field}[__config__][\'+opt.name+\']&quot; value=&quot;ueditor&quot;&gt;\';\\r\\n            str += \'&lt;\\/td&gt;\';\\r\\n            str += \'&lt;\\/tr&gt;\';\\r\\n            if (target) {\\r\\n                $(target).append(str);\\r\\n            }else{\\r\\n                return str;\\r\\n            }\\r\\n        };\\r\\n        \\r\\n        var forms = {$field.value|json_encode};\\r\\n        if (typeof forms!=\'object\') {\\r\\n            forms = {};\\r\\n        }\\r\\n        EBCMS.Form_{$field.unique}.config = forms[\'__config__\']||{};\\r\\n        delete forms[\'__config__\'];\\r\\n        $.each(forms, function(name, val) {\\r\\n            EBCMS.Form_{$field.unique}.render(name,val,\'#{$field.unique}_container\');\\r\\n        });\\r\\n    });\\r\\n&lt;\\/script&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;{$field.title}&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;div class=&quot;btn-group&quot; role=&quot;group&quot; aria-label=&quot;...&quot;&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_text(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;单行文本&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_textarea(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;多行文本&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_file(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;文件&lt;\\/button&gt;\\r\\n            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary btn-sm&quot; onclick=&quot;EBCMS.Form_{$field.unique}.render_ueditor(\'\',\'\',\'#{$field.unique}_container\');&quot;&gt;编辑框&lt;\\/button&gt;\\r\\n        &lt;\\/div&gt;\\r\\n        {notempty name=\'field.remark\'}\\r\\n            &lt;p class=&quot;help-block&quot;&gt;{$field.remark}&lt;\\/p&gt;\\r\\n        {\\/notempty}\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;div class=&quot;table-responsive&quot; style=&quot;border: 1px solid #ddd;&quot;&gt;\\r\\n            &lt;table class=&quot;table table-noborder&quot; id=&quot;{$field.unique}_container&quot;&gt;&lt;\\/table&gt;\\r\\n            &lt;input type=&quot;hidden&quot; name=&quot;{$field.field}[__config__][__test__]&quot; value=\'test\'&gt;\\r\\n        &lt;\\/div&gt;\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;"}',
          'remark' => '',
          'sort' => 10,
        ),
        3 => 
        array (
          'id' => 21612,
          'category_id' => 3056,
          'group' => '高级设置',
          'title' => '帖子模板',
          'name' => 'tpl_thread',
          'subtable' => '',
          'extfield' => 'config',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'tpl_thread',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 9,
        ),
        4 => 
        array (
          'id' => 21613,
          'category_id' => 3056,
          'group' => '基本信息',
          'title' => '标题',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'title',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 9,
        ),
        5 => 
        array (
          'id' => 21614,
          'category_id' => 3056,
          'group' => '基本信息',
          'title' => 'META标题',
          'name' => 'eb_metatitle',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'eb_metatitle',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 8,
        ),
        6 => 
        array (
          'id' => 21615,
          'category_id' => 3056,
          'group' => '基本信息',
          'title' => '关键词',
          'name' => 'keywords',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'keywords',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 7,
        ),
        7 => 
        array (
          'id' => 21616,
          'category_id' => 3056,
          'group' => '基本信息',
          'title' => '简介',
          'name' => 'description',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'description',
          'type' => 'form_multitextbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 6,
        ),
        8 => 
        array (
          'id' => 21617,
          'category_id' => 3056,
          'group' => '基本信息',
          'title' => 'id',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => NULL,
          'remark' => '',
          'sort' => 1,
        ),
      ),
    ),
    3057 => 
    array (
      'id' => 3057,
      'group' => '简易论坛',
      'title' => '编辑版主',
      'name' => 'forum_admin.forum_edit_moderator',
      'remark' => '',
      'sort' => 4,
      'html' => NULL,
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 21618,
          'category_id' => 3057,
          'group' => '基本信息',
          'title' => '用户id',
          'name' => 'user_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'user_id',
          'type' => 'form_numberbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 8,
        ),
        1 => 
        array (
          'id' => 21619,
          'category_id' => 3057,
          'group' => '基本信息',
          'title' => '权限',
          'name' => 'auth',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'auth',
          'type' => 'form_checkbox',
          'config' => '{"disabled":"0","readonly":"0","values":"删除|delete\\r\\n编辑|edit\\r\\n审核|status\\r\\n精华|best\\r\\n置顶|top1\\r\\n全局置顶|top2"}',
          'remark' => '',
          'sort' => 7,
        ),
        2 => 
        array (
          'id' => 21620,
          'category_id' => 3057,
          'group' => '基本信息',
          'title' => 'id',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => NULL,
          'remark' => '',
          'sort' => 0,
        ),
      ),
    ),
    3058 => 
    array (
      'id' => 3058,
      'group' => '简易论坛',
      'title' => '权限设置',
      'name' => 'forum_admin.forum_auth',
      'remark' => '',
      'sort' => 6,
      'html' => '',
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 21621,
          'category_id' => 3058,
          'group' => '基本信息',
          'title' => '权限',
          'name' => 'auth',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n    $grades = \\\\ebcms\\\\Config::get(\'user.base.grade\');\\r\\n    $grades[0] = \'游客\';\\r\\n    $x = \\\\think\\\\Db::name(\'forum\') -&gt; find(input(\'id\'));\\r\\n    $auth = explode(\',\',$x[\'auth\']);\\r\\n    $authgroup = [\\r\\n        \'浏览\'                =&gt;  0,\\r\\n        \'发帖\'                =&gt;  10,\\r\\n        \'发帖无须审核\'        =&gt;  11,\\r\\n        \'发帖无须验证码\'         =&gt;  12,\\r\\n        \'跟帖\'                =&gt;  40,\\r\\n        \'跟帖无须审核\'        =&gt;  41,\\r\\n        \'跟帖验证码\'         =&gt;  42,\\r\\n    ];\\r\\n{\\/php}\\r\\n&lt;script&gt;\\r\\n    $(function(){\\r\\n        $(\'.auth\').bind(\'click\', function(event) {\\r\\n            $(\'input\',this).trigger(\'click\');\\r\\n        });\\r\\n        $(\'._aa\').bind(\'click\', function(event) {\\r\\n            $(\'.aa_\'+$(this).data(\'x\')).trigger(\'click\');\\r\\n        });\\r\\n        $(\'._bb\').bind(\'click\', function(event) {\\r\\n            $(\'.bb_\'+$(this).data(\'x\')).trigger(\'click\');\\r\\n        });\\r\\n        $(\'._aabb\').bind(\'click\', function(event) {\\r\\n            $(\'.auth\').trigger(\'click\');\\r\\n        });\\r\\n        $.each({$auth|json_encode}, function(index, val) {\\r\\n            $(\'.auth_\'+val).trigger(\'click\');\\r\\n        });\\r\\n    });\\r\\n&lt;\\/script&gt;\\r\\n&lt;tr&gt;\\r\\n    &lt;th&gt;{$field.title}&lt;\\/th&gt;\\r\\n    &lt;td&gt;\\r\\n        &lt;table class=&quot;table table-bordered&quot;&gt;\\r\\n            &lt;tr&gt;\\r\\n                &lt;th class=&quot;_aabb&quot;&gt;&lt;\\/th&gt;\\r\\n                {foreach name=\'authgroup\' item=\'x\'}\\r\\n                &lt;th class=&quot;_aa&quot; data-x=\'{$x}\'&gt;{$key}&lt;\\/th&gt;\\r\\n                {\\/foreach}\\r\\n            &lt;\\/tr&gt;\\r\\n            {foreach name=\'grades\' item=\'vo\' key=&quot;k1&quot;}\\r\\n                &lt;tr&gt;\\r\\n                    &lt;th class=&quot;_bb&quot; data-x=&quot;{$k1}&quot;&gt;{$vo}&lt;\\/th&gt;\\r\\n                    {foreach name=\'authgroup\' item=\'x\'}\\r\\n                    &lt;td class=&quot;auth aa_{$x} bb_{$k1}&quot;&gt;\\r\\n                        &lt;input type=&quot;checkbox&quot; name=&quot;auth[]&quot; class=&quot;auth_{$k1}_{$x}&quot; value=&quot;{$k1}_{$x}&quot;&gt;\\r\\n                    &lt;\\/td&gt;\\r\\n                    {\\/foreach}\\r\\n                &lt;\\/tr&gt;\\r\\n            {\\/foreach}\\r\\n        &lt;\\/table&gt;\\r\\n    &lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;"}',
          'remark' => '',
          'sort' => 7,
        ),
        1 => 
        array (
          'id' => 21622,
          'category_id' => 3058,
          'group' => '基本信息',
          'title' => 'id',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => NULL,
          'remark' => '',
          'sort' => 0,
        ),
      ),
    ),
    3059 => 
    array (
      'id' => 3059,
      'group' => '简易论坛',
      'title' => '编辑帖子',
      'name' => 'forum_admin.thread_edit',
      'remark' => '',
      'sort' => 8,
      'html' => NULL,
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 21623,
          'category_id' => 3059,
          'group' => '基本信息',
          'title' => '标题',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'title',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 20,
        ),
        1 => 
        array (
          'id' => 21624,
          'category_id' => 3059,
          'group' => 'SEO',
          'title' => '关键词',
          'name' => 'keywords',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'keywords',
          'type' => 'form_textbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 9,
        ),
        2 => 
        array (
          'id' => 21625,
          'category_id' => 3059,
          'group' => 'SEO',
          'title' => '描述',
          'name' => 'description',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'description',
          'type' => 'form_multitextbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 8,
        ),
        3 => 
        array (
          'id' => 21626,
          'category_id' => 3059,
          'group' => '基本信息',
          'title' => '内容',
          'name' => 'detail',
          'subtable' => 'body',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'detail',
          'type' => 'form_ueditor',
          'config' => NULL,
          'remark' => '',
          'sort' => 7,
        ),
        4 => 
        array (
          'id' => 21627,
          'category_id' => 3059,
          'group' => '基本信息',
          'title' => 'ID',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => NULL,
          'remark' => '',
          'sort' => 1,
        ),
      ),
    ),
    3060 => 
    array (
      'id' => 3060,
      'group' => '简易论坛',
      'title' => '编辑跟帖',
      'name' => 'forum_admin.rethread_edit',
      'remark' => '',
      'sort' => 7,
      'html' => NULL,
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 21628,
          'category_id' => 3060,
          'group' => '基本信息',
          'title' => '跟帖内容',
          'name' => 'content',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'content',
          'type' => 'form_ueditor',
          'config' => NULL,
          'remark' => '',
          'sort' => 20,
        ),
        1 => 
        array (
          'id' => 21629,
          'category_id' => 3060,
          'group' => '基本信息',
          'title' => 'ID',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => NULL,
          'remark' => '',
          'sort' => 1,
        ),
      ),
    ),
    3061 => 
    array (
      'id' => 3061,
      'group' => '简易论坛',
      'title' => '合并板块',
      'name' => 'forum_admin.forum_merge',
      'remark' => '',
      'sort' => 8,
      'html' => '',
      'app' => 'forum',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 21630,
          'category_id' => 3061,
          'group' => '基本信息',
          'title' => '板块ID',
          'name' => 'ids',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'ids',
          'type' => 'form_multitextbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 9,
        ),
        1 => 
        array (
          'id' => 21631,
          'category_id' => 3061,
          'group' => '基本信息',
          'title' => '合并到',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_database',
          'config' => '{"model":"forum\\/forum","editable":"0","disabled":"0","readonly":"0","rootitem":"0","group":"1","tree":"0","prompt":"","queryparams":"","pid":"","titlefield":"","valuefield":"","width":""}',
          'remark' => '',
          'sort' => 8,
        ),
      ),
    ),
  ),
  'rule' => 
  array (
    0 => 
    array (
      'id' => 6380,
      'pid' => 0,
      'title' => '简易论坛',
      'name' => 'forum',
      'type' => 1,
      'condition' => '',
      'sort' => 100,
      'app' => 'forum',
      'opstr' => '简易论坛',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 6381,
          'pid' => 6380,
          'title' => '板块管理',
          'name' => 'forum_admin.forum_index',
          'type' => 1,
          'condition' => '',
          'sort' => 9,
          'app' => 'forum',
          'opstr' => '板块管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6382,
              'pid' => 6381,
              'title' => '删除',
              'name' => 'forum_admin.forum_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '删除板块',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 6383,
              'pid' => 6381,
              'title' => '排序',
              'name' => 'forum_admin.forum_resort',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '板块排序',
              'rows' => 
              array (
              ),
            ),
            2 => 
            array (
              'id' => 6384,
              'pid' => 6381,
              'title' => '审核',
              'name' => 'forum_admin.forum_status',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '审核板块',
              'rows' => 
              array (
              ),
            ),
            3 => 
            array (
              'id' => 6385,
              'pid' => 6381,
              'title' => '编辑',
              'name' => 'forum_admin.forum_edit',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '编辑板块',
              'rows' => 
              array (
              ),
            ),
            4 => 
            array (
              'id' => 6386,
              'pid' => 6381,
              'title' => '删除版主',
              'name' => 'forum_admin.forum_delete_moderator',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '删除版主',
              'rows' => 
              array (
              ),
            ),
            5 => 
            array (
              'id' => 6387,
              'pid' => 6381,
              'title' => '编辑版主',
              'name' => 'forum_admin.forum_edit_moderator',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '编辑版主',
              'rows' => 
              array (
              ),
            ),
            6 => 
            array (
              'id' => 6388,
              'pid' => 6381,
              'title' => '添加版主',
              'name' => 'forum_admin.forum_add_moderator',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '添加版主',
              'rows' => 
              array (
              ),
            ),
            7 => 
            array (
              'id' => 6389,
              'pid' => 6381,
              'title' => '添加',
              'name' => 'forum_admin.forum_add',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '添加板块',
              'rows' => 
              array (
              ),
            ),
            8 => 
            array (
              'id' => 6390,
              'pid' => 6381,
              'title' => '开关论坛',
              'name' => 'forum_admin.forum_open',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '开关板块',
              'rows' => 
              array (
              ),
            ),
            9 => 
            array (
              'id' => 6391,
              'pid' => 6381,
              'title' => '合并',
              'name' => 'forum_admin.forum_merge',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '合并板块',
              'rows' => 
              array (
              ),
            ),
            10 => 
            array (
              'id' => 6392,
              'pid' => 6381,
              'title' => '权限设置',
              'name' => 'forum_admin.forum_auth',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'forum',
              'opstr' => '板块权限设置',
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
      'id' => 1591,
      'pid' => 936,
      'title' => '论坛管理',
      'url' => 'forum/admin.forum/index',
      'sort' => 7,
      'app' => 'forum',
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
  ),
  'nav' => 
  array (
    0 => 
    array (
      'id' => 3,
      'group' => '用户中心',
      'pid' => 0,
      'title' => '论坛',
      'eb_url' => '',
      'target' => '_self',
      'eb_ext' => '{"__config__":{"__test__":"test"}}',
      'sort' => 0,
      'status' => 1,
      'app' => 'forum',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 4,
          'group' => '用户中心',
          'pid' => 3,
          'title' => '我的帖子',
          'eb_url' => 'forum/user/thread',
          'target' => '_self',
          'eb_ext' => '{"__config__":{"__test__":"test"}}',
          'sort' => 3,
          'status' => 1,
          'app' => 'forum',
          'rows' => 
          array (
          ),
        ),
        1 => 
        array (
          'id' => 5,
          'group' => '用户中心',
          'pid' => 3,
          'title' => '我的跟帖',
          'eb_url' => 'forum/user/rethread',
          'target' => '_self',
          'eb_ext' => '{"__config__":{"__test__":"test"}}',
          'sort' => 2,
          'status' => 1,
          'app' => 'forum',
          'rows' => 
          array (
          ),
        ),
      ),
    ),
    1 => 
    array (
      'id' => 6,
      'group' => '个人空间',
      'pid' => 0,
      'title' => '论坛',
      'eb_url' => '',
      'target' => '',
      'eb_ext' => '{"__config__":{"__test__":"test"}}',
      'sort' => 0,
      'status' => 1,
      'app' => 'forum',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 7,
          'group' => '个人空间',
          'pid' => 6,
          'title' => '他的帖子',
          'eb_url' => '',
          'target' => '',
          'eb_ext' => '{"__config__":{"__test__":"test"}}',
          'sort' => 0,
          'status' => 1,
          'app' => 'forum',
          'rows' => 
          array (
          ),
        ),
      ),
    ),
    2 => 
    array (
      'id' => 8,
      'group' => '主导航',
      'pid' => 0,
      'title' => '论坛',
      'eb_url' => 'forum/index/index',
      'target' => '',
      'eb_ext' => '{"__config__":{"__test__":"test"}}',
      'sort' => 0,
      'status' => 1,
      'app' => 'forum',
      'rows' => 
      array (
      ),
    ),
  ),
);