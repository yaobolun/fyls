<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class VoucherController extends Controller {

	public function voucher(){
		$sid = session('id');
		$voucher=M('voucher');
		$count=$voucher->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$voucher->where("flag = 0 ")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function voucher_add(){
		
		if(!empty($_POST['sub'])){
			$voucher=M("voucher");
			$map['voucher_applicant']=$_POST['voucher_applicant'];
			$map['voucher_account']=$_POST['voucher_account'];
			$map['voucher_equip']=$_POST['voucher_equip'];
			$map['voucher_contract']=$_POST['voucher_contract'];
			$map['voucher_amount']=$_POST['voucher_amount'];
			$map['voucher_acc']=$_POST['voucher_acc'];
			$map['voucher_this']=$_POST['voucher_this'];
			$map['voucher_remarks']=$_POST['voucher_remarks'];
			$query=$voucher->add($map);
			if($query>0){
				echo $this->jump('添加成功','Voucher/voucher');
			}
			else{
				echo $this->jump('添加失败','Voucher/voucher_add');
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
    public function voucher_mod()
	{
		$voucher=M('voucher');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['voucher_applicant']=$_POST['voucher_applicant'];
			$map['voucher_account']=$_POST['voucher_account'];
			$map['voucher_equip']=$_POST['voucher_equip'];
			$map['voucher_contract']=$_POST['voucher_contract'];
			$map['voucher_amount']=$_POST['voucher_amount'];
			$map['voucher_acc']=$_POST['voucher_acc'];
			$map['voucher_this']=$_POST['voucher_this'];
			$map['voucher_remarks']=$_POST['voucher_remarks'];
			$val=$voucher->where("id=".$id)->save($map);
			if($val)
			{
				echo $this->jump("修改成功","Voucher/voucher");
			}else {
				echo $this->jump("修改失败","Voucher/voucher");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$voucher->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	public function del()
	{
		if(!empty($_GET['id'])){
			$rencai=M('voucher');
			$id=$_GET['id'];
			$voucher['flag'] = 1;
		 	$val=$rencai->where("flag = 0 and id = ".$id)->save($voucher);
			if($val>0)
			{
				echo $this->jump("删除成功","Voucher/voucher");
			}else 
				{
				echo $this->jump("删除失败","Voucher/voucher");
			}		
		}
	}
	public function info(){
		$voucher=M('voucher');
		$id=$_GET['id'];
		$arr=$voucher->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
}