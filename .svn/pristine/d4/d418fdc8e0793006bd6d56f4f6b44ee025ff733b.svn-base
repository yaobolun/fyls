<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/zjtr/Public/bootstrap/css/bootstrap.min.css">


  
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<title>产品详情</title>
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

 
 <style type="text/css">
    *,dl{margin:0;padding:0;list-style-type:none;}
    a,img{border:0;}
    /* flexslider */
    .flexslider{position:relative;height:25%;overflow:hidden;background:url(/zjtr/Public/images/loading.gif) 50% no-repeat;}
    .slides{position:relative;z-index:1;}
    .slides li{height:100%;}
    .flex-control-nav{position:absolute;bottom:10px;z-index:2;width:100%;text-align:center;}
    .flex-control-nav li{display:inline-block;width:14px;height:14px;margin:0 5px;*display:inline;zoom:1;}
    .flex-control-nav a{display:inline-block;width:14px;height:14px;line-height:40px;overflow:hidden;background:url(/zjtr/Public/images/dot1.png) right 0 no-repeat;cursor:pointer;}
    .flex-control-nav .flex-active{background-position:0 0;}/*此注释为banner小点

    .flex-direction-nav{position:absolute;z-index:3;width:100%;top:45%;}
    .flex-direction-nav li a{display:block;width:50px;height:50px;overflow:hidden;cursor:pointer;position:absolute;}
   /* .flex-direction-nav li a.flex-prev:hover{left:20%;background:url(/zjtr/Public/images/prev.png) center center no-repeat;}
    .flex-direction-nav li a.flex-next:hover{right:20%;background:url(/zjtr/Public/images/next.png) center center no-repeat;}

    .flex-direction-nav li a.flex-prev{left:20%;background:url(/zjtr/Public/images/prev1.png) center center no-repeat;background-size:50px 50px;}
    .flex-direction-nav li a.flex-next{right:20%;background:url(/zjtr/Public/images/next1.png) center center no-repeat;background-size:50px 50px;}*/
  </style>
  <div style='margin-top:52px'></div>
<div class="jq22-container" >

    <div class="flexslider"  style='width:100%'>
      <ul class="slides">
      <?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><li style="background:url(/zjtr/Public/<?php echo ($img); ?>) 50% 0 no-repeat;background-size:100% 100%;"></li><?php endforeach; endif; else: echo "" ;endif; ?>   
        <!-- <li style="background:url(/zjtr/Public/images/m/hzgy.jpg) 50% 0 no-repeat;background-size:100% 100%;"></li>
        <li style="background:url(/zjtr/Public/images/m/jdal.jpg) 50% 0 no-repeat;background-size:100% 100%;"></li>
        <li style="background:url(/zjtr/Public/images/m/lxwm.jpg) 50% 0 no-repeat;background-size:100% 100%;"></li>
        <li style="background:url(/zjtr/Public/images/m/xwdt.jpg) 50% 0 no-repeat;background-size:100% 100%;"></li> -->
      </ul>
    </div>
    
  </div>
  
  <script src="/zjtr/Public/home/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="/zjtr/Public/home/jquery.flexslider-min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.flexslider').flexslider({
        directionNav: true,
        pauseOnAction: false,
        slideshowSpeed: 5000
      });
    });
  </script>
  <form action='/zjtr/Mobile/Mall/goumai' method='post'>
 <dl class='m_cplist' style='padding: 2% 2% 0% 2%;overflow:hidden;'>
      <dd style='float:left'>
      <input type='hidden' value='<?php echo ($data["id"]); ?>' name='spid'>
      <p style='font-size:16px;font-weight: bold;padding:5% 0;'><?php echo ($data["title"]); ?></p>
    
       <p style='color:red;font-weight: bold;'>￥<?php echo ($data["price"]); ?>/顶</p>
      </dd>
       
       <dd style='width:70%;float:right;height:9%;'>
        <input  type='submit' name='jrgwc' value='加入购物车' style='float:right;width:90px;background:#008CD6;color:#fff;padding:7px;border:1px solid #008CD6' onclick='return num();'>
        <span data-box='buy' style='float:right;'>
         <button type='button' style='border:0;width:30px;background:#F2F2F2;color:#CCCCCC;font-size:16px;margin-right:2px;padding:7px'>-</button><input id="phone" type="text" id="BuyNum_1"  min='1' max='10' step='1' pattern='[0-9]*' value='0' name='BuyNum' readonly style='width:30px;border:0;background:#F5F5F5;text-align:center;padding:7px' /><button type='button' style='border:0;width:30px;background:#F2F2F2;color:#CCCCCC;font-size:16px;margin-left:2px;padding:7px'>+</button>
         </span>
       
       </dd>
     </dl>
</form>
<div class='mindex_content'>
     <div style='border-top:1px solid #fff;border-bottom:1px solid #F2F2F2;background:#FAFAFA'>
     <p style='border-left:2px solid #37ADE7;padding-left:5px;width:80px;font-size:14px;margin:3%;color:#8B8B8B;'>商品信息</p>
    </div>
    <div style=' margin:3%' id='cp_spjs'>
        
    </div>
    <div hidden='hidden'  id='content' ><?php echo ($data["details"]); ?></div>
    <script type="text/javascript">
                // htmlspecialchars_decode
                document.getElementById('cp_spjs').innerHTML=document.getElementById('content').innerText;
               
   </script>
</div>
<script type="text/javascript">
function  num(){
      
      var c=document.getElementById('phone').value;

      
      if(c>0){
          document.getElementById('price').value=<?php echo ($data["price"]); ?>*m;
        return true;
      }else{
        alert('请选择商品数量！');
        return false;
      }
    }
        function getElementByAttr(tag, attr, value) {
            var aElements = document.getElementsByTagName(tag);
            var aEle = [];
            for (var i = 0; i < aElements.length; i++) {
                if (aElements[i].getAttribute(attr) == value)
                    aEle.push(aElements[i]);
            }
            return aEle;
        }
        window.onload = function () {
            var box = getElementByAttr("span", "data-box", "buy");
            for (var i = 0; i < box.length; i++) {
                calculate(box[i]);

            }
        }
        function calculate(box) {
            var oBtn = box.getElementsByTagName("button");
            var ipt = box.getElementsByTagName("input")[0];
            var number = parseInt(ipt.value);
            oBtn[0].onclick = function () {
                number--;
                if (number < 0) {
                    number = 0;
                }
                ipt.value = number;

            }
            oBtn[1].onclick = function () {
                number++;
                ipt.value = number;
            }
        }
 </script>
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