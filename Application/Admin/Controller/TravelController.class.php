<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class TravelController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo	$this->jump('请登录',"Index/login");
    	}else {
    		$this->display();
    	}
    }
 /*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
	public function add_travel()
	{	
		
		$bmid = session('department_id');
		$director = M('stations')->where('department_id ='.$bmid.' AND station_name LIKE "%主管%"')->select();
		$user_id = array_column($director,'id');
		$a = implode(",",$user_id);
		$user = M('admin_user')->where('station_id IN ('.$a.') AND department_id='.$bmid)->select();
		// var_dump($name);die;
		$this->assign('user', $user);
		$this->display();
	}
	public function doadd_travel()
	{
		$_validate = array(
		     array('applicant','require', '申请人不能为空！'),
		     array('out_addr', 'require', '请填写外出地址！'),
		     array('out_reason', 'require', '请填写外出原因'),
		     array('out_time', 'require', '开始时间不能为空'),
		     array('back_time', 'require', '结束时间不能为空'),
		     array('aid', 'require', '请选择一个主管'),
		);

		$User = D("form_business_travel");
		if (!$User->validate($_validate)->create()){
		     $this->error($User->getError());
		}else{
		    $user=M('form_business_travel');
			$map = $user->create();
			$query=$user->add($map);
			if($query>0){
				echo	$this->jump('申请成功，请等待结果！',"Travel/travel_list");
			}else{
				echo	$this->jump('申请失败，请重新申请！',"Travel/add_travel");
			}
		}

		// if(!empty($_POST)){
		// 	$user=M('form_business_travel');
		// 	$map = $user->create();
		// 	$query=$user->add($map);
		// 	$this->assign('check', $check);
		// 	if($query>0){
		// 		echo	$this->jump('申请成功，请等待结果！',"Travel/travel_list");
		// 	}else{
		// 		echo	$this->jump('申请失败，请重新申请！',"Travel/add_travel");
		// 	}
		// }else{
		// 	$this->display('/Admin/Travel/add_travel');
		// }
	}
	public function travel_list()
	{
		$sid = session('id');
		$leave = M('form_business_travel');
		$count=$leave->count();
		$Page=new\Think\Page($count,10);
		$page= $Page->show();
		$show = $leave->where('uid='.$sid)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('show', $show);
		$this->assign('page', $page);
		$this->display();
	}
	public function travel_del()
	{
		//删除数据
		if(!empty($_GET['id'])){
			$leave=M('form_business_travel');
			$id=$_GET['id'];
		 	$val=$leave->delete($id);

			if($val>0)
			{
				echo	$this->jump("删除成功","Travel/travel_list");
			}else
				{
				echo	$this->jump("删除失败","Travel/travel_list");
			}		
		}
	}
	public function travel_edit()
	{
		$leave=M('form_business_travel');

		if(!empty($_POST['sub'])){
			$id = $_POST['id'];
			$map = $leave->create();
			$val = $leave->where("id=".$id)->save($map);
			if($val){
				echo $this->jump('修改成功', 'Travel/travel_list');
			}else{
				echo $this->jump('您没有做任何修改', 'Travel/travel_edit?id='.$id);
			}
		}elseif(!empty($_GET['id'])){
			$id=$_GET['id'];
			$show=$leave->where()->join()->find("$id");
			// var_dump($show);exit;
			$this->assign('show',$show);
			$this->display();
		}
	}

		public function member_mod(){
			$user=M('user');
			if (!empty($_POST['sub'])) {
				$id=$_POST['id'];
				$map=$user->create();
				
				$val=$user->where("id=".$id)->save($map);
				//echo "<pre>";print_r($val);echo "<pre>";die;
				if($val)
				{
					echo	$this->jump("修改成功","Member/member");
				}else {
					echo	$this->jump("修改失败","Member/member");
				}
			}elseif(!empty($_GET['id'])){
		
				$id=$_GET['id'];
				$sel=$user->where()->join()->find("$id");
				$this->assign('sel',$sel);
				$this->display();
			}
		}
}