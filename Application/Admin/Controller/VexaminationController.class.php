<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class VexaminationController extends Controller
{
	public function vexamination()
	{
		$uid = session('id');
		// var_dump($uid);exit;
		$admin_user = M('admin_user');

		$user = $admin_user->where('id='.$uid)->find();

		$user_qxid = $user['station_id'];
						
		$user_bmid = $user['department_id'];

		$condition = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%主管%"')->find();
		// var_dump($condition);exit;
		$manager = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%经理%"')->find();

		$renshi = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%人事%"')->find();
		$guanli = M('admin_user')->where('administration = 0')->find();

		if($condition){
			$voucher = M('voucher');

			$show = $voucher->where('department_id='.$user_bmid.' AND status <> 3 AND bm_sp=0 AND flag <> 3')->select();
			// var_dump($show);exit;
			$this->assign('show', $show);

			$this->display();
		}elseif($manager){
			$voucher = M('voucher');

			$show = $voucher->where('department_id='.$user_bmid.' AND status <> 3 AND manager_sp=0 AND bm_sp=1 AND flag <> 3')->select();
			
			$this->assign('show', $show);
			$this->display();
		}elseif($renshi){
			$voucher = M('voucher');
			$renshi = $voucher->where(' status = 2 AND bm_sp=1 AND manager_sp=1 AND flag <> 3')->select();
			// var_dump($renshi);exit;
			$this->assign('renshi', $renshi);
			$this->display();
		}elseif($guanli){
			$voucher = M('voucher');
			$guanli = $voucher->where(' status = 2 AND bm_sp=1 AND manager_sp=1 AND flag <> 3')->select();
			// var_dump($renshi);exit;
			$this->assign('guanli', $guanli);
			$this->display();
		}else{
			echo $this->jump('您没有权限哦', 'Voucher/voucher');
		}
	}

	public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
    public function info($id)
	{	
		$uname       = session('name');
		$leave       = M('voucher');
		$find        = $leave->find($id);
		$bmid        = $find['department_id'];
		$departments = M('departments');
		$bmname      = $departments->where($bmid)->field('department_name')->find();
		$this->assign('bmname', $bmname);
		$this->assign('find', $find);
		$this->assign('uname', $uname);
		$this->display();
	}
	public function adopt()
	{
		$map['bm_sp'] = $_POST['bm_sp'];
		$map['id'] = $_POST['id'];
		$map['status'] = $_POST['status'];

		if($map['bm_sp']==0){
			$map['bm_sp'] = 1;
			$map['status'] = 1;
			M('voucher')->where('id='.$map['id'])->save($map);
			echo    $this->jump('已通过 !', 'Vexamination/vexamination');
		}elseif($map['bm_sp']==1){
			$map['manager_sp'] = 1;
			$map['status'] = 2;
			M('voucher')->where('id='.$map['id'])->save($map);
			echo    $this->jump('已通过 !', 'Vexamination/vexamination');
		}else{
			echo    $this->jump('出现问题了呢，提交失败！', 'Vexamination/vexamination');
		}
	}
	public function Not($id)
	{	
		$leave = M('voucher')->where('id='.$id)->find();
		$leave['status'] = 3;
		$leave = M('voucher')->where('id='.$id)->save($leave);
		if($leave){
			echo $this->jump('你拒绝了TA ！', 'Vexamination/vexamination');
		}else{
			echo $this->jump('操作失败！', 'Vexamination/vexamination');
		}
	}
}