<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-06-08
//许可协议 : CC0（公有领域）

// 初始化cURL
$ch = curl_init();

// 设置登录信息，字段从登录页面中获取
$post_fields['email'] = '44@44.com';
$post_fields['password'] = 'Win222';
// 设置cURL配置项
// CURLOPT_HEADER TRUE to include the header in the output
curl_setopt($ch, CURLOPT_URL, 'http://localhost/php/13-framedsite/index.php/user/login');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
// TRUE to do a regular HTTP POST. This POST is the normal application/x-www-form-urlencoded kind, most commonly used by HTML forms.
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
$data = curl_exec($ch);

var_dump($data);
$fr = fopen("test.html", 'wr');
fwrite($fr, $data);
fclose($fr);
curl_close($ch);
//PHP脚本到此结束