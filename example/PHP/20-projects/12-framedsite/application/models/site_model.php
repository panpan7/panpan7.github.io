<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-03
//许可协议 : CC0（公有领域）

// CI模型
class Site_model extends CI_Model {

	// 返回所有数据
	public function get_all(){
		$sql = "SELECT * FROM site GROUP BY sitetype, id"; 
		return $this->db->query($sql)->result_array();
	}
}
?>