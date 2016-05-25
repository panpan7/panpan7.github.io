<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 常量的声明、检测、特性、有效范围、动态常量

// 常量的声明


if(!defined('ADDRESS')) {
	define('ADDRESS', '甘肃省兰州市西北民族大学榆中校区四院部B10');
} 
echo ADDRESS;

// 有效范围：全局有效
function mailTo () {
	echo '你的货物将发送至：' . ADDRESS;
}
 mailTo();

// 动态获取常量值
$add = 'ADDRESS';
echo constant($add);
?>