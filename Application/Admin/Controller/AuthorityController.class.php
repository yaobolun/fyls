<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class AuthorityController extends Controller {
	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
    		$this->display();
    	}
    }
    //权限列表
    public function authority(){
    	$authority=M('authority');
		$count=$authority->where("flag = 0")->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$authority->where('flag = 0')->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		//获取名称岗位
		$sta_name = M("stations");
		$sta_name = $sta_name->where("flag = 0")->select();
		$this->assign('sta_name',$sta_name);
		//获取岗位权限表
		$have_auth = M("have_auth"); 
		$result = $have_auth
		->join("left join authority on authority.id = have_auth.auth_id")
		->join("left join stations on stations.id = have_auth.station_id")
		->field("stations.station_name,authority.authority")
		->where("authority.flag = 0 and stations.flag = 0 and have_auth.flag = 0")->select();
		// var_dump($result);exit;
		$this->assign('tasks',$result);
		$this->display();
    }

    //增加权限
    public function add(){
		if(!empty($_POST['sub'])){
			$authority=M('authority');
			$map['authority']=$_POST['authority'];
			$map['flag'] = 0;
			$em2=$authority->where("authority='".$map['authority']."' and flag = 0")->select();
			if($em2) {
				echo $this->jump("The administrator name cannot be repeated","Authority/add");
			}
			else{
				$query=$authority->add($map);
			
				if($query>0){
					$this->journals($_SESSION['name'],'增加了权限',$_POST['authority']);
					echo $this->jump('添加成功','Authority/authority');
				}
				else{
					echo $this->jump('添加失败',"Authority/add");
				}
			}
		}
		else{
			$this->display();
		}
	}

	//数据修改
	public function update(){
		$authority=M('authority');
		if (!empty($_POST['sub'])) {
			$authname = array();
			$id=$_POST['sta_id'];
			$auth_name = $_POST['authority'];
			//循环获取权限ID
			foreach ($auth_name as $k => $v) {
                $authname[] = $authority->where("flag = 0 and authority = '$v'")->field("id")->select();
            } 
            
			// $map['authority']=$_POST['title'];
			$have_auth = M("have_auth");
			//删除原有权限
			$del_auth = $have_auth->where("station_id = ".$id)->delete();
			//增加新权限
			foreach ($authname as $k => $v) {
                        $auth = array();
                        $auth['station_id'] = $id;
                        $auth['delete_flag'] = 0;
                        $auth['auth_id'] = $v[0]['id'];
                        //现有权限
                        // $new[]['auth_id'] = $v[0]['id'];
                        $aa= $have_auth->where()->add($auth);
                } 
			// var_dump($aa);exit;		
			// $val=$authority->where("id=".$id)->save($map);
			//echo "<pre>";print_r($val);echo "<pre>";die;
			if($aa)
			{
				echo $this->jump("修改成功","Authority/authority");
			}else {
				echo $this->jump("修改失败","Authority/authority");
			}
		}
		elseif(!empty($_GET['id'])){
			$id=$_GET['id'];
			$sel=$authority->where()->join()->find("$id");
			$this->assign('sel',$sel);
			//获得全部权限名称
			
			$auth_name = $authority->where("flag = 0")->select();
			// var_dump($auth_name);exit;
			$this->assign('auth_name',$auth_name);
			//获得岗位ID对应的权限
			$have_auth = M("have_auth");
			$authority = $have_auth->join("LEFT JOIN authority ON authority.id = have_auth.auth_id")->where("station_id = ".$id)->select();
			foreach ($authority as $k => $v) {
                // $str = $str.",".implode(",",$v['authority']);
                $str .= $v['authority'].',';
                // var_dump($str);
            }
            // exit;
            $this->assign("str",$str);
            $this->assign("sta_id",$id);
			$this->assign('authority',$authority);
			$this->display();
		}
	}

	//删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$authority=M('authority');
			$id = $_GET['id'];
		 	$user['flag'] = 1; 
		 	$val=$authority->where("flag = 0 and id = ".$id )->save($user);
			if($val>0)
			{
				echo $this->jump("删除成功","Authority/authority");
			}else 
				{
				echo $this->error("删除失败","Authority/authority");
			}		

		}
	}

	/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

}