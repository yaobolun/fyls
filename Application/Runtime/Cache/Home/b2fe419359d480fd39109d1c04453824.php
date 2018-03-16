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
.about_left p{
  color:#fff;
  background:#008CD6;
  text-align: center;
  font-size: 20px;
  font-family: "微软雅黑";
  font-weight: bold;
  padding:8% 0;

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
  width:80%;
  float: left;
  margin-left: 5%;
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
    window.location.href = "http://zjtr.calf360.com/Mobile/";//手机
} else {
    window.location.href = "#";//pc
}
</script> -->
</head>

<body class="body_head"> 
  <div class='top'>
  <div style='width:1200px;margin:0 auto;'>
     <div class='com'>
     中建天润
     </div>
                <ul class="nav nav-pills">  
                   <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php if($nav["id"] == $n): ?>class="active"<?php endif; ?>><a href="/zjtr/Home/<?php echo ($nav["url"]); ?>?active=<?php echo ($nav["id"]); ?>"><?php echo ($nav["type"]); ?></a>
                       <ul class="dropdown-menu">  
                       
                       <?php if(is_array($nav["er"])): $i = 0; $__LIST__ = $nav["er"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navs): $mod = ($i % 2 );++$i;?><li><a href="/zjtr/Home/<?php echo ($nav["url"]); ?>?active=<?php echo ($nav["id"]); ?>&id=<?php echo ($navs["erid"]); ?>"><?php echo ($navs["ername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>      
                        </ul>  
                   </li><?php endforeach; endif; else: echo "" ;endif; ?>   
                  
                </ul>  
          

    </div>
  </div>


<div class='about_banner'>
<img src='/zjtr/Public/images/jdal.jpg' style='width:100%'>
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
                <li style='color:#000'>您现在的位置：</li>
                <li> 
                    <a href="/zjtr/Home/Index/index">首页</a> <span class="divider">>></span> 
                </li> 
                <?php if($ls["type_id"] != 0): ?><li> 
                        <a href="/zjtr/Home/Index/about?active=<?php echo ($n); ?>"><?php echo ($d["type"]); ?></a> <span class="divider">>></span> 
                    </li> 
                    <li class="active"><?php echo ($ls["type"]); ?></li> 
                   <?php else: ?>
                   <li class="active"><?php echo ($d["type"]); ?></li><?php endif; ?>
                
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
  margin-bottom: 30px;
}
.f_kuai div span{
  margin-right: 15%;
  margin-top:10%;
  font-size: 16px;
  font-family: "微软雅黑";
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
 <p> <span>施工现场</span>
  <span style='margin:0'>服装服饰</span></p>
  <span>办公环境</span>
  <span style='margin:0'>办公用品</span>
  </div>
 
</div>
<div class='f_xt'></div>
<div class='f_kuai' style='width:25.5%;'>
<p class='f_lx' style='text-align:center'>联系电话</p>
<p class='f_lx' style='text-align:center;font-size:30px'>400-668-1689</p>
</div>
<div class='f_xt'></div>
<div class='f_kuai' style='width:21%;'>
<div style='margin:0 auto;width:123px'>
<p class='zjci'>公司地址</p>
<p style='font-size:16px;font-family: "微软雅黑";'>中国·北京·石景山杨庄路华信大厦</p>
</div>
</div>
<div class='f_xt'></div>
<center>
<div class='f_kuai'>
<img src='/zjtr/Public/images/wx.jpg'>
</div>
</center>
<div class='f_xt'></div>
</div>
<div class='f_bottom'><p>Copyright © 2016 cscectr.com.All rights reserved.</p></div>
</div>
</body>
</html>