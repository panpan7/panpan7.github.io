<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-23
//许可协议 : CC0（公有领域）

class Category_model extends CI_Model {

	/**
	 * 返回指定数量的记录
	 * @return [type] [description]
	 */
	public function get_by_page($num,$offset){
		return $this->db->get('category', $num, $offset)->result_array();
	}

	/**
	 * [get_all 返回所有数据]
	 * @return [type] [description]
	 */
	public function get_all(){
		return $this->db->get('category')->result_array();
	}

	/**
	 * 返回类型总数
	 * @return [type] [description]
	 */
	public function get_nums(){
		return $this->db->get('category')->num_rows();
	}

	/**
	 * [add 添加网站类型]
	 * @param [array] $data 类型名称
	 */
	public function add($data){
		$this->db->insert('category', $data);
	}

	/**
	 * 删除网站类型数据
	 * @param  int $id 网站类型id
	 * @return [type]     [description]
	 */
	public function del($id){
		// 使用数组传递条件语句，如下面将生成 DELETE FROM category WHERE id = $id
		$this->db->delete('category', array('cid' => $id));
	}

	/**
	 * 返回指定id的记录内容
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_by_id($id){
		return $this->db->where(array('cid' => $id))->get('category')->result_array();
	}

	/**
	 * 修改指定id的记录内容
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($data){
		$this->db->where(array('cid' => $data['cid']))->update('category', $data);
	}
}
//PHP脚本到此结束