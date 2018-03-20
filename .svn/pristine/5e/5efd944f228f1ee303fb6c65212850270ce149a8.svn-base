<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/zjtr/Public/bootstrap/css/bootstrap.min.css">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ($mbx["type"]); ?></title>
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

.product_content{
	overflow: hidden;
	width: 100%;
	margin-top: 50px;
	min-height: 700px;
	background:url(/zjtr/Public/images/sjtxbj.jpg);
	background-size: 100% 100%;
	/*border:1px solid red;*/
}
.pc_right{

	width: 100%;
	

	overflow: hidden;
	/*border:1px solid #E5E5E5;*/
}
.pc_right input{
	border:0;
	height:28px;
	line-height: 28px;
}
.pcr_right p{
	width:450px;
	background: #fff;
	font-size: 18px;
	height:40px;
	line-height: 40px;
	
	padding-left: 20px;
	border-bottom:1px solid #FAF8F4;
	box-shadow: 0px 1px 1px  #888888;/*边框阴影效果*/
}



.xgxx{
	width:75px;text-align:center;background:#E3E4E5;color:#AAAAAA;padding:5px;font-size:16px;display: block;float:left
}
.baocun{
    width:75px;text-align:center;background:#008CD6;color:#fff;padding:5px;font-size:16px;display: block;
}

</style>

<div class='product_content'>
	<div class='pc_right'  style='padding-bottom:20px'>
		<center>
           <div class='pcr_left' style='padding:10% 10% 5% 10%;color:#858B8B'>
           <div style='width:70%;overflow:hidden'>
           <span style='float:left;width:20%;margin-right:10%'><img src='/zjtr/Public/images/gjhy.png' style='width:50px;margin-top:15px'></span>
           <span style='float:left;width:40%''>
           <?php if($gr["photo"] != null): ?><img src="/zjtr/Public/<?php echo ($gr["photo"]); ?>" style='width:80px;height:80px;' class="img-circle">
          
           <p style='margin-top:5px'><?php echo ($gr["name"]); ?></p>
           <p><?php echo ($gr["phone"]); ?></p>

           <?php else: ?>
           <img src="/zjtr/Public/images/zwtx.jpg" style='width:80px;height:80px;' class="img-circle"><?php endif; ?>
           </span>
           <span style='float:left;width:20%'></span>
             </div>
           </div>
      </center>      

       <div style='background:#fff;margin-bottom:20px;height:40px;line-height:40px;' >
       <center>
           <a href='/zjtr/Mobile/My/index'><span style='font-size: 18px;color:#A19589;'>
           <img src='/zjtr/Public/images/sjwd.png' style='width:30px;'>个人信息</span></a>
           &nbsp;&nbsp;&nbsp;&nbsp;
           <span style='color:#A19589;font-size:20px;'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;
           <span style='color:#1F99DB;font-size: 18px;'><img src='/zjtr/Public/images/sjdd.png' style='width:40px;'>我的订单</span>
           </center>
       </div>
     <p style='background:#FAFAFA;font-size:16px;'>
     <span style='margin-left:5%'>商品信息</span>
     <span style='margin-left:23%'>单价</span>
     <span style='margin-left:8%'>数量</span>
     <span style='margin-left:8%'>金额</span></p>
     <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><dl style='background:#F3F3F3;margin-top:10px;box-shadow: 0px 1px 1px  #888888;/*边框阴影效果*/padding:6px 0;overflow:hidden'>
        <dt style='margin-left:4%;float:left;'><img src='/zjtr/Public/<?php echo ($data["img"]); ?>' width='70' height='70'></dt>
        <dd style='float:left;width:17%;height:70px;margin-left:5px'><?php echo ($data["cp_title"]); ?></dd>
        <dd style='float:left;width:20%;height:70px;line-height:70px;padding-left:5%'>￥<?php echo ($data["dan"]); ?></dd>
        <dd style='float:left;width:20%;height:70px;line-height:70px;padding-left:5%'><?php echo ($data["num"]); ?></dd>
        <dd style='float:left;width:10%;height:70px;line-height:70px'>￥<?php echo ($data["price"]); ?></dd>
     </dl><?php endforeach; endif; else: echo "" ;endif; ?>
	<dl style='height:40px;padding:10px 0;font-size:13px;background:#fff'>
	   <dd style='float:left;margin-right:20%'>当前时间:<?php echo ($time); ?></dd>
	   <dd style='float:left'><?php echo ($zongshu); ?>件</dd>
	   <dd style='float:right'><span style='color:red'>￥<?php echo ($zongjia); ?></span>(不含运费)</dd>
	</dl>
	</div>
	
	


</div>
<div style='height:20px'></div>
<style>
p{
  margin:0;
  padding:0;
}
.f_dh{
  overflow: hidden;
  background:#fff;

}
.f_dh p{
  float:left;
  width: 20%;
  
  text-align: center;
/*  border:1px solid red;*/

}
.f_dh p img{
   margin-top: 5px;
  width: 50%
}
.dl{
  overflow: hidden;
  margin-top: 10%;
  background: #FAFAFA;
  padding:2% 0;
  margin-bottom:5%;
  
}
.dl p{
  float: left;
    /*border:1px solid red;*/
}  
.dl  .dlzc2{
  float:right;
}
.dl .x{
  width:2%;
  text-align: center;
  color:#EDEDED;
}
.dl .dlzc1,.dlzc2{
  color:#000;
  width:49%;
  text-align: center;
/*  border:1px solid red;*/
}
.dbxx{
  background: #D9D9D9;
  padding: 2% 0;
  color:#808080;
  margin-bottom:5%;

}
</style>

<div class='footer' >
     <?php if($_COOKIE["zjtr_id"] == null): ?><div class='dl'>
     
             <a href='/zjtr/Mobile/Mall/login'><p class='dlzc1'>登录</p></a><p class='x'>|</p><a href='/zjtr/Mobile/Mall/register'><p class='dlzc2'>注册</p></a>
            
      </div><?php endif; ?>
<!--       <div class='dbxx'>
      <center>
            <p>Copyright © 2017 北京中建天润文化发展有限公司</p>
            <p>京ICP备 09059684号 -1</p>
            <p>中国·北京·石景山杨庄路华信大厦</p> 
        </center>    
      </div> -->
      
     <div class='f_dh navbar-fixed-bottom'>
           <a href='/zjtr/Mobile/Mall/product?active=14'>
            <p><?php if($m == 2): ?><img src='/zjtr/Public/images/m/xcp.png'>
            <?php else: ?><img src='/zjtr/Public/images/m/cp.png'><?php endif; ?></p></a>
           <a href='tel:18610151215'> <p><img src='/zjtr/Public/images/m/dh.png'></p></a>
           <a href='/zjtr/Mobile/Mall/index'> <p><?php if($m == 1): ?><img src='/zjtr/Public/images/m/xsc.png'>
           <?php else: ?><img src='/zjtr/Public/images/m/sc.png'><?php endif; ?></p></a>
           <a href='/zjtr/Mobile/Mall/cart'> <p><?php if($g == 1): ?><img src='/zjtr/Public/images/m/xgwc.png'><?php else: ?><img src='/zjtr/Public/images/m/gwc.png'><span style='display: block;background:red;color:#FFF;border-radius: 10px;position: absolute;right: 20%;top: 0px;width:20px'><?php echo ($tishi); ?></span><?php endif; ?></p></a>
           <a href='/zjtr/Mobile/My/index'> <p><?php if($p == 1): ?><img src='/zjtr/Public/images/m/xwd.png'><?php else: ?><img src='/zjtr/Public/images/m/wd.png'><?php endif; ?></p></a>
      </div>
</div>
</body>
</html>