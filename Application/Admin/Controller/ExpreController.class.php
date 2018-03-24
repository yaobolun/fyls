<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class ExpreController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
    		$this->display();
    	}
    }

    public function expre_index(){
    	$expre=M('expre');
    	$id = session('id');
		$count=$expre->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$expre->where('uid='.$id)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
    }

    //申请快递
    public function add_expre(){
    		$this->display();
    }
    public function doadd_expre()
    {
    	$expre = M('expre');
    	$map = $expre->create();
    	date_default_timezone_set('prc');
    	$map['time'] = date('Y-m-d H:i:s', time());
    	$query = $expre->add($map);
    	if($query>0){
    		echo $this->jump('申请成功，请等待审批。', 'Expre/expre_index');
    	}else{
    		echo $this->jump('申请失败，请重新申请！', 'Expre/add_expre');
    	}
    }

    public function express()
    {
    	$uid = session('id');
		$admin_user = M('admin_user');
		$user = $admin_user->where('id='.$uid)->find();
		$user_bmid = $user['department_id'];
		$user_qxid = $user['station_id'];
    	$condition = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%主管%"')->find();
    	if($condition){
    		$arr = M('expre')->where('bm_id='.$user_bmid.' AND flag=0')->select();
    		$this->assign('arr', $arr);
    		$this->display();
    	}else{
    		echo $this->jump('你没有权限哦！', 'Travel/Travel_list');
    	}
    }
    public function expre_mod()
    {
    	$id = $_GET['id'];

    	$expre = M('expre');
    	$find = $expre->where('id='.$id)->find();
    	$find['flag'] = 1;
    	$update = $expre->where('id='.$find['id'])->save($find);
    	if($update){
    		echo $this->jump('已通过！', 'Expre/express');
    	}else{
    		echo $this->jump('操作出错了!', 'Expre/express');
    	}

    }
    public function not($id)
    {
    	$expre = M('expre');
    	$one_expre = $expre->where('id='.$id)->find();
		$one_expre['flag'] = 2;
		$leave = $expre->where('id='.$id)->save($one_expre);
		if($leave){
			echo $this->jump('你拒绝了TA ！', 'Expre/express');
		}else{
			echo $this->jump('操作失败！', 'Expre/express');
		}
    }
    public function expre_del($id)
    {
    	// var_dump($id);die;
    	$expre = M('expre');
    	$del = $expre->where('id='.$id)->delete();
    	if($del){
    		echo $this->jump('删除成功', 'Expre/express');
    	}else{
    		echo $this->jump('操作失败！', 'Expre/express');
    	}
    }

    /*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
}