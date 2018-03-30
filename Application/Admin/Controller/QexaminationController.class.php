<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class QexaminationController extends Controller
{
	public function qexamination()
	{
		if($_SESSION['id']==''){echo $this->jump('请登录',"Index/login");}
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
			$qualifications = M('qualifications');

			$show = $qualifications->where('department_id='.$user_bmid.' AND status <> 3 AND bm_sp=0 AND flag <> 3')->select();
			// var_dump($show);exit;
			$this->assign('show', $show);

			$this->display();
		}elseif($manager){
			$qualifications = M('qualifications');

			$show = $qualifications->where('department_id='.$user_bmid.' AND status <> 3 AND manager_sp=0 AND bm_sp=1 AND flag <> 3')->select();
			
			$this->assign('show', $show);
			$this->display();
		}elseif($renshi){
			$qualifications = M('qualifications');
			$renshi = $qualifications->where(' status = 2 AND bm_sp=1 AND manager_sp=1 AND flag <> 3')->select();
			// var_dump($renshi);exit;
			$this->assign('renshi', $renshi);
			$this->display();
		}elseif($guanli){
			$qualifications = M('qualifications');
			$guanli = $qualifications->where(' status = 2 AND bm_sp=1 AND manager_sp=1 AND flag <> 3')->select();
			// var_dump($renshi);exit;
			$this->assign('guanli', $guanli);
			$this->display();
		}else{
			echo $this->jump('您没有权限哦', 'Qualifications/qualifications');
		}
	}

	public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
    public function info($id)
	{	
		if($_SESSION['id']==''){echo $this->jump('请登录',"Index/login");}
		$uname       = session('name');
		$leave       = M('qualifications');
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
		if($_SESSION['id']==''){echo $this->jump('请登录',"Index/login");}
		$map['bm_sp'] = $_POST['bm_sp'];
		$map['id'] = $_POST['id'];
		$map['status'] = $_POST['status'];
		$qualifications = M('qualifications');
		$jingli = $qualifications->where("id=".$_POST['id'])->field("qualifications_applicant")->select();


		if($map['bm_sp']==0){
			$map['bm_sp'] = 1;
			$map['status'] = 1;
			M('qualifications')->where('id='.$map['id'])->save($map);
			echo    $this->jump('已通过 !', 'Qexamination/qexamination');
		}elseif($map['bm_sp']==1){
			$map['manager_sp'] = 1;
			$map['status'] = 2;
			M('qualifications')->where('id='.$map['id'])->save($map);
			$this->journals($_SESSION['name'],'通过了申请',$jingli[0]["qualifications_applicant"]);
			echo    $this->jump('已通过 !', 'Qexamination/qexamination');
		}else{
			echo    $this->jump('出现问题了呢，提交失败！', 'Qexamination/qexamination');
		}
	}
	public function Not($id)
	{	
		if($_SESSION['id']==''){echo $this->jump('请登录',"Index/login");}
		$leave = M('qualifications')->where('id='.$id)->find();
		$leave['status'] = 3;
		$leave = M('qualifications')->where('id='.$id)->save($leave);
		if($leave){
			echo $this->jump('你拒绝了TA ！', 'Qexamination/qexamination');
		}else{
			echo $this->jump('操作失败！', 'Qexamination/qexamination');
		}
	}

}