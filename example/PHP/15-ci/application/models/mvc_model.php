<?php
class Mvc_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	/**
	 * 模型示例方法
	 */
	function sayhello() {
		return 'hello，这是来自模型的问候。';
	}
}
//PHP脚本到此结束
