<?php 
if (!defined('THINK_PATH')) exit();
return array (
  'config' => 
  array (
    11 => 
    array (
      'id' => 11,
      'group' => '应用配置',
      'title' => '会员配置',
      'name' => 'user',
      'remark' => '',
      'status' => 1,
      'sort' => 7,
      'app' => 'user',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 1443,
          'group' => '基本配置@base',
          'category_id' => 11,
          'title' => '会员等级',
          'name' => 'grade',
          'value' => '1:普通会员
2:高级会员
3:金牌会员
4:钻石会员',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '一行一个，形如 数字:等级名称，例如：
1:普通会员
2:高级会员
3:金牌会员
4:钻石会员',
          'sort' => 99,
        ),
        1 => 
        array (
          'id' => 1444,
          'group' => '注册@reg',
          'category_id' => 11,
          'title' => '是否允许注册',
          'name' => 'on',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 98,
        ),
        2 => 
        array (
          'id' => 1445,
          'group' => '登录@login',
          'category_id' => 11,
          'title' => '登陆验证码',
          'name' => 'captcha',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 97,
        ),
        3 => 
        array (
          'id' => 1446,
          'group' => '找回密码@password',
          'category_id' => 11,
          'title' => '表单验证码',
          'name' => 'captcha',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 96,
        ),
        4 => 
        array (
          'id' => 1447,
          'group' => '修改信息@edit',
          'category_id' => 11,
          'title' => '表单验证码',
          'name' => 'captcha',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 95,
        ),
        5 => 
        array (
          'id' => 1459,
          'group' => '评论配置@comment',
          'category_id' => 11,
          'title' => '是否开启评论',
          'name' => 'on',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 94,
        ),
        6 => 
        array (
          'id' => 1468,
          'group' => '自助升级@gradebuy',
          'category_id' => 11,
          'title' => '是否开启',
          'name' => 'allow',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '开启后才可以进行会员自助购买。',
          'sort' => 93,
        ),
        7 => 
        array (
          'id' => 1448,
          'group' => '注册@reg',
          'category_id' => 11,
          'title' => '邮箱验证',
          'name' => 'email_verify',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 10,
        ),
        8 => 
        array (
          'id' => 1449,
          'group' => '注册@reg',
          'category_id' => 11,
          'title' => '注册验证码',
          'name' => 'captcha',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 9,
        ),
        9 => 
        array (
          'id' => 1450,
          'group' => '登录@login',
          'category_id' => 11,
          'title' => '登陆奖励',
          'name' => 'jiangli',
          'value' => 'jifen:1',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '根据您配置的币种类型，自定义奖励，支持多种币种同时奖励，例如：
jifen:1
jinbi:1',
          'sort' => 9,
        ),
        10 => 
        array (
          'id' => 1451,
          'group' => '找回密码@password',
          'category_id' => 11,
          'title' => '邮件模板',
          'name' => 'email_tpl',
          'value' => '&lt;p&gt;尊敬的用户，您的邮箱认证码是：&lt;span style=&quot;color: rgb(255, 0, 0);&quot;&gt;&lt;strong&gt;{$code}&lt;/strong&gt;&lt;/span&gt;，请勿泄露给他人，若非本人操作，请忽略！&lt;/p&gt;',
          'render' => 'string',
          'form' => 'form_ueditor',
          'config' => '{"initialframeheight":"200","autoheightenabled":"0","maximumwords":"","wordcount":"0","elementpathenabled":"0"}',
          'status' => 1,
          'remark' => '',
          'sort' => 9,
        ),
        11 => 
        array (
          'id' => 1452,
          'group' => '基本配置@base',
          'category_id' => 11,
          'title' => '币种类型',
          'name' => 'currency',
          'value' => 'jifen:积分
jinbi:金币
yuan:余额',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => '{"height":"","width":"","prompt":""}',
          'status' => 1,
          'remark' => '自带jifen jinbi yuan三种内置币种，以及 bi1 bi2 bi3 bi4 bi5 bi6 六个自定义扩展币种',
          'sort' => 9,
        ),
        12 => 
        array (
          'id' => 1460,
          'group' => '评论配置@comment',
          'category_id' => 11,
          'title' => '允许评论',
          'name' => 'auth',
          'value' => '["0"]',
          'render' => 'json',
          'form' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n\\t$my_grades = \\\\ebcms\\\\Config::get(\'user.base.grade\');\\r\\n\\t$my_grades[0] = \'\\u6e38\\u5ba2\';\\r\\n\\t$tmp = json_decode($field[\'value\'],true);\\r\\n{\\/php}\\r\\n{foreach name=\'my_grades\' item=\'grade\'}\\r\\n\\t&lt;label class=&quot;checkbox-inline&quot; for=&quot;{$field.unique}_{$key}&quot;&gt;\\r\\n\\t\\t&lt;input type=&quot;checkbox&quot; id=&quot;{$field.unique}_{$key}&quot; name=&quot;{$field.field}[]&quot; value=&quot;{$key}&quot; {if condition=&quot;in_array($key,(Array)$tmp)&quot;}checked{\\/if} &gt; {$grade}\\r\\n\\t&lt;\\/label&gt;\\r\\n{\\/foreach}"}',
          'status' => 1,
          'remark' => '',
          'sort' => 9,
        ),
        13 => 
        array (
          'id' => 1453,
          'group' => '注册@reg',
          'category_id' => 11,
          'title' => '默认用户组',
          'name' => 'grade',
          'value' => '1',
          'render' => 'number',
          'form' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n\\t$my_grades = \\\\ebcms\\\\Config::get(\'user.base.grade\');\\r\\n{\\/php}\\r\\n&lt;select class=&quot;form-control&quot; id=&quot;{$field.unique}&quot; name=&quot;{$field.field}&quot;&gt;\\r\\n\\t{foreach name=\'my_grades\' item=\'_temp\'}\\r\\n\\t&lt;option value=&quot;{$key}&quot; {eq name=&quot;field.value&quot; value=\'$key\'}selected{\\/eq}&gt;{$_temp}&lt;\\/option&gt;\\r\\n\\t{\\/foreach}\\r\\n&lt;\\/select&gt;"}',
          'status' => 1,
          'remark' => '',
          'sort' => 8,
        ),
        14 => 
        array (
          'id' => 1461,
          'group' => '评论配置@comment',
          'category_id' => 11,
          'title' => '无须验证码',
          'name' => 'captcha',
          'value' => '',
          'render' => 'json',
          'form' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n\\t$my_grades = \\\\ebcms\\\\Config::get(\'user.base.grade\');\\r\\n\\t$my_grades[0] = \'\\u6e38\\u5ba2\';\\r\\n\\t$tmp = json_decode($field[\'value\'],true);\\r\\n{\\/php}\\r\\n{foreach name=\'my_grades\' item=\'grade\'}\\r\\n\\t&lt;label class=&quot;checkbox-inline&quot; for=&quot;{$field.unique}_{$key}&quot;&gt;\\r\\n\\t\\t&lt;input type=&quot;checkbox&quot; id=&quot;{$field.unique}_{$key}&quot; name=&quot;{$field.field}[]&quot; value=&quot;{$key}&quot; {if condition=&quot;in_array($key,(Array)$tmp)&quot;}checked{\\/if} &gt; {$grade}\\r\\n\\t&lt;\\/label&gt;\\r\\n{\\/foreach}"}',
          'status' => 1,
          'remark' => '',
          'sort' => 8,
        ),
        15 => 
        array (
          'id' => 1469,
          'group' => '自助升级@gradebuy',
          'category_id' => 11,
          'title' => '参数配置',
          'name' => 'config',
          'value' => '{"1":{"value":"10","currency":"jifen"},"2":{"value":"100","currency":"jifen"},"3":{"value":"500","currency":"jifen"},"4":{"value":"5000","currency":"jifen"}}',
          'render' => 'json',
          'form' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n$grades = \\\\ebcms\\\\Config::get(\'user.base.grade\');\\r\\n$currency = \\\\ebcms\\\\Config::get(\'user.base.currency\');\\r\\n$res = [];\\r\\n$_value = json_decode($field[\'value\'],true);\\r\\nforeach($grades as $k =&gt; $title){\\r\\n\\t$res[] = [\\r\\n\\t\\t\'title\'=&gt;$title,\\r\\n\\t\\t\'field\'=&gt;$field[\'field\'].\'[\'.$k.\']\',\\r\\n\\t\\t\'value\'=&gt; isset($_value[$k][\'value\'])?$_value[$k][\'value\']:\'\',\\r\\n\\t\\t\'currency\'=&gt; isset($_value[$k][\'currency\'])?$_value[$k][\'currency\']:\'jifen\',\\r\\n\\t];\\r\\n}\\r\\n{\\/php}\\r\\n{foreach name=\'res\' item=\'vo\'}\\r\\n&lt;div class=&quot;row&quot; style=&quot;padding-bottom:15px;&quot;&gt;\\r\\n\\t&lt;div class=&quot;col-md-3&quot;&gt;\\r\\n\\t\\t\\u5347\\u7ea7\\u5230&lt;b&gt;\\u3010{$vo.title}\\u3011&lt;\\/b&gt;\\u9700\\u8981\\r\\n\\t&lt;\\/div&gt;\\r\\n\\t&lt;div class=&quot;col-md-3&quot;&gt;\\r\\n\\t\\t&lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;{$field.unique}_{$key}&quot; name=&quot;{$vo.field}[value]&quot; value=&quot;{$vo.value}&quot; placeholder=&quot;&quot;&gt;\\r\\n\\t&lt;\\/div&gt;\\r\\n\\t&lt;div class=&quot;col-md-6&quot;&gt;\\r\\n\\t\\t{foreach name=\'currency\' item=\'cu\' key=\'cur\'}\\r\\n\\t\\t\\t&lt;label class=&quot;radio-inline&quot; for=&quot;{$field.unique}_{$key}_{$cur}&quot;&gt;\\r\\n\\t\\t\\t\\t&lt;input type=&quot;radio&quot; id=&quot;{$field.unique}_{$key}_{$cur}&quot; name=&quot;{$vo.field}[currency]&quot; value=&quot;{$cur}&quot; {eq name=&quot;vo.currency&quot; value=\'$cur\'}checked{\\/eq}&gt; {$cu}\\r\\n\\t\\t\\t&lt;\\/label&gt;\\r\\n\\t\\t{\\/foreach}\\r\\n\\t&lt;\\/div&gt;\\r\\n&lt;\\/div&gt;\\r\\n{\\/foreach}"}',
          'status' => 1,
          'remark' => '数值填空，则表示不允许购买改会员组',
          'sort' => 8,
        ),
        16 => 
        array (
          'id' => 1454,
          'group' => '注册@reg',
          'category_id' => 11,
          'title' => '注册奖励',
          'name' => 'jiangli',
          'value' => 'jifen:10',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '根据您配置的币种类型，自定义奖励，支持多种币种同时奖励，例如：
jifen:10
jinbi:1',
          'sort' => 7,
        ),
        17 => 
        array (
          'id' => 1462,
          'group' => '评论配置@comment',
          'category_id' => 11,
          'title' => '消息通知模板',
          'name' => 'notice_tpl',
          'value' => '&lt;span class=&quot;text-danger&quot;&gt;&lt;b&gt;您的评论&lt;/b&gt;&lt;/span&gt;：{$comment_p.content}
&lt;br/&gt;
&lt;span class=&quot;text-danger&quot;&gt;&lt;b&gt;他的回复&lt;/b&gt;&lt;/span&gt;：{$comment.content}
&lt;br/&gt;
&lt;span class=&quot;text-muted&quot;&gt;回复人：&lt;a href=&quot;{$comment.user.space_url}&quot;&gt;{$comment.user.nickname|default=&quot;游客&quot;}&lt;/a&gt; 回复时间：{$comment.create_time|date=\'Y-m-d H:i:s\',###} &lt;/span&gt;',
          'render' => 'string',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '被回复 comment_p
当前回复 comment',
          'sort' => 7,
        ),
        18 => 
        array (
          'id' => 1455,
          'group' => '注册@reg',
          'category_id' => 11,
          'title' => '注册验证邮件模板',
          'name' => 'email_tpl',
          'value' => '&lt;p&gt;尊敬的用户，您的邮箱认证码是：&lt;span style=&quot;color: rgb(255, 0, 0);&quot;&gt;&lt;strong&gt;{$code}&lt;/strong&gt;&lt;/span&gt;，请勿泄露给他人，若非本人操作，请忽略！&lt;/p&gt;',
          'render' => 'string',
          'form' => 'form_ueditor',
          'config' => '{"initialframeheight":"200","autoheightenabled":"0","maximumwords":"","wordcount":"0","elementpathenabled":"0"}',
          'status' => 1,
          'remark' => '',
          'sort' => 6,
        ),
        19 => 
        array (
          'id' => 1463,
          'group' => '评论配置@comment',
          'category_id' => 11,
          'title' => '铭感词处理',
          'name' => 'badwords_handle',
          'value' => '1',
          'render' => 'number',
          'form' => 'form_radio',
          'config' => '{"disabled":"0","readonly":"0","values":"禁止提交|0\\r\\n进入审核|1\\r\\n直接替换|2\\r\\n不用处理|99"}',
          'status' => 1,
          'remark' => '',
          'sort' => 6,
        ),
        20 => 
        array (
          'id' => 1456,
          'group' => '注册@reg',
          'category_id' => 11,
          'title' => '注册成功消息模板',
          'name' => 'success_msg',
          'value' => '&lt;p&gt;尊敬的会员:{$user.nickname}，你好，你注册的邮箱是 {$user.email} 欢迎注册！&lt;/p&gt;',
          'render' => 'string',
          'form' => 'form_ueditor',
          'config' => '{"initialframeheight":"200","autoheightenabled":"0","maximumwords":"","wordcount":"0","elementpathenabled":"0"}',
          'status' => 1,
          'remark' => '',
          'sort' => 5,
        ),
        21 => 
        array (
          'id' => 1464,
          'group' => '评论配置@comment',
          'category_id' => 11,
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
          'remark' => '一行一个 用‘=’分割
左侧敏感词 右侧替换内容',
          'sort' => 5,
        ),
        22 => 
        array (
          'id' => 1465,
          'group' => '评论配置@comment',
          'category_id' => 11,
          'title' => '评论奖励',
          'name' => 'jiangli',
          'value' => 'jifen:1',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => NULL,
          'status' => 1,
          'remark' => '根据您配置的币种类型，自定义奖励，支持多种币种同时奖励，例如：
jifen:10
jinbi:1',
          'sort' => 0,
        ),
        23 => 
        array (
          'id' => 1470,
          'group' => '推广奖励@promote',
          'category_id' => 11,
          'title' => '关闭推广',
          'name' => 'promote_closed',
          'value' => '0',
          'render' => 'bool',
          'form' => 'form_radio',
          'config' => '{"disabled":"0","readonly":"0","values":"\\u5f00\\u542f|0\\r\\n\\u5173\\u95ed|1"}',
          'status' => 1,
          'remark' => '',
          'sort' => 0,
        ),
        24 => 
        array (
          'id' => 1471,
          'group' => '推广奖励@promote',
          'category_id' => 11,
          'title' => '访问奖励',
          'name' => 'promote_access_ncentive',
          'value' => 'jifen:1',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => '{"disabled":"0","readonly":"0","height":"","width":"","prompt":""}',
          'status' => 1,
          'remark' => '根据您配置的币种类型，自定义奖励，支持多种币种同时奖励，例如：
jifen:10
jinbi:1',
          'sort' => 0,
        ),
        25 => 
        array (
          'id' => 1472,
          'group' => '推广奖励@promote',
          'category_id' => 11,
          'title' => '注册奖励',
          'name' => 'promote_reg_ncentive',
          'value' => 'jifen:50',
          'render' => 'item',
          'form' => 'form_multitextbox',
          'config' => '[]',
          'status' => 1,
          'remark' => '根据您配置的币种类型，自定义奖励，支持多种币种同时奖励，例如：
jifen:10
jinbi:1',
          'sort' => 0,
        ),
      ),
    ),
  ),
  'form' => 
  array (
    3244 => 
    array (
      'id' => 3244,
      'group' => '用户管理',
      'title' => '发消息',
      'name' => 'user_admin.user_msg',
      'remark' => '',
      'sort' => 0,
      'html' => '',
      'app' => 'user',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 22858,
          'category_id' => 3244,
          'group' => '基本信息',
          'title' => '用户',
          'name' => 'user',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n\\t$user = \\\\app\\\\user\\\\model\\\\User::get(input(\'user_id\'));\\r\\n{\\/php}\\r\\n&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;{$user.nickname}\\uff08ID\\uff1a{$user.id}\\uff0c\\u90ae\\u7bb1\\uff1a{$user.email}\\uff09&quot; readonly disabled&gt;"}',
          'remark' => '',
          'sort' => 9,
        ),
        1 => 
        array (
          'id' => 22859,
          'category_id' => 3244,
          'group' => '基本信息',
          'title' => '消息类型',
          'name' => 'topic',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '系统消息',
          'type' => 'form_select',
          'config' => '{"values":"系统消息|系统消息\\r\\n信息通知|信息通知","editable":"1"}',
          'remark' => '',
          'sort' => 8,
        ),
        2 => 
        array (
          'id' => 22860,
          'category_id' => 3244,
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
          'sort' => 7,
        ),
        3 => 
        array (
          'id' => 22861,
          'category_id' => 3244,
          'group' => '基本信息',
          'title' => '消息内容',
          'name' => 'content',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 6,
        ),
        4 => 
        array (
          'id' => 22862,
          'category_id' => 3244,
          'group' => '基本信息',
          'title' => 'user_id',
          'name' => 'user_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'user_id',
          'type' => 'form_hidden',
          'config' => 'null',
          'remark' => '',
          'sort' => 1,
        ),
      ),
    ),
    3245 => 
    array (
      'id' => 3245,
      'group' => '用户管理',
      'title' => '添加用户',
      'name' => 'user_admin.user_add',
      'remark' => '',
      'sort' => 170,
      'html' => '',
      'app' => 'user',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 22863,
          'category_id' => 3245,
          'group' => '基本信息',
          'title' => '用户等级',
          'name' => 'grade',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '1',
          'type' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n\\t$my_grades = \\\\ebcms\\\\Config::get(\'user.base.grade\');\\r\\n{\\/php}\\r\\n&lt;select class=&quot;form-control&quot; id=&quot;{$field.unique}&quot; name=&quot;{$field.field}&quot;&gt;\\r\\n\\t{foreach name=\'my_grades\' item=\'_temp\'}\\r\\n\\t&lt;option value=&quot;{$key}&quot; {eq name=&quot;field.value&quot; value=\'$key\'}selected{\\/eq}&gt;{$_temp}&lt;\\/option&gt;\\r\\n\\t{\\/foreach}\\r\\n&lt;\\/select&gt;"}',
          'remark' => '',
          'sort' => 10,
        ),
        1 => 
        array (
          'id' => 22864,
          'category_id' => 3245,
          'group' => '基本信息',
          'title' => '邮箱',
          'name' => 'email',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 9,
        ),
        2 => 
        array (
          'id' => 22865,
          'category_id' => 3245,
          'group' => '基本信息',
          'title' => '昵称',
          'name' => 'nickname',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 8,
        ),
        3 => 
        array (
          'id' => 22866,
          'category_id' => 3245,
          'group' => '基本信息',
          'title' => '密码',
          'name' => 'password',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 7,
        ),
        4 => 
        array (
          'id' => 22867,
          'category_id' => 3245,
          'group' => '基本信息',
          'title' => '头像',
          'name' => 'avatar',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_upload',
          'config' => '{"extensions":"","path":"\\/user\\/avatar","prompt":""}',
          'remark' => '',
          'sort' => 6,
        ),
        5 => 
        array (
          'id' => 22868,
          'category_id' => 3245,
          'group' => '基本信息',
          'title' => '座右铭',
          'name' => 'motto',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 5,
        ),
      ),
    ),
    3246 => 
    array (
      'id' => 3246,
      'group' => '用户管理',
      'title' => '编辑用户',
      'name' => 'user_admin.user_edit',
      'remark' => '',
      'sort' => 0,
      'html' => '',
      'app' => 'user',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 22869,
          'category_id' => 3246,
          'group' => '基本信息',
          'title' => '用户等级',
          'name' => 'grade',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'grade',
          'type' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n\\t$my_grades = \\\\ebcms\\\\Config::get(\'user.base.grade\');\\r\\n{\\/php}\\r\\n&lt;select class=&quot;form-control&quot; id=&quot;{$field.unique}&quot; name=&quot;{$field.field}&quot;&gt;\\r\\n\\t{foreach name=\'my_grades\' item=\'_temp\'}\\r\\n\\t&lt;option value=&quot;{$key}&quot; {eq name=&quot;field.value&quot; value=\'$key\'}selected{\\/eq}&gt;{$_temp}&lt;\\/option&gt;\\r\\n\\t{\\/foreach}\\r\\n&lt;\\/select&gt;"}',
          'remark' => '',
          'sort' => 10,
        ),
        1 => 
        array (
          'id' => 22870,
          'category_id' => 3246,
          'group' => '基本信息',
          'title' => '邮箱',
          'name' => 'email',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'email',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 9,
        ),
        2 => 
        array (
          'id' => 22871,
          'category_id' => 3246,
          'group' => '基本信息',
          'title' => '昵称',
          'name' => 'nickname',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'nickname',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 8,
        ),
        3 => 
        array (
          'id' => 22872,
          'category_id' => 3246,
          'group' => '基本信息',
          'title' => '头像',
          'name' => 'avatar',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'avatar',
          'type' => 'form_upload',
          'config' => '{"extensions":"","path":"\\/user\\/avatar","prompt":""}',
          'remark' => '',
          'sort' => 7,
        ),
        4 => 
        array (
          'id' => 22873,
          'category_id' => 3246,
          'group' => '基本信息',
          'title' => '座右铭',
          'name' => 'motto',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'motto',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 6,
        ),
        5 => 
        array (
          'id' => 22874,
          'category_id' => 3246,
          'group' => '基本信息',
          'title' => 'id',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => 'null',
          'remark' => '',
          'sort' => 1,
        ),
      ),
    ),
    3247 => 
    array (
      'id' => 3247,
      'group' => '用户管理',
      'title' => '财务变更',
      'name' => 'user_admin.user_currency',
      'remark' => '',
      'sort' => 0,
      'html' => '',
      'app' => 'user',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 22875,
          'category_id' => 3247,
          'group' => '基本信息',
          'title' => '用户',
          'name' => 'user',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n\\t$user = \\\\app\\\\user\\\\model\\\\User::get(input(\'user_id\'));\\r\\n{\\/php}\\r\\n&lt;input type=&quot;text&quot; class=&quot;form-control&quot; value=&quot;{$user.nickname}\\uff08ID\\uff1a{$user.id}\\uff0c\\u90ae\\u7bb1\\uff1a{$user.email}\\uff09&quot; readonly disabled&gt;"}',
          'remark' => '',
          'sort' => 10,
        ),
        1 => 
        array (
          'id' => 22876,
          'category_id' => 3247,
          'group' => '基本信息',
          'title' => '类型',
          'name' => 'type',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => 'inc',
          'type' => 'form_radio',
          'config' => '{"disabled":"0","readonly":"0","values":"充值|inc\\r\\n扣费|dec"}',
          'remark' => '',
          'sort' => 9,
        ),
        2 => 
        array (
          'id' => 22877,
          'category_id' => 3247,
          'group' => '基本信息',
          'title' => '币种',
          'name' => 'currency',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => 'jifen',
          'type' => 'form_custom',
          'config' => '{"html":"{php}\\r\\n\\t$_currency = \\\\ebcms\\\\Config::get(\'user.base.currency\');\\r\\n{\\/php}\\r\\n{foreach name=\'_currency\' item=\'_temp\' key=\'curr\'}\\r\\n\\t&lt;label class=&quot;radio-inline&quot; for=&quot;{$field.unique}_{$curr}&quot;&gt;\\r\\n\\t\\t&lt;input type=&quot;radio&quot; name=&quot;{$field.field}&quot; id=&quot;{$field.unique}_{$curr}&quot; value=&quot;{$curr}&quot; {eq name=&quot;field.value&quot; value=\'$curr\'}checked{\\/eq}&gt; {$_temp}\\r\\n\\t&lt;\\/label&gt;\\r\\n{\\/foreach}"}',
          'remark' => '',
          'sort' => 8,
        ),
        3 => 
        array (
          'id' => 22878,
          'category_id' => 3247,
          'group' => '基本信息',
          'title' => '数额',
          'name' => 'num',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '0',
          'type' => 'form_numberbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 7,
        ),
        4 => 
        array (
          'id' => 22879,
          'category_id' => 3247,
          'group' => '基本信息',
          'title' => '备注',
          'name' => 'remark',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 6,
        ),
        5 => 
        array (
          'id' => 22880,
          'category_id' => 3247,
          'group' => '基本信息',
          'title' => '通知消息',
          'name' => 'msg',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '通知用户的消息，不填写则为系统默认消息',
          'sort' => 5,
        ),
        6 => 
        array (
          'id' => 22881,
          'category_id' => 3247,
          'group' => '基本信息',
          'title' => '用户id',
          'name' => 'user_id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'user_id',
          'type' => 'form_hidden',
          'config' => 'null',
          'remark' => '',
          'sort' => 0,
        ),
      ),
    ),
    3248 => 
    array (
      'id' => 3248,
      'group' => '用户管理',
      'title' => '编辑评论',
      'name' => 'user_admin.comment_edit',
      'remark' => '',
      'sort' => 0,
      'html' => '',
      'app' => 'user',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 22882,
          'category_id' => 3248,
          'group' => '基本信息',
          'title' => '内容',
          'name' => 'content',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'content',
          'type' => 'form_multitextbox',
          'config' => NULL,
          'remark' => '',
          'sort' => 90,
        ),
        1 => 
        array (
          'id' => 22883,
          'category_id' => 3248,
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
  ),
  'rule' => 
  array (
    0 => 
    array (
      'id' => 6734,
      'pid' => 0,
      'title' => '用户模块',
      'name' => 'user',
      'type' => 1,
      'condition' => '',
      'sort' => 20,
      'app' => 'user',
      'opstr' => '用户模块',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 6735,
          'pid' => 6734,
          'title' => '用户管理',
          'name' => 'user_admin.user_index',
          'type' => 1,
          'condition' => '',
          'sort' => 2,
          'app' => 'user',
          'opstr' => '用户管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6736,
              'pid' => 6735,
              'title' => '添加',
              'name' => 'user_admin.user_add',
              'type' => 1,
              'condition' => '',
              'sort' => 9,
              'app' => 'user',
              'opstr' => '添加会员',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 6737,
              'pid' => 6735,
              'title' => '编辑',
              'name' => 'user_admin.user_edit',
              'type' => 1,
              'condition' => '',
              'sort' => 8,
              'app' => 'user',
              'opstr' => '编辑会员信息',
              'rows' => 
              array (
              ),
            ),
            2 => 
            array (
              'id' => 6738,
              'pid' => 6735,
              'title' => '变更财务',
              'name' => 'user_admin.user_currency',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '变更会员财务',
              'rows' => 
              array (
              ),
            ),
            3 => 
            array (
              'id' => 6739,
              'pid' => 6735,
              'title' => '发送消息',
              'name' => 'user_admin.user_msg',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '向会员发送消息',
              'rows' => 
              array (
              ),
            ),
            4 => 
            array (
              'id' => 6740,
              'pid' => 6735,
              'title' => '变更状态',
              'name' => 'user_admin.user_status',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '变更会员状态',
              'rows' => 
              array (
              ),
            ),
            5 => 
            array (
              'id' => 6741,
              'pid' => 6735,
              'title' => '删除',
              'name' => 'user_admin.user_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '删除会员',
              'rows' => 
              array (
              ),
            ),
            6 => 
            array (
              'id' => 6742,
              'pid' => 6735,
              'title' => '重置密码',
              'name' => 'user_admin.user_password',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '重置会员密码',
              'rows' => 
              array (
              ),
            ),
            7 => 
            array (
              'id' => 6743,
              'pid' => 6735,
              'title' => '查看详情',
              'name' => 'user_admin.user_info',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '查看会员信息',
              'rows' => 
              array (
              ),
            ),
          ),
        ),
        1 => 
        array (
          'id' => 6747,
          'pid' => 6734,
          'title' => '评论管理',
          'name' => 'user_admin.comment_index',
          'type' => 1,
          'condition' => '',
          'sort' => 1,
          'app' => 'user',
          'opstr' => '评论管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6748,
              'pid' => 6747,
              'title' => '审核',
              'name' => 'user_admin.comment_status',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '变更评论状态',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 6749,
              'pid' => 6747,
              'title' => '编辑',
              'name' => 'user_admin.comment_edit',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '编辑评论',
              'rows' => 
              array (
              ),
            ),
            2 => 
            array (
              'id' => 6750,
              'pid' => 6747,
              'title' => '删除',
              'name' => 'user_admin.comment_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '删除评论',
              'rows' => 
              array (
              ),
            ),
          ),
        ),
        2 => 
        array (
          'id' => 6744,
          'pid' => 6734,
          'title' => '流水管理',
          'name' => 'user_admin.currencylog_index',
          'type' => 1,
          'condition' => '',
          'sort' => 0,
          'app' => 'user',
          'opstr' => '流水管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6745,
              'pid' => 6744,
              'title' => '删除',
              'name' => 'user_admin.currencylog_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'user',
              'opstr' => '删除流水',
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
      'id' => 1691,
      'pid' => 0,
      'title' => '会员',
      'url' => '',
      'sort' => 7000,
      'app' => 'user',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 1692,
          'pid' => 1691,
          'title' => '会员管理',
          'url' => 'user/admin.user/index',
          'sort' => 1,
          'app' => 'user',
          'rows' => 
          array (
          ),
        ),
        1 => 
        array (
          'id' => 1693,
          'pid' => 1691,
          'title' => '流水管理',
          'url' => 'user/admin.currencylog/index',
          'sort' => 0,
          'app' => 'user',
          'rows' => 
          array (
          ),
        ),
        2 => 
        array (
          'id' => 1694,
          'pid' => 1691,
          'title' => '评论管理',
          'url' => 'user/admin.comment/index',
          'sort' => 0,
          'app' => 'user',
          'rows' => 
          array (
          ),
        ),
      ),
    ),
  ),
  'extend' => 
  array (
  ),
  'nav' => 
  array (
    0 => 
    array (
      'id' => 17,
      'group' => '用户中心',
      'pid' => 0,
      'title' => '个人账户',
      'eb_url' => '',
      'target' => '',
      'eb_ext' => '{"__config__":{"__test__":"test"}}',
      'sort' => 50,
      'status' => 1,
      'app' => 'user',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 18,
          'group' => '用户中心',
          'pid' => 17,
          'title' => '账户概况',
          'eb_url' => 'user/currency/index',
          'target' => '',
          'eb_ext' => '{"__config__":{"__test__":"test"}}',
          'sort' => 9,
          'status' => 1,
          'app' => 'user',
          'rows' => 
          array (
          ),
        ),
        1 => 
        array (
          'id' => 19,
          'group' => '用户中心',
          'pid' => 17,
          'title' => '账户流水',
          'eb_url' => 'user/currency/log',
          'target' => '',
          'eb_ext' => '{"__config__":{"__test__":"test"}}',
          'sort' => 8,
          'status' => 1,
          'app' => 'user',
          'rows' => 
          array (
          ),
        ),
        2 => 
        array (
          'id' => 23,
          'group' => '用户中心',
          'pid' => 17,
          'title' => '自助升级',
          'eb_url' => 'user/gradebuy/index',
          'target' => '_self',
          'eb_ext' => '{"__config__":{"__test__":"test"}}',
          'sort' => 0,
          'status' => 1,
          'app' => 'user',
          'rows' => 
          array (
          ),
        ),
      ),
    ),
  ),
);