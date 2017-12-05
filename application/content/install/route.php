<?php 

return app_route_content();

function app_route_content(){
	$routes = [
		['search$','content/search/index', 'GET|POST', [], []],
		['tag/:tag','content/tag/index', 'GET|POST', [], []],
		['tag$','content/tag/index', 'GET|POST', [], []],
	];
	$url_model = \ebcms\Config::get('content.url_model');
	switch ($url_model) {
		case '1':
			$routes[] = ['channel/:id','content/index/channel','GET|POST',[],[]];
			$routes[] = ['detail/:id','content/index/detail','GET|POST',[],[]];
			$routes[] = ['detail/:filename','content/index/detail','GET|POST',[],[]];
			break;
		case '2':
			$channels = \think\Db::name('content_channel')->column(true, 'id');
			app_content_route($channels,$routes);
			break;
		
		default:
			# code...
			break;
	}
	return $routes;
}

function app_content_route($channels, &$routes, $pid = 0, $path = []){
	foreach ($channels as $key => $channel) {
	    if ($channel['pid'] == $pid) {
	        $tpath = array_merge($path, [$channel['name']]);
	        app_content_route($channels, $routes, $channel['id'], $tpath);
	        if ($tpath) {
	            $routes[] = [implode('/', $tpath) . '$', 'content/index/channel?id=' . $channel['id'], 'GET|POST', [], []];
	            $routes[] = [implode('/', $tpath) . '/:id$', 'content/index/detail?channel_id=' . $channel['id'], 'GET|POST', [], []];
	            $routes[] = [implode('/', $tpath) . '/:filename$', 'content/index/detail?channel_id=' . $channel['id'], 'GET|POST', [], []];
	        }
	    }
	}
}