<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class AuthorityController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
    		$this->display();
    	}
    }
    //权限列表
    public function authority(){
    	$authority=M('authority');
		$count=$authority->where("flag = 0")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$authority->where('flag = 0')->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
    }

    //增加权限
    public function add(){
		if(!empty($_POST['sub'])){
			$authority=M('authority');
			$map['authority']=$_POST['authority'];
			$map['flag'] = 0;
			$em2=$authority->where("authority='".$map['authority']."' and flag = 0")->select();
			if($em2) {
				echo $this->jump("The administrator name cannot be repeated","Authority/add");
			}
			else{
				$query=$authority->add($map);
			
				if($query>0){
					$this->journal($_SESSION['name'],'增加了权限',$_POST['authority']);
					echo $this->jump('添加成功','Authority/authority');
				}
				else{
					echo $this->jump('添加失败',"Authority/add");
				}
			}
		}
		else{
			$this->display();
		}
	}

	//数据修改
	public function update(){
		$authority=M('authority');
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['authority']=$_POST['title'];
						
			$val=$authority->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Authority/authority");
			}else {
				echo $this->jump("修改失败","Authority/authority");
			}
		}
		elseif(!empty($_GET['id'])){
			$id=$_GET['id'];
			$sel=$authority->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}

	//删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$authority=M('authority');
			$id = $_GET['id'];
		 	$user['flag'] = 1; 
		 	$val=$authority->where("flag = 0 and id = ".$id )->save($user);
			if($val>0)
			{
				echo $this->jump("删除成功","Authority/authority");
			}else 
				{
				echo $this->error("删除失败","Authority/authority");
			}		

		}
	}

	/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

}