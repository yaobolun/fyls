<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class TopController extends Controller {
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
    //公司信息
	public function emph(){
		$emph=M('emph');
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map=$emph->create();
			//print_r($_FILES);die;
			if($_FILES['photo']['tmp_name']){//是否修改图片
				 
	    		if($_POST['o_photo']){//是否存在原图片

	    			unlink("./Public/".$_POST['o_photo']."");//删除图片
	    		}
		       $photo=$this->upload($_FILES['photo']);
		        
		         $map['qrcode']=$photo;
             }
			$map['time']=time();
			$val=$emph->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/emph");
			}else {
				echo $this->jump("修改失败","Top/emph");
			}
		}else{
			$arr=$emph->find();

		    $this->assign('sel',$arr);
		
		    $this->display();
		}
		
	}
	//商城服务
	public function  scfw(){
		$new=M('news');

		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map=$new->create();
			
			$val=$new->where("Type_id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/scfw?id=26");
			}else {
				echo $this->jump("修改失败","Top/scfw?id=26");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$new->where('n_id='.$id)->find();
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	//删除数据
	public function emph_del()
	{
		if(!empty($_GET['id'])){
			$emph=M('emph');
			$id=$_GET['id'];
		 	 
		 	$val=$emph->delete($id);

			if($val>0)
			{
				echo $this->jump("删除成功","Top/emph");
			}else 
				{
				echo $this->jump("删除失败","Top/emph");
			}		

		}
	}
	//数据修改
	public function emph_mod(){
		$emph=M('emph');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map=$emph->create();
			
			$val=$emph->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/emph");
			}else {
				echo $this->jump("修改失败","Top/emph");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$emph->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	public function banner(){
		$banner=M('banner');
		$count=$banner->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$banner->where()->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function banner_add(){
		
		if(!empty($_POST['sub'])){
			$banner=M('banner');

			$map=$banner->create();

			if($_FILES['photo']['tmp_name']){
				$map['photo']=$this->upload($_FILES['photo']);
			}
			$map['url']=$_POST['text'];
			$query=$banner->add($map);
			if($query>0){
				echo $this->jump('添加成功','Top/banner');
			}
			else{
				echo $this->jump('添加失败','Top/banner_add');
			}
		}
		else{
		$this->assign('web',$_GET['type']);
		$this->display();
		}
	}
	//删除数据
	public function banner_del()
	{
		if(!empty($_GET['id'])){
			$banner=M('banner');
			$id=$_GET['id'];

			$data=$banner->find($id);
		 	unlink("./Public/".$data['photo']."");//删除图片
		 	$val=$banner->delete($id);

			if($val>0)
			{
				echo $this->jump("删除成功","Top/banner");
			}else 
				{
				echo $this->jump("删除失败","Top/banner");
			}		

		}
	}
	//图片修改
	public function banner_mod()
	{
		$banner=M('banner');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];

			if($_FILES['photo']['tmp_name']){//是否修改图片
				// print_r($_FILES);die;
				// $map=$banner->create();
				 
	    		if($_POST['o_photo']){//是否存在原图片

	    			unlink("./Public/".$_POST['o_photo']."");//删除图片
	    		}
		        $photo=$this->upload($_FILES['photo']);
		        
		        $map['photo']=$photo;
             }
             $map['url']=$_POST['text'];
             // print_r($map);
			// $map=$banner->create();
			$val=$banner->where("id=".$id)->save($map);
			// print_r($map);die;
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/banner");
			}else {
				echo $this->jump("修改失败","Top/banner");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$banner->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	public function client(){
		$client=M('client');
		$count=$client->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$client->where()->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function client_add(){
		
		if(!empty($_POST['sub'])){
			$client=M('client');

			$map=$client->create();
			if($_FILES['photo']['tmp_name']){
				$map['photo']=$this->upload($_FILES['photo']);
			}
			$query=$client->add($map);
			if($query>0){
				echo $this->jump('添加成功','Top/client');
			}
			else{
				echo $this->jump('添加失败','Top/client_add');
			}
		}
		else{
		$this->display();
		}
	}
	//删除数据
	public function client_del()
	{
		if(!empty($_GET['id'])){
			$client=M('client');
			$id=$_GET['id'];

			$data=$client->find($id);
		 	unlink("./Public/".$data['photo']."");//删除图片
		 	$val=$client->delete($id);

			if($val>0)
			{
				echo $this->jump("删除成功","Top/client");
			}else 
				{
				echo $this->jump("删除失败","Top/client");
			}		

		}
	}
	//图片修改
	public function client_mod()
	{
		$client=M('client');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];

			if($_FILES['photo']['tmp_name']){//是否修改图片
				//print_r($_FILES);die;
				// $map=$client->create();
				 
	    		if($_POST['o_photo']){//是否存在原图片

	    			unlink("./Public/".$_POST['o_photo']."");//删除图片
	    		}
		        $photo=$this->upload($_FILES['photo']);
		        
		        $map['photo']=$photo;
             }
			// $map=$client->create();
			$val=$client->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/client");
			}else {
				echo $this->jump("修改失败","Top/client");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$client->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	public function od(){
		$od=M('od');
		$count=$od->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$od->where()->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function od_add(){
		
		if(!empty($_POST['sub'])){
			$od=M('od');

			$map=$od->create();
			if($_FILES['photo']['tmp_name']){
				$map['photo']=$this->upload($_FILES['photo']);
			}
			$query=$od->add($map);
			if($query>0){
				echo $this->jump('添加成功','Top/od');
			}
			else{
				echo $this->jump('添加失败',"Top/od_add");
			}
		}
		else{
		$this->display();
		}
	}
	//删除数据
	public function od_del()
	{
		if(!empty($_GET['id'])){
			$od=M('od');
			$id=$_GET['id'];

			$data=$od->find($id);
		 	unlink("./Public/".$data['photo']."");//删除图片
		 	$val=$od->delete($id);

			if($val>0)
			{
				echo $this->jump("删除成功","Top/od");
			}else 
				{
				echo $this->jump("删除失败","Top/od");
			}		

		}
	}
	//图片修改
	public function od_mod()
	{
		$od=M('od');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];

			if($_FILES['photo']['tmp_name']){//是否修改图片
				//print_r($_FILES);die;
				$map=$od->create();
				 
	    		if($_POST['o_photo']){//是否存在原图片

	    			unlink("./Public/".$_POST['o_photo']."");//删除图片
	    		}
		        $photo=$this->upload($_FILES['photo']);
		        
		        $map['photo']=$photo;
             }
			$map=$od->create();
			$val=$od->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/od");
			}else {
				echo $this->jump("修改失败","Top/od");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$od->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	public function sg(){
		$help=M('help');
		$count=$help->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$help->where()->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function sg_add(){
		
		if(!empty($_POST['sub'])){
			$help=M('help');

			$map=$help->create();
			 
			$query=$help->add($map);
			if($query>0){
				echo $this->jump('添加成功','Top/sg');
			}
			else{
				echo $this->jump('添加失败',"Top/sg_add");
			}
		}
		else{
		$this->display();
		}
	}
	//删除数据
	public function sg_del()
	{
		if(!empty($_GET['id'])){
			$help=M('help');
			$id=$_GET['id'];

			$data=$help->find($id);
		 	// unlink("./Public/".$data['photo']."");//删除图片
		 	$val=$help->delete($id);

			if($val>0)
			{
				echo $this->jump("删除成功","Top/sg");
			}else 
				{
				echo $this->jump("删除失败","Top/sg");
			}		

		}
	}
	//修改
	public function sg_mod()
	{
		$help=M('help');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map=$help->create();
			
			$val=$help->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/sg");
			}else {
				echo $this->jump("修改失败","Top/sg");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$help->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	//about us
	public function ab(){
		$about=M('about');
		$count=$about->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$about->where()->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	//修改
	public function ab_mod()
	{
		$about=M('about');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map=$about->create();
			
			$val=$about->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/ab");
			}else {
				echo $this->jump("修改失败","Top/ab");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$about->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	//why us
	public function rl(){
		$whyus=M('whyus');
		$count=$whyus->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$whyus->where()->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	//修改
	public function rl_mod()
	{
		$whyus=M('whyus');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map=$whyus->create();
			
			$val=$whyus->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/rl");
			}else {
				echo $this->jump("修改失败","Top/rl");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$whyus->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	//contact us
	public function co(){
		$co=M('co');
		$count=$co->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$co->where()->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	//修改
	public function co_mod()
	{
		$co=M('co');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map=$co->create();
			
			$val=$co->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Top/co");
			}else {
				echo $this->jump("修改失败","Top/co");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$co->where()->join()->find("$id");
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