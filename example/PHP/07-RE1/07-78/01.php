<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：
//采用知识共享“署名 3.0 中国大陆”许可协议授权

function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}


// $pattern = "/minda/";
// $str = 'minda dfsdjlfjsaljfmiiiindasdljflsajminda^^%$##(99';
// outputRe($pattern, $str);

// $pattern = "|minda|";
// $str = 'minda dfsdjlfjsaljfmiiiindasdljflsajminda^^%$##(99';
// outputRe($pattern, $str);

// $pattern = "!minda!";
// $str = 'minda dfsdjlfjsaljfmiiiindasdljflsajminda^^%$##(99';
// outputRe($pattern, $str);

// $pattern = "/\r\n/";
// $str = 'minda dfsdjlfjs
// aljfmiiiindasdljflsajmi	nda^^%$##(99';
// outputRe($pattern, $str);

// $pattern = "/\t/";
// $str = 'minda dfsdjlfjsaljfiiindasdljflsajmi	nda^^%$##(99';
// outputRe($pattern, $str);

// $pattern = "/\s\S/";
// $str = 'minda dfsdjlfjsaljfiiind
// asdljflsajmi	nda^^%$##(99';
// outputRe($pattern, $str);

// $pattern = "/\d/";
// $str = 'minda dfsdjlfjsaljfiiindsdljflsajmi	nda^^%$##(99';
// outputRe($pattern, $str);

// $pattern = "/.\d./";
// $str = 'minda dfsdjlfj2saljfiiin444dsdlsajmi	nda^^%$##(99';
// outputRe($pattern, $str);

$pattern = "/[^2468]\d/";
$str = 'minda dfsdjlfj2saljfiiin4454dsdlsajmi	nda^^%$##(99';
outputRe($pattern, $str);

// $pattern = "/[2468]?/";
// $str = 'minda dfsdjlfj2saljfiiin4454dsdlsajmi	nda^^%$##(99';
// outputRe($pattern, $str);

// $pattern = "/thi?s/";
// $str = 'minda dfsthisdjlfj2saljfths4dsdlsajmi	nda^^%$##(99';
// outputRe($pattern, $str);

// $pattern = "/\w+/";
// $str = 'minda d西北fsthisdjlfj2salthis          ';
// outputRe($pattern, $str);

// $pattern = "/\w+/";
// $str = 'minda 999 dfsthisdjlfj2salthis        dfd   ';
// outputRe($pattern, $str);

// $pattern = "/[a-zA-Z]+/";
// $str = 'minNda 999 dfsthisdjlfj2salthis        dfd   ';
// outputRe($pattern, $str);

// $pattern = "/\d{3,7}/";
// $str = 'minNda 999 dfsth55355isdjlfj2salthis        dfd   ';
// outputRe($pattern, $str);

// $pattern = "/^[,，.。]/";
// $str = '.minNda 999 dfsth55355isdjlfj2salthis        dfd   ';
// outputRe($pattern, $str);


$pattern = "/[ ]+$/";
$str = '.minNda 999 dfsth55355isdjlfj2salthis        dfd   ';
outputRe($pattern, $str);

$pattern = "/^[ ]+|[ ]+$/";
$str = '      minNda 999 dfsth55355isdjlfj2salthis        dfd   ';
outputRe($pattern, $str);
?>