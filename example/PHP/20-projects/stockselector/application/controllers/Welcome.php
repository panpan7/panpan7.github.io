<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()	{
    // 获取视图必要数据
    $data['stocknum'] = $this->Stock->overview();
    $this->loadView('overview', $data);
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
               'pcode' => $value['code'] ,
               'pname' => $value['name']
            );
			$this->db->insert('publiccompany', $data);
  	}
  }

  	public function getAllStockName() 	{
  		// 取消页面执行时间的限制
  		set_time_limit(0);
  	// 获取指定页面存储在本地的cookie信息
  	$cookie_file = $this->Curlmodel->getCookie('http://xueqiu.com/hq#exchange=CN&firstName=1&secondName=1_0');

  	// 获取行情中心1-189页中的股票信息
  		for ($i=1; $i<=189; $i++) {
  			$url = 'http://xueqiu.com/stock/cata/stocklist.json?page=' . $i . '&size=30&order=desc&orderby=percent&type=11%2C12&_=1429088070172';
  			$this->getFromXueqiu($url, $cookie_file);
  		}
  		echo "抓取股票代码成功！";
  	}

  	public function setStockFlag($value='')  	{

  		// 逐一读取数据库中的信息，然后进行对比核实，将符合特征的代码状态设置为0
  		// 第一步，读取数据库数据总数；
  		$total = $this->Stock->getTotalNumber();
  		 // 第二步，逐一核对代码特征
  		for ($i = 1; $i <= $total; $i++) {
  			// 读取指定编号的数据
  			$stockinfo = $this->Stock->getByID( $i );
  			$pattern1 = '/PRE|399\d{3}|(09[01]\d\d\d)|(10[3-7]\d\d\d)/';
				$pattern2 = '/(PRE)|B|ST/';
  			// 识别
  			if(preg_match($pattern1, $stockinfo[0]['pcode'], $matched) || preg_match($pattern2, $stockinfo[0]['pname'], $matched)) {
  				// 设置标记
  				$this->Stock->setFlag( $i );
  			}
  		}
  	}

  	public function getFinanceInfoByCode($code = '002142' ) 	{
  		// 第一步，获取所有财务信息
  		$mainurl = 'http://stockpage.10jqka.com.cn/basic/' . $code . '/main.txt';
  		$maindata = $this->Curlmodel->curl($mainurl);
      // var_dump($maindata,$url);exit;
  		// 第二步，将获取的json数据转换为数组格式
  		$mainarray = $this->Stock->json2array($maindata);
  		// 第三步，取得必要的信息（基本每股收益、净利润、净利润同比增长率、营业总收入、营业总收入同比增长率、每股净资产、经营现金净额、投资现金净额、筹资现金净额、财务季度日期）
      $cashurl = 'http://stockpage.10jqka.com.cn/basic/' . $code . '/cash.txt';
      $cashdata = $this->Curlmodel->curl($cashurl);
      // var_dump($maindata,$url);exit;
      // 第二步，将获取的json数据转换为数组格式
      $casharray = $this->Stock->json2array($cashdata);
  		// var_dump($casharray);exit;
      // var_dump(sizeof($mainarray['report'][0]));exit;
  		// 第四步,将所需信息插入到数据库
  			// 先自动建立指定代码的财务信息数据表
  		$this->Stock->creatCorpTable($code);

      // 整理数据，使之适合插入到数据表
      $title = $this->Stock->transform2string($mainarray['title']);
      // var_dump($title);
      // exit;
       // var_dump($mainarray['title']);exit;


      // var_dump($key);exit;
      for ($i=0; $i < sizeof($mainarray['report'][0]); $i++) {
        // var_dump();exit;
       // var_dump($mainarray['report'][$this->Stock->getFinanceArrayKey('基本每股收益', $title)][$i]);exit;
        $data = array(
          'cwbbrq' => $mainarray['report'][0][$i],
          'jbmgsy' => floatval($mainarray['report'][$this->Stock->getFinanceArrayKey('基本每股收益', $title)][$i]),
          'jlr' => floatval($mainarray['report'][$this->Stock->getFinanceArrayKey('净利润', $title)][$i]),
          'jlrzzl' => floatval($mainarray['report'][$this->Stock->getFinanceArrayKey('净利润同比增长率', $title)][$i]),
          'yyzsr' => floatval($mainarray['report'][$this->Stock->getFinanceArrayKey('营业总收入', $title)][$i]),
          'yyzsrzzl' => floatval($mainarray['report'][$this->Stock->getFinanceArrayKey('营业总收入同比增长率', $title)][$i]),
          'mgjzc' => floatval($mainarray['report'][$this->Stock->getFinanceArrayKey('每股净资产', $title)][$i]),
          );
        // 取得现金流量净额数据
        $cash = $this->Curlmodel->getCashData( $data['cwbbrq'], $casharray );
        // var_dump($cash);exit;
        // 合并数组
        $finance = array_merge($data,$cash);
        // 插入到表
        $this->Stock->insertFinanceByCode($code, $finance);
      }
    }

    /**
     * [displayCurl 显示抓取工具视图]
     * @return [type] [description]
     */
    public function displayCurl()
    {
      $this->loadview('selector.html');
    }

    /**
     * 显示多页面抓取财务数据页面
     */
    public function displayGetFinance($step = 200)
    {
      // 初始化数组
      $stepData['step'][0] = 0;
      // 取得全部合格代码
      $data = $this->Stock->getTotalcode();
      // 生成步长数组
      for ($i=0; $i <= count( $data ) ; $i= $i + $step)
      {
        $next = ($i+$step <= count( $data ))?($i+$step):count( $data );
        array_push($stepData['step'], $next );
      }
      $this->load->view('head');
      $this->load->view('getFinance', $stepData);
      $this->load->view('foot');
    }

 /**
   * 循环抓取所有公司财务数据
   */
  public function getAllStockInfo($begin,$end)
  {
    // 取消脚本运行时间限制
    set_time_limit( 0 );
    // 取得所有公司代码
    $data = $this->Stock->getTotalcode();
    // var_dump($data);exit;
    for ($i=$begin; $i < $end; $i++)
    {
      $this->getFinanceInfoByCode( $data[$i]['pcode'] );
    }
  }

}

