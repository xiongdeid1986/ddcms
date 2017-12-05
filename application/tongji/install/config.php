<?php 
if (!defined('THINK_PATH')) exit();
return array (
  'config' => 
  array (
    7 => 
    array (
      'id' => 7,
      'group' => '应用配置',
      'title' => '访客统计',
      'name' => 'tongji',
      'remark' => '',
      'status' => 1,
      'sort' => 0,
      'app' => 'tongji',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 1429,
          'group' => '基本配置',
          'category_id' => 7,
          'title' => '是否开启',
          'name' => 'on',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
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
  ),
  'rule' => 
  array (
    0 => 
    array (
      'id' => 6691,
      'pid' => 0,
      'title' => '统计',
      'name' => 'tongji',
      'type' => 1,
      'condition' => '',
      'sort' => 3000,
      'app' => 'tongji',
      'opstr' => '',
      'rows' => 
      array (
        0 => 
        array (
          'id' => 6692,
          'pid' => 6691,
          'title' => '统计',
          'name' => 'tongji_index',
          'type' => 1,
          'condition' => '',
          'sort' => 0,
          'app' => 'tongji',
          'opstr' => '',
          'rows' => 
          array (
            0 => 
            array (
              'id' => 6693,
              'pid' => 6692,
              'title' => '查看浏览记录',
              'name' => 'tongji_index_index',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'tongji',
              'opstr' => '',
              'rows' => 
              array (
              ),
            ),
            1 => 
            array (
              'id' => 6694,
              'pid' => 6692,
              'title' => '查看页面统计',
              'name' => 'tongji_index_tj',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'tongji',
              'opstr' => '查看页面统计',
              'rows' => 
              array (
              ),
            ),
            2 => 
            array (
              'id' => 6695,
              'pid' => 6692,
              'title' => '删除统计数据',
              'name' => 'tongji_index_delete',
              'type' => 1,
              'condition' => '',
              'sort' => 0,
              'app' => 'tongji',
              'opstr' => '删除统计数据',
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
      'id' => 1677,
      'pid' => 936,
      'title' => '访客统计',
      'url' => 'tongji/tongji/index',
      'sort' => 0,
      'app' => 'tongji',
      'rows' => 
      array (
      ),
    ),
  ),
  'extend' => 
  array (
  ),
  'nav' => 
  array (
  ),
);