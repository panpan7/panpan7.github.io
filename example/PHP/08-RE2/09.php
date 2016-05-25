<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-04-25
//许可协议 : CC0（公有领域）

// 匹配指定td内容

function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

$pattern = '/<tr.*?>\s*<td.*?>\s*<a.*?href="(.*?)".*?>(.*?)<\/a>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>.*?<td>(.*?)<\/td>/s';
$string = '<tr src="若邻社交招聘网">
					<td id="0_td" class="title">
						<a name="job_title" class="job_title" id="0" style="position:static" href="http://www.wealink.com/zhiwei/view/13773719/?utm_source=baidu&utm_medium=open1&utm_campaign=opendate" target="_blank"><em>实习</em>岗位：<em>新闻</em>采编，新媒体运营，UI设计，前端开发，数据库营销等不同方向</a>
						<br>
						<span class="job_attr">学历:
												  不限
												</span>
						<span class="job_attr">经验:
												  不限
												</span>
						<span class="job_attr">薪酬:
												  1000-2000
												</span>
					</td>
					<td>杭州宽客信息技术有限公司</td>
					<td>浙江杭州</td>
					<td>2014-04-25</td>
					<td><a href="http://www.wealink.com/?utm_source=baidu&utm_medium=open2&utm_campaign=opendate" target="_blank" class="jobsite">若邻社交招聘网</a></td>
				</tr>

				<tr src="大街网">
					<td id="1_td" class="title">
						<a name="job_title" class="job_title" id="1" style="position:static" href="http://s.dajie.com/j/b4e00ad3-ece5-44b6-81b3-1747107f85a0.html" target="_blank"><em>实习</em>生（经管、<em>新闻</em>方向）</a>
						<br>
						<span class="job_attr">学历:
												  本科
												</span>
						<span class="job_attr">经验:
												  不限
												</span>
						<span class="job_attr">薪酬:
												  面议
												</span>
					</td>
					<td>广州唯品会信息科技有限公司</td>
					<td>广州</td>
					<td>2014-04-25</td>
					<td><a href="http://www.dajie.com" target="_blank" class="jobsite">大街网</a></td>
				</tr>

				<tr src="汇博人才网">
					<td id="2_td" class="title">
						<a name="job_title" class="job_title" id="2" style="position:static" href="http://www.huibo.com/zhaopin/zhiwei/jobfqmvwde.html" target="_blank">视频<em>新闻实习</em>生</a>
						<br>
						<span class="job_attr">学历:
												  不限
												</span>
						<span class="job_attr">经验:
												  不限
												</span>
						<span class="job_attr">薪酬:
												  面议
												</span>
					</td>
					<td>中国<em>新闻</em>社重庆分社</td>
					<td>重庆</td>
					<td>2014-04-25</td>
					<td><a href="http://www.huibo.com" target="_blank" class="jobsite">汇博人才网</a></td>
				</tr>

				<tr src="武汉才好网">
					<td id="3_td" class="title">
						<a name="job_title" class="job_title" id="3" style="position:static" href="http://wh.caihao.com/jobd-14042407472620.html" target="_blank">文案策划<em>新闻</em>类<em>实习</em>方向</a>
						<br>
						<span class="job_attr">学历:
												  大专
												</span>
						<span class="job_attr">经验:
												  1年以下
												</span>
						<span class="job_attr">薪酬:
												  1500以下
												</span>
					</td>
					<td>武汉蓝筹科技有限公司</td>
					<td>武汉</td>
					<td>2014-04-25</td>
					<td><a href="http://wh.caihao.com/" target="_blank" class="jobsite">武汉才好网</a></td>
				</tr>

				<tr src="新工作人才网">
					<td id="4_td" class="title">
						<a name="job_title" class="job_title" id="4" style="position:static" href="http://pt.xgzrc.com/job/409219.html" target="_blank"><em>实习</em>设计师</a>
						<br>
						<span class="job_attr">学历:
												  大专
												</span>
						<span class="job_attr">经验:
												  不限
												</span>
						<span class="job_attr">薪酬:
												  面议
												</span>
					</td>
					<td>莆田市世纪加奖文化传媒有限公司</td>
					<td>莆田</td>
					<td>2014-04-25</td>
					<td><a href="http://pt.xgzrc.com/" target="_blank" class="jobsite">新工作人才网</a></td>
				</tr>

				<tr src="数字英才网">
					<td id="5_td" class="title">
						<a name="job_title" class="job_title" id="5" style="position:static" href="http://job.01hr.com/j/a-8642841.html" target="_blank">网络销售<em>实习</em>生</a>
						<br>
						<span class="job_attr">学历:
												  大专
												</span>
						<span class="job_attr">经验:
												  不限
												</span>
						<span class="job_attr">薪酬:
												  面议
												</span>
					</td>
					<td>湖北易汇恒业贵金属经营有限公司</td>
					<td>洪山区</td>
					<td>2014-04-25</td>
					<td><a href="http://www.01hr.com/" target="_blank" class="jobsite">数字英才网</a></td>
				</tr>

				<tr src="新工作人才网">
					<td id="6_td" class="title">
						<a name="job_title" class="job_title" id="6" style="position:static" href="http://pt.xgzrc.com/job/409899.html" target="_blank"><em>实习</em>生</a>
						<br>
						<span class="job_attr">学历:
												  大专
												</span>
						<span class="job_attr">经验:
												  不限
												</span>
						<span class="job_attr">薪酬:
												  面议
												</span>
					</td>
					<td>莆田市世纪加奖文化传媒有限公司</td>
					<td>莆田</td>
					<td>2014-04-25</td>
					<td><a href="http://pt.xgzrc.com/" target="_blank" class="jobsite">新工作人才网</a></td>
				</tr>

				<tr src="大众人才网">
					<td id="7_td" class="title">
						<a name="job_title" class="job_title" id="7" style="position:static" href="http://www.dazhonghr.com/company/positiondetail.aspx?id=1096349" target="_blank">济南<em>实习</em>生招聘</a>
						<br>
						<span class="job_attr">学历:
												  大专
												</span>
						<span class="job_attr">经验:
												  0年
												</span>
						<span class="job_attr">薪酬:
												  面议
												</span>
					</td>
					<td>济南鼎旺包装彩印有限公司</td>
					<td>济南</td>
					<td>2014-04-25</td>
					<td><a href="http://www.dazhonghr.com/" target="_blank" class="jobsite">大众人才网</a></td>
				</tr>
';

outputRe($pattern, $string);
?>
