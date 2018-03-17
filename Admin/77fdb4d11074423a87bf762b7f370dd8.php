<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/Public/admin/css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/Public/admin/js/jquery.js"></script>
<script src="/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
 <h1><img src="/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/index.php/" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
  
 <ul>
  <li>
   <dl>
    <dt>产品(Product)</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/admin.php/Product/product">Product information</a></dd>
    <dd><a href="/admin.php/Topsell/report">Top-Selling Reports</a></dd>
    <dd><a href="/admin.php/New/news">Company/Market News</a></dd>

   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="/admin.php/Member/member">会员列表</a></dd>
    <dd><a href="/admin.php/Member/guest">留言列表</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="/admin.php/Order/order">订单列表</a></dd>
   </dl>
  </li>  
  <li>
   <dl>
    <dt>网站栏目管理</dt>
    <dd><a href="/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
   </dl>
  </li>
 <li>
  <dl>
    <dt>前台内容显示设置</dt>
    <dd><a href="/admin.php/Top/ab">About Us</a></dd>
    <dd><a href="/admin.php/Top/co">Contact Us</a></dd>
    <dd><a href="/admin.php/Top/emph">Email & phone</a></dd>
    <dd><a href="/admin.php/Top/banner">Banner</a></dd>
    <dd><a href="/admin.php/Top/od">Samples and Discounts</a></dd>
    <dd><a href="/admin.php/Top/client">clients</a></dd>
    <dd><a href="/admin.php/Top/rl">Custom Research and Services</a></dd>
   <dd><a href="/admin.php/Top/sg">Shopping Guide</a></dd>
   </dl>
   </li>
   <li>
   <dl>
    <dt>登录设置</dt>
    <dd><a href="/admin.php/Admin/admin">Administrators</a></dd>
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
       <h2 class="fl">产品修改</h2>
       <a class="fr top_rt_btn" href="/Admin/Topsell/report">返回产品列表</a>
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">标题:</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["title"]); ?>" name="Title" />
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">摘要:</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["abstract"]); ?>" name="Abstract" />
        
       </li>
       
       <li>
        <span class="item_name" style="width:120px;">时间:</span>
         <input type="text" class="textbox textbox_295" value="<?php echo ($sel["time"]); ?>" name="Time" />
        
       </li>
      <li>
        <span class="item_name" style="width:120px;">类别:</span>
         <select name="n_id" class="select">
            <option value="">----请选择----</option>
            <?php if(is_array($report1)): $i = 0; $__LIST__ = $report1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["type_id"] == 2): if(is_array($report1)): $i = 0; $__LIST__ = $report1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i; if(($vo["id"]) == $voo["type_id"]): ?><option value="<?php echo ($voo["id"]); ?>" <?php echo ($sel['n_id']== $voo['id']?'selected':''); ?>><?php echo ($voo["type"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        </select>
     
       </li>
       <li>
        <span class="item_name" style="width:120px;">页数:</span>
         <input type="text" class="textbox textbox_295" value="<?php echo ($sel["pages"]); ?>" name="Pages"/>
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">价格<span style="color:#f00">($)</span>:</span>
         Single User License:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="width:130px" class="textbox" value="<?php echo ($sel["u_price"]); ?>" name="U_price"/>
         
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
         Corporate User License:&nbsp;<input type="text" class="textbox" style="width:130px" value="<?php echo ($sel["u_price2"]); ?>" name="u_price2"/>
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">出版:</span>
        <input name="Published" type="radio" value="1" <?php echo ($sel['published']== 1?'checked':''); ?>/>已出版  &nbsp;<input name="Published" type="radio" value="2" <?php echo ($sel['published']== 2?'checked':''); ?>/>未出版
       </li>
      
       <li>
        <span class="item_name" style="width:120px;">产品详情:</span>
        <script id="editor" type="text/plain" name="Details" style="width:1024px;height:500px;margin-left:120px;margin-top:0;"></script>
        <div hidden="hidden" id="content"><?php echo (htmlspecialchars_decode($sel["details"])); ?></div>

         
       </li>
       <li>
        <span class="item_name" style="width:120px;">表的内容:</span>
        <script id="editor1" type="text/plain" name="table" style="width:1024px;height:500px;margin-left:120px;margin-top:0;"></script>
        <div hidden="hidden" id="content1"><?php echo (htmlspecialchars_decode($sel["table"])); ?></div>

         
       </li>
       <li>
        <span class="item_name" style="width:120px;">数据列表:</span>
        <script id="editor2" type="text/plain" name="figures" style="width:1024px;height:500px;margin-left:120px;margin-top:0;"></script>
        <div hidden="hidden" id="content2"><?php echo (htmlspecialchars_decode($sel["figures"])); ?></div>

         
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input name="id" type="hidden" value="<?php echo ($sel["type_id"]); ?>" />
        <input type="submit" class="link_btn" name="sub"/>
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
<!--编辑器-->
     <script type="text/javascript" charset="utf-8" src="/Public/rich/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/rich/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/Public/rich/lang/zh-cn/zh-cn.js"></script>  
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
 document.getElementById('editor').innerHTML=document.getElementById('content').innerHTML;
 var ue1 = UE.getEditor('editor1');
 document.getElementById('editor1').innerHTML=document.getElementById('content1').innerHTML;
 var ue2 = UE.getEditor('editor2');
 document.getElementById('editor2').innerHTML=document.getElementById('content2').innerHTML;
</script>
</body>
</html>