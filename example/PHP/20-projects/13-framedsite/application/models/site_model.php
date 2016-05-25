<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-03
//许可协议 : CC0（公有领域）

// CI模型
class Site_model extends CI_Model {

	/**
	 * [get_all 返回所有数据]
	 * @return [type] [description]
	 */
	public function get_all(){
		return $this->db->join('category', 'category.cid = site.sitetype')->group_by(array("type", "sid"))->get('site')->result_array();
	}

	/**
	 * 返回指定数量的记录，同时，返回匹配的网站类型名称
	 * @return [type] [description]
	 */
	public function get_by_page($num,$offset){
		return $this->db->join('category', 'category.cid = site.sitetype')->get('site',$num,$offset)->result_array();
	}

	/**
	 * 返回网址总数
	 * @return [type] [description]
	 */
	public function get_nums()
	{
		return $this->db->get('site')->num_rows();
	}

	/**
	 * 返回指定id的记录内容
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_by_id($id)
	{
		return $this->db->where(array('sid' => $id))->get('site')->result_array();
	}

	/**
	 * [add 添加网站信息]
	 * @param [array] $data 
	 */
	public function add($data){
		$this->db->insert('site', $data);
	}

	/**
	 * 删除网址数据
	 * @param  int $id 网站类型id
	 * @return [type]     [description]
	 */
	public function del($sid){
		// 使用数组传递条件语句，如下面将生成 DELETE FROM category WHERE id = $id
		$this->db->delete('site', array('sid' => $sid));
	}

	/**
	 * 修改指定id的记录内容
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($data){
		$this->db->where(array('sid' => $data['sid']))->update('site', $data);
	}
}
?>