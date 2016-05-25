<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class User extends CI_Controller {

  // 自动装载模型
  public function __construct() {
    parent::__construct();
    $this->load->model( 'user/user_model', 'user' );
  }

  /**
   * 显示用户注册界面
   *
   * @return [type]
   */
  public function register_form() {
    // 开启调试模式
    $this->output->enable_profiler(TRUE);
    // 载入表单辅助函数
    $this->load->helper( 'form' );
    // 载入视图
    $this->load->view( 'user/register.html' );
  }

  /**
   * 用户注册方法
   *
   * @return [type]
   */
  public function register() {
    // 载入验证类
    $this->load->library( 'form_validation' );
    // 设置验证规则
    $this->form_validation->set_rules( 'uemail', '邮箱', 'required|valid_email|is_unique[users.uemail]' );
    // 设置自定义的验证规则
    $this->form_validation->set_rules( 'upassword', '密码', 'callback_password_recheck' );
    // 运行验证规则
    if ( $this->form_validation->run() ) {
      // 使用数组接受表单数据，利用CI中的input类进行安全过滤
      // 数组中的键名就是数据库中的字段名
      $data = array(
        'uemail'    => $this->input->post( 'uemail' ),
        // 使用md5方式加密密码
        'upassword' => md5( $this->input->post( 'upassword' ) ),
        'uregdate'  => time(),
      );
      // 调用模型对应的添加方法
      $this->user->add( $data );
      // 载入CI的session类，可在配置文件autoload.php中开启自动加载
      $sessionData = array(
        'uemail' => $this->input->post( 'uemail' ),
      );
      // 将用户名写入session
      $this->session->set_userdata( $sessionData );
      // 调用自定义函数显示信息并跳转
      message( 'home/home', '注册成功！' );
    } else {
      $this->register_form();
    }
  }

  /**
   * 回调方法必须为public方式
   * [password_recheck 检查密码是否包含大小字母和数字的回调函数]
   *
   * @param [type]  $str
   * @return [boole]
   */
  public function password_recheck( $str ) {
    // 设置密码正则匹配模式
    $pattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])\w{6,}/';
    // 执行正则验证
    if ( !preg_match( $pattern, $str ) ) {
      // 设置错误提示信息
      $this->form_validation->set_message( 'password_recheck', '%s 必须同时包含大写字母、小写字母和数字，并且6位以上' );
      return FALSE;
    } else {
      return TRUE;
    }
  }

  /**
   * [login_form 显示登录表单]
   *
   * @return [type] [description]
   */
  public function login_form() {
    $this->load->helper( 'form' );
    // 载入视图
    $this->load->view( 'user/login.html' );
  }

  /**
   * [login 用户登录]
   *
   * @return [type] [description]
   */
  public function login() {
    // 载入验证类
    $this->load->library( 'form_validation' );
    // 设置验证规则
    $this->form_validation->set_rules( 'uemail', '邮箱', 'required|valid_email' );
    // 设置自定义的验证规则
    $this->form_validation->set_rules( 'upassword', '密码', 'callback_password_recheck' );
    // 运行验证规则
    if ( $this->form_validation->run() ) {
      // 使用数组接受表单数据，利用CI中的input类进行安全过滤
      // 数组中的键名就是数据库中的字段名
      $data = array(
        'uemail'    => $this->input->post( 'uemail' ),
        // 使用md5方式加密密码
        'upassword' => md5( $this->input->post( 'upassword' ) ),
      );
      // 调用模型对应的添加方法
      // var_dump($this->user->check( $data ));die;
      if ( $this->user->check( $data ) ) {
        $sessionData = array(
          'uemail' => $this->input->post( 'uemail' ),
        );
        // 将用户名写入session
        $this->session->set_userdata( $sessionData );
        message( '/admin/admin/index/', '登录成功！' );
      } else {
        message( '/user/user/login_form', '登录信息不正确，请重新输入' );
      }
    } else {
      $this->login_form();
    }
  }

  /**
   * [logout 退出登录]
   *
   * @return [type] [description]
   */
  public function logout() {
    // 销毁session
    $this->session->sess_destroy();
    message( '/admin/index/', '退出登录' );
  }

}

// php文件user.php到此结束
