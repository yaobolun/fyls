<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class ExpressController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
    		$this->display();
    	}
    }


    public function express(){
    	$expre=M('expre');
		$count=$expre->where("flag = 0")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$expre->where('flag = 0')->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
    }

    //申请快递
    public function add(){
    	if(!empty($_POST['sub'])){
			$expre=M('expre');
			$map['name']=$_POST['name'];
			$map['address']=$_POST['address'];
			$map['people']=$_POST['people'];
			$map['phone']=$_POST['phone'];
			$map['time']=$_POST['time'];
			$map['beizhu']=$_POST['beizhu'];

			$em2=$expre->where("name='".$map['name']."' and flag = 0")->select();

			if($em2) {
				echo $this->jump("The administrator name cannot be repeated","Express/add");
			}
			else{
				$query=$expre->add($map);
				if($query>0){

					echo $this->jump('添加成功','Express/express');
				}
				else{
					echo $this->jump('添加失败',"Express/add");
				}
			}
		}
		else{
			$this->display();
		}
    }

}