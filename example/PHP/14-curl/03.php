<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-06-08
//许可协议 : CC0（公有领域）
//
//
//模拟登录，并跳转到指定页面
//
//

// 初始化cURL
$ch = curl_init();

// 设置登录信息，字段从登录页面中获取
$post_fields['email'] = '44@44.com';
$post_fields['password'] = 'Win222';

// 在临时文件夹创建一个存放cookie的临时文件
$cookie_file = tempnam(sys_get_temp_dir(), "cookies");

// 模拟登录
// 设置cURL配置项
// CURLOPT_HEADER TRUE to include the header in the output
curl_setopt($ch, CURLOPT_URL, 'http://localhost/php/13-framedsite/index.php/user/login');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// TRUE to do a regular HTTP POST. This POST is the normal application/x-www-form-urlencoded kind, most commonly used by HTML forms.
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
// 传递cookie信息到指定的网页
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
// 执行curl函数
$data = curl_exec($ch);

// 获取登录成功后的页面
$send_url = "http://localhost/php/13-framedsite/index.php/admin/index";
$ch = curl_init($send_url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
$contents = curl_exec($ch);
curl_close($ch);

var_dump($contents);




//PHP脚本到此结束