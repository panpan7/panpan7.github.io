<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 超级全局变量
echo "以下是从地址栏传递的全局变量：";
print_r($_GET);
echo "<br />";
echo "以下是使用POST传递的全局变量：";
print_r($_POST);
echo "<br />";
echo "以下是使用REQUST传递的全局变量：";
print_r($_REQUEST);
// 当$_GET和$_POST变量冲突时，可在PHP.ini中设置两者的优先级别；
?>