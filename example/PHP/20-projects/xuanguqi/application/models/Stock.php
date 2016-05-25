<?php
/**
 * 股票数据模型
 */
class Stock extends CI_model{

	public function hello()	{
		return '我是一个模型，能给控制器返回数据';
	}

	/**
	 * [getCookie 获取指定地址的cookie]
	 *
	 * @param [type]  $url [description]
	 * @return [type]      [description]
	 */
	public function getCookie( $url = '' ) {
		// 指定cookie文件存放地址
		$cookie_file = tempnam( sys_get_temp_dir(), "cookies" );
		$ch = curl_init( $url ); //初始化
		curl_setopt( $ch, CURLOPT_HEADER, 0 ); //不返回header部分
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); //返回字符串，而非直接输出
		curl_setopt( $ch, CURLOPT_COOKIEJAR,  $cookie_file ); //存储cookies
		curl_exec( $ch );
		curl_close( $ch );
		return $cookie_file;
	}

	/**
	 * 获取指定地址的网页内容
	 *
	 * @param string  $url [description]
	 * @return [type]      [description]
	 */
	public function curl( $url='', $cookie_file='' ) {
		// 初始化curl类
		$ch = curl_init();
		// 设置网页地址
		curl_setopt( $ch, CURLOPT_URL, $url );
		// 设定curl不返回头信息
		curl_setopt( $ch, CURLOPT_HEADER, 0 );
		// 设定curl不在网页中直接显示抓取内容
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		//使用cookies
		curl_setopt( $ch, CURLOPT_COOKIEFILE, $cookie_file );
		// 执行抓取
		$content = curl_exec( $ch );
		// 关闭curl资源
		curl_close( $ch );
		return $content;
	}

	/**
	 * 转换json格式为数组变量
	 */
	public function json2array( $json ) {
		$array = json_decode( $json, $assoc = true );
		return $array;
	}

	/**
	 * 将雪球的字段名转换为数据表中的字段
	 */
	public function xueqiu2stock( array $array ) {
		// var_dump($array);
		// 利用foreach循环转换字段名
		foreach ( $array['stocks'] as $key => $value ) {
			// var_dump($value);
			$data[$key]['scode'] = $value['code'];
			$data[$key]['sname'] = $value['name'];
		}
		return $data;
	}


	/**
	 * 将雪球单个公司的信息插入到数据库中
	 */
	public function insertpc(array $data)	{
		$this->db->insert('stocks', $data);
	}

	/**
	 * 读取指定序号的数据库信息
	 */
	public function getByID($id = 1) 	{
		return $this->db->where('sid', $id)->get('stocks')->result_array();
	}

	/**
	 * 更新指定序号的标记
	 */
	public function setFlag($id = 935) 	{
		$data = array(
               'isStock' => 0
            );
		$this->db->where('sid', $id)->update('stocks', $data);
	}

	/**
	 * 获得数据库的总规模
	 */
	public function getTotalNumber()	{
		return $this->db->count_all_results('stocks');
	}

	/**
	 * 创建公司财务信息表
	 */
	public function creatFinanceTableById( $code )	{
		// 载入数据库维护类:
		$this->load->dbforge();
		// 删除已有表
		$code = '`' . $code . '`';
		$this->dbforge->drop_table($code, true);
		// 创建字段
		$fields = array(
			's_id' => array(
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'jbmgsy' => array(
				'type' => 'decimal(10,2)',
				'null' => TRUE,
			),
			'jlr' => array(
				'type' => 'decimal(14,2)',
				'null' => TRUE,
			),
			'jlrzzl' => array(
				'type' => 'decimal(10,2)',
				'null' => TRUE,
			),
			'yyzsr' => array(
				'type' => 'decimal(14,2)',
				'null' => TRUE,
			),
			'yyzsr' => array(
				'type' => 'decimal(14,2)',
				'null' => TRUE,
			),
			'yyzsrzzl' => array(
				'type' => 'decimal(10,2)',
				'null' => TRUE,
			),
			'jyxjllje' => array(
				'type' => 'decimal(14,2)',
				'null' => TRUE,
			),
			'tjxjllje' => array(
				'type' => 'decimal(14,2)',
				'null' => TRUE,
			),
			'cjxjllje' => array(
				'type' => 'decimal(14,2)',
				'null' => TRUE,
			),
			'mgjzc' => array(
				'type' => 'decimal(10,2)',
				'null' => TRUE,
			),
			'cwbbrq' => array(
				'type' =>'date',
			),
		);
		$this->dbforge->add_field( $fields );
		// 创建主键
		$this->dbforge->add_key( 's_id', TRUE );
		// 创建表
		$this->dbforge->create_table( $code, TRUE );
	}

	/**
	 * 插入财务数据
	 */
	public function insertFinanceData(array $data , $code )	{
		$code = '`' . $code . '`';
		$this->db->insert($code, $data);
	}

	/**
	 * 创建代码表
	 */
	public function creatStock()
	{
		// 载入数据库维护类:
		$this->load->dbforge();
		// 创建字段
		$fields = array(
			'sid' => array(
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'scode' => array(
				'type' => 'varchar(20)',
				'null' => FALSE,
			),
			'sname' => array(
				'type' => 'varchar(20)',
				'null' => FALSE,
			),
			'isStock' => array(
				'type' => 'tinyint(1)',
				'null' => FALSE,
				'default' => 1,
			),
		);
		$this->dbforge->add_field( $fields );
		// 创建主键
		$this->dbforge->add_key( 'sid', TRUE );
		// 创建索引
		$this->dbforge->add_key( 'isStock' );
		// 创建表
		$this->dbforge->create_table( 'stocks', TRUE );
	}

	/**
	 * 取得指定日期的现金流量表信息
	 */
	public function getCashData( $date, $cashData )
	{
		// 取得数据对应的键名
		$jykey = array_search('经营现金流量净额', $cashData['title']);
		$tzkey = array_search('投资现金流量净额', $cashData['title']);
		$czkey = array_search('筹资现金流量净额', $cashData['title']);

		$key = array_search($reportDate, $cashData['report'][0]);
		// 此函数可能返回布尔值 FALSE，但也可能返回等同于 FALSE 的非布尔值。请阅读 布尔类型章节以获取更多信息。应使用 === 运算符来测试此函数的返回值。
		if($key !== false)
		{
			$info['jyxjllje'] = $this->white2null($cashData['report'][$jykey][$key]);
			$info['tzxjllje'] = $this->white2null($cashData['report'][$tzkey][$key]);
			$info['czxjllje'] = $this->white2null($cashData['report'][$czkey][$key]);
			return $info;
		}
		else
		{
			$info['jyxjllje'] = null;
			$info['tzxjllje'] = null;
			$info['czxjllje'] = null;
			return $info;
		}


	}
}
