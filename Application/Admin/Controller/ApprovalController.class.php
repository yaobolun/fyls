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
		$user_bmid = $user['department_id'];

		$condition = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%主管%"')->find();
		$manager = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%经理%"')->find();
		// $personnel = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%人事%"')->find();
		if(session('administration') == 0){
			$form_leave = M('form_leave');
			$count = $form_leave->count();
			$Page=new\Think\Page($count,10);
			$page= $Page->show();
			$show = $form_leave->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('page', $page);
			$this->assign('show', $show);
			$this->display();
		}

		// //判断市场主管
		// elseif($personnel && $condition){
		// 	$form_leave = M('form_leave');
		// 	$count = $form_leave->where('department_id='.$user_bmid)->count();
		// 	$Page=new\Think\Page($count,10);
		// 	$page= $Page->show();
		// 	$show = $form_leave->where('department_id='.$user_bmid.' AND aid='.$uid.' AND bm_sp=0 AND flag <> 3')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		// 	$this->assign('show', $show);
		// 	$this->assign('page', $page);
		// 	$this->display();
		// //判断是否是该部门下主管
		// }
		elseif($condition){
			$form_leave = M('form_leave');
			$count = $form_leave->where('department_id='.$user_bmid)->count();
			$Page=new\Think\Page($count,10);
			$page= $Page->show();
			$show = $form_leave->where('department_id='.$user_bmid.' AND aid='.$uid.' AND bm_sp=0 AND flag <> 3')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('page', $page);
			$this->assign('show', $show);
			$this->display();
		}elseif($manager){
			$form_leave = M('form_leave');
			$count = $form_leave->where('manager_sp=0 AND bm_sp=1 AND flag <> 3')->count();
			$Page=new\Think\Page($count,10);
			$page= $Page->show();
			$show = $form_leave->where('department_id='.$user_bmid.' AND manager_sp=0 AND bm_sp=1 AND flag <> 3')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('show', $show);
			$this->assign('page', $page);
			$this->display();
		}else{
			echo $this->jump('您没有权限哦', 'Leave/leave_list');
		}

	}
	public function leaveinfo()
	{	

		$leave = M('form_leave');
		$find = $leave->where('id='.$_GET['id'])->find();
		$bmid = $find['department_id'];
		$departments = M('departments');
		$bmname = $departments->where('id='.$bmid)->find();
		$bmname = $bmname['department_name'];
		$user = M('admin_user')->where('id='.$find['aid'])->find();
		$uname = $user['name'];
		$kstime = $find['start_time'];
		$jstime = $find['end_time'];
		$zero1 = strtotime ($kstime);
		$zero2 = strtotime ($jstime);
		$guonian=ceil(($zero2-$zero1)/86400);
		$guonian = abs($guonian);
		$this->assign('day', $guonian);
		$this->assign('bmname', $bmname);
		$this->assign('find', $find);
		$this->assign('uname', $uname);
		$this->display();
	}
	public function adopt()
	{
		$map['bm_sp'] = $_POST['bm_sp'];
		$map['id'] = $_POST['qj_id'];
		$map['flag'] = $_POST['flag'];
		// var_dump($map);die;
		if($map['bm_sp']==0){
			$map['bm_sp'] = 1;
			$map['flag'] = 1;
			M('form_leave')->where('id='.$map['id'])->save($map);
			echo    $this->jump('已通过 !', 'Approval/leave');
		}elseif($map['bm_sp']==1){
			$map['manager_sp'] = 1;
			$map['flag'] = 2;
			M('form_leave')->where('id='.$map['id'])->save($map);
			echo    $this->jump('已通过 !', 'Approval/leave');
		}else{
			echo    $this->jump('出现问题了呢，提交失败！', 'Approval/leave');
		}
	}
	public function Not($id)
	{	
		$leave = M('form_leave')->where('id='.$id)->find();
		$leave['flag'] = 3;
		$leave = M('form_leave')->where('id='.$id)->save($leave);
		if($leave){
			echo $this->jump('你拒绝了TA ！', 'Approval/leave');
		}else{
			echo $this->jump('操作失败！', 'Approval/leave');
		}
	}
	public function leaveinfo1()
	{
		$uname = session('name');
		$leave = M('form_leave');
		$find = $leave->find($id);
		$bmid = $find['department_id'];
		$kstime = $find['start_time'];
		$jstime = $find['end_time'];
		$zero1 = strtotime ($kstime);
		$zero2 = strtotime ($jstime);
		$guonian=ceil(($zero2-$zero1)/86400);
		$guonian = abs($guonian);
		$departments = M('departments');
		$bmname = $departments->where($bmid)->field('department_name')->find();
		$this->assign('day', $guonian);
		$this->assign('bmname', $bmname);
		$this->assign('find', $find);
		$this->assign('uname', $uname);
		$this->display();
	}

	public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
}