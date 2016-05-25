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
			$data[$key]['pcode'] = $value['code'];
			$data[$key]['pname'] = $value['name'];
		}
		return $data;
	}


	/**
	 * 将雪球单个公司的信息插入到数据库中
	 */
	public function insertpc(array $data)	{
		$this->db->insert('publiccompany', $data);
	}

	/**
	 * 将指定的代码信息设置为非公司状态
	 */
	public function setFlag($pid = 818) {
		$data = array(
               'isStock' => 0
            );
		$this->db->where('pid', $pid)->update('publiccompany', $data);
	}

	/**
	 * 返回所有代码的总数
	 */
	public function getTotalNumber()	{
		return $this->db->count_all_results('publiccompany');
	}

	/**
	 * 读取指定序号的代码数据
	 */
	public function getById($pid = 1)	{
		return $this->db->where('pid', $pid)->get('publiccompany')->result_array();
	}

	/**
	 * 创建指定代码的公司财务数据表
	 */
	public function creatCorpTable( $symbol ) {
		// 载入数据库维护类
		$this->load->dbforge();
		// 删除已有表
		$symbol = '`' . $symbol . '`';
		$this->dbforge->drop_table( $symbol, true );
		// 创建字段
		$fields = array(
			'f_id' => array(
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
			'tzxjllje' => array(
				'type' => 'decimal(14,2)',
				'null' => TRUE,
			),
			'czxjllje' => array(
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
		$this->dbforge->add_key( 'f_id', TRUE );
		// 创建表
		$this->dbforge->create_table( $symbol, TRUE );
	}

/**
	 * 创建指定代码的公司财务数据库
	 */
	public function test( $symbol ) {
		// 载入数据库维护类
		$this->load->dbforge();
		// 删除已有表
		$data = $this->dbforge->drop_table( $symbol, true );

	}

	/**
	 * 插入财务数据到指定的公司表
	 */
	public function insertFinanceByCode($code, $data)
	{
		$code = '`' . $code . '`';
		$this->db->insert($code,$data);
	}

	/**
	 * 转换数组格式，使之适合搜索项目名称
	 */
	public function transform2string($array)
	{
		 foreach ($array as $key => $value) {

        if(!is_string($value)) {
          $title[$key] = $value[0];
        }
      }
		return $title;
	}

	/**
	 * 获取指定项目的键名
	 */
	public function getFinanceArrayKey($value='', $title)
	{
		return array_search($value, $title);
	}

	/**
	 * 获取所有合格股票的总数
	 */
	public function overview()
	{
		return $this->db->get_where( 'publiccompany', array( 'isStock' => 1 ) )->num_rows();
		// codeignite3.0将属性num_rows改为方法num_rows()。
	}

	/**
	 * 返回所有合格股票代码
	 */
	public function getTotalCode()
	{
		return $this->db->select('pcode')->get_where( 'publiccompany', array( 'isStock' => 1 ) )->result_array();
	}

	/**
	 * 为指定公司插入连续增长季度数据
	 */
	public function updateGrowthData($code= '', $data = 0)
	{
		$data = array(
			'growthseasons'=> $data
			);
		$this->db->where('pcode', $code)->update('publiccompany', $data);
	}

	/**
	 * 获取全部连续增长公司的信息
	 */
	public function getGrowthingCrops($s = 1)
	{
		$sql = "SELECT * FROM publiccompany WHERE growthseasons >= ? ORDER BY growthseasons DESC";
		return $this->db->query($sql,array($s))->result_array();
	}
}
