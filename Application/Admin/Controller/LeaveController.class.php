<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class LeaveController extends Controller {
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
	public function add_leave()
	{
		$bmid = session('department_id');

		$director = M('stations')->where('department_id ='.$bmid.' AND station_name LIKE "%主管%"')->select();
		if(!$director){
			$this->assign('user', $user);
			$this->display();
		}
		$user_id = array_column($director,'id');
		$a = implode(",",$user_id);
		$user = M('admin_user')->where('station_id IN ('.$a.') AND department_id='.$bmid)->select();
		// var_dump($name);die;
		$this->assign('user', $user);
		$this->display();
	}
	public function doadd_leave()
	{	
		if(!empty($_POST)){
			// var_dump($_POST);die;
			$user=M('form_leave');
			$map = $user->create();
			$query=$user->add($map);
			if($query>0){
				echo	$this->jump('申请成功，请等待结果！',"Leave/leave_list");
			}else{
				echo	$this->jump('申请失败，请重新申请！',"Leave/add_leave");
			}
		}else{
			$this->display();
		}
	}
	public function leave_list()
	{
		$sid = session('id');
		$leave = M('form_leave');
		$count=$leave->where('uid='.$sid)->count();
		$Page=new\Think\Page($count,10);
		$page= $Page->show();
		$show = $leave->where('uid='.$sid)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('show', $show);
		$this->assign('page', $page);
		$this->display();
	}
	public function leave_del()
	{
		if(!empty($_GET['id'])){
			$leave=M('form_leave');
			$id=$_GET['id'];
		 	$val=$leave->delete($id);
			if($val>0)
			{
				echo	$this->jump("删除成功","Leave/leave_list");
			}else{
				echo	$this->jump("删除失败","leave/leave_list");
			}
		}
	}

	public function leave_edit()
	{
		$leave=M('form_leave');
		if(!empty($_POST['sub'])){
			$id = $_POST['id'];
			$map = $leave->create();
			$map['flag'] = 0;
			$val = $leave->where("id=".$id)->save($map);
			if($val>0){
				echo $this->jump('成功', 'Leave/leave_list');
			}else{
				echo $this->jump('失败了', 'Leave/leave_list');
			}
		}elseif(!empty($_GET['id'])){
			$id=$_GET['id'];
			$show=$leave->where()->join()->find("$id");
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

	public function member_add(){
		if(!empty($_POST['sub'])){
			$user=M('user');

			$map=$user->create();
			
			$query=$user->add($map);
			if($query>0){
				echo	$this->jump('添加成功',"Member/member");
			}
			else{
				echo	$this->jump('添加失败',"Member/member_add");
			}
		}else{
			$this->display();
		}
	}
	
	public function guest(){
		$guestbook=M('guestbook');
		$count=$guestbook->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		if(!empty($_POST['sub'])){
		 	$map['Name']=array("like","%".$_POST['name']."%");	 
		}
		$arr=$guestbook->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function guest_mod(){
		$guestbook=M('guestbook');
		if(!empty($_GET['id'])){
			$id=$_GET['id'];
			$sel=$guestbook->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	public function leavelist1()
	{
		$form_leave = M('form_leave');
		$count=$form_leave->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$page= $Page->show();// 分页显示输出
		$show = $form_leave->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('show', $show);
		$this->assign('page',$page);
		$this->display('');
	}


}