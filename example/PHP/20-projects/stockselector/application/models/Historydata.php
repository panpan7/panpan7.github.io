<?php
/**
 * 历史数据模型
 */
class Historydata extends CI_model{
	/**
	 * [creatTableByCode 创建历史数据表]
	 * @param  string $code [description]
	 * @return [type]       [description]
	 */
	public function creatTableByCode($code = '')
	{
		// 创建历史交易数据表
		$code = $code . 'history';
		// 载入数据库维护类
		$this->load->dbforge();
		// 删除已有表
		$code = '`' . $code . '`';
		$this->dbforge->drop_table( $code, true );
		// 创建字段
		$fields = array(
			'h_id' => array(
				'type'           => 'INT',
				'constraint'     => 5,
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
				'type'     => 'bigint(20)',
				'null'     => TRUE,
				'unsigned' => TRUE,
			),
			'jyje' => array(
				'type'     => 'bigint(20)',
				'null'     => TRUE,
				'unsigned' => TRUE,
			),
		);
		$this->dbforge->add_field( $fields );
		// 创建主键
		$this->dbforge->add_key( 'h_id', TRUE );
		// 创建表
		$this->dbforge->create_table( $code, TRUE );
	}
}
