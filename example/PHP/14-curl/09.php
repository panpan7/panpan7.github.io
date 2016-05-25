<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-06-11
//许可协议 : CC0（公有领域）

// 初始化cURL
$ch = curl_init();

// 设置登录信息，字段从登录页面中获取
$post_fields['chat'] = '经三路';
// $post_fields['lc'] = 'ch';
// $post_fields['req'] = '你好';

$cookie_file = tempnam(sys_get_temp_dir(), "cookies");

// curl 'http://www.simsimi.com/func/reqN?lc=ch&ft=0.0&req=%25E4%25BD%25A0%25E5%25A5%25BD' -H 'Host: www.simsimi.com' -H 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0' -H 'Accept: application/json, text/javascript, */*; q=0.01' -H 'Accept-Language: zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3' -H 'Accept-Encoding: gzip, deflate' -H 'Content-Type: application/json; charset=utf-8' -H 'X-Requested-With: XMLHttpRequest' -H 'Referer: http://www.simsimi.com/talk.htm' -H 'Cookie: selected_nc=ch; selected_nc=ch; Filtering=0.0; Filtering=0.0; __utma=119922954.1622684557.1402156684.1402156684.1402473022.2; __utmz=119922954.1402473022.2.2.utmcsr=baidu|utmccn=(organic)|utmcmd=organic|utmctr=simsimi; simsimi_uid=57172334; simsimi_uid=57172334; sid=s%3AiSAqCUlS0dA8yu83KnzVT1U8.1pn15LNSNlDrA%2Fz2r%2FseKtmN5aYAR1M44%2FtBp35%2BPZ8; __utmb=119922954.2.9.1402473028579; __utmc=119922954'
// curl 'http://xiao.douqq.com/bot/chat.php' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8' -H 'Accept-Encoding: gzip, deflate' -H 'Accept-Language: zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3' -H 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8' -H 'Cookie: botconvoid=2fa3vj98p5loju3p42irvtjds1; BAEID=E95FD7F05B03633BD1A203AAC5AFDEDF:FG=1' -H 'Host: xiao.douqq.com' -H 'Referer: http://xiao.douqq.com/' -H 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0' --data $'chat=\u897f\u5317\u6c11\u5927'
// 模拟登录
// 设置cURL配置项
// CURLOPT_HEADER TRUE to include the header in the output
curl_setopt($ch, CURLOPT_URL, 'http://xiao.douqq.com/bot/chat.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
$data = curl_exec($ch);

var_dump($data);
// // 获取登录成功后的页面
// $send_url = "http://localhost/php/13-framedsite/index.php/admin/index";
// $ch = curl_init($send_url);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


// // CURLOPT_COOKIEFILE	 The name of the file containing the cookie data. The cookie file can be in Netscape format, or just plain HTTP-style headers dumped into a file. If the name is an empty string, no cookies are loaded, but cookie handling is still enabled.
// curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
// $contents = curl_exec($ch);
// curl_close($ch);

// var_dump($contents);

// // 使用正则表达式，获取指定内容
// // 定义匹配规则
// $pattern = '/<td>CodeIgnite版本<\/td>.*?<td>(?<name>.*?)<\/td>/s';

// // 执行正则匹配
// preg_match_all($pattern, $contents, $matched);
// // 显示匹配结果
// var_dump($matched);

// echo $matched['name'][0];



//PHP脚本到此结束