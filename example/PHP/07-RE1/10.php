<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-19
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 网页截取类
class HtmlContentTrim {
	private $data    = '';
	private $url     = '';
	private $pattern = '';
	private $matched = '';

	function __construct($url, $pattern) {
		// 初始化
		$this->url     = $url;
		$this->pattern = $pattern;
		// 打开网页
		$fp = fopen($this->url, 'r');
		// 读取网页内容
		while(!feof($fp)) { 
		$this->data .= fgets($fp, 1024); 
		}
		// 关闭资源
		fclose($fp);
		$this->getContent();

		// todo：以后增加错误处理功能


	}

	private function getContent(){
		if (preg_match_all($this->pattern, $this->data, $matched)) {
			$this->matched = $matched;
		  } else {
		  	return false;
		  }
	}

	function getMatchedHtml(){
		return $this->matched[0][0];
	}

} 

$pattern = '/<div class="biaoti">通知公告<\/div>.*<div class="biaoti">科研项目<\/div>/s';
$htmlstr = new HtmlContentTrim('http://dwzy.xbmu.edu.cn/skc/', $pattern);

require '../include/simple_html_dom.php';

// 借助simple_html_dom解析html内容
$html = new simple_html_dom($htmlstr->getMatchedHtml());

// 释放网页对象，减少内存占用
unset($htmlstr);

// 重新输出指定内容
foreach($html->find('a') as $element) {
	echo "<a href=http://dwzy.xbmu.edu.cn" . $element->href . ">" . $element->plaintext . "</a><br />";
}

$url = 'http://opendata.baidu.com/zhaopin/s?p=mini&wd=%D0%C2%CE%C5+%CA%B5%CF%B0&rn=20&type=1&sort_key=5&sort_type=1';
$pattern = '/<table id="job_table" border="0" align="center" cellpadding="0" cellspacing="0">.*<\/table>/s';

$htmlstr = new HtmlContentTrim($url, $pattern);

// 借助simple_html_dom解析html内容
$html = new simple_html_dom($htmlstr->getMatchedHtml());

// 释放网页对象，减少内存占用
unset($htmlstr);

// 重新输出指定内容
// a.job_title

foreach($html->find('td') as $element) {
	// echo "<a href=" . $element->href . ">" . iconv("GBK", "UTF-8", $element->plaintext) . "</a><br />";
	echo "<a href=" . $element->href . ">" . iconv("GBK", "UTF-8", $element->plaintext) . "</a><br />";
}
?>