<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-06-08
//许可协议 : CC0（公有领域）
//
//使用curl获取指定网址的内容

// 初始化cURL
$ch = curl_init("http://www.sina.com.cn/");
// var_dump($ch);
// 设置cURL配置项
// CURLOPT_HEADER TRUE to include the header in the output
curl_setopt($ch, CURLOPT_HEADER, 0);

// CURLOPT_RETURNTRANSFER TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// 执行crul，并将返回的结果保存到变量$data中。
$data = curl_exec($ch);
var_dump($data);

// 将字符串写入文件
$fr = fopen("test.html", 'wr');
fwrite($fr, $data);
fclose($fr);

// 关闭curl资源
curl_close($ch);

//PHP脚本到此结束