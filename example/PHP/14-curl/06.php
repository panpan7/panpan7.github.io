<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-06-08
//许可协议 : CC0（公有领域）

/**
 * 过滤脏话功能
 */

function funny()
	{
		$data = array(
			'等等，我接个电话，奥巴马打过来的。',
			'我想想再说',
			);
		$rand_keys = array_rand($data);
		// var_dump($rand_keys);
		return $data[$rand_keys];
	}

	// echo funny();

	function check($data = '')
	{
		// 进行过滤，避免脏话
		$blacklist = array(
			'他妈的',
			'妈的',
			'操',
			'艹',
			'肏逼',
			'肏',
			'屎',
			'屁',
			'睡美女',
			'日',
			'猪',
			);
		foreach ($blacklist as $value) {			
			$pattern = '/' . $value . '/';
			// var_dump($pattern);
			$data = 'woaini ';
			// 执行正则匹配
			if(preg_match($pattern, $data, $matched)){
					echo $data , '有脏话！';
					return false;
				} 
			}
			return true;
		}

	var_dump(check());

//PHP脚本到此结束