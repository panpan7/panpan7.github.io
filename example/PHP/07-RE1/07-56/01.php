<?php
function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}


// $pattern = "/\d?/";
// $str = 'xibeImu c 111 udnddnd
// ndndd$%%%^^^	$@xibeimu    ';
// outputRe($pattern, $str);

// $pattern = "/\d/";
// $str = 'xibeImu ddffgfg133  udnndndndd$%%%^^^$@xibeimu    ';
// outputRe($pattern, $str);

// // $pattern = "/\D/";
// // $str = 'xibeImu ddffgf33
// //   udnddndndndd$%%%^^^$@xibeimu    ';
// // outputRe($pattern, $str);

// $pattern = "/\d./";
// $str = 'xibeI3mu ddffgfg133  udnndndnd%%%^^^$@xibeimu    ';
// outputRe($pattern, $str);

// $pattern = "/[2468]/";
// $str = 'xib2eI3mu ddffgfg133  udn46ndnd%%%^^^$@xibeimu    ';
// outputRe($pattern, $str);

// $pattern = "/[^2468]/";
// $str = 'xib2eI3mu ddffgfg133  udn46ndnd%%%^^^$@xibeimu    ';
// outputRe($pattern, $str);

// // $pattern = "/3?/";
// // $str = 'xib2eI3mu ddffgfg133  udn46ndnd%%%^^^$@xibeimu    ';
// // outputRe($pattern, $str);

// // ? 量词，表示 0 次或 1 次匹配
// $pattern = '/thi?s/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

    $pattern = '/\s+$|^\s+/';
$string  = '      Fire        fox chr(ascii)ome 11123. This
	 internet explorer 	Color colour GGGGoaaaaaa. aaaaaaal       ';
outputRe($pattern, $string);

// $pattern = '/thi+s/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/thi{2,4}s/';
// $string  = '12^dthsthiiiiiisff+ this is 123456789^dthiiisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/^this/';
// $string  = 'this 12^dthsthisiiiiisffjjd this<>?/';
// outputRe($pattern, $string);

// $pattern = '/^this\s*$/';
// $string  = 'this 12^dthsthisiiiiisffjjd this        ';
// outputRe($pattern, $string);

// $pattern = '/org|com|net|me|cn|hk|jp/';
// $string  = 'th  g.com f.org is 12^dthsfjjd th  yangzh.cn   ';
// outputRe($pattern, $string);

// $pattern = '/.(org|com|net|me|cn|hk|jp)/';
// $string  = 'th  g.com f.org is 12^dthsfjjd th  yangzh.cn   ';
// outputRe($pattern, $string);
?>
