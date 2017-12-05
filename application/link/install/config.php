<?php 
if (!defined('THINK_PATH')) exit();
return array (
  'config' => 
  array (
    375 => 
    array (
      'id' => 375,
      'group' => '应用配置',
      'title' => '友情链接',
      'name' => 'link',
      'remark' => '',
      'status' => 1,
      'sort' => 2,
      'app' => 'link',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 1612,
          'group' => '友情链接',
          'category_id' => 375,
          'title' => '开启验证码',
          'name' => 'captcha',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 2,
        ),
        1 => 
        array (
          'id' => 1613,
          'group' => '友情链接',
          'category_id' => 375,
          'title' => '开启在线申请',
          'name' => 'apply',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '',
          'sort' => 1,
        ),
      ),
    ),
  ),
  'form' => 
  array (
    2936 => 
    array (
      'id' => 2936,
      'group' => '友情链接',
      'title' => '添加',
      'name' => 'link_admin.link_add',
      'remark' => '',
      'sort' => 220,
      'html' => NULL,
      'app' => 'link',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 19763,
          'category_id' => 2936,
          'group' => '基本信息',
          'title' => '分组',
          'name' => 'group',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 1,
          'defaultvalue' => 'group',
          'type' => 'form_select',
          'config' => '{"values":"友情链接|友情链接\\r\\n合作伙伴|合作伙伴","editable":"1","readonly":"0","disabled":"0"}',
          'remark' => '',
          'sort' => 9,
        ),
        1 => 
        array (
          'id' => 19764,
          'category_id' => 2936,
          'group' => '基本信息',
          'title' => '名称',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 8,
        ),
        2 => 
        array (
          'id' => 19765,
          'category_id' => 2936,
          'group' => '基本信息',
          'title' => '网址',
          'name' => 'url',
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
          'id' => 19766,
          'category_id' => 2936,
          'group' => '基本信息',
          'title' => '站标',
          'name' => 'logo',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_upload',
          'config' => '{"extensions":"","path":"\\/link","prompt":""}',
          'remark' => '',
          'sort' => 6,
        ),
        4 => 
        array (
          'id' => 19767,
          'category_id' => 2936,
          'group' => '基本信息',
          'title' => '简介',
          'name' => 'description',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 5,
        ),
        5 => 
        array (
          'id' => 19768,
          'category_id' => 2936,
          'group' => '基本信息',
          'title' => '其他信息',
          'name' => 'info',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 0,
          'defaultvalue' => '',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 4,
        ),
      ),
    ),
    2935 => 
    array (
      'id' => 2935,
      'group' => '友情链接',
      'title' => '编辑',
      'name' => 'link_admin.link_edit',
      'remark' => '',
      'sort' => 0,
      'html' => NULL,
      'app' => 'link',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 19756,
          'category_id' => 2935,
          'group' => '基本信息',
          'title' => '分组',
          'name' => 'group',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'group',
          'type' => 'form_select',
          'config' => '{"values":"友情链接|友情链接\\r\\n合作伙伴|合作伙伴","editable":"1","readonly":"0","disabled":"0"}',
          'remark' => '',
          'sort' => 9,
        ),
        1 => 
        array (
          'id' => 19757,
          'category_id' => 2935,
          'group' => '基本信息',
          'title' => '名称',
          'name' => 'title',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'title',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 8,
        ),
        2 => 
        array (
          'id' => 19758,
          'category_id' => 2935,
          'group' => '基本信息',
          'title' => '网址',
          'name' => 'url',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'url',
          'type' => 'form_textbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 7,
        ),
        3 => 
        array (
          'id' => 19759,
          'category_id' => 2935,
          'group' => '基本信息',
          'title' => '站标',
          'name' => 'logo',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'logo',
          'type' => 'form_upload',
          'config' => '{"extensions":"","path":"\\/link","prompt":""}',
          'remark' => '',
          'sort' => 6,
        ),
        4 => 
        array (
          'id' => 19760,
          'category_id' => 2935,
          'group' => '基本信息',
          'title' => '简介',
          'name' => 'description',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'description',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 5,
        ),
        5 => 
        array (
          'id' => 19761,
          'category_id' => 2935,
          'group' => '基本信息',
          'title' => '其他信息',
          'name' => 'info',
          'subtable' => '',
          'extfield' => '',
          'defaultvaluetype' => 3,
          'defaultvalue' => 'info',
          'type' => 'form_multitextbox',
          'config' => 'null',
          'remark' => '',
          'sort' => 4,
        ),
        6 => 
        array (
          'id' => 19762,
          'category_id' => 2935,
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
  ),
  'rule' => 
  array (
    0 => 
    array (
      'id' => 6582,
      'pid' => 0,
      'title' => '友情链接',
      'name' => 'link',
      'type' => 1,
      'condition' => '',
      'sort' => 40,
      'app' => 'link',
      'opstr' => '友情链接',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 6583,
          'pid' => 6582,
          'title' => '友情链接管理',
          'name' => 'link_admin.link_index',
          'type' => 1,
          'condition' => '',
          'sort' => 0,
          'app' => 'link',
          'opstr' => '友情链接管理',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6584,
              'pid' => 6583,
              'title' => '删除',
              'name' => 'link_admin.link_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'link',
              'opstr' => '删除友情链接',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 6585,
              'pid' => 6583,
              'title' => '编辑',
              'name' => 'link_admin.link_edit',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'link',
              'opstr' => '编辑友情链接',
              'rows' => 
              array (
              ),
            ),
            2 => 
            array (
              'id' => 6586,
              'pid' => 6583,
              'title' => '添加',
              'name' => 'link_admin.link_add',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'link',
              'opstr' => '添加友情链接',
              'rows' => 
              array (
              ),
            ),
            3 => 
            array (
              'id' => 6587,
              'pid' => 6583,
              'title' => '审核',
              'name' => 'link_admin.link_status',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'link',
              'opstr' => '审核友情链接',
              'rows' => 
              array (
              ),
            ),
            4 => 
            array (
              'id' => 6588,
              'pid' => 6583,
              'title' => '排序',
              'name' => 'link_admin.link_resort',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'link',
              'opstr' => '友情链接排序',
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
      'id' => 1522,
      'pid' => 936,
      'title' => '友情链接',
      'url' => 'link/admin.link/index',
      'sort' => 3,
      'app' => 'link',
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
      'id' => 425,
      'group' => '主导航',
      'pid' => 0,
      'title' => '友情链接',
      'eb_url' => 'link/index/index',
      'target' => '',
      'eb_ext' => NULL,
      'sort' => 1,
      'status' => 1,
      'app' => 'link',
      'rows' => 
      array (
      ),
    ),
  ),
);