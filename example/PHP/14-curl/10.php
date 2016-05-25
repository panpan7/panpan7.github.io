<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-06-11
//许可协议 : CC0（公有领域）

// 初始化cURL
// $ch = curl_init();
// $input = '世界杯';
// $string = "?wd=$input&oe=utf-8&ie=utf-8&rn=20";
// $url = 'http://opendata.baidu.com/weibo/' . $string;
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $data = curl_exec($ch);
// $pattern = '/<p class="wa-weibo-content">(?<name>.*?)<\/p>/s';
// // // 执行正则匹配
// preg_match_all($pattern, $data, $matched);
// // var_dump($matched);
// // echo $matched['name'][array_rand($matched['name'])];

// $string = $matched['name'][array_rand($matched['name'])];
// $pattern = '/<em>(.*?)<\/em>/s';
// $replacement = '${1}';
// echo preg_replace($pattern, $replacement, $string);

function get_from_baidu($input) {
	// 初始化curl类
	$ch = curl_init();
	// 百度微博搜索get变量
	$string = "?wd=$input&oe=utf-8&ie=utf-8&rn=20";
	// 百度微博搜索完整地址
	$url = 'http://opendata.baidu.com/weibo/' . $string;
	// 设定curl搜索地址
	curl_setopt($ch, CURLOPT_URL, $url);
	// 设定curl不返回头信息
	curl_setopt($ch, CURLOPT_HEADER, 0);
	// 设定curl不在网页中直接显示抓取内容
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// 设定正则匹配表达式
	$pattern = '/<p class="wa-weibo-content">(?<name>.*?)<\/p>/s';
	// 执行正则表达式
	if( preg_match_all($pattern, curl_exec($ch), $matched)) {
		// 随机返回一条匹配到的结果
		$string = $matched['name'][array_rand($matched['name'])];
		if(check($string)) {
			return '有不文明词语';
		}
		// 设定剔除em标记的表达式
		$pattern = '/<em>(.*?)<\/em>/s';
		// 设定剔除em标记的表达式
		$replacement = '${1}';
		$string = preg_replace($pattern, $replacement, $string);
		// 设置微博话题标记
		$pattern = '/#.*?#(.*?)/s';
		// 设定剔除#标记的表达式
		$replacement = '${1}';
		// 剔除#标记后返回
		return preg_replace($pattern, $replacement, $string);
	} else {
		// 如果没有抓取到结果，则返回false
		return FALSE;
	}
}

/**
	 * 检查是否包含指定的词语
	 * @param  string $data [description]
	 * @return [type]       [description]
	 */
	function check($data = '') {
		// 脏话库
		$blacklist = array(
			'他妈的',
			'妈的',
			'妈逼',
			'操',
			'艹',
			'肏逼',
			'肏',
			'屎',
			'吃屎',
			'屁',
			'睡美女',
			'猪',
			'傻叼',
			'你妈',
			'我日你',
			'大爷',
			'撸管',
			'傻逼',
			'老子',
			);
		foreach ($blacklist as $value) {			
			$pattern = '/' . $value . '/';
			// 执行正则匹配
			if(preg_match($pattern, $data, $matched)){
					return true;
				} 
		}
		return false;
	}

var_dump(get_from_baidu('我艹'));

//PHP脚本到此结束