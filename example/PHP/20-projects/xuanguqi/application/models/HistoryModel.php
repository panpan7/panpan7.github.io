<?php
/**
 * 股票数据模型
 */
class HistoryModel extends CI_model{

	public function test($value='')
	{
		return 'test';
	}
	/**
	 * 创建股票历史交易数据表
	 */
	public function creatHistoryTableById( $code )	{
		// 载入数据库维护类:
		$this->load->dbforge();
		// 删除已有表
		$code = '`' . $code . 'history`';
		$this->dbforge->drop_table($code, true);
		// 创建字段
		$fields = array(
			'h_id' => array(
				'type'           => 'INT',
				'constraint'     => 7,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'dealdate' => array(
				'type' =>'date',
			),
			'kpj' => array(
				'type' => 'decimal(14,2)',
			),
			'zgj' => array(
				'type' => 'decimal(14,2)',
			),
			'spj' => array(
				'type' => 'decimal(14,2)',
			),
			'zdj' => array(
				'type' => 'decimal(14,2)',
			),
			'jyl' => array(
				'type' => 'bigint(20)',
				'unsigned'       => TRUE,
			),
			'jyje' => array(
				'type' => 'bigint(20)',
				'unsigned'       => TRUE,
			),
		);
		$this->dbforge->add_field( $fields );
		// 创建主键
		$this->dbforge->add_key( 'h_id', TRUE );
		// 创建表
		$this->dbforge->create_table( $code, TRUE );
	}
}
