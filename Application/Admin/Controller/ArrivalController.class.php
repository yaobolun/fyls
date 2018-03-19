<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class ArrivalController extends Controller {
	public function arrival(){
		$arrival=M('arrival');
		$count=$arrival->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$arrival->where("flag = 0 ")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}

	public function arrival_add(){
		
		if(!empty($_POST['sub'])){
			$arrival=M("arrival");
			$map['arrival_applicant']=$_POST['arrival_applicant'];
			$map['arrival_account']=$_POST['arrival_account'];
			$map['arrival_time']=$_POST['arrival_time'];
			$map['arrival_money']=$_POST['arrival_money'];
			$map['arrival_paid']=$_POST['arrival_paid'];
			$map['arrival_contract']=$_POST['arrival_contract'];
			$map['arrival_equip']=$_POST['arrival_equip'];
			$map['arrival_remarks']=$_POST['arrival_remarks'];
			$map['arrival_enterprise']=$_POST['arrival_enterprise'];
			$map['arrival_contrac']=$_POST['arrival_contrac'];
			$map['arrival_qualified']=$_POST['arrival_qualified'];
			$map['arrival_level']=$_POST['arrival_level'];
			$map['arrival_major']=$_POST['arrival_major'];
			$map['arrival_talent']=$_POST['arrival_talent'];
			$map['arrival_customer']=$_POST['arrival_customer'];
			$query=$arrival->add($map);
			if($query>0){
				echo $this->jump('添加成功','Arrival/arrival');
			}
			else{
				echo $this->jump('添加失败','Arrival/arrival_add');
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
    public function arrival_mod()
	{
		$arrival=M('arrival');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['arrival_applicant']=$_POST['arrival_applicant'];
			$map['arrival_account']=$_POST['arrival_account'];
			$map['arrival_time']=$_POST['arrival_time'];
			$map['arrival_money']=$_POST['arrival_money'];
			$map['arrival_paid']=$_POST['arrival_paid'];
			$map['arrival_contract']=$_POST['arrival_contract'];
			$map['arrival_equip']=$_POST['arrival_equip'];
			$map['arrival_remarks']=$_POST['arrival_remarks'];
			$map['arrival_enterprise']=$_POST['arrival_enterprise'];
			$map['arrival_contrac']=$_POST['arrival_contrac'];
			$map['arrival_qualified']=$_POST['arrival_qualified'];
			$map['arrival_level']=$_POST['arrival_level'];
			$map['arrival_major']=$_POST['arrival_major'];
			$map['arrival_talent']=$_POST['arrival_talent'];
			$map['arrival_customer']=$_POST['arrival_customer'];
			$val=$arrival->where("id=".$id)->save($map);
			if($val)
			{
				echo $this->jump("修改成功","Arrival/arrival");
			}else {
				echo $this->jump("修改失败","Arrival/arrival");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$arrival->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	//删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$daozhang=M('arrival');
			$id=$_GET['id'];
			$arrival['flag'] = 1;
		 	$val=$daozhang->where("flag = 0 and id = ".$id)->save($arrival);
			if($val>0)
			{
				echo $this->jump("删除成功","Arrival/arrival");
			}else 
				{
				echo $this->jump("删除失败","Arrival/arrival");
			}		
		}
	}
	public function info(){
		$arrival=M('arrival');
		$id=$_GET['id'];
		$arr=$arrival->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
}