<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class AdminController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
			
    		$this->display();
    	}
    }

	public function admin(){
		$admin=M('admin_user');

		$count=$admin->where("flag = 0")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$admin->where('flag = 0 and administration = 0')->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$count=$admin->where("flag = 0")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$admin->where('flag = 0 and administration = 0')->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function admin_add(){
		if(!empty($_POST['sub'])){
			$admin=M('admin_user');
			$map['name']=$_POST['name'];
			$map['password']=md5($_POST['password']);
			$map['administration'] = 0;
			$map['time'] = date("Y-m-d H:i:s");
			$map['updatetime'] = date("Y-m-d H:i:s");
			$em2=$admin->where("name='".$map['name']."' and flag = 0")->select();

			if($em2) {
				echo $this->jump("The administrator name cannot be repeated","Admin/admin_add");
			}
			else{
				$query=$admin->add($map);
				if($query>0){
					echo $this->jump('添加成功','Admin/admin');
				}
				else{
					echo $this->jump('添加失败',"Admin/admin_add");
				}
			}
		}
		else{
			$this->display();
		}
	}
	//删除数据
	public function admin_del()
	{
		if(!empty($_GET['id'])){
			$admin=M('admin_user');
			$id = $_GET['id'];
		 	$user['flag'] = 1; 
		 	$val=$admin->where("flag = 0 and id = ".$id )->save($user);
			if($val>0)
			{
				echo $this->jump("删除成功","Admin/admin");
			}else 
				{
				echo $this->error("删除失败","Admin/admin");
			}		

		}
	}
	//数据修改
	public function admin_update(){
		$admin=M('admin_user');
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['name']=$_POST['title'];
			$map['password']=md5($_POST['password']);
			$map['updatetime']=date("Y-m-d H:i:s");					
			$val=$admin->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Admin/admin");
			}else {
				echo $this->jump("修改失败","Admin/admin");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$admin->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

}