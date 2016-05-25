<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
/**
 * 后台控制器
 */
class Category extends CI_Controller {
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
    // 装载相关模型，方便代码书写。
    $this->load->model('admin/category_model','category');
    // $this->load->model('user_model','user');
    // $this->load->model('category_model','cate');
    // // 装载表单辅助函数，以便使用表单验证的相关函数
    // $this->load->helper('form');
  }
	/**
	 * 后台目录编辑首页显示方法
	 */
	public function index() {
		// echo $this->category->getTotalNumber();exit;
		// 载入分页类
		// $this->output->enable_profiler(TRUE);
		$this->load->library('pagination');
		 // 配置分页类
		$config['base_url']   = site_url('admin/category/index/');
		$config['total_rows'] = $this->category->getTotalNumber();
		$config['per_page']   = 5;
		// 初始化分页类
		$this->pagination->initialize($config);
		// 以数组的形式接受模型传递的数据
		$data['category'] = $this->category->getByPage($config['per_page'] , $this->uri->segment(4));
		// var_dump($data['category']);
		// $this->load->view( 'admin\index.html' );
		// 为提高代码的重用，我们将index.html中的公用部分提取出来
		$this->load->view('admin\head-nav.html');
		$this->load->view('admin\category.html', $data);
		$this->load->view('admin\foot.html');
	}
	/**
	 * 添加目录
	 */
	public function addCategory() {
		// // 加载表单验证功能，可在autoload.php文件或者构造方法中实现
		// $this->load->library('form_validation');
		// 创建验证规则
		$this->form_validation->set_rules('categoryname', '目录', 'required|is_unique[category.cname]');
		// 运行验证规则
		if($this->form_validation->run()){
			// echo '表单验证全部通过，现在可以进行数据库的插入工作。';
			// die;
			$data['cname']   = $this->input->post('categoryname');
			$data['cparent'] = 0;
			// var_dump($data); exit;
			$this->category->add($data);
		}

		$this->index();
	}
}
// PHP脚本结束
