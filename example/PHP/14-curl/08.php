<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-06-11
//许可协议 : CC0（公有领域）

/**
 * 关键词过滤识别
 */

// 定义关键词
// 
$keywords = array(
	'校车',
	'校历',
	'女神',
	'校花',
	'白富美',
	'美女',
	'高富帅',
	'校草',
	'男神',
	'帅哥',
	'电话',
	'图书馆',
	'外卖',
	'饿',
	'饿',
	'微社区',
	'洗浴中心',
	'圈存机',
	'火车票',
	'机票',
	'飞机票',
	'电影',
	'test',
	'help',
	'帮助',
	'?',
	'？',
);

function check_keywords($input_text, $keywords)
{
	foreach ($keywords as $key => $value) {			
			$pattern = '/' . $value . '/';
			// var_dump($pattern);
			// 执行正则匹配
			if(preg_match($pattern, $input_text, $matched)){
					return $value;
				} 
		}
	return $input_text;
}

echo check_keywords('好饿啊', $keywords);
		
    



//PHP脚本到此结束