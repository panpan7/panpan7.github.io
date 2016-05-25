<?php
class Loop extends CI_Controller {
	public function index() {
		// 给视图传递一个多维数组
		$data['userlist'] = array(
			array( 'id' => 1, 'name' => 'bill', 'email' => 'bill@xbmu.edu.cn' ),
			array( 'id' => 2, 'name' => 'gate', 'email' => 'gate@xbmu.edu.cn' ),
			array( 'id' => 3, 'name' => 'adam', 'email' => 'adam@xbmu.edu.cn' ),
		);
		$this->load->view( 'loopview', $data );
	}
}
//PHP脚本到此结束
