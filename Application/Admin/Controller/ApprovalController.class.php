<?php

namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class ApprovalController extends Controller
{
	public function leave()
	{
		$uid = session('id');
		$leave = M('form_leave');
		$admin_user = M('admin_user');
		$count=$leave->count();
		$Page=new\Think\Page($count,10);
		$show= $Page->show();
		$gwid = $admin_user->join("left join stations on stations.id = admin_user.station_id")->where("stations.flag = ".$uid)->select();

		var_dump($gwid);die;
		$arr=$leave->where("flag = 0")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('show', $arr);
		$this->assign('page', $show);
		$this->display();
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

	public function update()
	{

	}
}