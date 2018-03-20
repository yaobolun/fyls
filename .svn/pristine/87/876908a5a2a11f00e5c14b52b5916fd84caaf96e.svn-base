<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/zjtr/Public/admin/css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/zjtr/Public/admin/js/jquery.js"></script>
<script src="/zjtr/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>

	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
</head>
<body>
<!--header-->
<header>
 <h1><img src="/zjtr/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/zjtr/index.php/" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="/zjtr/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
  
 <ul>
  <li>
   <dl>
    <dt>新闻&产品</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/zjtr/admin.php/Product/product">新闻</a></dd>
    
    <dd><a href="/zjtr/admin.php/New/news">产品</a></dd>
    <dd><a href="/zjtr/admin.php/Pclass/col">产品分类</a></dd>
    <dd><a href="/zjtr/admin.php/Col/col">产品颜色</a></dd>

   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="/zjtr/admin.php/Member/member">会员列表</a></dd>
   <!--  <dd><a href="/zjtr/admin.php/Member/guest">留言列表</a></dd> -->
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="/zjtr/admin.php/Order/order">订单列表</a></dd>
   </dl>
  </li>  
  <li>
   <dl>
    <dt>网站栏目管理</dt>
    <dd><a href="/zjtr/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
   </dl>
  </li>
 <li>
  <dl>
    <dt>前台内容显示设置</dt>
    <!-- <dd><a href="/zjtr/admin.php/Top/ab">About Us</a></dd>
    <dd><a href="/zjtr/admin.php/Top/co">Contact Us</a></dd> -->
    <dd><a href="/zjtr/admin.php/Top/emph">公司信息</a></dd>
    <dd><a href="/zjtr/admin.php/Top/banner">轮播图</a></dd>
    <dd><a href="/zjtr/admin.php/Top/scfw?id=26">商城服务</a></dd>
   <!--  <dd><a href="/zjtr/admin.php/Top/od">Samples and Discounts</a></dd> -->
    <!-- <dd><a href="/zjtr/admin.php/Top/client">clients</a></dd> -->
  <!--   <dd><a href="/zjtr/admin.php/Top/rl">Custom Research and Services</a></dd> -->
   <!-- <dd><a href="/zjtr/admin.php/Top/sg">Shopping Guide</a></dd> -->
   </dl>
   </li>
   <li>
   <dl>
    <dt>后台登录设置</dt>
    <dd><a href="/zjtr/admin.php/Admin/admin">管理员</a></dd>
   </dl>
  </li>
  <li>
   <p class="btm_infor">© 小牛在线 技术支持</p>
  </li>
 </ul>
</aside>


<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">公司信息</h2>
       <!-- <a class="fr top_rt_btn" href="/zjtr/Admin/Top/emph">返回信息列表</a> -->
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">
      <li>
        <span class="item_name" style="width:120px;">发送邮箱：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["femail"]); ?>" name="femail" /> 
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">发送邮箱授权码：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["power"]); ?>" name="power" />
        
       </li>
      <li>
        <span class="item_name" style="width:120px;">接收邮箱：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["jemail"]); ?>" name="jemail" /> 
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">手机号：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["phone"]); ?>" name="phone" /> 
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">座机号：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["landline"]); ?>" name="landline" />
        
       </li>
      <li>
        <span class="item_name" style="width:120px;">公司地址：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["address"]); ?>" name="address" /> 
         
       </li>
        <li>
        <span class="item_name" style="width:120px;">二维码：</span>
        
        <input type="hidden" name="o_photo" value="<?php echo ($sel["qrcode"]); ?>" />
          <label class="uploadImg">
             <input type="file" name="photo" id="doc" class="sr-only" onchange="javascript:setImagePreview();"/>
           <div id="localImag"><?php if($sel["qrcode"] == null): ?><img id="preview" src="/zjtr/Public/home/image/card.png" width="100px" /><?php else: ?><img id="preview" src="/zjtr/Public/<?php echo ($sel["qrcode"]); ?>" width="100px" /><?php endif; ?></div>
           <span>上传图片</span>
          </label>
       </li>
       <script language="javascript">
//下面用于图片上传预览功能
function setImagePreview(avalue) {
var docObj=document.getElementById("doc");
 
var imgObjPreview=document.getElementById("preview");
if(docObj.files &&docObj.files[0])
{
//火狐下，直接设img属性
imgObjPreview.style.display = 'block';
imgObjPreview.style.width = '100px';
//imgObjPreview.src = docObj.files[0].getAsDataURL();
//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
}
else
{
//IE下，使用滤镜
docObj.select();
var imgSrc = document.selection.createRange().text;
var localImagId = document.getElementById("localImag");
//必须设置初始大小
localImagId.style.width = "100px";
//图片异常的捕捉，防止用户修改后缀来伪造图片
try{
localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
}
catch(e)
{
alert("您上传的图片格式不正确，请重新选择!");
return false;
}
imgObjPreview.style.display = 'none';
document.selection.empty();
}
return true;
}
</script>
       <li>
        <span class="item_name" style="width:120px;">电脑底部版权：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["pccopyright"]); ?>" name="pccopyright" /> 
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">icp备案：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["icp"]); ?>" name="icp" />
        
       </li>
          <li>
        <span class="item_name" style="width:120px;">联系人：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["contacts"]); ?>" name="contacts" />
        
       </li>
          <li>
        <span class="item_name" style="width:120px;">手机底部版权：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["sjcopyright"]); ?>" name="sjcopyright" />
        
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input name="id" type="hidden" value="<?php echo ($sel["id"]); ?>" />
        <input type="submit" class="link_btn" name="sub"/>
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
</body>
</html>