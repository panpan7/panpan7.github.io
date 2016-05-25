<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-04-25
//许可协议 : CC0（公有领域）

// 抽取a元素内容

function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

$pattern = '/<a\s*href="(.*?)".*?>(.*?)<\/a>/s';
$string  = ' <div class="list3">
<ul> <li><span style="float:left;"><img src="style/images/a.jpg" style="margin-right:10px;" /><a href="/skc/contents/9/526.html" target="_blank">关于召开中央高校基本科研业务费专项资金项目（社会科学类）主持人会议的通知</a></span><span style="float:right;">2014-04-16</span></li><div class="clearfloat"></div><li><span style="float:left;"><img src="style/images/a.jpg" style="margin-right:10px;" /><a href="/skc/contents/9/525.html" target="_blank">关于转发《关于推动中国梦理论研究的通知》的通知</a></span><span style="float:right;">2014-04-10</span></li>';
outputRe($pattern, $string);
?>
