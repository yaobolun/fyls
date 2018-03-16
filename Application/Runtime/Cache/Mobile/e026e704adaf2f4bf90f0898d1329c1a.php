<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/zjtr/Public/bootstrap/css/bootstrap.min.css">


  
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ($d["type"]); ?></title>
<script>
if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    window.location.href = "#";//手机
} else {
    window.location.href = "http://zjtr.calf360.com/Home/";//pc
}
</script>
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
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse" style='float:left;margin-left:5px;border:0;'>
           
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
 <div style='margin-top:52px'></div>


<img src='/zjtr/Public/images/m/xwdt.jpg' style='width:100%'>

<div class='mindex_content'>
     <p style='border-bottom:2px solid #37ADE7;width:75px;font-size:18px;margin:3%;'><?php echo ($d["type"]); ?></p>
     <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href='/zjtr/Mobile/Index/c_jour?active=<?php echo ($n); ?>&id=<?php echo ($data["type_id"]); ?>' style='color:#000'>
     <dl class='m_gsjj' style='background:#FAFAFA;padding:2% 0;overflow:hidden'>
         <dt style='width:25%;float:left;margin-left:2%'><img src='/zjtr/Public/<?php echo ($data["n_photo"]); ?>' style='width:100%;height:11%'></dt>
         <dd style='margin-left:2.5%; font-weight: bold;font-size:16px;float:left'><?php echo ($data["title"]); ?></dd>
         <dd style='margin-left:2.5%;float:left;width:70%;font-size:13.5px'><?php echo ($data["abstract"]); ?></dd>
     </dl>
     </a><?php endforeach; endif; else: echo "" ;endif; ?>

     <!-- <dl class='m_gsjj' style='background:#FAFAFA;padding:2% 0;overflow:hidden'>
         <dt style='width:25%;float:left;margin-left:2%'><img src='/zjtr/Public/images/120.jpg' style='width:100%;height:11%'></dt>
         <dd style='margin-left:2.5%; font-weight: bold;font-size:16px;float:left'>中间天润金秋九月怀柔云蒙游</dd>
         <dd style='margin-left:2.5%;float:left;width:70%;font-size:13.5px'>金秋九月，清风送爽，层林尽染，叠翠流金，天高云淡，中建天润组织了文化发展公司，彩钢钢构公司。</dd>
     </dl>
     <dl class='m_gsjj' style='background:#FAFAFA;padding:2% 0;overflow:hidden'>
         <dt style='width:25%;float:left;margin-left:2%'><img src='/zjtr/Public/images/120.jpg' style='width:100%;height:11%'></dt>
         <dd style='margin-left:2.5%; font-weight: bold;font-size:16px;float:left'>中间天润金秋九月怀柔云蒙游</dd>
         <dd style='margin-left:2.5%;float:left;width:70%;font-size:13.5px'>金秋九月，清风送爽，层林尽染，叠翠流金，天高云淡，中建天润组织了文化发展公司，彩钢钢构公司。</dd>
     </dl> -->
</div>

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
  
}
</style>

<div class='footer'>
      <?php if($_COOKIE["zjtr_id"] == null): ?><div class='dl'>
     
             <a href='/zjtr/Mobile/Mall/login'><p class='dlzc1'>登录</p></a><p class='x'>|</p><a href='/zjtr/Mobile/Mall/register'><p class='dlzc2'>注册</p></a>
            
      </div><?php endif; ?>
      <div class='dbxx'>
      <center>
            <p><?php echo ($em["sjcopyright"]); ?></p>
            <p><?php echo ($em["icp"]); ?></p>
            <p><?php echo ($em["address"]); ?></p> 
        </center>    
      </div>
      <div style='height:10%'></div>
      <div class='f_dh navbar-fixed-bottom'>
           <a href='/zjtr/Mobile/Mall/product?active=14'>
            <p><?php if($m == 2): ?><img src='/zjtr/Public/images/m/xcp.png'>
            <?php else: ?><img src='/zjtr/Public/images/m/cp.png'><?php endif; ?></p></a>
           <a href='tel:18610151215''> <p><img src='/zjtr/Public/images/m/dh.png'></p></a>
           <a href='/zjtr/Mobile/Mall/index'> <p><?php if($m == 1): ?><img src='/zjtr/Public/images/m/xsc.png'>
           <?php else: ?><img src='/zjtr/Public/images/m/sc.png'><?php endif; ?></p></a>
           <a href='/zjtr/Mobile/Mall/cart'> <p><?php if($g == 1): ?><img src='/zjtr/Public/images/m/xgwc.png'><?php else: ?><img src='/zjtr/Public/images/m/gwc.png'><span style='display: block;background:red;color:#FFF;border-radius: 10px;position: absolute;right: 20%;top: 0px;width:20px'><?php echo ($tishi); ?></span><?php endif; ?></p> </a>
            <a href='/zjtr/Mobile/My/index'> <p><?php if($p == 1): ?><img src='/zjtr/Public/images/m/xwd.png'><?php else: ?><img src='/zjtr/Public/images/m/wd.png'><?php endif; ?></p></a>
      </div>
</div>
</body>
</html>