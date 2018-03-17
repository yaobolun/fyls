<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class OrderController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
			 
    		$this->display();
    	}
    }
    /*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
    //读取订单列表数据
	public function order(){
		$order=M('transaction_information');

		$count=$order->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		if(!empty($_POST['sub'])){
	 		$map['cp_title']=array("like","%".$_POST['name']."%");	 
		}
		
		$arr=$order->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function ajax(){
		$state=$_POST['aid'];
		$order=M('transaction_information');
		$member['license']=2;
		$up=$order->where('id='.$state)->save($member);
		if($up){
			echo "确认发货";
		}else{
			echo "确认发货，失败";
		}
		
	}
}