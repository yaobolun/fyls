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
       <h2 class="fl">栏目修改</h2>
       <a class="fr top_rt_btn" href="/zjtr/Admin/Lanmu/lanmu">返回</a>
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">
      <li>
        <span class="item_name" style="width:120px;">栏目名称：</span>
        <input type="text" name="type" value="<?php echo ($sel["type"]); ?>" class="textbox textbox_295" />
      </li>
      <li>
        <span class="item_name" style="width:120px;">首页短语：</span>
        <input type="text" name="phrase" value="<?php echo ($sel["phrase"]); ?>" class="textbox textbox_295" />
      </li>
     <li>
        <span class="item_name" style="width:120px;">pc图标：</span>
        <input type="hidden" name="o_photo" value="<?php echo ($sel["photo"]); ?>" />
          <label class="uploadImg">
            <input type="file" name="photo1" id="doc" class="sr-only" onchange="javascript:setImagePreview();"/>
           <div id="localImag"><?php if($sel["photo"] == null): ?><img id="preview" src="" width="100px" /><?php else: ?><img id="preview" src="/zjtr/Public/<?php echo ($sel["photo"]); ?>" width="100px" /><?php endif; ?></div>
           <span>上传图片</span>
          </label>
       </li>
       <li>
        <span class="item_name" style="width:120px;">手机图标：</span>
         <input type="hidden" name="o_photos" value="<?php echo ($sel["photos"]); ?>" />
          <label class="uploadImg">
           <input type="file" name="photo2" id="doc1" class="sr-only" onchange="javascript:setImagePreviews();"/>
           <div id="localImag1"><?php if($sel["photos"] == null): ?><img id="preview1" src="" width="100px" /><?php else: ?><img id="preview1" src="/zjtr/Public/<?php echo ($sel["photos"]); ?>" width="100px" /><?php endif; ?></div>
           <span>上传图片</span>
          </label>
       </li>
       <li>
        <span class="item_name" style="width:120px;">二级banner图：</span>
         <input type="hidden" name="o_photoss" value="<?php echo ($sel["banner"]); ?>" />
          <label class="uploadImg">
           <input type="file" name="photo3" id="doc2" class="sr-only" onchange="javascript:setImagePreviewss();"/>
           <div id="localImag2"><?php if($sel["banner"] == null): ?><img id="preview2" src="" width="500px" /><?php else: ?><img id="preview2" src="/zjtr/Public/<?php echo ($sel["banner"]); ?>" width="500px" /><?php endif; ?></div>
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
<script language="javascript">
//下面用于图片上传预览功能
function setImagePreviews(avalue) {
var docObj=document.getElementById("doc1");
 
var imgObjPreview=document.getElementById("preview1");
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
var localImagId = document.getElementById("localImag1");
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
<script language="javascript">
//下面用于图片上传预览功能
function setImagePreviewss(avalue) {
var docObj=document.getElementById("doc2");
 
var imgObjPreview=document.getElementById("preview2");
if(docObj.files &&docObj.files[0])
{
//火狐下，直接设img属性
imgObjPreview.style.display = 'block';
imgObjPreview.style.width = '500px';
//imgObjPreview.src = docObj.files[0].getAsDataURL();
 
//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
}
else
{
//IE下，使用滤镜
docObj.select();
var imgSrc = document.selection.createRange().text;
var localImagId = document.getElementById("localImag2");
//必须设置初始大小
localImagId.style.width = "500px";
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

       
 <!--  -->
        <li>
        <span class="item_name" style="width:120px;">手机商城首页：</span>
        <?php if($sel["web"] == 1): ?><input type='checkbox' name='ixm' value='1' <?php if($sel["ixm"] == 1): ?>checked<?php endif; ?>>显示<?php endif; ?>
       <?php if($sel["web"] == 2): ?><input type='checkbox' name='ixm' value='2' <?php if($sel["ixm"] == 2): ?>checked<?php endif; ?>>显示<?php endif; ?>
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