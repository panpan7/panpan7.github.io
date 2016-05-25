<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 
//许可协议 : CC0（公有领域）

// mvc中的模型演示

class TestModel {

	public function getdata()
	{
		$sql = 'select * from table';
		return '这是从数据库查询得到的数据';
	}
	
}
?>