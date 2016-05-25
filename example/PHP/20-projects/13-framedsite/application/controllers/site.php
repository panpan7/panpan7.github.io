<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-03
//许可协议 : CC0（公有领域）

// 利用CI和bootstrap框架开发导航站点

class Site extends CI_Controller {
	// 自动装载模型
	public function __construct() {
    parent::__construct();
    // 第二个参数用来精简模型名称
    $this->load->model('site_model','site');
  }
  
  /**
   * [index 显示首页]
   * @return [type] [description]
   */
  public function index() {
  	// 获取全部数据，其中site为精简后的模型名称
    // 开启调试模式
    // $this->output->enable_profiler(TRUE); 
    $data['site'] = $this->site->get_all();
    // 加载视图，并将数据传递给视图，多个视图共享数据，不用一一传递
    $this->load->view('head.html', $data);
    $this->load->view('site/body.html');
    $this->load->view('footer.html');
  }
}
?>