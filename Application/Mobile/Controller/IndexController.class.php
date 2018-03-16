<?php
namespace Mobile\Controller;
use Think\Controller;
use Think\Verify;
header("Content-Type: text/html;charset=utf-8"); 
class IndexController extends PublicController {
	
    /*首页*/
    public function index(){
		$this->gongyou();
		$this->tishi();
		$new=M('News');
		$data=$new->where('n_id=20')->find();

		$this->assign('data',$data);
        $this->assign('n',1);
		$this->display();
    }

	// /*关于我们*/
 //    public function about(){
	// 	$this->gongyou();


	//     $this->display();
 //    }
    /*新闻中心*/
    public function jour(){
		$this->gongyou();
		$this->tishi();
		$report=M('report_categories');
	
			$id=$report->where("type_id=".$_GET['active']."")->select();
			foreach ($id as $key => $value) {
				$g_id[]=$id[$key]['id'];
			}
			
	
		$d=$report->find($_GET['active']);//当前的一级分类
		$this->assign('d',$d);
		
		$new=M('News');
		$map['n_id']=array('in',$g_id);
		$data=$new->where($map)->select();
		// echo $new->getLastsql();
		// print_r($data);die;
		$this->assign('data',$data);
		
		$this->assign('n',$_GET['active']);
		// $this->assign('id',$_GET['id']);

		$this->display();
    }
    /*新闻详情*/
    public function c_jour(){
		$this->gongyou();
		$this->tishi();
		$report=M('report_categories');
		
		$g_id=$_GET['id'];//当前新闻id

		$d=$report->find($_GET['active']);
		$this->assign('d',$d);//当前主导航
		$new=M('News');//实例化新闻类
		$data=$new->find($g_id);//获取当前新闻

		$this->assign('data',$data);
		$this->assign('n',$_GET['active']);
		$this->assign('id',$_GET['id']);
        
		$this->display();
    }
    /*合作共赢*/
    public function win(){
		$this->gongyou();
		$this->tishi();
		$report=M('report_categories');
	
			$id=$report->where("type_id=".$_GET['active']."")->select();
			foreach ($id as $key => $value) {
				$g_id[]=$id[$key]['id'];
			}
			
		$d=$report->find($_GET['active']);
		$this->assign('d',$d);
		
		$new=M('News');
		$map['n_id']=array('in',$g_id);
		$data=$new->where($map)->select();
		// echo $new->getLastsql();
		// print_r($data);
		$this->assign('data',$data);
	
		$this->assign('n',$_GET['active']);
		$this->assign('id',$_GET['id']);
        $this->assign('e',1);
        $this->assign('e_s',1);
        $this->assign('c',1);
        $this->assign('c_s',1);
		$this->display();
    }
    /*经典案例*/
    public function classic(){
		$this->gongyou();
		$this->tishi();
		$report=M('report_categories');

			$id=$report->where("type_id=".$_GET['active']."")->select();
			foreach ($id as $key => $value) {
				$g_id[]=$id[$key]['id'];
			}
	
		$d=$report->find($_GET['active']);
		$this->assign('d',$d);
	
		$new=M('News');
		$map['n_id']=array('in',$g_id);
		$data=$new->where($map)->select();
		// echo $new->getLastsql();
		// print_r($data);
		$this->assign('data',$data);
		
		$this->assign('n',$_GET['active']);
		$this->assign('id',$_GET['id']);
        $this->assign('e',1);
        $this->assign('e_s',1);
        $this->assign('c',1);
        $this->assign('c_s',1);
		$this->display();
    }
     /*联系我们*/
    public function contact(){
		$this->gongyou();
		$this->tishi();
		$report=M('report_categories');

			$id=$report->where("type_id=".$_GET['active']."")->select();
			foreach ($id as $key => $value) {
				$g_id[]=$id[$key]['id'];
			}
			
		$d=$report->find($_GET['active']);
		$this->assign('d',$d);
		
		$new=M('News');
		$map['n_id']=array('in',$g_id);
		$data=$new->where($map)->select();
		// echo $new->getLastsql();
		// print_r($data);
		$this->assign('data',$data);
		
		$this->assign('n',$_GET['active']);
		$this->assign('id',$_GET['id']);
        $this->assign('e',1);
        $this->assign('e_s',1);
        $this->assign('c',1);
        $this->assign('c_s',1);
		$this->display();
    }


}