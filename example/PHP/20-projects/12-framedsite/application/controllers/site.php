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
  // 显示首页
  public function index() {
  	// 获取全部数据，其中site为精简后的模型名称
    $data['site'] = $this->site->get_all();
    // 传递给视图
    $this->load->view('site/index.html', $data);
  }
}
?>