<?php 

// 返回数组
// 格式：Route::rule('路由表达式','路由地址','请求类型','路由参数（数组）','变量规则（数组）');
// return [
//     // ['路由表达式','路由地址','请求类型','路由参数（数组）','变量规则（数组）']
//     ['bulletin','bulletin/index/index','GET|POST',[],[]],
// ];

return [
	['forum/[:id]','forum/index/index','GET|POST',[],[]],
	['thread/:id','forum/thread/index','GET|POST',[],[]],
];