<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class ParameterController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
			
    		$this->display();
    	}
    }

    public function parameter(){
    	if($_SESSION['id']==''){echo   $this->jump('请登录',"Index/login");}
    	$parameter=M('parameter');
		if (!empty($_POST['sub'])) {
			$map=$parameter->create();
			$map['time']=time();
			if(!empty($_POST['id'])){
				$id=$_POST['id'];
				// var_dump(111);exit;
				$val=$parameter->where("id=".$id)->save($map);
			}else{
				$val=$parameter->add($map);
			}
			// $id=$_POST['id'];
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Parameter/parameter");
			}else {
				echo $this->jump("修改失败","Parameter/parameter");
			}
		}else{
			$arr=$parameter->find();

		    $this->assign('sel',$arr);
		
		    $this->display();
		}
    }

    /*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

}