<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class RequipmentController extends Controller {
	public function requipment_add(){
		$kefu = M('admin_user')->where("administration = 1")->field("admin_user.id,admin_user.name")->select();
		$this->assign('kefu', $kefu);
		$this->assign('kefu', $kefu);
		if(!empty($_POST['sub'])){
			$requipment=M("requipment");
			$map['requipment_enterprise']=$_POST['requipment_enterprise'];
			$map['requipment_contractyears']=$_POST['requipment_contractyears'];
			$map['requipment_qualified']=$_POST['requipment_qualified'];
			$map['requipment_level']=$_POST['requipment_level'];
			$map['requipment_major']=$_POST['requipment_major'];
			$map['requipment_talent']=$_POST['requipment_talent'];
			$map['requipment_customer']=$_POST['requipment_customer'];
			$map['uid']=$_POST['uid'];
			// $a = explode('=',$_SERVER['QUERY_STRING']);
			// var_dump($_POST);exit;
			$query=$requipment->add($map);
			if($query>0){
				echo $this->jump('添加成功',"Refund/info?id={$map['uid']}");
			}
			else{
				echo $this->jump('添加失败','Aequipment/aequipment_add');
			}
		}
		else{
		$this->display();
		}
	}
	public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
    public function del()
	{
		if(!empty($_GET['id'])){
			$rpeibei=M('requipment');
			$id=$_GET['id'];
			$requipment['flag'] = 1;
		 	$val=$rpeibei->where("flag = 0 and id = ".$id)->save($requipment);
		 	// var_dump($val);exit;
		 	// var_dump($a);exit;
		 	$a=$rpeibei->where("id = ".$id)->field("uid")->find();
			if($val>0)
			{
				echo $this->jump("删除成功","Refund/info?id={$a['uid']}");
			}else 
				{
				echo $this->jump("删除失败","Refund/info?id={$a['uid']}");
			}		
		}
	}
	public function requipment_mod($id)
	{
		$requipment=M('requipment');
			$_GET['id'];
			// var_dump($_GET);exit;
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			// var_dump($id);exit;
			$map['requipment_enterprise']=$_POST['requipment_enterprise'];
			$map['requipment_contractyears']=$_POST['requipment_contractyears'];
			$map['requipment_qualified']=$_POST['requipment_qualified'];
			$map['requipment_level']=$_POST['requipment_level'];
			$map['requipment_major']=$_POST['requipment_major'];
			$map['requipment_talent']=$_POST['requipment_talent'];
			$map['requipment_customer']=$_POST['requipment_customer'];
			$map['uid']=$_POST['uid'];
			$val=$requipment->where("uid=".$map['uid'])->find($map);
			// $val=$aequipment->where("id=".$map['id'])->find($map);
			$val=$requipment->where("id=".$id)->save($map);
			// var_dump($_POST);exit;
			if($val)
			{
				echo $this->jump("修改成功","Refund/info?id={$map['uid']}");
			}else {
				echo $this->jump("修改失败","Refund/info?id={$map['uid']}");
			}
		}
		elseif(!empty($_GET['id'])){
			$id=$_GET['id'];
			$admin_user=M('admin_user');
			$requipment=M('requipment');
			$user=$admin_user->where("administration = 1")->field("id,name")->select();
			$sel=$requipment->where("id = ".$id)->find();
			// var_dump($sel);exit;
			$this->assign('user',$user);
			$this->assign('sel',$sel);
			$this->display();
		}
	}
}