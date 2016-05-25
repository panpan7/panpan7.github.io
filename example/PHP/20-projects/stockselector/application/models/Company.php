<?php
/**
 * 股票数据模型
 */
class Company extends CI_model{

	/**
	 * 获得指定公司的所有财务数据
	 */
	public function companyFinanceDate($code='000012')
	{
		$code = '`' . $code . '`';
		return $this->db->get($code)->result_array();
	}

}
