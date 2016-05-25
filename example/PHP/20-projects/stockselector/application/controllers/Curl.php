<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curl extends MY_Controller {

	public function index($value='')
	{
		$this->load->model('Stock');
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

	public function getFromSinaByCode($code = '002142')
	{
		$url = 'http://money.finance.sina.com.cn/corp/go.php/vMS_MarketHistory/stockid/' . $code .'.phtml';
		$string = $this->curl($url);


		// 接下来我们应该使用正则表达式去匹配新浪网的局部内容
/*
<tr >
			<td><div align="center">
					<a target='_blank' href='http://vip.stock.finance.sina.com.cn/quotes_service/view/vMS_tradehistory.php?symbol=sz002142&date=2015-05-26'>
			2015-05-26			</a>
						</div></td>
			<td><div align="center">20.040</div></td>
			<td><div align="center">20.190</div></td>
			<td><div align="center">19.850</div></td>
			<td class="tdr"><div align="center">19.480</div></td>
			<td class="tdr"><div align="center">90089984</div></td>
			<td class="tdr"><div align="center">1777453312</div></td>
		  </tr>
*/
		$data = iconv( "gb2312", "UTF-8", $string );
		// var_dump($data);
		 // 设置正则表达式
		$pattern = '/<td class="ct">上市日期：<\/td>.*?<a.*?>(?<inMarketDate>.*?)<\/a><\/td>.*?<\/tr>.*?<tr>.*?<td class="ct">发行价格：<\/td>/s';
		$pattern = "/<a target='_blank' href='http:\/\/vip.stock.finance.sina.com.cn\/quotes_service\/view\/vMS_tradehistory.php?.*?>.*?(?<dealDate>\d{4}-\d{2}-\d{2}).*?<\/a>.*?<td><div align=\"center\">(?<kpj>.*?)<\/div><\/td>.*?<td><div align=\"center\">(?<zgj>.*?)<\/div><\/td>.*?<td><div align=\"center\">(?<spj>.*?)<\/div><\/td>.*?<div align=\"center\">(?<zdj>.*?)<\/div><\/td>.*?<div align=\"center\">(?<jyl>.*?)<\/div><\/td>.*?<div align=\"center\">(?<jyje>.*?)<\/div><\/td>/s";
		if ( preg_match_all( $pattern, $data, $matched ) ) {
			var_dump($matched['dealDate'],$matched['spj']);
		} else {
			var_dump(false);
		}
	}

	public function creatTable($code = '002142')
	{
		$this->load->model( 'Stock' );
		$this->load->model('Historydata');
		$this->Historydata->creatTableByCode($code);
	}
}
