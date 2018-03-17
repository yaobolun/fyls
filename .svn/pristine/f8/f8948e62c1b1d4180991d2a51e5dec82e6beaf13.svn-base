<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class StationController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
    		$this->display();
    	}
    }
    //岗位列表
    public function station(){
    	$stations=M('stations');
    	$departments = M("departments");
		$count=$stations->where("flag = 0")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$stations->where('flag = 0')->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$Re = $departments -> join('LEFT JOIN stations ON stations.department_id = departments.id')->where("stations.flag = 0")->select(); 
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->assign('Re',$Re);
		// var_dump($Re);exit;
		$this->display();
    }

    //增加岗位
    public function add(){
    	$department=M('departments');
    	$departments = $department->where("flag = 0")->select();
    	$this->assign('departments',$departments);
		if(!empty($_POST['sub'])){
			$stations=M('stations');
			$map['station_name']=$_POST['station_name'];
			$map['department_id']=$_POST['department_id'];
			$map['updatetime'] = date("Y-m-d H:i:s");
			$map['flag'] = 0;
			$em2=$stations->where("station_name='".$map['station_name']."' and flag = 0 and department_id = ".$_POST['department_id'])->select();
			if($em2) {
				echo $this->jump("The administrator name cannot be repeated","Station/add");
			}
			else{
				$query=$stations->add($map);
			
				if($query>0){
					echo $this->jump('添加成功','Station/station');
				}
				else{
					echo $this->jump('添加失败',"Station/add");
				}
			}
		}
		else{
			$this->display();
		}
	}

	//数据修改
	public function update(){
		$admin=M('stations');
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['station_name']=$_POST['title'];
						
			$val=$admin->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Station/station");
			}else {
				echo $this->jump("修改失败","Station/station");
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
			$station=M('stations');
			$id = $_GET['id'];
		 	$user['flag'] = 1; 
		 	$val=$station->where("flag = 0 and id = ".$id )->save($user);
			if($val>0)
			{
				echo $this->jump("删除成功","Station/station");
			}else 
				{
				echo $this->error("删除失败","Station/station");
			}		

		}
	}

	/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

}