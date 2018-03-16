<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/zjtr/Public/admin/css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="/zjtr/Public/admin/js/jquery.js"></script>
<script src="/zjtr/Public/admin/js/verificationNumbers.js"></script>
<script src="/zjtr/Public/admin/js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
  createCode();
  //测试提交，对接程序删除即可
  $(".submit_btn").click(function(){
	  location.href="index.html";
	  });
});
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
 <form action="" method="post">
 <dd class="user_icon">
  <input type="text" placeholder="账号" name="name" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" placeholder="密码" name="password" class="login_txtbx"/>
 </dd>
  
 <dd>
  <input type="submit" value="立即登录" class="submit_btn" name="sub" onClick="return yz()"/>
 </dd>
 </form>
 <dd>
  <p>小牛在线 技术支持</p>
 </dd>
</dl>
<script language="javascript">	
	$("dl dd").css({margin:"8px",padding:"0"});
	$(".loginyzm").css({width:"100px",height:"40px",border:"1px solid #BAC7D2",margin:"0px 5px",background:"#ECF5FA"});

	function yz(){
		if($(".login_txtbx").val()==''||$(".login_txtbx").val()=='')
		{
			alert('用户名或密码不能为空');
			return false;
		}
	}
	
</script>
</body>
</html>