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
		if($condition){
			$form_leave = M('form_leave');
			$show = $form_leave->where('department_id='.$user_bmid.' AND aid='.$uid.' AND bm_sp=0')->select();
			$this->assign('show', $show);
			$this->display();
		}else{
			echo '您没有权限哦 ! ';
			}
	}
	public function leaveinfo($id)
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
		}else{
			echo    $this->jump('出现问题了呢，提交失败！', 'Approval/leave');
		}
	}
	public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
}