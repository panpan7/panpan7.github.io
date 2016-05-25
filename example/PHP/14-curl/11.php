<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-06-13
//许可协议 : CC0（公有领域）
// /:,@P/:,@-D/::d/:,@o/::g/:|-)/::!/::L/::>/::,@/:,@f/::-S/:?/:,@x/:,@@/::8/:,@!/:!!!/:xx/:bye
// /:wipe/:dig/:handclap/:&-(/:B-)
// |\/:\<@|\/:@\>|\/::-O|\/:\>-\||\/:P-\(|\/::'\||\/:X-\)|\/::\*|\/:@x|\/:8\*|\/:pd|\/:\<W\>|\/:beer|\/:basketb|\/:oo|\/:coffee|\/:eat|\/:pig|\/:rose|\/:fade|\/:showlove|\/:heart|\/:break|\/:cake|\/:li|\/:bome|\/:kn|\/:footb|\/:ladybug|\/:shit|\/:moon|\/:sun|\/:gift|\/:hug|\/:strong|\/:weak|\/:share|\/:v|\/:@\)|\/:jj|\/:@@|\/:bad|\/:lvu|\/:no|\/:ok|\/:love|\/:\<L\>|\/:jump|\/:shake|\/:\<O\>|\/:circle|\/:kotow|\/:turn|\/:skip|\/:oY
$pattern = "/::)/::~/::B/::|/:8-)/::</::$/::X/::Z/::'(/::-|/::@/::P/::D/::O/::(/::+/:--b/::Q/::T";
$pattern = "/\/:,@P|\/:,@-D|\/::d|\/:,@o|\/::g|\/:\|-\)|\/::!|\/::L|\/::\>|\/::,@|\/:,@f|\/::-S|\/:\?|\/:,@x|\/:,@@|\/::8|\/:,@!|\/:!!!|\/:bye/";
// 特殊字符需要转义的有/|)$，注意要匹配$符号，需要//$
// 输入
$pattern = "/^(\/::\)|\/::~|\/::B|\/::\||\/:8-\)|\/::<|\/::\\$|\/::X|\/::Z|\/::'\(|\/::-\||\/::@|\/::P|\/::D|\/::O|\/::\(|\/::\+|\/:--b|\/::Q|\/::T|\/:,@P|\/:,@-D|\/::d|\/:,@o|\/::g|\/:\|-\)|\/::!|\/::L|\/::\>|\/::,@|\/:,@f|\/:,@f|\/::-S|\/:\?|\/:,@x|\/:,@@|\/::8|\/:,@!|\/:!!!|\/:xx|\/:bye|\/:wipe|\/:dig|\/:handclap|\/:&-\(|\/:B-\)|\/:\<@|\/:@\>|\/::-O|\/:\>-\||\/:P-\(|\/::'\||\/:X-\)|\/::\*|\/:@x|\/:8\*|\/:pd|\/:\<W\>|\/:beer|\/:basketb|\/:oo|\/:coffee|\/:eat|\/:pig|\/:rose|\/:fade|\/:showlove|\/:heart|\/:break|\/:cake|\/:li|\/:bome|\/:kn|\/:footb|\/:ladybug|\/:shit|\/:moon|\/:sun|\/:gift|\/:hug|\/:strong|\/:weak|\/:share|\/:v|\/:@\)|\/:jj|\/:@@|\/:bad|\/:lvu|\/:no|\/:ok|\/:love|\/:\<L\>|\/:jump|\/:shake|\/:\<O\>|\/:circle|\/:kotow|\/:turn|\/:skip|\/:oY)+$/";
// $pattern = "/\\$2/";
$data = '/::)/::~/::B/::)/::)/::|/:8-)/::</::$/::X/::Z/::'. "'" .'(/::-|/::@/::P/::D/::O/::(/::+/:--b/::Q/::T/:,@P/:,@-D/::d/:,@o/::g/:|-)/::!/::L/::>/::,@/:,@f/:,@f/::-S/:?/:,@x/:,@@/::8/:,@!/:,@!/:,@!/:,@!/:!!!/:!!!/:!!!/:!!!/:xx/:xx/:xx/:bye/:bye/:bye/:wipe/:wipe/:dig/:handclap/:handclap/:&-(/:&-(/:B-)/:B-)/:B-)/:wipe/:dig/:handclap/:&-(/:B-)/:<@/:@>/::-O/:>-|/:P-(/::' . "'" . '|/:X-)/::*/:@x/:8*/:pd/:<W>/:beer/:basketb/:oo/:coffee/:eat/:pig/:rose/:fade/:showlove/:heart/:break/:cake/:li/:bome/:kn/:footb/:ladybug/:shit/:moon/:sun/:gift/:hug/:strong/:weak/:share/:v/:@)/:jj/:@@/:bad/:lvu/:no/:ok/:love/:<L>/:jump/:shake/:<O>/:circle/:kotow/:turn/:skip/:oYdd';
// $data = '$2000';
			// 执行正则匹配
			if(preg_match($pattern, $data, $matched)){
					echo '全是表情符号！';
					var_dump($matched);
				} else {
					echo '不全是表情符号!';
				}
$pattern = "/(\/::\)|\/::~|\/::B|\/::\||\/:8-\)|\/::<|\/::\\$|\/::X|\/::Z|\/::'\(|\/::-\||\/::@|\/::P|\/::D|\/::O|\/::\(|\/::\+|\/:--b|\/::Q|\/::T|\/:,@P|\/:,@-D|\/::d|\/:,@o|\/::g|\/:\|-\)|\/::!|\/::L|\/::\>|\/::,@|\/:,@f|\/:,@f|\/::-S|\/:\?|\/:,@x|\/:,@@|\/::8|\/:,@!|\/:!!!|\/:xx|\/:bye|\/:wipe|\/:dig|\/:handclap|\/:&-\(|\/:B-\)|\/:\<@|\/:@\>|\/::-O|\/:\>-\||\/:P-\(|\/::'\||\/:X-\)|\/::\*|\/:@x|\/:8\*|\/:pd|\/:\<W\>|\/:beer|\/:basketb|\/:oo|\/:coffee|\/:eat|\/:pig|\/:rose|\/:fade|\/:showlove|\/:heart|\/:break|\/:cake|\/:li|\/:bome|\/:kn|\/:footb|\/:ladybug|\/:shit|\/:moon|\/:sun|\/:gift|\/:hug|\/:strong|\/:weak|\/:share|\/:v|\/:@\)|\/:jj|\/:@@|\/:bad|\/:lvu|\/:no|\/:ok|\/:love|\/:\<L\>|\/:jump|\/:shake|\/:\<O\>|\/:circle|\/:kotow|\/:turn|\/:skip|\/:oY)/";

$str = preg_replace($pattern, '', $data);
echo $str;


//PHP脚本到此结束