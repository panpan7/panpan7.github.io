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

	/**
	 * 将空字符串转为为null，否则返回原字符串
	 * 以方便SQL插入、更新
	 */
	public function white2null($string)
	{
		if(empty( $string ))
			{
				return null;
			} else {
				return $string;
			}
	}

	/**
	 * 取得指定日期的现金流数据
	 */
	public function getCashData( $reportDate, $cashData )
	{
		// 取得数据对应的键名
		$jykey = array_search('经营现金流量净额', $cashData['title']);
		$tzkey = array_search('投资现金流量净额', $cashData['title']);
		$czkey = array_search('筹资现金流量净额', $cashData['title']);

		$key = array_search($reportDate, $cashData['report'][0]);
		// 此函数可能返回布尔值 FALSE，但也可能返回等同于 FALSE 的非布尔值。请阅读 布尔类型章节以获取更多信息。应使用 === 运算符来测试此函数的返回值。
		if($key !== false)
		{
			$info['jyxjllje'] = $this->white2null($cashData['report'][$jykey][$key]);
			$info['tzxjllje'] = $this->white2null($cashData['report'][$tzkey][$key]);
			$info['czxjllje'] = $this->white2null($cashData['report'][$czkey][$key]);
			return $info;
		}
		else
		{
			$info['jyxjllje'] = null;
			$info['tzxjllje'] = null;
			$info['czxjllje'] = null;
			return $info;
		}
	}
}
