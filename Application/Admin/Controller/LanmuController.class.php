<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class LanmuController extends Controller {
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
	public function lanmu(){
		$report=M("report_categories");
		$count=$report->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,20);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$report->where()->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function lanmu_add(){
		
		if(!empty($_POST['sub'])){
			$report=M("report_categories");

			$map=$report->create();
			if($_FILES['photo']['tmp_name']){
				$map['photo']=$this->upload($_FILES['photo']);
			}
			$query=$report->add($map);
			if($query>0){
				echo $this->jump('添加成功','Lanmu/lanmu');
			}
			else{
				echo $this->jump('添加失败','Lanmu/lanmu_add');
			}
		}
		else{
		$this->display();
		}
	}
	//删除数据
	public function lanmu_del()
	{
		if(!empty($_GET['id'])){
			$report=M("report_categories");
			$id=$_GET['id'];

			$data=$report->find($id);
	 		unlink("./Public/".$data['photo']."");//删除图片
	 		unlink("./Public/".$data['photos']."");//删除图片
	 		unlink("./Public/".$data['banner']."");//删除图片
		 	$val=$report->delete($id);

			if($val>0)
			{
				echo $this->jump("删除成功","Lanmu/lanmu");
			}else 
				{
				echo $this->jump("删除失败","Lanmu/lanmu");
			}		

		}
	}
	//图片修改
	public function lanmu_mod()
	{
		$report=M("report_categories");
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
            $map['Type']=$_POST['type'];
            $map['ixm']=$_POST['ixm'];
            $map['phrase']=$_POST['phrase'];
            
			if($_FILES['photo1']['tmp_name']){//是否修改图片
				
				 
	    		if($_POST['o_photo']){//是否存在原图片

	    			unlink("./Public/".$_POST['o_photo']."");//删除图片
	    		}
		        $photo=$this->upload($_FILES['photo1']);
		       
		        	$map['photo']=$photo;
		        
		        
             }
             if($_FILES['photo2']['tmp_name']){//是否修改图片
	    		if($_POST['o_photos']){//是否存在原图片
	    			unlink("./Public/".$_POST['o_photos']."");//删除图片
	    		}
		        $photo=$this->upload($_FILES['photo2']);
		        
		        	$map['photos']=$photo;
		    
		        
             }
             if($_FILES['photo3']['tmp_name']){//是否修改图片
	    		if($_POST['o_photoss']){//是否存在原图片
	    			unlink("./Public/".$_POST['o_photoss']."");//删除图片
	    		}
		        $photo=$this->upload($_FILES['photo3']);
		        
		        	$map['banner']=$photo;
             }
            
			// $map=$banner->create();
			$val=$report->where("Id=".$id)->save($map);
			//  print_r($map);	
			// echo $report->getlastsql();die;
			if($val)
			{
				echo $this->jump("修改成功","Lanmu/lanmu");
			}else {
				echo $this->jump("修改失败","Lanmu/lanmu");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$report->where()->join()->find("$id");
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