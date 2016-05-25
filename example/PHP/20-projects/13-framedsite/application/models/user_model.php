<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-20
//许可协议 : CC0（公有领域）

/**
 * 用户管理模型
 */
class User_model extends CI_Model {
	/**
	 * [add 添加用户注册信息]
	 * @param [array] $data [用户注册信息，包括用户名、密码和注册时间]
	 */
	public function add(array $data)
	{
		// 使用CI中的 Active Record 方法，快速操作数据库
		// 插入数组的参数有两个，第一个为数据表名，
		// 第二个为要插入的数据（是个数组，里面包含了要插入的字段名和对应的值）
		$this->db->insert('users' , $data);
	}

	/**
	 * [check 检查用户登录信息是否存在]
	 * @param  [array] $data [用户名、密码]
	 * @return [array]       [以数组形式返回用户信息]
	 */
	public function check(array $data)
	{
		$array = array('email' => $data['email'], 'password' => $data['password']);
		return $this->db->where($array)->get('users')->result_array(); 
	}

	/**
	 * 返回用户总数
	 * @return [type] [description]
	 */
	public function get_nums()
	{
		return $this->db->get('users')->num_rows();
	}


}
?>