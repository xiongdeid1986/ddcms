<?php 

// 检查权限
function auth($auth,$x){
	if (is_login()) {
		$authid = user('grade') . '_' . $x;
	}else{
		$authid = 0 . '_' . $x;
	}
	if (!is_array($auth)) {
		if (is_object($auth)) {
			$auth = explode(',',$auth['auth']);
		}else{
			if (!$forum = \app\forum\model\Forum::get($auth)) {
				return false;
			}
			$auth = explode(',',$forum['auth']);
		}
	}
	if (in_array($authid, $auth)) {
		return true;
	}
	return false;
}

function moderator_auth($forum_id,$auth=null){
	static $auths;
	if (!$user_id = \think\Session::get('user_id')) {
	    return false;
	}
	if (!$auths) {
		$moderators = \think\Db::name('forum_moderator') -> select();
		foreach ($moderators as $key => $value) {
			$auths[$value['forum_id']][$value['user_id']]=json_decode($value['auth'],true);
		}
	}
	if (isset($auths[$forum_id][$user_id])) {
		if ($auth===null) {
			return true;
		}
		if (in_array($auth, $auths[$forum_id][$user_id])) {
			return true;
		}
	}
	return false;
}

function is_me($uid){
	if ($uid && $uid == \think\Session::get('user_id')) {
		return true;
	}
	return false;
}

// 检测敏感词
function check_badwords($str){
	$badwords = \ebcms\Config::get('forum.badwords');
	$badwords = array_keys($badwords);
	foreach($badwords as $word){
		if(strstr($str,$word)!=''){
			return true;
		}
	}
	return false;
}
// 处理敏感词
function replace_badwords($str){
	$badwords = \ebcms\Config::get('forum.badwords');
	return str_replace(array_keys($badwords), array_values($badwords), $str);
}
// 安全过滤
function safe_html($html){
	$elements = [
		'html'      =>  [],
		'body'      =>  [],
		'a'         =>  ['target', 'href', 'title', 'class', 'style'],
		'abbr'      =>  ['title', 'class', 'style'],
		'address'   =>  ['class', 'style'],
		'area'      =>  ['shape', 'coords', 'href', 'alt'],
		'article'   =>  [],
		'aside'     =>  [],
		'audio'     =>  ['autoplay', 'controls', 'loop', 'preload', 'src', 'class', 'style'],
		'b'         =>  ['class', 'style'],
		'bdi'       =>  ['dir'],
		'bdo'       =>  ['dir'],
		'big'       =>  [],
		'blockquote'=>  ['cite', 'class', 'style'],
		'br'        =>  [],
		'caption'   =>  ['class', 'style'],
		'center'    =>  [],
		'cite'      =>  [],
		'code'      =>  ['class', 'style'],
		'col'       =>  ['align', 'valign', 'span', 'width', 'class', 'style'],
		'colgroup'  =>  ['align', 'valign', 'span', 'width', 'class', 'style'],
		'dd'        =>  ['class', 'style'],
		'del'       =>  ['datetime'],
		'details'   =>  ['open'],
		'div'       =>  ['class', 'style'],
		'dl'        =>  ['class', 'style'],
		'dt'        =>  ['class', 'style'],
		'em'        =>  ['class', 'style'],
		'font'      =>  ['color', 'size', 'face'],
		'footer'    =>  [],
		'h1'        =>  ['class', 'style'],
		'h2'        =>  ['class', 'style'],
		'h3'        =>  ['class', 'style'],
		'h4'        =>  ['class', 'style'],
		'h5'        =>  ['class', 'style'],
		'h6'        =>  ['class', 'style'],
		'header'    =>  [],
		'hr'        =>  [],
		'i'         =>  ['class', 'style'],
		'img'       =>  ['src', 'alt', 'title', 'width', 'height', 'id', 'class'],
		'ins'       =>  ['datetime'],
		'li'        =>  ['class', 'style'],
		'mark'      =>  [],
		'nav'       =>  [],
		'ol'        =>  ['class', 'style'],
		'p'         =>  ['class', 'style'],
		'pre'       =>  ['class', 'style'],
		's'         =>  [],
		'section'   =>  [],
		'small'     =>  [],
		'span'      =>  ['class', 'style'],
		'sub'       =>  ['class', 'style'],
		'sup'       =>  ['class', 'style'],
		'strong'    =>  ['class', 'style'],
		'table'     =>  ['width', 'border', 'align', 'valign', 'class', 'style'],
		'tbody'     =>  ['align', 'valign', 'class', 'style'],
		'td'        =>  ['width', 'rowspan', 'colspan', 'align', 'valign', 'class', 'style'],
		'tfoot'     =>  ['align', 'valign', 'class', 'style'],
		'th'        =>  ['width', 'rowspan', 'colspan', 'align', 'valign', 'class', 'style'],
		'thead'     =>  ['align', 'valign', 'class', 'style'],
		'tr'        =>  ['rowspan', 'align', 'valign', 'class', 'style'],
		'tt'        =>  [],
		'u'         =>  [],
		'ul'        =>  ['class', 'style'],
		'video'     =>  ['autoplay', 'controls', 'loop', 'preload', 'src', 'height', 'width', 'class', 'style'],
		'embed'     =>  ['src', 'height','align', 'width', 'class', 'style','type','pluginspage','wmode','play','loop','menu','allowscriptaccess','allowfullscreen'],
		'source'    =>  ['src', 'type']
	];
	$html = strip_tags($html,'<'.implode('><', array_keys($elements)).'>');
	$xml = new \DOMDocument();
	libxml_use_internal_errors(true);
	if (!strlen($html)){
		return '';
	}
	if ($xml->loadHTML('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . $html)){
		foreach ($xml->getElementsByTagName("*") as $element){
			if (!isset($elements[$element->tagName])){
				$element->parentNode->removeChild($element);
			}else{
				for ($k = $element->attributes->length - 1; $k >= 0; --$k) {
					if (!in_array($element->attributes->item($k) -> nodeName, $elements[$element->tagName])){
						$element->removeAttributeNode($element->attributes->item($k));
					}elseif (in_array($element->attributes->item($k) -> nodeName, ['href','src','style','background','size'])) {
						$_keywords = ['javascript:','javascript.:','vbscript:','vbscript.:',':expression'];
						$find = false;
						foreach ($_keywords as $a => $b) {
							if (false !== strpos(strtolower($element->attributes->item($k)->nodeValue),$b)) {
								$find = true;
							}
						}
						if ($find) {
							$element->removeAttributeNode($element->attributes->item($k));
						}
					}
				}
			}
		}
	}
	$html = substr($xml->saveHTML($xml->documentElement), 12, -14);
	$html = strip_tags($html,'<'.implode('><', array_keys($elements)).'>');
	return $html;
}

function str2br($str,$is_edit=null){
	if (is_null($is_edit)) {
		$is_edit = input('is_edit',0,'intval')?1:0;
	}
	if (!$is_edit) {
		return nl2br(htmlspecialchars($str));
	}
	return $str;
}

// @用户
function atuser($str,$end_str='',$start_str=''){
    $preg='/@([\S+]{1,30})(\s|$)/';
    $str = strip_tags($str);
    if (preg_match_all($preg, $str, $matchs)){
        $users = \think\Db::name('user') -> where(['nickname'=>['in',$matchs[1]]]) -> select();
        $msg = [];
        foreach ($users as $key => $user) {
            $msg[] = [
                'user_id'       =>  $user['id'],
                'topic'         =>  '消息提醒',
                'title'         =>  '有人@你',
                'content'       =>  $start_str . $str . $end_str,
                'create_time'   =>  time(),
                'update_time'   =>  time(),
                'sort'          =>  0,
                'status'        =>  1,
                'isread'        =>  0,
            ];
        }
        \think\Db::name('user_message')->insertAll($msg);
    }
}