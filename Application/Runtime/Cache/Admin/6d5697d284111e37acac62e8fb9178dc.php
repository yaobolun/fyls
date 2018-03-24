<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/fyls/Public/admin/css/style.css">
<link rel="stylesheet" href="/fyls/Public/layui/css/layui.css"  media="all">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/fyls/Public/admin/js/jquery.js"></script>
<script src="/fyls/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/fyls/Public/layui/layui.js" charset="utf-8"></script>
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
<header>
 <h1><img src="/fyls/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/fyls/admin.php/Personal/personal" class="website_icon"><?php echo (session('name')); ?> </a></li>
  <li><a href="/fyls/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<aside class="lt_aside_nav content mCustomScrollbar">
 <uhl>
 <li>
   <dl>
    <dt>审批管理</dt>
    <dd><a href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
    <dd><a href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
    </dl>
  </li>
  <li>
   <dl>
    <dt>财务管理</dt>
    <dd><a href="/fyls/admin.php/Transfer/transfer">转账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Arrival/arrival">到账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Qualifications/qualifications">资质凭证到账凭证申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Refund/refund">退款企业凭证申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Voucher/voucher">退款人才凭证申请列表</a></dd>
    </dl>
  </li>
  <li>
   <dl>
   </dl>
  </li>
  <li>
   <dl>
    <dt> 请假 | 外出 </dt>
    <dd><a href="/fyls/admin.php/Leave/leave_list">我的请假</a></dd>
    <dd><a href="/fyls/admin.php/Travel/travel_list">我的外出</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>快递信息</dt>
    <dd><a href="/fyls/admin.php/Express/express">快递列表</a></dd>
   </dl>
  </li>
   <dl>
    <dt>网站栏目管理</dt>
    <dd><a href="/fyls/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
   </dl>
   <li>
   <dl>
    <dt>后台登录设置</dt>
    <dd><a href="/fyls/admin.php/Parameter/parameter">参数</a></dd>
    <dd><a href="/fyls/admin.php/Admin/admin">管理员</a></dd>
    <dd><a href="/fyls/admin.php/Department/department">部门管理</a></dd>
    <dd><a href="/fyls/admin.php/Station/station">岗位管理</a></dd>
    <dd><a href="/fyls/admin.php/People/people">人员管理</a></dd>
    <dd><a href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
    <dd><a href="/fyls/admin.php/Journal/journal">日志管理</a></dd>
   </dl>
  </li>
  <li>
   <p class="btm_infor">© 小牛在线 技术支持</p>
  </li>
 </ul>
</aside>
<style type="text/css">
.flow{
    width: 176px;
    height: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
}
</style>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">外出记录</h2>
       
       <a href="/fyls/admin.php/Travel/add_travel" class="fr top_rt_btn add_icon">申请外出</a>
      </div>
      <section class="mtb">
      <form action="" method="post">
         <input type="text" class="textbox textbox_225" placeholder="输入标题..." name="name"/>
         <input type="submit" value="查询" class="group_btn" name="sub"/>
      </form>
      </section>
      <table class="table">
       <tr>
        <th>申请人</th>
        <th>外出开始时间</th>
        <th>外出结束时间</th>
        <th>外出地址</th>
        <th>外出原因</th>
        <th>审批状态</th>

       </tr>
       <?php if(is_array($show)): $i = 0; $__LIST__ = $show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$show): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($show["applicant"]); ?></td>
        <td class="center"><?php echo ($show["out_time"]); ?></td>
        <td class="center"><?php echo ($show["back_time"]); ?></td>
        <td class="center flow" title="<?php echo ($show["out_addr"]); ?>"><?php echo ($show["out_addr"]); ?></td>
        <td class="center flow" title="<?php echo ($show["out_reason"]); ?>"><?php echo ($show["out_reason"]); ?></td>

        <?php if($show["flag"] == 0): ?><td class="center">未审批</td>
        <?php elseif($show["flag"] == 1): ?>
          <td style="color:blue;" class="center">审批中</td>
        <?php elseif($show["flag"] == 2): ?>
          <td style="color:#CC0066;" class="center">外出中</td>
        <?php elseif($show["flag"] == 3): ?>
          <td style="color:red;" class="center">未通过（被拒绝）</td>
        <?php elseif($show["flag"] == 4): ?>
          <td style="color:#000099;" class="center">请等待主管确认</td>
        <?php elseif($show["flag"] == 5): ?>
          <td style="color:#00FF00;" class="center"><button onclick="wcz(<?php echo ($show["id"]); ?>)" class="layui-btn layui-btn-sm layui-btn-normal">已完成外出等待您的确认</button></td>
        <?php elseif($show["flag"] == 6): ?>
          <td style="color:#00FF00;" class="center">已完成</td><?php endif; ?>
<!--    <td class="center">
         <?php if($show["flag"] == 1): ?><a disabled="disabled" onclick="sp();" class="link_icon">&#101;</a>
        <?php elseif($show["flag"] == 3): ?>
          <a disabled="disabled" onclick="qq();" class="link_icon">&#101;</a>
        <?php elseif($show["flag"] == 2): ?>
          <a disabled="disabled" onclick="qq();" class="link_icon">&#101;</a>
          <?php elseif($show["flag"] == 4): ?>
          <a disabled="disabled" onclick="qq();" class="link_icon">&#101;</a>
        <?php else: ?>
          <a href="/fyls/Admin/Travel/travel_edit?id=<?php echo ($show["id"]); ?>" title="编辑" class="link_icon">&#101;</a><?php endif; ?>
        <?php if($show["flag"] == 1): ?><a disabled="disabled" onclick="sp();" class="link_icon">&#100;</a>
        <?php elseif($show["flag"] == 4): ?>
          <a disabled="disabled" onclick="sp();" class="link_icon">&#100;</a>
        <?php else: ?>
          <a href="/fyls/Admin/Travel/travel_del?id=<?php echo ($show["id"]); ?>" title="删除" class="link_icon">&#100;</a><?php endif; ?>
        </td> -->
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>

<script type="text/javascript">
    // function wcz($id)
    // {
    //   var b=confirm("您确定该员工已回到公司吗？");
    //   if(b){
    //     location.href = "<?php echo C('HOME_PATH');?>"+'/Permission/Determine?id='+($id);
    //   }else{
    //     return false;
    //   }
    // }

    function wcz($id)
    {
      var data = $id;
      $.ajax({
        type:"POST",
        url:"/fyls/admin.php/Permission/determine",
        data:{'data':data},
        dataType:"json",
        success:function(data){
          alert(data);
          location.reload();
        }
      });
    }
</script>

</body>
</html>