<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class RefundController extends Controller {

	public function refund(){
		$sid = session('id');
		$refund=M('refund');
		$count=$refund->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$refund->where("flag = 0 and tid=".$sid)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function refund_add()
	{	
		
		$bmid = session('department_id');
		// var_dump($bmid);exit;
		$director = M('stations')->where('department_id ='.$bmid.' AND station_name LIKE "%主管%"')->select();
		// var_dump($director);exit;
		$user_id = array_column($director,'id');
		// var_dump($user_id);exit;
		$a = implode(",",$user_id);
		// var_dump($a);exit;
		$user = M('admin_user')->where('station_id IN ('.$a.') AND department_id='.$bmid)->select();
		// var_dump($user);exit;
		// var_dump($name);die;
		$this->assign('user', $user);
		$this->display();
	}
	public function refund_doadd(){
		
		if(!empty($_POST['sub'])){
			$refund=M("refund");
			$map['refund_applicant']=$_POST['refund_applicant'];
			$map['refund_match']=$_POST['refund_match'];
			$map['refund_equip']=$_POST['refund_equip'];
			$map['refund_contract']=$_POST['refund_contract'];
			$map['refund_remarks']=$_POST['refund_remarks'];
			$map['refund_account']=$_POST['refund_account'];
			$map['refund_name']=$_POST['refund_name'];
			$map['refund_money']=$_POST['refund_money'];
			$map['refund_bank']=$_POST['refund_bank'];
			$map['refund_number']=$_POST['refund_number'];
			$map['status']=$_POST['status'];
			$map['tid']=$_POST['tid'];
			$map['department_id']=$_POST['department_id'];
			$query=$refund->add($map);
			if($query>0){
				echo $this->jump('添加成功','Refund/refund');
			}
			else{
				echo $this->jump('添加失败','Refund/refund_add');
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

    public function refund_mod()
	{
		$refund=M('refund');
		$map['refund_applicant']=$_POST['refund_applicant'];
		$map['refund_match']=$_POST['refund_match'];
		$map['refund_equip']=$_POST['refund_equip'];
		$map['refund_contract']=$_POST['refund_contract'];
		$map['refund_remarks']=$_POST['refund_remarks'];
		$map['refund_account']=$_POST['refund_account'];
		$map['refund_name']=$_POST['refund_name'];
		$map['refund_money']=$_POST['refund_money'];
		$map['refund_bank']=$_POST['refund_bank'];
		$map['refund_number']=$_POST['refund_number'];
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];

			$val=$refund->where("id=".$id)->save($map);
			if($val)
			{
				echo $this->jump("修改成功","Refund/refund");
			}else {
				echo $this->jump("修改失败","Refund/refund");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$refund->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}

    //删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$tuikuan=M('refund');
			$id=$_GET['id'];
			$refund['flag'] = 1;
		 	$val=$tuikuan->where("flag = 0 and id = ".$id)->save($refund);
			if($val>0)
			{
				echo $this->jump("删除成功","Refund/refund");
			}else 
				{
				echo $this->jump("删除失败","Refund/refund");
			}		
		}
	}
	public function info(){
		$uid=$_GET['id'];
		$refund=M('refund');
		$aeq=$refund->join('requipment ON refund.id = requipment.uid')->where("requipment.flag = 0 and refund.id=".$uid)->field("requipment.id,requipment_enterprise,requipment_contractyears,requipment_qualified,requipment_level,requipment_major,requipment_talent,requipment_customer")->select();
		$this->assign('aeq',$aeq);
		$id=$_GET['id'];
		$arr=$refund->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
}