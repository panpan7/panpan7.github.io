<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

function duration($start , $end) {
	return $end - $start;
}
$end = microtimeFloat();
$durationtime = duration($start , $end);
?>
<div id="foot">
	<p><span>西北民族大学公共选修课《PHP网站开发》</span><span>程序运行时间：<?php echo round($durationtime , 4);?>秒</span></p>
</div>		
	</body>
</html>