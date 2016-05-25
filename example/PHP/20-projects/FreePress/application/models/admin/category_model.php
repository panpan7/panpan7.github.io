<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-12-10
//许可协议 : CC0（公有领域）

/**
 * 目录模型
 */
class Category_model extends CI_model{

	// 读取所有目录数据
	public function getAll() {
		return $this->db->get( 'category' )->result_array();
	}
	// 插入目录数据
	public function add( $data ) {
		$this->db->insert( 'category', $data );
	}
	// 取得所有数据的行数
	public function getTotalNumber() {
		return $this->db->count_all_results( 'category' );
	}
	// 按页获取数据
	public function getByPage( $num, $offset ) {
		return $this->db->get( 'category', $num, $offset )->result_array();
	}
}
//PHP脚本到此结束
