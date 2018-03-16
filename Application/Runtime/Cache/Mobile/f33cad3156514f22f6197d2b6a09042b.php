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
	

	<div class='pc_right' id='xx'>
	<center>
           <div class='pcr_left' style='padding:10% 10% 5% 10%;color:#858B8B'>
           <div style='width:70%;overflow:hidden'>
           <span style='float:left;width:20%;margin-right:10%'><img src='/zjtr/Public/images/gjhy.png' style='width:50px;margin-top:15px'></span>
           <span style='float:left;width:40%''>
           <?php if($data["photo"] != null): ?><img src="/zjtr/Public/<?php echo ($data["photo"]); ?>"  class="img-circle" style='width:80px;height:80px;'>
          
           <p style='margin-top:5px'><?php echo ($data["name"]); ?></p>
           <p><?php echo ($data["phone"]); ?></p>

           <?php else: ?>
           <img src="/zjtr/Public/images/zwtx.jpg"  class="img-circle" style='width:80px;height:80px;'><?php endif; ?>
           </span>
           <span style='float:left;width:20%'></span>
             </div>
           </div>
      </center>      

       <div style='background:#fff;margin-bottom:20px;height:40px;line-height:40px;' >
       <center>
           <span style='color:#1F99DB;font-size: 18px;'>
           <img src='/zjtr/Public/images/sjgrxx.png' style='width:40px;'>个人信息</span>
           &nbsp;&nbsp;&nbsp;&nbsp;
           <span style='color:#A19589;font-size:20px;'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;
           <a href='/zjtr/Mobile/My/order'><span style='color:#C7C5C5;font-size: 18px;'><img src='/zjtr/Public/images/sjwdxx.png' style='width:40px;'>我的订单</span></a>
           </center>
       </div>
           <div class='pcr_right' >
                 <p><img src='/zjtr/Public/images/sjwd.png' style='width:30px;margin-right:10px'>用户名：<?php echo ($data["name"]); ?></p>
                 <p><img src='/zjtr/Public/images/sjxb.png' style='width:30px;margin-right:10px'>性别：<?php echo ($data["sex"]); ?></p>
                 <p><img src='/zjtr/Public/images/sjdh.png' style='width:30px;margin-right:10px'>电话：<?php echo ($data["phone"]); ?></p>
                 <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><p><img src='/zjtr/Public/images/sjwz.png' style='width:30px;margin-right:10px'>收货地址：<?php echo ($a["a_address"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>   
                 <center>
                 <div style='margin-top:10px'>
                      <a href='#' class='baocun'  onclick='xxk1()'>修改信息</a>
                      <!-- <a href='#' class='baocun' >保存</a> -->
                 </div>
                 </center>
                 <div style='margin:0 auto;width:90%;'> 
                 <a href='/zjtr/Mobile/My/address' style='color:#fff'>更新收货地址</a>
                 </div>
           </div>
	</div>
	<div class='pc_right' hidden id='bao'>
	  <form action='/zjtr/Mobile/My/up' method='post' enctype="multipart/form-data">
	  <center>
	       <input type='hidden' value='<?php echo ($data["photo"]); ?>' name='o_photo'>
           <div class='pcr_left' style='padding:10% 10% 5% 10%;color:#858B8B'>
           <div style='width:70%;overflow:hidden'>
           <span style='float:left;width:20%;margin-right:10%'>
           <img src='/zjtr/Public/images/gjhy.png' style='width:50px;margin-top:15px'></span>
           <span style='float:left;width:40%''>
           <?php if($data["photo"] != null): ?><img id='addfiles' src='/zjtr/Public/<?php echo ($data["photo"]); ?>' num='1' class="img-circle" style='width:80px;height:80px;z-index:' onclick="addfile(this)">
           <p style='margin-top:5px'><?php echo ($data["name"]); ?></p>
           <p><?php echo ($data["phone"]); ?></p>

           <?php else: ?>
           <img id='addfiles' src="/zjtr/Public/images/zwtx.jpg" num='1' class="img-circle" style='width:80px;height:80px' onclick="addfile(this)"><?php endif; ?>
           </span>
           <span style='float:left;width:20%'></span>
             </div>
              <span class='image_container' name='img'> </span>
            <span class='upload_container' hidden> </span>
           </div>
      </center>
         <div style='background:#fff;margin-bottom:20px;height:40px;line-height:40px;' >
       <center>
           <span style='color:#1F99DB;font-size: 18px;'>
           <img src='/zjtr/Public/images/sjgrxx.png' style='width:40px;'>个人信息</span>
           &nbsp;&nbsp;&nbsp;&nbsp;
           <span style='color:#A19589;font-size:20px;'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;
           <a href='/zjtr/Mobile/My/order'><span style='color:#C7C5C5;font-size: 18px;'><img src='/zjtr/Public/images/sjwdxx.png' style='width:40px;'>我的订单</span></a>
           </center>
       </div>
           <div class='pcr_right'>
                 <p><input type='text' name='Name' value='<?php echo ($data["name"]); ?>' readonly></p>
                 <p>性别：
                 <input type='radio' name='sex' value='男'  style='height:10px;' <?php if($data["sex"] == "男"): ?>checked<?php endif; ?>>男
                 <input type='radio' name='sex' value='女' style='height:10px;' <?php if($data["sex"] == "女"): ?>checked<?php endif; ?>>女
                 </p>
                 <p>电话：<input type='text' name='Phone' value='<?php echo ($data["phone"]); ?>'></p>
                 <center>
                 <div style='margin-top:10px'>
                     <!--  <a href='#' class='xgxx'>修改信息</a> -->
                      <input type='submit'  class='baocun' value='保存' style='padding:0'>
                      <!-- <a href='#'>保存</a> -->
                 </div>
                 </center>
                 <div style='margin:0 auto;width:90%;'> 
                 <a href='/zjtr/Mobile/My/address' style='color:#fff;'>更新收货地址</a></div>
           </div>
       </form> 

	</div>
  <a href='/zjtr/Mobile/Mall/anquan' style='color:#fff'>
<div style='margin:0 auto;margin-bottom:100px;margin-top:10px;text-align:center;background:#008CD6;padding:10px 0;width:90%; '> 
退出登录</div></a>
	<script>
       function   xxk1(){
		  $("#bao").show();
		  $("#xx").hide();
       }
       
</script>
<script>
function addfile(r){

var isnull='1';
var src='';
$('#addfiles').children().each(function(){
src=$(this).attr('src');
if(!src){
    isnull='0';
}
});
if(isnull){
    var newhtml='';
    var num=$(r).attr('num');
    var c=document.getElementsByName('img')[0].children.length;
    if(c <1){
        nemhtml="<input name='img[]' class=\"file_upload_"+num+"\" numb=\""+num+"\" type=\"file\" onchange='upfile(this)' hidden />\n";
        $('.upload_container').append(nemhtml);
        newhtml="<img class=\"fileimg_"+num+"\"  onclick='del(this)'>\n";
        $('.image_container').append(newhtml);
        $(r).attr('num',parseInt(num)+1); //将img的num重新赋值
        $('.file_upload_'+num).click(); //直接执行点击

    }else{
        alert('最多上传1张图');
    }    
}

}
function del(r){
    if(window.confirm('你确定要删除图片？')){
                 //alert("确定");
                 var numb=$(r).attr('numb');
                 $('.file_upload_'+numb).remove();//
                 $(r).remove();
                 return true;
              }else{
                 //alert("取消");
                 return false;
             }
    var num=$(r).attr('num');
}
    function  upfile(r){

        var $file=$(r);
        var numb=$(r).attr('numb');
        var fileObj=$file[0];
 
        var windowURL=window.URL || window.webkitURL;
   //URL对象是硬盘（SD卡等）指向文件的一个路径，如果我们做文件上传的时候，想在没有上传服务器端的情况下看到上传图片的效果图的时候就可是以通过var url=window.URL.createObjectURL(obj.files[0]);获得一个http格式的url路径，这个时候就可以设置到<img>中显示了。
  // window.webkitURL和window.URL是一样的，window.URL标准定义，window.webkitURL是webkit内核的实现（一般手机上就是使用这个），还有火狐等浏览器的实现。

        var dataURL;
        if(fileObj && fileObj.files && fileObj.files[0]){
            dataURL=windowURL.createObjectURL(fileObj.files[0]);
            console.log(dataURL);
            $('.fileimg_'+numb).attr('src',dataURL);
            $('.fileimg_'+numb).attr('height',100);
            $('.fileimg_'+numb).attr('width',100);
            $('.fileimg_'+numb).attr('numb',numb);
            $(r).hide();
        }

    }
</script>


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