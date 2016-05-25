<?php
// 防止用户通过路径名称直接访问，以增强安全性
defined('BASEPATH') OR exit('No direct script access allowed');

class Getdata extends CI_Controller {

	public function index($value='') {
		echo '这是新建的另外一个控制器（名称是Getdata）的index方法。';

		// 初始化cURL资源
			$ch = curl_init();

			// 设置URL和相应的选项
			curl_setopt($ch, CURLOPT_URL, "http://xueqiu.com/stock/cata/stocklist.json?page=1&size=30&order=desc&orderby=percent&type=11%2C12&_=1428479050576");
			// CURLOPT_HEADER 的值为0时，不显示页面的头部信息，为1时，显示页面头部信息
			curl_setopt($ch, CURLOPT_HEADER, 0);
			// CURLOPT_RETURNTRANSFER 参数用来设置是否在页面中显示抓取页面
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			// 抓取URL并把它传递给浏览器
			$data = curl_exec($ch);

			var_dump($data);

			// 关闭cURL资源，并且释放系统资源
			curl_close($ch);

	}

}


// curl 'http://xueqiu.com/stock/cata/stocklist.json?page=1&size=30&order=desc&orderby=percent&type=11%2C12&_=1428479050576' -H 'Accept: application/json, text/javascript, */*; q=0.01' -H 'Accept-Encoding: gzip, deflate' -H 'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3' -H 'Cache-Control: no-cache' -H 'Connection: keep-alive' -H 'Cookie: Hm_lvt_1db88642e346389874251b5a1eded6e3=1427076430,1427112938,1427595906,1428402468; __utma=1.2135691758.1422600501.1428402468.1428477485.44; __utmz=1.1422600501.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); bid=bd39d8ab80179eac20de515b884ecd5a_i5lt1x5a; xq_a_token=43c1e7b85a80aa984bbf22af46e7ebca85cd097b; xq_r_token=64dd97a74d087fb51d3090c0a5a2be10123a1471; xq_token_expire=Sat%20May%2002%202015%2018%3A27%3A51%20GMT%2B0800%20(CST); xq_is_login=1; __utmc=1; Hm_lpvt_1db88642e346389874251b5a1eded6e3=1428479050; snbim_minify=true; __utmb=1.5.10.1428477485; __utmt=1' -H 'DNT: 1' -H 'Host: xueqiu.com' -H 'Referer: http://xueqiu.com/hq' -H 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0' -H 'X-Requested-With: XMLHttpRequest'
