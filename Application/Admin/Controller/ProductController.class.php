<?php
namespace Admin\Controller;
use Think\Controller;
require_once "Public/PHPExcel/Classes/PHPExcel.php";
require_once "Public/imp.php";
header("Content-Type: text/html;charset=utf-8"); 

class ProductController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('请登录',"Index/login");
    	}else {
		
    		$this->display();
    	}
    }
/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

	public function product(){
		if($_SESSION['id']=='')
    	{
    		echo $this->jump('请登录',"Index/login");
    	}else {
			$news=M('news');//实例化数据表
			$count=$news->where("top_id=1")->count();// 查询满足要求的总记录数
			$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
			$show= $Page->show();// 分页显示输出
			$map['top_id']=1;
			if(!empty($_POST['sub'])){
			 		$map['Title']=array("like","%".$_POST['name']."%");	//搜索 
				}
			$arr=$news
				->where($map)
				->join("report_categories on news.n_id=report_categories.id")->field('news.title,news.abstract,news.U_price,news.time,news.published,report_categories.type,news.type_id,news.pages,news.top_id')
				->order('news.time desc')
				->limit($Page->firstRow.','.$Page->listRows)
				->select();
			// echo $news->getlastsql();
			$this->assign('arr',$arr);
			$this->assign('page',$show);
			$this->display();
		}
	}
	public function product_add(){
		if($_SESSION['id']=='')
    	{
    		echo $this->jump('请登录',"Index/login");
    	}else {
			 
   
		if(!empty($_POST['sub'])){
			$news=M('news');

			$map=$news->create();
			if($_FILES['n_photo']['tmp_name']){
			
				$map['n_photo']=$this->upload($_FILES['n_photo']);
			}

			$query=$news->add($map);
			if($query>0){
				echo $this->jump('添加成功','Product/product');
			}
			else{
				echo $this->jump('添加失败','Product/product_add');
			}
		}else{
			$report=M('report_categories');
			$report1=$report->where("type_id!=0")->select();

			$this->assign('report1',$report1);

			$report2=$report->where("type_id=3")->select();

			$this->assign("report2",$report2);

			$this->display();
		}	}
	}
	//删除数据
	public function product_del()
	{
		if($_SESSION['id']=='')
    	{
    		echo $this->jump('请登录',"Index/login");
    	}else {
			 
    	
		if(!empty($_GET['id'])){
			$news=M('news');
			$id=$_GET['id'];

			$data=$news->find($id);
		 	unlink("./Public/".$data['photo']."");//删除图片
		 	$val=$news->delete($id);

			if($val>0)
			{
				echo $this->jump("删除成功","Product/product");
			}else 
				{
				echo $this->jump("删除失败","Product/product");
			}		

		}}
	}
	//数据修改
	public function product_mod(){
		if($_SESSION['id']=='')
    	{
    		echo $this->jump('请登录',"Index/login");
    	}else {
		$news=M('news');
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map=$news->create();
			if($_FILES['n_photo']['tmp_name']){//是否修改图片
				//print_r($_FILES);die;
				$map=$news->create();
				 
	    		if($_POST['o_photo']){//是否存在原图片

	    			unlink("./Public/".$_POST['o_photo']."");//删除图片
	    		}
		       $photo=$this->upload($_FILES['n_photo']);
		        
		         $map['n_photo']=$photo;
             }
			
			$val=$news->where("type_id=".$id)->save($map);
			//echo "<pre>";print_r($map);echo "<pre>";die;
			if($val)
			{
				echo $this->jump("修改成功","Product/product");
			}else {
				echo $this->jump("修改失败","Product/product");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$news->where()->join()->find("$id");
			// print_r($sel);die;
			$this->assign('sel',$sel);
			$report=M('report_categories');
			$report1=$report->where()->select();
			$this->assign('report1',$report1);
			$this->display();
		}}
	}
	/*
    上传文件
    */
  public function upload($data){
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =     3145728 ;// 设置附件上传大小
      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','xlsx','xls');// 设置附件上传类型
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

	public function user(){
		if($_SESSION['id']=='')
    	{
    		echo $this->jump('请登录',"Index/login");
    	}else {
			
    		
    	
		// $filename = "user.xlsx";
		// $this -> excel($filename);
	  	if (!empty($_POST['sub'])) {
	  		$m=M("Shangchuan");
	  		$ma=$m->create();
				if($_FILES['filename']['tmp_name']){
					$a=$this->upload($_FILES['filename']);
					$ma['filename']=$a;
				}
				//print_r($ma);die;
			$query=$m->add($ma);
			if ($query) {
				$filename=$a;
				//echo $a;die;
				$this->excel($filename);
				echo $this->jump("上传成功","Product/product");
			}
			else{
				echo $this->jump("上传失败","Product/product");
			}
	  	}
	  	else{
	  		$this->display();
		}
	}}
	/**
	 * excel导入
	 */
	public function excel($filename){
		
		$sheetname = "";
		//echo $filename;die;
		$data = impExcel($filename,$sheetname);
		//print_r($data);
		$m =M("news");
		for($i = 0;$i<count($data);$i++)
		{
			 
			$title = $data[$i]["标题"];
			$abstract = $data[$i]["简介"];
			$details = $data[$i]["详情"];
			$table=$data[$i]["目录表"];
			$figures=$data[$i]["数据列表"];
			$U_price = $data[$i]["个人价格"];
			$u_price2 = $data[$i]["企业价格"];
			$time = $data[$i]["时间"];
			$pages = $data[$i]["页数"];
			$published = $data[$i]["发表"];
			$n_id = $data[$i]["所属类型"];
			$top_id=$data[$i]["普通报告"];

			 
			$inster['Title'] = $title;
			$inster['Abstract']=$abstract;
			$inster['Details'] = $details;
			$inster['table']=$table;
			$inster['figures']=$figures;
			$inster['U_price'] = $U_price;
			$inster['u_price2'] = $u_price2;
			$inster['Time'] = $time;
			$inster['Pages'] = $pages;
			$inster['Published'] = $published;
			$inster['n_id'] = $n_id;	
			$inster['top_id']=$top_id;

			$result = $m->add($inster);
			if($result == 0)
				echo "执行失败的语句(房源):".$i.$sql2."<br>";
								
		}
		//echo '已经导入'.$i.'条'.'<br>';
	}

	/**
	 * excel 导出
	 */
	
	public function excel_out(){
		$m =M("news");
		$result = $m->where("top_id=1") ->select();
		
		//print_r($result);die;
 		$data = $result;
 		$objPHPExcel=new \PHPExcel();
 		$objPHPExcel->getProperties()->setCreator('local.test.com')
 		->setLastModifiedBy('local.test.com')
 		->setTitle('Office 2007 XLSX Document')
 		->setSubject('Office 2007 XLSX Document')
 		->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
 		->setKeywords('office 2007 openxml php')
 		->setCategory('Result file');
 		$objPHPExcel->setActiveSheetIndex(0)
 		->setCellValue('A1','title')
 		->setCellValue('B1','abstract')
 		->setCellValue('C1','details')
 		->setCellValue('D1','table')
 		->setCellValue('E1','figures')
 		->setCellValue('F1','u_price')
 		->setCellValue('G1','u_price2')
 		->setCellValue('H1','time')
 		->setCellValue('I1','pages')
 		->setCellValue('J1','published')
 		->setCellValue('K1','n_id')
 		->setCellValue('L1','top_id');
 		//var_dump($data);die;
 		$i=2;
 		foreach($data as $k=>$v){
 			$objPHPExcel->setActiveSheetIndex(0)
 			->setCellValue('A'.$i,$v['title'])
 			->setCellValue('B'.$i,$v['abstract'])
 			->setCellValue('C'.$i,$v['details'])
 			->setCellValue('D'.$i,$v['table'])
 			->setCellValue('E'.$i,$v['figures'])
 			->setCellValue('F'.$i,$v['u_price'])
 			->setCellValue('G'.$i,$v['u_price2'])
 			->setCellValue('H'.$i,$v['time'])
 			->setCellValue('I'.$i,$v['pages'])
 			->setCellValue('J'.$i,$v['published'])
 			->setCellValue('K'.$i,$v['n_id'])
 			->setCellValue('L'.$i,$v['top_id']);
 			$i++;
 			//var_dump($objPHPExcel);die;
 		}
 		$objPHPExcel->getActiveSheet()->setTitle('news');
 		$objPHPExcel->setActiveSheetIndex(0);
 		$filename=urlencode('').date('Y-m-dHis');
 		
 		
 		/*
 		 *生成xlsx文件
 		 **/
 		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
 		header('Cache-Control: max-age=0');
 		$objWriter=\PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
 		
 		
 		/*
 		 *生成xls文件
 		 *
 		header('Content-Type: application/vnd.ms-excel');
 		header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
 		header('Cache-Control: max-age=0');
 		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 		*/
 		
 		$objWriter->save('php://output');
 		exit;
	}

}