<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class AequipmentController extends Controller {
	public function aequipment(){
		if($_SESSION['id']==''){echo $this->jump('请登录',"Index/login");}
		$aequipment=M('aequipment');
		$count=$aequipment->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$aequipment->where("flag = 0 ")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function aequipment_add(){
		if($_SESSION['id']==''){echo $this->jump('请登录',"Index/login");}
		$kefu = M('admin_user')->where("administration = 1")->field("admin_user.id,admin_user.name")->select();
		$this->assign('kefu', $kefu);
		$this->assign('kefu', $kefu);
		if(!empty($_POST['sub'])){
			$aequipment=M("aequipment");
			$map['aequipment_aenterprise']=$_POST['aequipment_aenterprise'];
			$map['aequipment_contrac']=$_POST['aequipment_contrac'];
			$map['aequipment_qualified']=$_POST['aequipment_qualified'];
			$map['aequipment_level']=$_POST['aequipment_level'];
			$map['aequipment_major']=$_POST['aequipment_major'];
			$map['aequipment_talent']=$_POST['aequipment_talent'];
			$map['aequipment_customer']=$_POST['aequipment_customer'];
			$map['aid']=$_POST['aid'];
			// $a = explode('=',$_SERVER['QUERY_STRING']);
			// var_dump($a);exit;
			$query=$aequipment->add($map);
			if($query>0){	
				$this->journals($_SESSION['name'],'申请了到账配备信息',$_POST['aequipment_aenterprise']);
				echo $this->jump('添加成功',"Arrival/info?id={$map['aid']}");
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
    public function aequipment_mod($id)
	{
		if($_SESSION['id']==''){echo $this->jump('请登录',"Index/login");}
		$aequipment=M('aequipment');
			$_GET['id'];
			// var_dump($_GET);exit;
		if (!empty($_POST['sub'])) {
			// var_dump($_POST);exit;
			$id=$_POST['id'];
			// var_dump($id);exit;
			$map['aequipment_aenterprise']=$_POST['aequipment_aenterprise'];
			$map['aequipment_contrac']=$_POST['aequipment_contrac'];
			$map['aequipment_qualified']=$_POST['aequipment_qualified'];
			$map['aequipment_level']=$_POST['aequipment_level'];
			$map['aequipment_major']=$_POST['aequipment_major'];
			$map['aequipment_talent']=$_POST['aequipment_talent'];
			$map['aequipment_customer']=$_POST['aequipment_customer'];
			$map['aid']=$_POST['aid'];
			$val=$aequipment->where("aid=".$map['aid'])->find($map);

			// $val=$aequipment->where("id=".$map['id'])->find($map);
			$val=$aequipment->where("id=".$id)->save($map);
			// var_dump($_POST);exit;
			// var_dump($_POST);exit;
			if($val)
			{
				$this->journals($_SESSION['name'],'修改了到账配备信息',$_POST['aequipment_aenterprise']);
				echo $this->jump("修改成功","Arrival/info?id={$map['aid']}");
			}else {
				echo $this->jump("修改失败","Arrival/info?id={$map['aid']}");
			}
		}
		elseif(!empty($_GET['id'])){
			$admin_user=M('admin_user');
			$aequipment=M('aequipment');
			// var_dump($xiugaikehu);exit;
			$id=$_GET['id'];
			// $a=$aequipment->where()->field("aequipment_customer")->find("$id");
			// var_dump($a);exit;
			$user=$admin_user->where("administration = 1")->field("id,name")->select();
			$sel = $aequipment->where("id = ".$id)->find();
			
			// var_dump($sel);exit;
			// $sel = $aequipment->where()->find("$id");
			$this->assign('user',$user);
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	public function del()
	{
		if($_SESSION['id']==''){echo $this->jump('请登录',"Index/login");}
		if(!empty($_GET['id'])){
			$apeibei=M('aequipment');
			$id=$_GET['id'];
			$aequipment['flag'] = 1;
		 	$val=$apeibei->where("flag = 0 and id = ".$id)->save($aequipment);
		 	// var_dump($val);exit;
		 	// var_dump($a);exit;
		 	$a=$apeibei->where("id = ".$id)->field("aid")->find();
			if($val>0)
			{
				$this->journals($_SESSION['name'],'删除了到账配备信息',$_POST['aequipment_aenterprise']);
				echo $this->jump("删除成功","Arrival/info?id={$a['aid']}");
			}else 
				{
				echo $this->jump("删除失败","Arrival/info?id={$a['aid']}");
			}		
		}
	}
	public function info(){
		if($_SESSION['id']==''){echo $this->jump('请登录',"Index/login");}
		$aequipment=M('aequipment');
		$id=$_GET['id'];
		$arr=$aequipment->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
}