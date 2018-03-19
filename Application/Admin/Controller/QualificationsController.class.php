<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class QualificationsController extends Controller {
	public function qualifications(){
		$qualifications=M('qualifications');
		$count=$qualifications->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$qualifications->where("flag = 0 ")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function qualifications_add(){
		if(!empty($_POST['sub'])){
			$qualifications=M("qualifications");
			$map['qualifications_date']=$_POST['qualifications_date'];
			$map['qualifications_customer']=$_POST['qualifications_customer'];
			$map['qualifications_applicant']=$_POST['qualifications_applicant'];
			$map['qualifications_enterprise']=$_POST['qualifications_enterprise'];
			$map['qualifications_aptitude']=$_POST['qualifications_aptitude'];
			$map['qualifications_arrival']=$_POST['qualifications_arrival'];
			$map['qualifications_contract']=$_POST['qualifications_contract'];
			$map['qualifications_money']=$_POST['qualifications_money'];
			$map['qualifications_account']=$_POST['qualifications_account'];
			$map['qualifications_bmoney']=$_POST['qualifications_bmoney'];
			$map['qualifications_relations']=$_POST['qualifications_relations'];
			$map['qualifications_remarks']=$_POST['qualifications_remarks'];
			$query=$qualifications->add($map);
			if($query>0){
				echo $this->jump('添加成功','Qualifications/qualifications');
			}
			else{
				echo $this->jump('添加失败','Qualifications/qualifications_add');
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
    public function qualifications_mod()
	{
		$qualifications=M('qualifications');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['qualifications_date']=$_POST['qualifications_date'];
			$map['qualifications_customer']=$_POST['qualifications_customer'];
			$map['qualifications_applicant']=$_POST['qualifications_applicant'];
			$map['qualifications_enterprise']=$_POST['qualifications_enterprise'];
			$map['qualifications_aptitude']=$_POST['qualifications_aptitude'];
			$map['qualifications_arrival']=$_POST['qualifications_arrival'];
			$map['qualifications_contract']=$_POST['qualifications_contract'];
			$map['qualifications_money']=$_POST['qualifications_money'];
			$map['qualifications_account']=$_POST['qualifications_account'];
			$map['qualifications_bmoney']=$_POST['qualifications_bmoney'];
			$map['qualifications_relations']=$_POST['qualifications_relations'];
			$map['qualifications_remarks']=$_POST['qualifications_remarks'];
			$val=$qualifications->where("id=".$id)->save($map);
			if($val)
			{
				echo $this->jump("修改成功","Qualifications/qualifications");
			}else {
				echo $this->jump("修改失败","Qualifications/qualifications");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$qualifications->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	//删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$daozhang=M('qualifications');
			$id=$_GET['id'];
			$qualifications['flag'] = 1;
		 	$val=$daozhang->where("flag = 0 and id = ".$id)->save($qualifications);
			if($val>0)
			{
				echo $this->jump("删除成功","Qualifications/qualifications");
			}else 
				{
				echo $this->jump("删除失败","Qualifications/qualifications");
			}		
		}
	}
	public function info(){
		$qualifications=M('qualifications');
		$id=$_GET['id'];
		$arr=$qualifications->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
}