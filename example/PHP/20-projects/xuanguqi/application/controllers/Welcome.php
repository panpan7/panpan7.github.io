<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * 构造方法
	 */
	public function __construct() {
		// 继承父类构造方法
		parent::__construct();
		// 装载相关数据模型
		$this->load->model( 'Curlmodel' );
		// 装载相关数据模型
		$this->load->model( 'Stock' );
		// 载入数据库
		$this->load->database();
	}

	// 定义了一个方法，方法的名称为index
	public function index()	{
		// echo '我是控制器，我能执行很多功能。';
		// exit();
		// 加载url辅助函数，以便使用其中的函数
		$this->load->helper('url');
		// base_url函数的功能是生成指定路径和名称的文件名
		// echo base_url("application/views/css/bootstrap.min.css");
		// echo '<br />';
		// // 生成调用getdata控制器的url地址
		// echo site_url("Getdata/index/333/34444");
		// echo '<br />';
		// echo $id;
		// exit();
		// 下面的这行语句是用来调用视图的，通过view方法来用。
		$this->load->view('selector.html');
	}

	public function getdata($value='')	{
		// echo '这是welcome控制器的另外一个方法，叫作getdata','方法还可以接受参数', $value;
		// 第一步，初始化curl资源
		// 创建一个cURL资源
		$ch = curl_init();

		// 第二步，设置抓取网页的参数
		// 设置URL和相应的选项
		curl_setopt($ch, CURLOPT_URL, "http://xueqiu.com/stock/cata/stocklist.json?page=1&size=30&order=desc&orderby=percent&type=11%2C12&_=1428485663681");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// 第三步，抓取网页
		// 抓取URL并把它传递给浏览器
		$data = curl_exec($ch);
		var_dump($data);

		// 第四步，释放curl资源
		// 关闭cURL资源，并且释放系统资源
		curl_close($ch);
	}

	public function hello()	{
		// 先载入模型
		$this->load->model('Stock');
		// 载入数据库类
		$this->load->database();
		// 取消脚本最大运行时间的限制
		set_time_limit( 0 );
		// 获取雪球网行情中心页面的cookie
		$cookie_file = $this->Stock->getCookie('http://xueqiu.com/hq#exchange=CN&firstName=1&secondName=1_0');
		// 获取雪球网行情中心指定页面的数据
		$content = $this->Stock->curl('http://xueqiu.com/stock/cata/stocklist.json?page=1&size=30&order=desc&orderby=percent&type=11%2C12&_=1429081378292', $cookie_file);
		// 将雪球网返回的json格式的数据转换为PHP数组
		$array = $this->Stock->json2array($content);
		// var_dump($array);
		$arr = $this->Stock->xueqiu2stock($array);
		// var_dump($arr);exit;
		foreach ($arr as $value) {
					$data = array(
               'pcode' => $value['pcode'] ,
               'pname' => $value['pname']
            );
			$this->Stock->insertpc($data);
		}
  }

  public function getFromXueqiu( $url = '', $cookie_file = '') {
  	// echo '这个方法用来获取雪球行情中心的数据,接下来的任务是获取行情中心页面存放在本地计算机的cookie信息';
  	// 载入模型
  	// $this->load->model('Xueqiu');
  	// 使用模型中的方法
  	// echo $this->Xueqiu->hello();

  	// echo tempnam( sys_get_temp_dir(), "cookies" );
  	// 获取指定页面存储在本地的cookie信息
  	// $cookie_file = $this->Xueqiu->getCookie('http://xueqiu.com/hq#exchange=CN&firstName=1&secondName=1_0');

  	$string = $this->Curlmodel->curl( $url, $cookie_file);

  	// echo $string;

  	$array = json_decode($string, true);

  	// var_dump($array);
  // 	$arr = array(1, 2, 3, 4);
		// foreach ($arr as $value) {
  //   	echo $value;
  // 	}
  	// foreach ($array['stocks'] as $value) {
  	// 	var_dump($value['code']);
  	// 	var_dump($value['name']);
  	// }

  	// 载入数据库
  	// $this->load->database();

  	// 插入数据的演示
  // 	$data = array(
  //              'scode' => 'My Name' ,
  //              'sname' => 'My date'
  //           );
		// $this->db->insert('stocks', $data);

  	foreach ($array['stocks'] as $value) {
  		// var_dump($value['code']);
  		// var_dump($value['name']);
  		$data = array(
               'scode' => $value['code'],
               'sname' => $value['name']
            );
			$this->db->insert('stocks', $data);
  	}
  }

  	public function getAllStockName() 	{
  		// 取消页面执行时间的限制
  		set_time_limit(0);
  	// 获取指定页面存储在本地的cookie信息
  	$cookie_file = $this->Curlmodel->getCookie('http://xueqiu.com/hq#exchange=CN&firstName=1&secondName=1_0');
  	// 判断是否存在数据表
  	$this->load->dbutil();
  	if (!$this->dbutil->database_exists('stocks'))
		{
			$this->Stock->creatStock();
		}
  	// 获取行情中心1-189页中的股票信息
  		for ($i=1; $i<=189; $i++) {
  			$url = 'http://xueqiu.com/stock/cata/stocklist.json?page=' . $i . '&size=30&order=desc&orderby=percent&type=11%2C12&_=1429088070172';
  			$this->getFromXueqiu($url, $cookie_file);
  		}
  		echo "抓取股票代码成功！";
  	}


  	/**
  	 * 设置非上市公司代码标记
  	 */
  	public function setStocksFlag( )	{
  		// 逐一读取数据库中的代码信息后，与特征标记进行对比，对非上市公司进行标记
  		// 在循环之前，要得到数据的总数
  		$total = $this->Stock->getTotalNumber();
	  		// echo $total;exit;
	  		for ($i=1; $i <= $total ; $i++) {
	  			// 第一步，读取指定编号的数据库信息
	  		$info = $this->Stock->getByID($i);
	  		// echo $info[0]['scode'];
	  		// 第二步，使用正则表达式进行筛选
	  		$pattern1 = '/PRE|399\d{3}|(09[01]\d\d\d)|(10[3-7]\d\d\d)/';
	  		$pattern2 = '/PRE|B|ST/';
	  		if(preg_match($pattern1, $info[0]['scode']) || preg_match($pattern2, $info[0]['sname'])) {
	  			// 第三步，进行标记
	  			$this->Stock->setFlag($i);
	  		}
  		}
  	}

  	/**
  	 * 抓取指定公司的财务数据
  	 */
  	public function getFinanceInfoByCode( $code = '600503' ) {
  		// 第一步，抓取主要财务数据及现金流量表
  		$mainUrl = 'http://stockpage.10jqka.com.cn/basic/' . $code . '/main.txt';
  		$mainData = $this->Curlmodel->curl( $mainUrl );
  		// 第二步，将json格式转为数组
  		$mainData = $this->Stock->json2array( $mainData );

  		$cashUrl = 'http://stockpage.10jqka.com.cn/basic/' . $code . '/cash.txt';
  		$cashData = $this->Curlmodel->curl( $cashUrl );
  		$cashData = $this->Stock->json2array( $cashData );
  		// var_dump($cashData,$mainData['report'][0]);exit;
  		// 第三步，将必要的数据插入到数据库
  		// 必要的数据有：年度、基本每股收益(元)、净利润、净利润同比增长率、营业总收入(万元)、营业总收入同比增长率(%)、每股净资产(元)、经营现金流量净额(万元)、投资现金流量净额(万元)、筹资现金流量净额(万元)
  			// 3.1创建数据表
  		$this->Stock->creatFinanceTableById($code);
  		// // 从同花顺提供的数组中准备必要数据，然后插入必要数据

	// 第一步，先计算总有多少季数据
		$total = sizeof( $mainData['report'][0] );
		// 第二步，循环更新每一季财报数据
		for ( $i = 0; $i < $total; $i++ ) {
			// 取得主要财务数据
			$mainFinanceData = array(
				'cwbbrq'   => $mainData['report'][0][$i],
				'jbmgsy'   => floatval($mainData['report'][1][$i]),
				'jlr'      => floatval($mainData['report'][2][$i]),
				'jlrzzl'   => floatval($mainData['report'][3][$i]),
				'yyzsr'    => floatval($mainData['report'][4][$i]),
				'yyzsrzzl' => floatval($mainData['report'][5][$i]),
				'mgjzc'    => floatval($mainData['report'][6][$i])
			);
			// 取得现金流量表的主要数据
			$cash = $this->Stock->getCashData( $mainFinanceData['cwbbrq'], $cashData );
			var_dump($cash);exit;
			// 插入到数据库
			$this->Stock->insertFinanceData($financeData, $code);
  	}
  	// var_dump($financeData);

  }

}

