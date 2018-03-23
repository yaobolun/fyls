<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class PersonalController extends Controller
{
	public function personal()
	{
		$this->display();
	}
	public function pass()
	{	
		$user = M('admin_user');
		if(!empty($_POST['sub'])){
			$old_pass = $_POST['pass'];
			$new_pass = $_POST['password'];
			$new_pass1 = $_POST['password1'];
			$id = session('id');
			$user = $user->where('id='.$id)->find();
			if($user['password'] != md5($old_pass)){
				echo $this->jump('请输入正确的原密码！', 'Personal/personal');
			}elseif($new_pass == ''){
				echo $this->jump('新密码不能为空！', 'Personal/personal');
			}elseif($new_pass != $new_pass1){
				echo $this->jump('两次密码不一致', 'Personal/personal');
			}else{	
				$user['password'] = md5($_POST['password']);
				$a = M('admin_user')->where('id='.$id)->save($user);
				if($a){
					echo $this->jump('修改成功！', 'Personal/personal');
				}else{
					echo $this->jump('操作失败，请重新提交！', 'Personal/personal');
				}
			}
		}else{
			echo $this->jump('不能为空哦！', 'Personal/personal');
		}
	}
	public function name()
	{
		$user = M('admin_user');
		if(!empty($_POST['sub'])){
			$id = session('id');
			$name['name'] = $_POST['name'];
			$user = $user->where('id='.$id)->save($name);
			if($user){
				echo $this->jump('修改成功！', 'Personal/personal');
			}else{
				echo $this->jump('修改失败！', 'Personal/personal');
			}
		}
	}
	public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
}