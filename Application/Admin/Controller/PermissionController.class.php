<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class PermissionController extends Controller
{
	public function travel()
	{
		$uid = session('id');
		$admin_user = M('admin_user');
		$user = $admin_user->where('id='.$uid)->find();
		$user_qxid = $user['station_id'];
		$user_bmid = $user['department_id'];
		$condition = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%主管%"')->find();
		$manager = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%经理%"')->find();
		$Personnel = M('departments')->where('id ='.$user_bmid.' AND department_name LIKE "%市场%部%"')->find();
		if(session('administration') == 0){
			$form_business_travel = M('form_business_travel');
			$form_business_travel->count();
			$Page=new\Think\Page($count,10);
			$page= $Page->show();
			$show = $form_business_travel->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('page', $page);
			$this->assign('show', $show);
			$this->display();
		}
		//判断是不是人事的
		elseif($Personnel && $condition){
			$form_business_travel = M('form_business_travel');
			$show = $form_business_travel->where('department_id='.$user_bmid.' AND aid='.$uid.' AND bm_sp=0 AND flag <> 3')->select();
			$this->assign('show', $show);
			$this->display();

			// $form_business_travel = M('form_business_travel');
			// $count=$form_business_travel->count();// 查询满足要求的总记录数
			// $Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
			// $page= $Page->show();// 分页显示输出
			// $show = $form_business_travel->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			// $this->assign('show', $show);
			// $this->assign('page',$page);
			// $this->display('Permission/Personnel');
		//判断是否是该部门下经理
		}elseif($Personnel && $manager){
			// 人事的经理 看的在这
		}elseif($Personnel){
			$form_business_travel = M('form_business_travel');
			$count=$form_business_travel->count();// 查询满足要求的总记录数
			$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
			$page= $Page->show();// 分页显示输出
			$show = $form_business_travel->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('show', $show);
			$this->assign('page',$page);
			$this->display('Permission/Personnel');
		}elseif($manager){
			$form_business_travel = M('form_business_travel');
			$show = $form_business_travel->where('department_id='.$user_bmid.' AND manager_sp=0 AND bm_sp=1 AND flag <> 3')->select();
			$this->assign('show', $show);
			$this->display();
		//判断是否是该部门下的主管
		}elseif($condition){
			$form_business_travel = M('form_business_travel');
			$show = $form_business_travel->where('department_id='.$user_bmid.' AND aid='.$uid.' AND bm_sp=0 AND flag <> 3')->select();
			$this->assign('show', $show);
			$this->display();
		}else{
			echo $this->jump('您没有权限哦', 'Leave/leave_list');
		}
	}
	public function travelinfo($id)
	{	
		$uname       = session('name');
		$leave       = M('form_business_travel');
		$find        = $leave->find($id);
		$bmid        = $find['department_id'];
		$kstime      = $find['out_time'];
		$jstime      = $find['back_time'];
		$zero1       = strtotime ($kstime);
		$zero2       = strtotime ($jstime);
		$guonian     = ceil(($zero2-$zero1)/86400);
		$guonian     = abs($guonian);
		$departments = M('departments');
		$bmname      = $departments->where($bmid)->field('department_name')->find();
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

		if($map['bm_sp']==0){
			$map['bm_sp'] = 1;
			$map['flag'] = 1;
			M('form_business_travel')->where('id='.$map['id'])->save($map);
			echo    $this->jump('已通过 !', 'Permission/travel');
		}elseif($map['bm_sp']==1){
			$map['manager_sp'] = 1;
			$map['flag'] = 2;
			M('form_business_travel')->where('id='.$map['id'])->save($map);
			echo    $this->jump('已通过 !', 'Permission/travel');
		}else{
			echo    $this->jump('出现问题了呢，提交失败！', 'Permission/travel');
		}
	}
	public function Not($id)
	{
		$leave = M('form_business_travel')->where('id='.$id)->find();
		$leave['flag'] = 3;
		$leave = M('form_business_travel')->where('id='.$id)->save($leave);
		if($leave){
			echo $this->jump('你拒绝了TA ！', 'Permission/travel');
		}else{
			echo $this->jump('操作失败！', 'Permission/travel');
		}
	}
	public function goout($id)
	{
		$find = M('form_business_travel')->where('id='.$id)->find();
		$find['flag'] = 4;
		$find = M('form_business_travel')->where('id='.$id)->save($find);
		if($find){
			echo $this->jump('已完成！', 'Travel/travel_list');
		}else{
			echo $this->jump('操作失败，请重新操作！', 'Travel/travel_list');
		}
	}
	public function return(){
		$uid = session('id');
		$admin_user = M('admin_user');
		$user = $admin_user->where('id='.$uid)->find();
		$user_qxid = $user['station_id'];
		$user_bmid = $user['department_id'];
		$condition = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%主管%"')->find();
		if($condition){
			$return = M('form_business_travel')->where('flag=4')->select();
			$this->assign('show',$return);
			$this->display('Permission/return');
		}else{
			$hello = '您不是主管哦！';
			echo "<script>alert('{$hello}');history.go(-1)</script>"; 
		}
	}
	public function back()
	{
		if($_POST['id']){
			$find['flag'] = 5;
			$find = M('form_business_travel')->where('id='.$_POST['id'])->save($find);
			if($find){
				echo json_encode('已完成');
			}else{
				echo json_encode('操作失败');
			}
		}
	}
	public function determine()
	{	
		// echo json_encode($_POST['data']);exit;
		if($_POST['data']){
			$find = M('form_business_travel')->where('id='.$_POST['data'])->find();
			$find['flag'] = 6;
			$find = M('form_business_travel')->where('id='.$_POST['data'])->save($find);
			if($find){
				echo json_encode('已完成');
			}else{
				echo json_encode('操作失败');
			}
		}
	}
	public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
}