<?php 
if (!defined('THINK_PATH')) exit();
return array (
  'config' => 
  array (
  ),
  'form' => 
  array (
    2934 => 
    array (
      'id' => 2934,
      'group' => '模板助手',
      'title' => '添加',
      'name' => 'mbzs_mbzs_add',
      'remark' => '',
      'sort' => 300,
      'html' => '',
      'app' => 'mbzs',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 19750,
          'category_id' => 2934,
          'group' => '基本信息',
          'title' => '分组',
          'name' => 'group',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'group',
          'type' => 'form_textbox',
          'config' => '',
          'remark' => '',
          'sort' => 90,
        ),
        1 => 
        array (
          'id' => 19751,
          'category_id' => 2934,
          'group' => '基本信息',
          'title' => '标题',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => '',
          'remark' => '',
          'sort' => 80,
        ),
        2 => 
        array (
          'id' => 19752,
          'category_id' => 2934,
          'group' => '基本信息',
          'title' => '键',
          'name' => 'name',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => '',
          'remark' => '英文字符',
          'sort' => 60,
        ),
        3 => 
        array (
          'id' => 19753,
          'category_id' => 2934,
          'group' => '基本信息',
          'title' => '值',
          'name' => 'value',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_custom',
          'config' => '{"html":"&lt;tr&gt;\\r\\n\\t&lt;th&gt;{$field.title}&lt;\\/th&gt;\\r\\n\\t&lt;td&gt;\\r\\n\\t\\t{switch name=&quot;$Request.param.form&quot;}\\r\\n\\t\\t\\t{case value=&quot;multitextbox&quot;}\\r\\n\\t\\t\\t\\t{include file=&quot;ebcms@common\\/field\\/multitextbox&quot;\\/}\\r\\n\\t\\t\\t{\\/case}\\r\\n\\t\\t\\t{case value=&quot;ueditor&quot;}\\r\\n\\t\\t\\t\\t{include file=&quot;ebcms@common\\/field\\/ueditor&quot;\\/}\\r\\n\\t\\t\\t{\\/case}\\r\\n\\t\\t\\t{case value=&quot;upload&quot;}\\r\\n\\t\\t\\t\\t{php}\\r\\n\\t\\t\\t\\t\\t$field[\'config\'][\'path\'] = \'\\/mbzs\'\\r\\n\\t\\t\\t\\t{\\/php}\\r\\n\\t\\t\\t\\t{include file=&quot;ebcms@common\\/field\\/upload&quot;\\/}\\r\\n\\t\\t\\t{\\/case}\\r\\n\\t\\t\\t{case value=&quot;tpl&quot;}\\r\\n\\t\\t\\t\\t{include file=&quot;ebcms@common\\/field\\/multitextbox&quot;\\/}\\r\\n\\t\\t\\t{\\/case}\\r\\n\\t\\t{\\/switch}\\r\\n\\t\\t\\r\\n\\t\\t{notempty name=\'field.remark\'}\\r\\n\\t\\t\\t&lt;p class=&quot;help-block&quot;&gt;{$field.remark}&lt;\\/p&gt;\\r\\n\\t\\t{\\/notempty}\\r\\n\\t&lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;"}',
          'remark' => '',
          'sort' => 30,
        ),
        4 => 
        array (
          'id' => 19754,
          'category_id' => 2934,
          'group' => '基本信息',
          'title' => '备注',
          'name' => 'remark',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => '',
          'remark' => '',
          'sort' => 20,
        ),
        5 => 
        array (
          'id' => 19755,
          'category_id' => 2934,
          'group' => '基本信息',
          'title' => '表单类型',
          'name' => 'form',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'form',
          'type' => 'form_hidden',
          'config' => '{"disabled":"0","readonly":"0","values":"\\u5355\\u884c\\u6587\\u672c|form_textbox\\r\\n\\u591a\\u884c\\u6587\\u672c|form_multitextbox\\r\\n\\u7f16\\u8f91\\u5668|form_ueditor\\r\\n\\u56fe\\u7247|form_image\\r\\n\\u5e03\\u5c14|form_bool"}',
          'remark' => '',
          'sort' => 0,
        ),
      ),
    ),
    2933 => 
    array (
      'id' => 2933,
      'group' => '模板助手',
      'title' => '编辑',
      'name' => 'mbzs_mbzs_edit',
      'remark' => '',
      'sort' => 3,
      'html' => '',
      'app' => 'mbzs',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 19744,
          'category_id' => 2933,
          'group' => '基本信息',
          'title' => '分组',
          'name' => 'group',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'group',
          'type' => 'form_textbox',
          'config' => '',
          'remark' => '',
          'sort' => 90,
        ),
        1 => 
        array (
          'id' => 19745,
          'category_id' => 2933,
          'group' => '基本信息',
          'title' => '标题',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'title',
          'type' => 'form_textbox',
          'config' => '',
          'remark' => '',
          'sort' => 50,
        ),
        2 => 
        array (
          'id' => 19746,
          'category_id' => 2933,
          'group' => '基本信息',
          'title' => '键',
          'name' => 'name',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'name',
          'type' => 'form_textbox',
          'config' => '',
          'remark' => '',
          'sort' => 40,
        ),
        3 => 
        array (
          'id' => 19747,
          'category_id' => 2933,
          'group' => '基本信息',
          'title' => '值',
          'name' => 'value',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'value',
          'type' => 'form_custom',
          'config' => '{"html":"&lt;tr&gt;\\r\\n\\t&lt;th&gt;{$field.title}&lt;\\/th&gt;\\r\\n\\t&lt;td&gt;\\r\\n\\t\\t{switch name=&quot;data.form&quot;}\\r\\n\\t\\t\\t{case value=&quot;multitextbox&quot;}\\r\\n\\t\\t\\t\\t{include file=&quot;ebcms@common\\/field\\/multitextbox&quot;\\/}\\r\\n\\t\\t\\t{\\/case}\\r\\n\\t\\t\\t{case value=&quot;ueditor&quot;}\\r\\n\\t\\t\\t\\t{include file=&quot;ebcms@common\\/field\\/ueditor&quot;\\/}\\r\\n\\t\\t\\t{\\/case}\\r\\n\\t\\t\\t{case value=&quot;upload&quot;}\\r\\n\\t\\t\\t\\t{php}\\r\\n\\t\\t\\t\\t\\t$field[\'config\'][\'path\'] = \'\\/mbzs\'\\r\\n\\t\\t\\t\\t{\\/php}\\r\\n\\t\\t\\t\\t{include file=&quot;ebcms@common\\/field\\/upload&quot;\\/}\\r\\n\\t\\t\\t{\\/case}\\r\\n\\t\\t\\t{case value=&quot;tpl&quot;}\\r\\n\\t\\t\\t\\t{include file=&quot;ebcms@common\\/field\\/multitextbox&quot;\\/}\\r\\n\\t\\t\\t{\\/case}\\r\\n\\t\\t{\\/switch}\\r\\n\\t\\t{notempty name=\'field.remark\'}\\r\\n\\t\\t\\t&lt;p class=&quot;help-block&quot;&gt;{$field.remark}&lt;\\/p&gt;\\r\\n\\t\\t{\\/notempty}\\r\\n\\t&lt;\\/td&gt;\\r\\n&lt;\\/tr&gt;"}',
          'remark' => '',
          'sort' => 30,
        ),
        4 => 
        array (
          'id' => 19748,
          'category_id' => 2933,
          'group' => '基本信息',
          'title' => '备注',
          'name' => 'remark',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'remark',
          'type' => 'form_multitextbox',
          'config' => '',
          'remark' => '',
          'sort' => 20,
        ),
        5 => 
        array (
          'id' => 19749,
          'category_id' => 2933,
          'group' => '基本信息',
          'title' => 'id',
          'name' => 'id',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'id',
          'type' => 'form_hidden',
          'config' => '',
          'remark' => '',
          'sort' => 4,
        ),
      ),
    ),
  ),
  'rule' => 
  array (
    0 => 
    array (
      'id' => 6575,
      'pid' => 0,
      'title' => '模板助手',
      'name' => 'mbzs',
      'type' => 1,
      'condition' => '',
      'sort' => 200,
      'app' => 'mbzs',
      'opstr' => '模板助手',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 6576,
          'pid' => 6575,
          'title' => '模板助手管理',
          'name' => 'mbzs_mbzs_index',
          'type' => 1,
          'condition' => '',
          'sort' => 0,
          'app' => 'mbzs',
          'opstr' => '模板助手管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6581,
              'pid' => 6576,
              'title' => '变更状态',
              'name' => 'mbzs_mbzs_status',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'mbzs',
              'opstr' => '变更模板变量状态',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 6580,
              'pid' => 6576,
              'title' => '编辑',
              'name' => 'mbzs_mbzs_edit',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'mbzs',
              'opstr' => '编辑模板变量',
              'rows' => 
              array (
              ),
            ),
            2 => 
            array (
              'id' => 6579,
              'pid' => 6576,
              'title' => '添加',
              'name' => 'mbzs_mbzs_add',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'mbzs',
              'opstr' => '添加模板助手变量',
              'rows' => 
              array (
              ),
            ),
            3 => 
            array (
              'id' => 6577,
              'pid' => 6576,
              'title' => '删除',
              'name' => 'mbzs_mbzs_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'mbzs',
              'opstr' => '删除模板助手变量',
              'rows' => 
              array (
              ),
            ),
            4 => 
            array (
              'id' => 6578,
              'pid' => 6576,
              'title' => '排序',
              'name' => 'mbzs_mbzs_resort',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'mbzs',
              'opstr' => '模板助手变量排序',
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
      'id' => 1521,
      'pid' => 936,
      'title' => '模板助手',
      'url' => 'mbzs/mbzs/index',
      'sort' => 4,
      'app' => 'mbzs',
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
  ),
);