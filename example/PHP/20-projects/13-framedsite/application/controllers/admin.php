<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-23
//许可协议 : CC0（公有领域）

// 后台控制器

class Admin extends CI_Controller {
  /**
   * admin类的构造方法，用于判断是否登录，自动加载必要资源。
   */
  public function __construct() {
    // 继承父类构造方法
    parent::__construct();
    // 判断用户是否登录
    if ( !$this->session->userdata['email'] ) {
      // 否则跳转到用户登录页面
      redirect( 'user/login_form' );
    }
    // 开启调试模式
    // $this->output->enable_profiler(TRUE);
    // 装载相关模型，方便代码书写。
    $this->load->model( 'site_model', 'site' );
    $this->load->model( 'user_model', 'user' );
    $this->load->model( 'category_model', 'cate' );
    // 装载表单辅助函数，以便使用表单验证的相关函数
    $this->load->helper( 'form' );
  }

  /**
   * [index 显示首页]
   *
   * @return [type] [description]
   */
  public function index() {
    // 获取全部数据，其中site为精简后的模型名称
    $data['cate_nums'] = $this->cate->get_nums();
    $data['site_nums'] = $this->site->get_nums();
    $data['user_nums'] = $this->user->get_nums();

    // 加载视图，并将数据传递给视图，多个视图共享数据，不用一一传递

    $this->load->view( 'head.html', $data );
    $this->load->view( 'nav.html' );
    $this->load->view( 'admin/sidebar.html' );
    $this->load->view( 'admin/index.html' );
    $this->load->view( 'footer.html' );
  }

  /**
   * 显示网站类型信息
   *
   * @return [type] [description]
   */
  public function display_cate() {
    // 装载分页类
    $this->load->library( 'pagination' );
    // 设置分页信息
    $config = array(
      'base_url'       => site_url( 'admin/display_cate/' ),
      'total_rows'     => $this->cate->get_nums(),
      'per_page'       => 7,
      'uri_segment'    => 3,
      'full_tag_open'  => '<ul class="pagination">',
      'full_tag_close' => '</ul>',
      'cur_tag_open'   => '<li class="active"><a>',
      'cur_tag_close'  => '</a></li>',
      'num_tag_open'   => '<li>',
      'num_tag_close'  => '</li>',
      'prev_link'      => '上一页',
      'prev_tag_open'  => '<li>',
      'prev_tag_close' => '</li>',
      'next_link'      => '下一页',
      'next_tag_open'  => '<li>',
      'next_tag_close' => '</li>',
    );
    // 初始化分页类
    $this->pagination->initialize( $config );
    // var_dump($this->pagination);exit;
    // 读取页面数据
    $data['cate'] = $this->cate->get_by_page( $config['per_page'], $this->uri->segment( 3 ) );
    // 加载视图，并将数据传递给视图，多个视图共享数据，不用一一传递
    $this->load->view( 'head.html', $data );
    $this->load->view( 'nav.html' );
    $this->load->view( 'admin/sidebar.html' );
    $this->load->view( 'admin/category.html' );
    $this->load->view( 'footer.html' );
  }

  /**
   * 网站类型添加方法
   */
  public function add_cate() {
    // 载入验证类
    $this->load->library( 'form_validation' );
    // 设置验证规则
    $this->form_validation->set_rules( 'sitetype', '网站类型', 'required|is_unique[category.type]' );
    // 运行验证规则
    if ( $this->form_validation->run() ) {
      // 利用CI中的input类接受表单信息，并存放到数组中
      $data = array(
        // 数组的键名就是数据库的对应的字段名
        'type' => $this->input->post( 'sitetype' )
      );
      // 调用模型对应的添加方法
      $this->cate->add( $data );
    }
    $this->display_cate();
  }

  /**
   * 删除指定id的类型记录
   *
   * @return [type] [description]
   */
  public function del_cate() {
    $id = $this->uri->segment( 3 );
    $this->cate->del( $id );
    // 显示网站类型信息
    redirect( '/admin/display_cate/', 'refresh' );
  }

  /**
   * 显示类型编辑页面
   *
   * @return [type] [description]
   */
  public function edit_cate() {
    // 获取类型id
    $cid = $this->uri->segment( 3 );
    // 获取指定id的记录信息
    $data['sitetype'] = $this->cate->get_by_id( $cid );
    // 显示指定id的编辑页面
    $this->load->view( 'head.html', $data );
    $this->load->view( 'nav.html' );
    $this->load->view( 'admin/sidebar.html' );
    $this->load->view( 'admin/edit_category.html', $data );
    $this->load->view( 'footer.html' );
  }

  /**
   * 修改网站类型数据
   *
   * @return [type] [description]
   */
  public function update_cate() {
    // 载入验证类
    $this->load->library( 'form_validation' );
    // 设置验证规则
    $this->form_validation->set_rules( 'sitetype', '网站类型', 'required|is_unique[category.type]' );
    // 运行验证规则
    if ( $this->form_validation->run() ) {
      // 利用CI中的input类接受表单信息，并存放到数组中
      $data = array(
        // 数组的键名就是数据库的对应的字段名
        'cid'   => $this->input->post( 'cid' ),
        'type' => $this->input->post( 'sitetype' )
      );
      // 调用模型对应的添加方法
      $this->cate->update( $data );
    }
    $this->display_cate();
  }

  /**
   * 显示全部网站网址信息
   *
   * @return [type] [description]
   */
  public function display_site() {
    // 装载分页类
    $this->load->library( 'pagination' );
    // 设置分页信息
    $config = array(
      'base_url'       => site_url( 'admin/display_site/' ),
      'total_rows'     => $this->site->get_nums(),
      'per_page'       => 7,
      'uri_segment'    => 3,
      'full_tag_open'  => '<ul class="pagination">',
      'full_tag_close' => '</ul>',
      'cur_tag_open'   => '<li class="active"><a>',
      'cur_tag_close'  => '</a></li>',
      'num_tag_open'   => '<li>',
      'num_tag_close'  => '</li>',
      'prev_link'      => '上一页',
      'prev_tag_open'  => '<li>',
      'prev_tag_close' => '</li>',
      'next_link'      => '下一页',
      'next_tag_open'  => '<li>',
      'next_tag_close' => '</li>',
    );
    // 初始化分页类
    $this->pagination->initialize( $config );
    // 读取页面数据
    $data['site'] = $this->site->get_by_page( $config['per_page'], $this->uri->segment( 3 ) );
    // 读取网站类型数据
    $data['sitetype'] = $this->cate->get_all();
    // 加载视图，并将数据传递给视图，多个视图共享数据，不用一一传递
    $this->load->view( 'head.html', $data );
    $this->load->view( 'nav.html' );
    $this->load->view( 'admin/sidebar.html' );
    $this->load->view( 'admin/site.html' );
    $this->load->view( 'footer.html' );
  }

  /**
   * 网站地址添加方法
   */
  public function add_site() {
    // 载入验证类
    $this->load->library( 'form_validation' );
    // 设置验证规则
    $this->form_validation->set_rules( 'sitetype', '网站类型', 'required' );
    $this->form_validation->set_rules( 'siteinfo', '网站名称', 'required|is_unique[site.siteinfo]' );
    $this->form_validation->set_rules( 'siteurl', '网站地址', 'required|is_unique[site.siteurl]' );
    // 运行验证规则
    if ( $this->form_validation->run() ) {
      // 利用CI中的input类接受表单信息，并存放到数组中
      $data = array(
        // 数组的键名就是数据库的对应的字段名
        'sitetype' => $this->input->post( 'sitetype' ),
        'siteinfo' => $this->input->post( 'siteinfo' ),
        'siteurl'  => $this->input->post( 'siteurl' ),
      );
      // 调用模型对应的添加方法
      $this->site->add( $data );
    }
    $this->display_site();
  }

  /**
   * 删除指定id的网址记录
   *
   * @return [type] [description]
   */
  public function del_site() {
    $sid = $this->uri->segment( 3 );
    $this->site->del( $sid );
    // 显示网站类型信息
    redirect( '/admin/display_site/', 'refresh' );
  }

  /**
   * 显示网址编辑页面
   *
   * @return [type] [description]
   */
  public function edit_site() {
    // 获取类型id
    $sid = $this->uri->segment( 3 );
    // 获取指定id的记录信息
    $data['site']     = $this->site->get_by_id( $sid );
    $data['sitetype'] = $this->cate->get_all();
    // 显示指定id的编辑页面
    $this->load->view( 'head.html', $data );
    $this->load->view( 'nav.html' );
    $this->load->view( 'admin/sidebar.html' );
    $this->load->view( 'admin/edit_site.html' );
    $this->load->view( 'footer.html' );
  }


  /**
   * 修改网址数据
   *
   * @return [type] [description]
   */
  public function update_site() {
    // 载入验证类
    $this->load->library( 'form_validation' );
    // 设置验证规则
    $this->form_validation->set_rules( 'sitetype', '网站类型', 'required' );
    $this->form_validation->set_rules( 'siteinfo', '网站名称', 'required' );
    $this->form_validation->set_rules( 'siteurl', '网站地址', 'required' );
    // 运行验证规则
    if ( $this->form_validation->run() ) {
      // 利用CI中的input类接受表单信息，并存放到数组中
      $data = array(
        // 数组的键名就是数据库的对应的字段名
        'sid'      => $this->input->post( 'sid' ),
        'sitetype' => $this->input->post( 'sitetype' ),
        'siteinfo' => $this->input->post( 'siteinfo' ),
        'siteurl'  => $this->input->post( 'siteurl' ),
      );
      // 调用模型对应的添加方法
      $this->site->update( $data );
    }
    $this->display_site();
  }

}
?>
