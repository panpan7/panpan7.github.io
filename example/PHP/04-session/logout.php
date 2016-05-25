<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-29
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//推出登录

//会话开始
session_start();

//销毁对话
session_destroy();

//返回首页
header("Location: index.php");
?>