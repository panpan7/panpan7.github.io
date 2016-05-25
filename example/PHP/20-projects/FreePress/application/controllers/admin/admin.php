<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
/**
 * 后台控制器
 */
class Admin extends CI_Controller {
	/**
	 * admin类的构造方法，用于判断是否登录，自动加载必要资源。
	 */
	public function __construct() {
		// 继承父类构造方法
    parent::__construct();
    // 判断用户是否登录
    if(!$this->session->userdata['uemail']) {
    	// 否则跳转到用户登录页面
    	redirect('user/user/login_form');
    }
    // // 开启调试模式
    // // $this->output->enable_profiler(TRUE);
    // // 装载相关模型，方便代码书写。
    // $this->load->model('site_model','site');
    // $this->load->model('user_model','user');
    // $this->load->model('category_model','cate');
    // // 装载表单辅助函数，以便使用表单验证的相关函数
    // $this->load->helper('form');
  }
	/**
	 * 后台首页显示方法
	 */
	public function index() {
		// $this->load->view( 'admin\index.html' );
		// 为提高代码的重用，我们将index.html中的公用部分提取出来
		$this->load->view('admin\head-nav.html');
		$this->load->view('admin\overview.html');
		$this->load->view('admin\foot.html');
	}
}
// PHP脚本结束
