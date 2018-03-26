<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class ArrivalController extends Controller {
	public function arrival(){
		$sid = session('id');
		// var_dump($sid);exit;
		$arrival=M('arrival');
		$count=$arrival->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$arrival->where("flag = 0 and tid=".$sid)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}

	public function arrival_add()
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

	public function arrival_doadd(){
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
			$map['status']=$_POST['status'];
			$map['tid']=$_POST['tid'];
			$map['department_id']=$_POST['department_id'];
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
		$aid=$_GET['id'];
		$arrival=M('arrival');
		$aeq=$arrival->join('aequipment ON arrival.id = aequipment.aid')->where("aequipment.flag = 0 and arrival.id=".$aid)->field("aequipment.id,aequipment_aenterprise,aequipment_contrac,aequipment_qualified,aequipment_level,aequipment_major,aequipment_talent,aequipment_customer")->select();
		$this->assign('aeq',$aeq);
		$id=$_GET['id'];
		$arr=$arrival->where("id=".$id)->select();
		// var_dump($arr);exit;
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
}