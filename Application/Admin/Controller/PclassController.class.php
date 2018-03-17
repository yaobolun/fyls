<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class PclassController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please Login',"Index/login");
    	}else {
			
    		$this->display();
    	}
    }
    /*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
   
	public function col(){
		$rc=M('report_categories');
	
		$count=$rc->where("type_id=0 and web=2")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$rc->where("type_id=0 and web=2")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function ercol(){

		$rc=M('report_categories');
	    $count=$rc->where("type_id=".$_GET['id']." and web=2")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$rc->where("type_id=".$_GET['id']." and web=2")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('djid',$_GET['id']);
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function col_add(){
		
		if(!empty($_POST['sub'])){
			$rc=M('report_categories');
			$id=$_GET['tid'];
		    $data=$rc->find($id);
			
			$map['url']=$data['url'];
			$map['Type_id']=$id;
			$map['web']=2;
			$map['Type']=$_POST['type'];

			if($_FILES['photo']['tmp_name']){
				$map['photo']=$this->upload($_FILES['photo']);
			}
			$query=$rc->add($map);
			//echo $rc->getLastsql();die;
			if($query>0){
				echo $this->jump('添加成功','Pclass/col');
			}
			else{
				echo $this->jump('添加失败','Pclass/col_add');
			}
		}
		else{
		$this->display();
		}
	}
	//删除数据
	public function col_del()
	{
		if(!empty($_GET['id'])){
			$rc=M('report_categories');
			$id=$_GET['id'];
		 	$val=$rc->delete($id);
			if($val>0)
			{
				echo $this->jump("删除成功","Pclass/col");
			}else 
				{
				echo $this->jump("删除失败","Pclass/col");
			}		
		}
	}

	public function col_mod()
	{
		$rc=M('report_categories');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];

		    $map['Type']=$_POST['Type'];

			$val=$rc->where("id=".$id)->save($map);
			if($val)
			{
				echo $this->jump("修改成功","Pclass/col");
			}else {
				echo $this->jump("修改失败","Pclass/col");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$rc->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	
	/*
    上传文件
    */
  public function upload($data){
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =     3145728000 ;// 设置附件上传大小
      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
      $upload->rootPath  =      './Public/'; // 设置附件上传根目录
      // 上传单个文件 
      $info   =   $upload->uploadOne($data);
      if(!$info) {// 上传错误提示错误信息
        return false;
          //return  $upload->getError();
      }else{// 上传成功 获取上传文件信息
        
          return $info['savepath'].$info['savename'];
      }
  }

}