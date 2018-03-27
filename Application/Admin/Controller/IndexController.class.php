<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 
class IndexController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{

    	echo	$this->jump('请登录',"Index/login");
    	}else {
			// $news=M('news');//实例化数据表
			// $count=$news->count();// 查询满足要求的总记录数
			// $Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
			// $show= $Page->show();// 分页显示输出
			// if(!empty($_POST['sub'])){
			//  		$map['Title']=array("like","%".$_POST['name']."%");	//搜索 
			// 	 }1
			// $arr=$news->where($map)->join("report_categories on news.n_id=report_categories.id")->field('news.title,news.abstract,news.U_price,news.time,news.published,report_categories.type,news.type_id,news.pages')->order('news.type_id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
			// $this->assign('arr',$arr);
			// $this->assign('page',$show);

			// 	 }
			// $arr=$news->where($map)->join("report_categories on news.n_id=report_categories.id")->field('news.title,news.abstract,news.U_price,news.time,news.published,report_categories.type,news.type_id,news.pages')->order('news.type_id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
			// $this->assign('arr',$arr);
			// $this->assign('page',$show);
    		$this->display("Product/product");
    	}
    }
	public function tc(){
		session(null);
		echo	$this->jump('退出成功',"Index/login");
	}
    public function login(){
		if(!empty($_POST['sub']))
		{ 
			$data=M('Admin_user');
			$map['name']=$_POST['name'];
			
			$map['password']=md5($_POST['password']);
			 // print_r($map['password']);die;
			if($map['name']=='')
			{
				echo $this->jump('请输入用户名',"login");
			}
			$count	=	$data->where($map)->count();//查询条数
			if ($count>0)
			{	
				$value = $data->where($map)->find();
				$_SESSION['id']		=	$value['id'];
				$_SESSION['name']	=	$value['name'];
				$_SESSION['department_id'] = $value['department_id'];
				$_SESSION['administration'] = $value['administration'];
				$staff = M('stations')->where('id='.$value['station_id'].' AND station_name LIKE "%员工%"')->find();
				if($staff){
					$this->assign('staff', $staff);
					$this->display("Department/department");
				}else{
					echo	$this->jump('登陆成功',"Department/department");
				}

			}else{
				echo	$this->jump('账号或密码错误',"Index/login");
			}
		}else{
			$this->display();
		}	
    }
    /*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
}