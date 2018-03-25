<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class TransferController extends Controller {

	public function transfer(){
		$sid = session('id');
		// var_dump($sid);exit;
		$transfer=M('transfer');
		$count=$transfer->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$transfer->where("flag = 0 and tid=".$sid)->limit($Page->firstRow.','.$Page->listRows)->select();
		// var_dump($arr);exit;
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function transfer_add()
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

	public function transfer_doadd(){
		if(!empty($_POST['sub'])){
			$transfer=M("transfer");
			$map['transfer_name']=$_POST['transfer_name'];
			$map['transfer_contract']=$_POST['transfer_contract'];
			$map['transfer_allocation']=$_POST['transfer_allocation'];
			$map['transfer_certificate']=$_POST['transfer_certificate'];
			$map['transfer_configuration']=$_POST['transfer_configuration'];
			$map['transfer_talent']=$_POST['transfer_talent'];
			$map['transfer_match']=$_POST['transfer_match'];
			$map['transfer_huming']=$_POST['transfer_huming'];
			$map['transfer_amount']=$_POST['transfer_amount'];
			$map['transfer_bank']=$_POST['transfer_bank'];
			$map['transfer_account']=$_POST['transfer_account'];
			$map['transfer_note']=$_POST['transfer_note'];
			$map['transfer_paid']=$_POST['transfer_paid'];
			$map['transfer_pic']=$_POST['transfer_pic'];
			$map['transfer_information']=$_POST['transfer_information'];
			$map['status']=$_POST['status'];
			// var_dump($map['tid']);exit;
			$map=$transfer->create();
			if($_FILES['transfer_pic']['tmp_name']){
				$map['transfer_pic']=$this->upload($_FILES['transfer_pic']);
			}
			$query=$transfer->add($map);
			if($query>0){
				echo $this->jump('添加成功','Transfer/transfer');
			}
			else{
				echo $this->jump('添加失败','Transfer/transfer_add');
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

    public function transfer_mod()
	{
		$transfer=M('transfer');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['transfer_name']=$_POST['transfer_name'];
			$map['transfer_contract']=$_POST['transfer_contract'];
			$map['transfer_allocation']=$_POST['transfer_allocation'];
			$map['transfer_certificate']=$_POST['transfer_certificate'];
			$map['transfer_configuration']=$_POST['transfer_configuration'];
			$map['transfer_talent']=$_POST['transfer_talent'];
			$map['transfer_match']=$_POST['transfer_match'];
			$map['transfer_huming']=$_POST['transfer_huming'];
			$map['transfer_amount']=$_POST['transfer_amount'];
			$map['transfer_bank']=$_POST['transfer_bank'];
			$map['transfer_account']=$_POST['transfer_account'];
			$map['transfer_note']=$_POST['transfer_note'];
			$map['transfer_paid']=$_POST['transfer_paid'];
			$map['transfer_pic']=$_FILES['transfer_pic'];
			$map['transfer_information']=$_POST['transfer_information'];
			if($_FILES['transfer_pic']['tmp_name']){
				$map['transfer_pic']=$this->upload($_FILES['transfer_pic']);
			}
			
			$val=$transfer->where("id=".$id)->save($map);
			if($val)
			{
				echo $this->jump("修改成功","Transfer/transfer");
			}else {
				echo $this->jump("修改失败","Transfer/transfer");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$transfer->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}

    public function upload($data){
    	
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =     3145728000 ;// 设置附件上传大小
      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
      $upload->rootPath  =      './Public/'; // 设置附件上传根目录
      // 上传单个文件 
      $info   =   $upload->uploadOne($data);
      // var_dump($data);exit;
      if(!$info) {// 上传错误提示错误信息
        return false;
          //return  $upload->getError();
      }else{// 上传成功 获取上传文件信息
          return $info['savepath'].$info['savename'];
      }
  }
  //删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$zhuanzhang=M('transfer');
			$id=$_GET['id'];
			$transfer['flag'] = 1;
		 	$val=$zhuanzhang->where("flag = 0 and id = ".$id)->save($transfer);
			if($val>0)
			{
				echo $this->jump("删除成功","Transfer/transfer");
			}else 
				{
				echo $this->jump("删除失败","Transfer/transfer");
			}		
		}
	}

	public function info(){
		$transfer=M('transfer');
		$id=$_GET['id'];
		$arr=$transfer->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}

	
}