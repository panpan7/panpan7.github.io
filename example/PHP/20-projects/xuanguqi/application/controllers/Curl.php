<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curl extends CI_Controller {
	/**
	 * 构造方法
	 */
	public function __construct() {
		// 继承父类构造方法
		parent::__construct();
		// 装载相关数据模型
		$this->load->model( 'HistoryModel' );

	}


	public function index($value='')
	{
		echo '这是一个控制器';
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

	public function getHistoryDataByCode($code = '002142')
	{
		$url = 'http://money.finance.sina.com.cn/corp/go.php/vMS_MarketHistory/stockid/002142.phtml';
		$data = $this->curl($url ,'');
		$data = iconv("GB2312", "UTF-8", $data);
		// 使用正则表达式匹配特定内容
		/*
		 <tr >
			<td><div align="center">
					<a target='_blank' href='http://vip.stock.finance.sina.com.cn/quotes_service/view/vMS_tradehistory.php?symbol=sz002142&date=2015-05-27'>
			2015-05-27			</a>
						</div></td>
			<td><div align="center">19.860</div></td>
			<td><div align="center">19.950</div></td>
			<td><div align="center">19.640</div></td>
			<td class="tdr"><div align="center">19.490</div></td>
			<td class="tdr"><div align="center">75411904</div></td>
			<td class="tdr"><div align="center">1485077504</div></td>
		  </tr>
		 */
		$pattern = "/<a target='_blank'.*?(?<dealDate>\d{4}-\d{2}-\d{2}).*?(?<kpj>\d*\.\d*).*?(?<zgj>\d*\.\d*).*?(?<spj>\d*\.\d*).*?(?<zdj>\d*\.\d*).*?<div align=\"center\">(?<jyl>\d*)<\/div>.*?(?<jyje>\d*)<\/div>/s";
		if ( preg_match_all( $pattern, $data, $matched ) ) {
			var_dump($matched);
		} else {
			var_dump(false);
		}
	}


public function creat($value='')
{
	$this->load->model('HistoryModel');
	$this->HistoryModel->creatHistoryTableById('600006');
	// var_dump($this->HistoryModel->test());

}

}
