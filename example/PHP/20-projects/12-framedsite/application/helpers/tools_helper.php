<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-21
//许可协议 : CC0（公有领域）
//
//CI中的自定义函数，存放在application目录下的helpers目录中。文件名为xxx_helper.php
//

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * [p 更友好的打印函数]
 * @param  [type] $in [数组或字符串]
 * @return [type]     [description]
 */
function p($in){
	echo "<pre>";
	print_r($in);
	echo  "</pre>";
}

/**
 * [utf8 设置]
 * @return [type] [description]
 */
function utf8(){
	header("Content-type:text/html;charset=utf-8");
}

/**
 * [success 显示信息，并跳转到指定指定位置（控制器/方法）]
 * @param  [type] $url [控制器/方法]
 * @param  [type] $msg [提示信息]
 * @return [type]      [description]
 */
function success($url,$msg){
	utf8();
	$url = site_url($url);
	echo "<script type='text/javascript'>alert('$msg');location.href='$url';</script>";
	exit();
}
?>