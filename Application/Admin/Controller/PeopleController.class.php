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
    	$admin=M('admin_user');
		$count=$admin->where("flag = 0")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$admin->where('flag = 0 and administration = 1')->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
    }
    //增加
    public function add(){
		if(!empty($_POST['sub'])){
			$admin=M('admin_user');
			$map['name']=$_POST['name'];
			$map['department_id']=$_POST['department_id'];
			$map['station_id']=$_POST['station_id'];
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
				if($query>0){
					
					echo $this->jump('添加成功','People/people');
				}
				else{
					echo $this->jump('添加失败',"People/add");
				}
			}
		}
		else{
			$this->display();
		}
	}

	/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
}