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
       <h2 class="fl">订单列表</h2>
      </div>
      <section class="mtb">
       <form action="" method="post">
       <input type="text" class="textbox textbox_225" placeholder="输入订单号..." name="name"/>
       <input type="submit" value="查询" class="group_btn" name="sub"/>
       </form>
      </section>
      <table class="table">
       <tr>
        <th>编号</th>
        <th style='width:150px'>订单号</th>
        <th>产品信息</th>
        <th>用户名</th>
        <th>购买信息</th>
        <th>手机</th>
        
        <th>价格</th>
        <th>支付类型</th>
        <th>交易状态</th>
        
        
       </tr>
       <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($key+1); ?></td>
         
        <td class="center" style='width:150px'><?php echo ($arr["order_number"]); ?></td>
         <td class="center" style="text-align: justify;"><?php echo ($arr["cp_title"]); ?></td>
        <td class="center"><?php echo ($arr["name"]); ?></td>
        <td class="center" style="overflow:auto"><?php echo ($arr["email"]); ?></td>
       
        <td class="center"><?php echo ($arr["companyphone"]); ?></td>
      
         <td class="center">$<?php echo ($arr["price"]); ?></td>
         <td class="center"><?php echo ($arr[leixing]==1?'线上支付':'货到付款'); ?></td>
         <td class="center">
         <?php if($arr["license"] == 1): ?><span class="zt"  id="yes" onclick="set(<?php echo ($arr["id"]); ?>)" style="color:#f00">未发货</span>
          <?php else: ?>
          <span class="zt"  id="yes" style="color:#19A97B">确认发货</span><?php endif; ?>
         </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
<script>
  function set(id) {
      var a=confirm("确认发货吗?");
      if(a){
    var pro=id;
    $.ajax({
      url : "<?php echo C('HOME_PATH');?>/Order/ajax",
      data:{aid:pro},
      type : "post",
      cache : false,
      success : function(data) {
         alert(data);
        $("#yes").html(data);
         history.go(0) ;   
      }
      });
  }else{
      return false;
    }
  }
</script>      
</body>
</html>