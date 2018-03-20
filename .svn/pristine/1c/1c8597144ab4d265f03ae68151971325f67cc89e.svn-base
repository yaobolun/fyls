<?php if (!defined('THINK_PATH')) exit();?>  <link rel="stylesheet" href="/zjtr/Public/bootstrap/css/bootstrap.min.css">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="/zjtr/Public/home/head.css"> -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<title>登录</title>
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
.login_content{
	margin-top: 13%;
	background:url(/zjtr/Public/images/bg.jpg);
    background-size:100% 100%;
   
    padding:30% 0;
    height:92.7%;
    /*border:1px solid red;*/
}
.zm{
	background:#fff;
	width: 80%;
	border-radius: 3px;
	padding: 1%;

}.zm div{
	height:48px;
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
.wj{
	overflow: hidden;
	padding:4% 0 0 0;
	/*border:1px solid red;*/
}
.wj span{
	
}
.wj a{
	float: right;
	color:#E1E1E1;
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
.dlan{
	margin-top: 5%;
}
.dlan input{

	width: 80%;
	border:1px solid #008CD6;
	background:#008CD6;
	color:#fff;
	padding: 3% 0;
	border-radius: 3px;
	font-size: 16px

}
.zcyh{
	margin-top: 1%;
	width: 80%;
	background:#669900;
	color:#fff;
	padding: 3% 0;
	border-radius: 3px;
	font-size: 16px
}
.zcyh a{

	color:#fff;
}
</style>

<div class='login_content'>
  <center>
   <form action='' method='post'>
     <div class='zm'>
          <div>
              <img src='/zjtr/Public/images/yhm.png'><input type='text' name='Name' placeholder="您的账户名" style='color:#000'>
          </div>
          <div>
              <img src='/zjtr/Public/images/mima.png'><input type='password' name='Pass' placeholder="您的新密码" style='color:#000'>
          </div>
          <div class='wj'>
             
          </div>
     
     </div> 
      <div class='dlan'>
            <input type='submit' value='更新密码' name='sub'>
      </div>
   </form> 
    <div class='zcyh'>
             <a href='/zjtr/Mobile/Mall/register'>注册新用户 </a>
    </div>
   </center>
</div>
</body>
</html>