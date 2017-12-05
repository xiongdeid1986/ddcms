<?php 
if (!defined('THINK_PATH')) exit();
return array (
  'config' => 
  array (
    13 => 
    array (
      'id' => 13,
      'group' => '应用配置',
      'title' => '超级支付',
      'name' => 'superpay',
      'remark' => '',
      'status' => 1,
      'sort' => 0,
      'app' => 'superpay',
      'subs' => 
      array (
        0 => 
        array (
          'id' => 1420,
          'group' => '基本配置',
          'category_id' => 13,
          'title' => '安全模式',
          'name' => 'safe_mode',
          'value' => '1',
          'render' => 'bool',
          'form' => 'form_bool',
          'config' => NULL,
          'status' => 1,
          'remark' => '安全性更高',
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
  ),
  'menu' => 
  array (
  ),
  'extend' => 
  array (
  ),
  'nav' => 
  array (
  ),
);