<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-06-08
//许可协议 : CC0（公有领域）
//
//	登录小豆聊天机器人页面版
//
//
// 初始化cURL
$ch = curl_init();

// 设置登录信息，字段从登录页面中获取
$post_fields['chat'] = 'hi';

$cookie_file = tempnam(sys_get_temp_dir(), "cookies");

// 模拟登录
// 设置cURL配置项
// CURLOPT_HEADER TRUE to include the header in the output
curl_setopt($ch, CURLOPT_URL, 'http://xiao.douqq.com/bot/chat.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// TRUE to do a regular HTTP POST. This POST is the normal application/x-www-form-urlencoded kind, most commonly used by HTML forms.
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
$data = curl_exec($ch);

var_dump($data);



//PHP脚本到此结束

// curl 'http://xiao.douqq.com/bot/chat.php' -H 'Host: xiao.douqq.com' -H 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8' -H 'Accept-Language: zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3' -H 'Accept-Encoding: gzip, deflate' -H 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8' -H 'Referer: http://xiao.douqq.com/' -H 'Cookie: botconvoid=2fa3vj98p5loju3p42irvtjds1; BAEID=0FA4ECF7CB198B2036D93F83FFD27DCF:FG=1' --data 'chat=hi'