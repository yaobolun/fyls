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
       <h2 class="fl">添加</h2>
       <a class="fr top_rt_btn" href="/zjtr/Admin/New/news">返回列表</a>
      </div>
     <section>
     <form action="" method="post" enctype="multipart/form-data">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">标题：</span>
        <input type="text" class="textbox textbox_295" placeholder="标题..." name="title" />
         
       </li>
<!--        <li>
        <span class="item_name" style="width:120px;">缩略图：</span>
        
          <label class="uploadImg">

           <input type="file" name="pho[]"/>

           <span>上传图片</span>
          </label>
       </li> -->
        <li>
        <span class="item_name" style="width:120px;">分类：</span>
        <select name='n_type' style='width:307px;height:38px;border: 1px #139667 solid;'>
        <option value=''>--请选择--</option>
        <?php if(is_array($rc)): $i = 0; $__LIST__ = $rc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rc): $mod = ($i % 2 );++$i;?><option value='<?php echo ($rc["id"]); ?>'><?php echo ($rc["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
       </li>
       <li>
        <span class="item_name" style="width:120px;">摘要：</span>
        <input type="text" class="textbox textbox_295" placeholder="摘要..." name="abstract" />
        
       </li>
       <li>
        <span class="item_name" style="width:120px;">颜色：</span>
        <?php if(is_array($c)): $i = 0; $__LIST__ = $c;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><input type="checkbox"  name="colour[]" value='<?php echo ($c["col_id"]); ?>'/><?php echo ($c["col_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
       </li>
    
       <li>
        <span class="item_name" style="width:120px;">价格：</span>
         <input type="text" class="textbox textbox_295" placeholder="价格" name="price" />
         <span class="item_name" style="">单位：</span>
         <input type="text" class="textbox textbox_250" placeholder="单位" name="danwei" />
       </li>
     <li>
        <span class="item_name" style="width:120px;">数量：</span>
         <input type="text" class="textbox textbox_295" placeholder="数量" name="number" />
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">产品图片：</span>
         <span class='image_container' name='img'> </span>
         <span class='upload_container'> </span>
         <img id='addfiles' src='/zjtr/Public/images/z_add.png' num='1' width='100' height="100" onclick="addfile(this)">
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">税：</span>
         <input type="radio" value="1" name="tax" />含税
         <input type="radio" value="2" name="tax" />不含税
       </li>
       <li>
        <span class="item_name" style="width:120px;">产品详情：</span>
        <script id="editor" type="text/plain" name="details" style="width:1024px;height:500px;margin-left:120px;margin-top:0;"></script>
           <!--ueditor可删除下列信息-->
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" name="sub"/>
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
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
    if(c <5){
        nemhtml="<input name='img[]' class=\"file_upload_"+num+"\" numb=\""+num+"\" type=\"file\" onchange='upfile(this)' hidden />\n";
        $('.upload_container').append(nemhtml);
        newhtml="<img class=\"fileimg_"+num+"\" onclick='del(this)'>\n";
        $('.image_container').append(newhtml);
        $(r).attr('num',parseInt(num)+1); //将img的num重新赋值
        $('.file_upload_'+num).click(); //直接执行点击

    }else{
        alert('最多上传5张图');
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
<!--编辑器-->
     <script type="text/javascript" charset="utf-8" src="/zjtr/Public/rich/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/zjtr/Public/rich/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/zjtr/Public/rich/lang/zh-cn/zh-cn.js"></script>  
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
    
</script>
</body>
</html>