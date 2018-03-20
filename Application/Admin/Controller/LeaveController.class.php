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

	public function member(){
		$user=M('form_business travel');
		$count=$user->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		if(!empty($_POST['sub'])){
	 			$map['Name']=array("like","%".$_POST['name']."%");	 
		}
		$arr=$user->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$address=M('address');
		foreach ($arr as $key => $value) {
			$dizhi=$address->where('a_user='.$value['id'])->select();
			$count=count($dizhi);
			for ($i=0; $i < $count; $i++) { 
				$arr[$key]['address'][$i]=$dizhi[$i]['a_address'];
			}

		}
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
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

	public function add_leave()
	{
		$bmid = session('department_id');
		$director = M('stations')->where('department_id ='.$bmid.' AND station_name LIKE "%主管%"')->select();
		$user_id = array_column($director,'id');
		// $name = M('admin_user')->where('station_id IN ($user_id)')->field('name')->select();
		// var_dump($name);die;

		$this->assign('name', $name);
		$this->display();
	}

	public function doadd_leave()
	{
		if(!empty($_POST)){
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
		$count=$leave->count();
		$Page=new\Think\Page($count,10);
		$show = $leave->where($sid)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('show', $show);
		$this->display();
	}
	public function leave_del()
	{
		//删除数据
		if(!empty($_GET['id'])){
			$leave=M('form_leave');
			$id=$_GET['id'];
		 	$val=$leave->delete($id);
			if($val>0)
			{
				echo	$this->jump("删除成功","Leave/leave_list");
			}else
				{
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
			$val = $leave->where("id=".$id)->save($map);
			if($val){
				echo $this->jump('修改成功', 'Leave/leave_list');
			}else{
				echo $this->jump('修改失败', 'Leave/leave_list');
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

}