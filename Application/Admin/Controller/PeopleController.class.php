<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class PeopleController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
			
    		$this->display();
    	}
    }

    public function people(){
		if($_SESSION['id']==''){echo	$this->jump('请登录',"Index/login");}
    	$admin=M('admin_user');
		$count=$admin->where("flag = 0")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		// $dep = $department->where()->select(); 
		// $arr=$admin->where('flag = 0 and administration = 1')->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$depar = $admin->join('departments ON admin_user.department_id = departments.id')->join('stations ON admin_user.station_id = stations.id')->where('admin_user.flag = 0 and administration = 1')->limit($Page->firstRow.','.$Page->listRows)->field('admin_user.id, admin_user.name, departments.department_name, stations.station_name, admin_user.updatetime')->select();
		// var_dump($depar);die;
		$this->assign('depar', $depar);
		$this->assign('page',$show);
		$this->display();
    }
    //增加
    public function add(){
    	if($_SESSION['id']==''){echo   $this->jump('请登录',"Index/login");}
    	if(isset($_POST['did'])){
			$station = M("stations");
            $res = $station->where("flag = 0 and department_id = ".$_POST['did'])->select();
            echo json_encode($res);exit();
        }
    	
		if(!empty($_POST['sub'])){
			$admin=M('admin_user');
			$map['name']=$_POST['name'];
			$map['department_id']=$_POST['department_id'];

			$map['station_id']=$_POST['station'];

			$map['password']=md5($_POST['password']);
			$map['administration'] = 1;
			$map['time'] = date("Y-m-d H:i:s");
			$map['updatetime'] = date("Y-m-d H:i:s");
			
			$em2=$admin->where("name='".$map['name']."' and flag = 0")->select();
			if($em2) {
				echo $this->jump("The administrator name cannot be repeated","People/add");
			}
			else{
				$query=$admin->add($map);
				$user = M('admin_user')->where('id='.$query)->find();
				$user = $user['name'];
				if($query>0){
					$this->journals($_SESSION['name'],'添加了员工',$user);

					echo $this->jump('添加成功','People/people');
				}
				else{
					echo $this->jump('添加失败',"People/add");
				}
			}
		}
		else{
			$department = M("departments");
	    	$station = M("stations");
	    	$dep = $department->where("flag = 0")->select();
	    	$sta = $station->where("flag = 0")->select();
	    	$this->assign("dep",$dep);
	    	$this->assign("sta",$sta);
			$this->display();
		}
	}
	//数据修改
	public function update(){
		$department = M("departments");
    	$station = M("stations");
		$admin=M('admin_user');
		if(isset($_POST['did'])){
			$station = M("stations");
            $res = $station->where("flag = 0 and department_id = ".$_POST['did'])->select();
            echo json_encode($res);exit();
        }
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['name']=$_POST['title'];
			$map['department_id']=$_POST['department_id'];
			$map['station_id']=$_POST['station'];
			$map['updatetime'] = date('y-m-d h:i:s',time());
			$val=$admin->where("id=".$id)->save($map);

			if($val)
			{
				echo $this->jump("修改成功","People/people");
			}else {
				echo $this->jump("修改失败","People/people");
			}
		}
		elseif(!empty($_GET['id'])){
			$id=$_GET['id'];
			// $dep = $admin->join("left join departments on admin_user.department_id = departments.id")->where("admin_user.flag = 0")->field("departments.id,departments.department_name")->select();
			$dep = M('departments')->field('department_name, id')->select();
			// var_dump($dep);die;
	    	$sta = $admin->join("left join stations on admin_user.station_id = stations.id")->where("admin_user.flag = 0 ")->field("stations.id,stations.station_name")->select();
	    	// $sta = M('stations')->field('station_name, id')->select();
	    	$this->assign("dep",$dep);
	    	$this->assign("sta",$sta);

			$sel=$admin->where('id='.$id)->find();
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	//删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$admin=M('admin_user');
			$id = $_GET['id'];
		 	$user['flag'] = 1; 
		 	$val=$admin->where("flag = 0 and id = ".$id )->save($user);
			if($val>0)
			{
				echo $this->jump("删除成功","People/people");
			}else 
				{
				echo $this->error("删除失败","People/people");
			}
		}
	}
	/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
}
