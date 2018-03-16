<?php if (!defined('THINK_PATH')) exit();?>  <link rel="stylesheet" href="/zjtr/Public/bootstrap/css/bootstrap.min.css">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="/zjtr/Public/home/head.css"> -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<title>注册</title>
<!-- <script>
if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    window.location.href = "#";//手机
} else {
    window.location.href = "http://zjtr.calf360.com/Home/";//pc
}
</script> -->
<style>
.nav li a{
  color:#fff;
}
.actives{
  background:#087EB7;
 
}



</style>
</head>

<body class="body_head"> 
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style='background:#37ADE7;border:1px solid #37ADE7'>
    <div class="container-fluid">
    <div class="navbar-header">
    <a href="javascript:history.back();">  
    <button class="navbar-toggle" style='float:left;margin:0;padding:0;margin-top:10px;border:0'>
    <img src='/zjtr/Public/images/m/fanhui.png' style='width:30px;'></button></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse" style='float:left;border:0'>
           
           <p style='border:1px solid #fff;width:22px;margin:0;padding:0;margin-bottom:6px'></p>
           <p style='border:1px solid #fff;width:22px;margin:0;padding:0;margin-bottom:6px'></p>
           <p style='border:1px solid #fff;width:22px;margin:0;padding:0;'></p>
        </button>
        <a class="navbar-brand" href="#" style='float:right;margin-right:35%;color:#fff'>中建天润</a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav">
            <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php if($nav["id"] == $n): ?>class="actives"<?php endif; ?>><a href="/zjtr/Mobile/<?php echo ($nav["url"]); ?>?active=<?php echo ($nav["id"]); ?>" style='color:#fff'><?php echo ($nav["type"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 

        </ul>
    </div>
    </div>
</nav>
 <div style='margin-top:10%'></div>


<style>
div{
  margin:0;
  padding:0;
}
.login_content{
	background:url(/zjtr/Public/images/bg.jpg);
    background-size:100% 100%;
  
    padding:30% 0 0 0;
    height:94.4%;
}
.zm{
	background:#fff;
	width: 80%;
	border-radius: 3px;
	padding:1% 1% 0 1%;
  /*border:1px solid red;*/
}
.zm div{
  height:48px;
  /*border:1px solid red;*/
}
.zm img{
	width: 7%;

}
.zm input{
	border:0;
	border-bottom: 1px solid #E1E1E1;
	height:48px;
	width:90%;
	color: #E1E1E1;
	padding-left: 2%;
}

/*设置input placeholder字体颜色*/
::-webkit-input-placeholder {
                  
                       color: #E1E1E1;

                   }
:-moz-placeholder {/* Firefox 18- */

color: #E1E1E1;
}

::-moz-placeholder{/* Firefox 19+ */

color: #E1E1E1;

}

:-ms-input-placeholder {

color: #E1E1E1;

}

.zcyh{
	margin-top: 5%;
	width: 80%;
	background:#669900;
	color:#fff;
	padding: 3% 0;
  border-radius: 3px;
  font-size: 16px
}
.zcyh input{

	color:#fff;
}
</style>
<div class='login_content'>
  <center>
   <form action='' method='post'>
     <div class='zm'>
          <div>
              <img src='/zjtr/Public/images/yhm.png'><input type='text' id='name' name='Name' placeholder="请输入用户名或者手机号" style='color:#000'>
          </div>
          <div>
              <img src='/zjtr/Public/images/mima.png'><input type='password' id='pass' name='Pass' placeholder="密码，6-16位字母或数字" style='color:#000'>
          </div>
          <div>
              <input type='password' name='Pass_new' id='passnew' placeholder="再次确认密码" style='margin-left:10%' style='color:#000'>
          </div>
           <div>
              <img src='/zjtr/Public/images/dh.png'><input type='pass'  id='phone' name='Phone' placeholder="请输入您常用的手机号码" style='color:#000' >
          </div>
     
     </div> 
     <div class='zcyh'>
             <input type='submit' value='注册并登录' name='sub' style='background:#669900;border:0;' onclick='return yanzheng();'>
    </div>
   </form> 
    
   </center>
</div>
<script>
//检查是否填写表单
function  yanzheng(){
var name=$('#name').val();
var pass=$('#pass').val();
var passnew=$('#passnew').val();
var phone=$('#phone').val();
if(name==''){
alert('请输入用户名！');return false;
}
if(pass==''){
alert('请输入密码！');return false;
}
if(passnew==''){
alert('请再次确认密码！');return false;
}
if(phone==''){
alert('请输入手机号！');return false;
}
}
</script>
</body>
</html>