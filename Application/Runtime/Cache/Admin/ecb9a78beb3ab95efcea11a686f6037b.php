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
  <li><a href="/fyls/index.php/" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="/fyls/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<aside class="lt_aside_nav content mCustomScrollbar">
 <uhl>
 <li>
   <dl>
    <dt>审批列表</dt>
    <dd><a href="/fyls/admin.php/Approval/leave">请假审批</a></dd>
    <dd><a href="/fyls/admin.php/Permission/travel">外出审批</a></dd>
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

<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">假条详情</h2>
       <a class="fr top_rt_btn" href="/fyls/Admin/Product/product">返回</a>
      </div>
     <section>
     <form id="form" action="/fyls/Admin/Approval/adopt" method="post">
     <input type="hidden" name="bm_sp" value="<?php echo ($find["bm_sp"]); ?>">
     <input type="hidden" name="qj_id" value="<?php echo ($find["id"]); ?>">
     <input type="hidden" name="flag" value="<?php echo ($find["flag"]); ?>">
     <table class="layui-table" style="width:900px; height:300px;">
        <thead>
          <tr>
            <th colspan="4" style="height:30px;text-align:center;"><h1><b>员工请假单</b></h1></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width:50px;">请假人：</td>
            <td style="width:100px;"><?php echo ($find["applicant"]); ?></td>
            <td style="width:60px;">所属部门：</td>
            <td style="width:100px;"><?php echo ($bmname["department_name"]); ?></td>
          </tr>
          <tr>
            <td>请假理由：</td>
            <td colspan="3"><?php echo ($find["leave_reason"]); ?></td>
          </tr><tr>
            <td>请假时间：</td>
            <td colspan="2"><?php echo ($find["start_time"]); ?>&nbsp;&nbsp; 到 &nbsp;&nbsp;<?php echo ($find["end_time"]); ?></td>
            <!-- <td></td> -->
            <td>共 &nbsp;&nbsp;<?php echo ($day); ?>&nbsp;&nbsp; 天</td>
          </tr><tr>
            <td>部门主管</td>
            <td>
			       <?php echo ($uname); ?>
            </td>
            <td><button class="layui-btn layui-btn-primary layui-btn-lg" onclick="yes()">通过</button></td>
            <td>
<button class="layui-btn layui-btn-primary layui-btn-lg" onclick="Not(<?php echo ($find["id"]); ?>)">残忍拒绝</button>
            </td>
          </tr>
        </tbody>
        <?php echo ($page); ?>
      </table>
      </form>
      
      
     </section>
 </div>
</section>
<script type="text/javascript">
  layui.use('laydate', function(){
    var laydate = layui.laydate;

      //时间选择器
      laydate.render({
        elem: '#test5'
        ,type: 'datetime'
      });
    });

    layui.use('laydate', function(){
    var laydate = layui.laydate;

      //时间选择器
      laydate.render({
        elem: '#test1'
        ,type: 'datetime'
      });
    });

    function yes()
    {
    	 var a=confirm("确认通过吗?");
      	  if(a){
              $("#form").submit();
      		}
    }
    function Not($id)
    {
      var b=confirm("你将要拒绝了！");
      if(b){
        location.href = "<?php echo C('HOME_PATH');?>"+'/Approval/Not?id='+($id);
      }

    }

</script>
</body>
</html>