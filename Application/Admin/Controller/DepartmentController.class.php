<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class DepartmentController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
    		$this->display();
    	}
    }
    //部门列表
    public function department(){
    	$department=M('departments');
		$count=$department->where("flag = 0")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$department->where('flag = 0')->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
    }

    //增加部门
    public function department_add(){
		if(!empty($_POST['sub'])){
			$department=M('departments');
			$map['department_name']=$_POST['department_name'];
			$map['updatetime'] = date("Y-m-d H:i:s");
			$map['flag'] = 0;
			$em2=$department->where("department_name='".$map['department_name']."' and flag = 0")->select();
			if($em2) {
				echo $this->jump("The administrator name cannot be repeated","Department/department_add");
			}
			else{
				$query=$department->add($map);
			
				if($query>0){
					$this->journal($_SESSION['name'],'增加了部门',$_POST['department_name']);
					echo $this->jump('添加成功','Department/department');
				}
				else{
					echo $this->jump('添加失败',"Department/department_add");
				}
			}
		}
		else{
			$this->display();
		}
	}

	//数据修改
	public function update(){
		$admin=M('departments');
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['department_name']=$_POST['title'];
						
			$val=$admin->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Department/department");
			}else {
				echo $this->jump("修改失败","Department/department");
			}
		}
		elseif(!empty($_GET['id'])){
			$id=$_GET['id'];
			$sel=$admin->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}

	//删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$department=M('departments');
			$id = $_GET['id'];
		 	$user['flag'] = 1; 
		 	$val=$department->where("flag = 0 and id = ".$id )->save($user);
			if($val>0)
			{
				echo $this->jump("删除成功","Department/department");
			}else 
				{
				echo $this->error("删除失败","Department/department");
			}		

		}
	}

	/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

}