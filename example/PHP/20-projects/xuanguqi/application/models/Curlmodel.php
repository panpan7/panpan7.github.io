<?php
/**
 * 股票数据模型
 */
class Curlmodel extends CI_model{

	// 模型演示方法
	public function hello()	{
		return '这是从模型中返回的数据';
	}

	/**
	 * [getCookie 获取指定地址的cookie]
	 *
	 * @param [type]  $url [description]
	 * @return [type]      [description]
	 */
	public function getCookie( $url = '' ) {
		// 指定cookie文件存放地址
		$cookie_file = tempnam( sys_get_temp_dir(), "cookies" );
		$ch = curl_init( $url ); //初始化
		curl_setopt( $ch, CURLOPT_HEADER, 0 ); //不返回header部分
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); //返回字符串，而非直接输出
		curl_setopt( $ch, CURLOPT_COOKIEJAR,  $cookie_file ); //存储cookies到指定的临时文件中
		curl_exec( $ch );
		curl_close( $ch );
		return $cookie_file;
	}

	/**
	 * 获取指定地址的网页内容
	 *
	 * @param string  $url [description]
	 * @return [type]      [description]
	 */
	public function curl( $url='', $cookie_file='' ) {
		// 初始化curl类
		$ch = curl_init();
		// 设置网页地址
		curl_setopt( $ch, CURLOPT_URL, $url );
		// 设定curl不返回头信息
		curl_setopt( $ch, CURLOPT_HEADER, 0 );
		// 设定curl不在网页中直接显示抓取内容
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		// 携带cookie访问指定页面
		curl_setopt( $ch, CURLOPT_COOKIEFILE, $cookie_file );
		// 执行抓取
		$content = curl_exec( $ch );
		// 关闭curl资源
		curl_close( $ch );
		return $content;
	}


}
