<?php

namespace app\middleware;

class AuthMiddleware
{
    public function handle($request, \Closure $next)
    {
    }
    /**
	 * 用户访问日志
	 */
	public static function userAccessLog(Request $request) {
		$get = json_encode($_GET) . '';
		$post = json_encode($_POST) . '';
		if(strlen($get) > 2048) {
			$get = substr($get, 0, 2048);
		}
		if(strlen($post) > 2048) {
			$post = substr($post, 0, 2048);
		}
		
		$data = [];
		$data['user_id'] = intval($userInfo['id']);
		$data['function_group_id'] = intval($functionInfo['group_id']);
		$data['function_id'] = intval($functionInfo['id']);
		$data['url'] = self::$curr_path;
		$data['get'] = $get;
		$data['post'] = $post;
		$data['server_info'] = self::getServerInfo();
		return $data;
	}
	
	/**
	 * 获取服务器信息
	 * @return type
	 */
	private static function getServerInfo() {
		$ip = \Org\Net\Ip::get();
		if(isset($_SERVER['SERVER_ADDR'])) {
			$SERVER_ADDR = isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '';
			$HTTP_REFERER = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
			$REQUEST_URI = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
			$SERVER_NAME = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '';
			$serverInfo = 'serverip:' . $SERVER_ADDR . ';referer:' . $HTTP_REFERER . ';uri:' . $SERVER_NAME . ',' . $REQUEST_URI;
		} else {
			$serverInfo = 'user:' . $_SERVER['USER'] . ';home:' . $_SERVER['HOME'] . ';pwd:' . $_SERVER['PWD'] . ';script_filename:' . $_SERVER['SCRIPT_FILENAME'];
		}
		return 'ip:' . $ip . ';' . $serverInfo;
	}
}
