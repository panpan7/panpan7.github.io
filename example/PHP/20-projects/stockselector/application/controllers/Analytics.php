<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends MY_Controller {

	/**
	 * 显示分析功能列表视图
	 */
	public function index()
	{
		$this->loadview('analytics');
	}

	/**
	 * 标记连续增长的公司
	 */
	public function markGrowth()
	{
		$this->output->enable_profiler(TRUE);
		//获得前200家公司的代码
		$data = $this->Stock->getTotalCode();
		// var_dump($data);exit;

		for ($i=0; $i < 100; $i++) {
			$k = $this->getGrowthingQuarters($data[$i]['pcode'], 20);
			// var_dump($data[$i]['pcode']);exit;
			$this->Stock->updateGrowthData($data[$i]['pcode'], $k);
		}
	}


	/**
	 * 获取指定公司连续高增长的季度数
	 */
	public function getGrowthingQuarters( $code = '000012', $growthRate = 20 )
	{
		//获取指定公司的所有财务数据
		$data = $this->Company->companyFinanceDate($code);

		for ($i=0; $i < sizeof($data); $i++) {
			if($data[$i]['jlrzzl'] >= $growthRate && $data[$i]['yyzsrzzl'] >= $growthRate) {
				continue;
			} else {
				return $i;
			}
		}
	}

	/**
	 * 显示连续高增长公司
	 */
	public function displayGrowthingCorp($seasons = 1)
	{
		$data['growthingCrop'] = $this->Stock->getGrowthingCrops($seasons);
		// var_dump($data);exit;
		$this->loadview('growthingCrop',$data);
	}
}
