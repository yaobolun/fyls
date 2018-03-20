<?php

namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class ApprovalController extends Controller
{
	public function leave()
	{
		$uid = session('id');
		$admin_user = M('admin_user');
		$user = $admin_user->where('id='.$uid)->find();
		$user_qxid = $user['station_id'];
		$condition = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%主管%"')->find();
		if($condition){
			echo 11;die;
		}else{
			echo 22;die;
			}
		// $director = M('stations')->where('department_id ='.$bmid.' AND station_name LIKE "%主管%"')->select();
		// $user_id = array_column($director,'id');

		// $count=$leave->count();
		// $Page=new\Think\Page($count,10);
		// $show= $Page->show();
		// $arr=$leave->where("flag = 0")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		// $this->assign('show', $arr);
		// $this->assign('page', $show);
		// $this->display();
	}
	public function leaveinfo($id)
	{
		$leave = M('form_leave');
		$find = $leave->find($id);
		$bmid = $find['department_id'];
		$kstime = $find['start_time'];
		$jstime = $find['end_time'];
		$zero1 = strtotime ($kstime);
		$zero2 = strtotime ($jstime);
		$guonian=ceil(($zero2-$zero1)/86400);
		$departments = M('departments');
		$bmname = $departments->where($bmid)->field('department_name')->find();

		$this->assign('day', $guonian);
		$this->assign('bmname', $bmname);
		$this->assign('find', $find);
		$this->display();
	}

	public function adopt()
	{
		$a = $_GET[''];
		var_dump($a);die;
	}
}