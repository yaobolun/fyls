<?php
namespace Mobile\Controller;
use Think\Controller;
use Think\Verify;
header("Content-Type: text/html;charset=utf-8"); 
class MyController extends PublicController {
	//判断是否登录
        public function p(){
        if($_COOKIE['zjtr_id']=='')
        {
        echo    $this->jump('请登录',"Mall/login");
        }else {
            
       
        }
    }
    /*首页*/
    public function index(){
    	$this->p();
		$this->mgation();
        $this->tishi();
        $this->gongyou();
		//print_r($_COOKIE);
		$n=M('New_x');
		$xg=$n->limit(4)->select();
             foreach ($xg as $key => $value) {
                $imgs=explode(',',$xg[$key]['diagram']);
                $xg[$key]['diagram']=$imgs[0];
            }
        $user=M('User');
        $data=$user->find($_COOKIE['zjtr_id']); 
        $address=M("address");
        $a=$address->where('a_user='.$_COOKIE['zjtr_id'])->select();
        $this->assign('address',$a);
        // echo $user->getLastsql().'<br>';
        // print_r($data);   
        $this->assign('data',$data);
        $this->assign('xg',$xg);
        $this->assign('p',1);
		$this->display();
		
    }
    /*修改信息*/
    public function   up(){
    	$this->p();
       
    	$user=M('user');
    	// $where['Name']=$_POST['Name'];
    	// $data=$user->where($where)->find();
    	$map=$user->create();
    	
    	//print_r($data);
   
    		if($_FILES['img']){//判断是否重新上传头像  uploads
    			if($_POST['o_photo']){//判断是否存在原头像
    				unlink("./Public/".$_POST['o_photo']."");//删除图片
    			}
    		     $map['photo']=$this->uploads($_FILES['img']);
    	     }
    	     if(preg_match("/^1[345789]{1}\d{9}$/",$_POST['Phone'])){
    	     	$up=$user->where('Id='.$_COOKIE['zjtr_id'])->save($map);
	    		if($up){

	    			echo   $this->jump('修改成功！',"My/index");
	    			
	    		}else{
	    			echo   $this->jump('修改失败！',"My/index");
	    		}
    	     }else{
	    			echo   $this->jump('手机号格式不正确！',"My/index");
	    	}
    		
    	
    	
    }
    /*订单*/
    public  function  order(){
    	$this->p();
		$this->mgation();
        $this->tishi();
        $this->gongyou();
        $user=M('User');
        $gr=$user->find($_COOKIE['zjtr_id']);
        $this->assign('gr',$gr);
		//print_r($_COOKIE);
		$n=M('New_x');
		$xg=$n->limit(4)->select();
             foreach ($xg as $key => $value) {
                $imgs=explode(',',$xg[$key]['diagram']);
                $xg[$key]['diagram']=$imgs[0];
            }

        $ti=M('transaction_information');//订单
        $data=$ti->where('name='.$_COOKIE['zjtr_user'].'')->select();
        $zongjia=0;
         $zongshu=0;
        foreach ($data as $key => $value) {
        	$dq=$n->find($data[$key]['state']);
             
            $imgs=explode(',',$dq['diagram']);
            $data[$key]['img']=$imgs[0];
            $data[$key]['dan']=$value['price']/$value['num'];
            $zongjia=$zongjia+$value['price'];
            $zongshu=$zongshu+$value['num'];
        }
        $time=date('Y-m-d',time());
        $this->assign('time',$time);
        $this->assign('zongjia',$zongjia);
        $this->assign('zongshu',$zongshu);
        // echo $user->getLastsql().'<br>';
        // print_r($data);   
        $this->assign('data',$data);
        $this->assign('xg',$xg);
        $this->assign('p',1);
		$this->display();
    }

 /*地址*/
    public function address(){
    	$this->p();
		$this->mgation();
        $this->tishi();
        $this->gongyou();
		//print_r($_COOKIE);
		$n=M('New_x');
		$xg=$n->limit(4)->select();
             foreach ($xg as $key => $value) {
                $imgs=explode(',',$xg[$key]['diagram']);
                $xg[$key]['diagram']=$imgs[0];
            }
        $a=M('address');
        $data=$a->where('a_user='.$_COOKIE['zjtr_id'])->select();  
        //print_r($data); 
        $this->assign('data',$data);
        $this->assign('xg',$xg);
        $this->assign('p',1);
		$this->display();
		
    }
    /*新增地址*/
    public  function   addaddress(){
    	$this->p();

    	$map['a_user']=$_COOKIE['zjtr_id'];
    	$map['a_address']=$_POST['a_address'];
    	$address=M('address');
    	$add=$address->add($map);
    	if($add){
    		echo   $this->jump('添加成功！',"My/address");
    	}else{
    		echo   $this->jump('添加失败！',"My/address");
    	}
    }
    /*修改地址*/
    public  function   upaddress(){
    	$this->p();
        $this->tishi();
        $this->gongyou();
    	$address=M('address');
    	if($_POST['sub']){
    		
	    	$map['a_address']=$_POST['a_address'];
	    	
	    	$add=$address->where('a_id='.$_POST['id'])->save($map);
	    	if($add){
	    		echo   $this->jump('更新成功！',"My/address");
	    	}else{
	    		echo   $this->jump('更新失败！',"My/address");
	    	}
    	}else{
    		
    		$data=$address->find($_GET['id']);
    		$this->assign('data',$data);
            $this->assign('p',1);
    		$this->display();
    	}
    	
    }
}