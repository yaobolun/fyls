<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/zjtr/Public/bootstrap/css/bootstrap.min.css">
<script src="/zjtr/Public/bootstrap/js/jquery-1.8.1.min.js"></script>
<script src="/zjtr/Public/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/zjtr/Public/home/heads.css">
<style>

.about_banner{
  margin-top: 10px;
}
.about_content{
  min-height:650px; 
  overflow: hidden;
  background:url(/zjtr/Public/images/bg.jpg);
  background-size:100% 100%;
  /*height:100%;*/

}
.about_left{
  float: left;
  width:15%;
   
}
.about_left a{
  color:#000;
}
.about_left a{
  color:#000;
}
.about_left p{
  color:#fff;
  background:#008CD6;
  text-align: center;
  font-size: 20px;
  font-family: "微软雅黑";
  font-weight: bold;
  padding:9% 0;

}
.about_left ul{
  width: 100%;
  /*border:1px solid red;*/
  list-style: none;
}
.about_left ul img{
  margin-right: 6%;
  margin-bottom: 3%;
}
.about_left ul li {
  font-size: 16px;
  font-family: "微软雅黑";
  /*background: url(/zjtr/Public/images/jiantou.png) no-repeat;background-position:top  right;*/
  margin:10% 5% 5% 5%;
  border-bottom: 1px solid #008CD6;

  
}
.about_left ul li:hover{
  background: url(/zjtr/Public/images/jiantou.png) no-repeat;background-position:top  right 5%;
}
.bg{
  background: url(/zjtr/Public/images/jiantou.png) no-repeat;background-position:top   right 5%;
}
.about_right{
  width:83%;
  float: left;
  margin-left: 2%;
}
.crumbs{
  list-style: none;
}
.crumbs li{
  float:left;
}
.crumbs li a{
  color:#000;
}
.about_right_content{
  margin-top: 3%;
}
.about_right_content dl {
  overflow: hidden;
  background:#E9F4FE;
  padding:1%;
}
.about_right_content dl dt{
  float:left;
  width:20%;
  height:100px;
  
}
.about_right_content dl dt img{
 
  width:100%;
  height:100px;
  
}
.about_right_content dl dd{
  margin-left:3%;
  float: left;
  width:76%;
  /*border:1px solid red;*/
}
.about_right_content_title{
  font-size: 18px;
  font-weight: bold;
}
.about_right_content_brief{
  margin-top: 2%;
  font-size: 12px;
 
}
h3{
  text-align: center;
  font-weight: bold;
}
a{color:#000;}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title><?php echo ($d["type"]); ?></title>

<!-- <script>
if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    window.location.href = "http://www.cscectr.com/Mobile/";//手机
} else {
    window.location.href = "#";//pc
}
</script> -->

</head>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>北京中建天润文化发展有限公司</title>
<!-- <script>
if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    window.location.href = "http://www.cscectr.com/Mobile/";//手机
} else {
    window.location.href = "#";//pc
}
</script> -->
<style>

div,p,dl,dt,dd,span,ul,li,h1,h2,h3,input,form,img{margin:0;padding:0;}
.top1{
  background:#ebebeb;
  border-bottom:1px solid #DEDEDE;
  overflow: hidden; 

}
.top1 p a{
  color:#333;
}
.top1 .top1_left{
  font-family: "微软雅黑";
  padding: 0.5% 0;
  /*margin-left: 20%;*/
  float:left;
  font-size: 14px
}

.top1 dl {
  
  float:right;
  /*border:1px solid red;*/
  
}
.top1 dl dt,dd{
  /*border:1px solid red;*/
  float:left;
}
.top1 dl dt{
  margin-right: 4%;
}
.top1 dl dd{
  padding-top: 3%;
 
}
.top1 dl dd a{
  font-family: "微软雅黑";
  color:#333;
  font-size: 14px
}

.nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus{

}
</style>
</head>

<body class="body_head"> 
  <div class='top1'>
  <div style='width:1200px;margin:0 auto;overflow:hidden;'>
     <p class='top1_left'>您好，欢迎来到北京中建天润文化发展有限公司官网</p>

          <?php if($_COOKIE["zjtr_id"] == null): ?><dl style='width: 200px;'>
          <dt style="vertical-align: middle; height:30px; padding-top:3px;"><img src='/zjtr/Public/images/mallhy.png' width="80%" ></dt>
          <dd ><a href='/zjtr/Home/Mall/login'>会员登录</a></dd>
          <dd style='float:right'><a href='/zjtr/Home/Mall/register'>会员注册</a></dd>
           </dl>
          <?php else: ?>
           <dl style='width: 240px;'>
          <dt style="vertical-align: middle; height:30px; padding-top:4px"><img src='/zjtr/Public/images/dmallhy.png' width="80%"></dt>
          <dd ><a>欢迎&nbsp;<span style='color:#11B3F0'><?php echo ($_COOKIE['zjtr_user']); ?></span>&nbsp;登录</a>&nbsp;&nbsp;
          <a href='/zjtr/Home/Mall/anquan'>登出</a></dd>
           </dl><?php endif; ?>

   </div>
  </div>
  <div>

<body class="body_head"> 
  <div class='top' style=" background:url('/zjtr/Public/images/back.jpg'); width:100%; height:68px">
  <div style='width:1200px;margin:0 auto;'>
     <div class='com' style="width:95px">
     <img src="/zjtr/Public/images/logo.png" width="65%" style="margin:1px 0;" />
     </div>
        <ul class="nav nav-pills">  
           <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php if($nav["id"] == $n): ?>class="active"<?php endif; ?>><a href="/zjtr/Home/<?php echo ($nav["url"]); ?>?active=<?php echo ($nav["id"]); ?>"><?php echo ($nav["type"]); ?></a>
               <ul class="dropdown-menu">  
               
               <?php if(is_array($nav["er"])): $i = 0; $__LIST__ = $nav["er"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navs): $mod = ($i % 2 );++$i;?><li class="dier"><a href="/zjtr/Home/<?php echo ($nav["url"]); ?>?active=<?php echo ($nav["id"]); ?>&id=<?php echo ($navs["erid"]); ?>"><?php echo ($navs["ername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>      
                </ul>  
           </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>  
          
    </div>
  </div>


<div class='about_banner'>
<img src='/zjtr/Public/<?php echo ($d["banner"]); ?>' style='width:100%'>
</div>
<div class='about_content'>
 <div style='width:1200px;margin:0 auto;margin-top:40px'>
   <div class='about_left'>
     <p><?php echo ($d["type"]); ?></p>
     <ul>
         <?php if(is_array($l)): $i = 0; $__LIST__ = $l;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><a href='/zjtr/Home/<?php echo ($l["url"]); ?>?active=<?php echo ($n); ?>&id=<?php echo ($l["id"]); ?>'> 
        <li <?php if($l["id"] == $id): ?>class='bg'<?php endif; ?>><img src='/zjtr/Public/images/lingxing.png'><span style='margin-left:15px'><?php echo ($l["type"]); ?></span></li></a><?php endforeach; endif; else: echo "" ;endif; ?>   
     </ul>
   </div>
   <div class='about_right'>

            <ul class="crumbs"> 
                <li class="active">您现在的位置：</li>
                <li> 
                    <a href="#">首页</a> <span class="divider">>></span> 
                </li> 
                <li> 
                    <a href="#"><?php echo ($d["type"]); ?></a> <span class="divider">>></span> 
                </li> 
                <li class="active">企业新闻</li> 
            </ul> 
            <div style='overflow:hidden;border-top:1px solid #5CB3E7;width:100%'></div>
             <div class='about_right_content'>
              <h3><?php echo ($data["title"]); ?></h3>
              <div id='editor'>
                 
              </div>
                   <div hidden='hidden'  id='content' ><?php echo ($data["details"]); ?></div>
                   <script type="text/javascript">
                   // htmlspecialchars_decode
                               document.getElementById('editor').innerHTML=document.getElementById('content').innerText;
                   </script>
            </div>
   </div>

 </div> 
</div>

<style>
.footer{
  height:200px;
  background:#266ECC;
  overflow:hidden;

}
.f_bottom{
  margin-top: 10px;
  height:30px;
  background:#0B3E7C;
 /* border:1px solid red;*/
  float:left;
  width:100%;
}
.f_bottom p{
  width:1200px;
  word-spacing: 5px;
  letter-spacing: 1px;
  margin:0 auto;
  height:30px;
  line-height: 30px;
  color:#C6C6C6;

}
.f_box{
  width:1200px;
  margin:0 auto;
  padding-top: 20px;
  height:160px;
 /* border:1px solid red;*/
}
.f_xt{
  float:left;
  width:1px;
  height:120px;
  margin:0 2px;
  background: -webkit-linear-gradient(top,rgba(255,0,0,0),#fff,rgba(255,0,0,0)); /* Safari 5.1 - 6 */
  background: -o-linear-gradient(bottom,rgba(255,0,0,0),#fff,rgba(255,0,0,0)); /* Opera 11.1 - 12*/
  background: -moz-linear-gradient(bottom,rgba(255,0,0,0),#fff,rgba(255,0,0,0)); /* Firefox 3.6 - 15*/
  background: linear-gradient(to bottom, rgba(255,0,0,0),#fff,rgba(255,0,0,0)); /* 标准的语法 */
}
.f_kuai{
  color:#fff;
  float:left;
  height:120px;
  width:25.5%;
  padding:0 3%;
  /*border: 1px solid red;*/

}
.f_kuai .zjci,.f_lx{
  font-size: 20px;
  font-family: "微软雅黑";
  margin-bottom: 28px;
}
.f_kuai div  span {
  margin-right: 15%;
  font-size: 16px;
  font-family: "微软雅黑";
}
.f_kuai div  span a{
  color:#fff;
}
.f_kuai img{
  width:128px;
}

  
</style>

<div class='footer'>
<div class='f_box'>
<div class='f_xt'></div>
<div class='f_kuai'>
  
  <div style='width:159px;margin:0 auto'>
  <p class='zjci'>中建CI形象</p>

  <p>
  <span style="line-height: 28px; "><a href='/zjtr/Home/Mall/product?active=36'>施工现场</a></span>
  <span style='margin:0;line-height: 28px; '><a href='/zjtr/Home/Mall/product?active=16'>服装服饰</a></span></p>
  <span style="line-height: 28px; "><a href='/zjtr/Home/Mall/product?active=37'  style="margin-top:16px;">办公环境</a></span>
  <span style='margin:0;line-height: 28px; '><a href='/zjtr/Home/Mall/product?active=17'>办公用品</a></span>
  </div>
 
</div>
<div class='f_xt'></div>
<div class='f_kuai' style='width:25.5%;'>
<p class='f_lx' style='text-align:center'>联系电话</p>
<p class='f_lx' style='text-align:center;font-size:30px'><?php echo ($em["landline"]); ?></p>
</div>
<div class='f_xt'></div>
<div class='f_kuai' style='width:21%;'>
<div style='margin:0 auto;width:123px'>
<p class='zjci'>公司地址</p>
<p style='font-size:16px;font-family: "微软雅黑"; line-height:28px'><?php echo ($em["address"]); ?></p>
</div>
</div>
<div class='f_xt'></div>
<center>
<div class='f_kuai'>
<img src='/zjtr/Public/<?php echo ($em["qrcode"]); ?>'>
</div>
</center>
<div class='f_xt'></div>
</div>
<div class='f_bottom'><p><?php echo ($em["pccopyright"]); ?></p></div>
</div>
</body>
</html>