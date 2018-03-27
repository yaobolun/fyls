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
    <dd><a href="/fyls/admin.php/Texamination/texamination">转账管理</a></dd>
    <dd><a href="/fyls/admin.php/Aexamination/aexamination">到账管理</a></dd>
    <dd><a href="/fyls/admin.php/Qexamination/qexamination">资质凭证到账凭证管理</a></dd>
    <dd><a href="/fyls/admin.php/Rexamination/rexamination">退款企业凭证管理</a></dd>
    <dd><a href="/fyls/admin.php/Vexamination/vexamination">退款人才凭证管理</a></dd>
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
       <h2 class="fl">转账详情</h2>
<!--        <a class="fr top_rt_btn" href="/fyls/Admin/Product/product">返回</a> -->
      </div>
     <section>
     <form id="form" action="/fyls/Admin/Texamination/adopt" method="post">
     <input type="hidden" name="bm_sp" value="<?php echo ($find["bm_sp"]); ?>">
     <input type="hidden" name="id" value="<?php echo ($find["id"]); ?>">
     <input type="hidden" name="status" value="<?php echo ($find["status"]); ?>">
     <table class="layui-table" style="width:900px; height:300px;">
        <thead>
          <tr>
            <th colspan="4" style="height:30px;text-align:center;"><h1><b>转账单</b></h1></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width:50px;">申请人：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_name"]); ?></td>
            <td style="width:50px;">人才合同价格：</td>
            <td  class="b" title="<?php echo ($find["transfer_contract"]); ?>" style="width:100px;"><?php echo ($find["transfer_contract"]); ?></td>
          </tr><tr>
            <td style="width:50px;">配置企业价格：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_allocation"]); ?></td>
            <td style="width:50px;">证书类别：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_certificate"]); ?></td>
          </tr>
          <tr>
            <td style="width:50px;">配置企业：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_configuration"]); ?></td>
            <td style="width:50px;">人才姓名：</td>
            <td style="width:100px;"><?php echo ($find["transfer_talent"]); ?></td>
          </tr><tr>
            <td style="width:50px;">配出年月：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_match"]); ?></td>
            <td style="width:50px;">户名：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_huming"]); ?></td>
          </tr>
          <tr>
            <td style="width:50px;">本次打款金额：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_amount"]); ?></td>
            <td style="width:50px;">开户行：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_bank"]); ?></td>
          </tr><tr>
            <td style="width:50px;">账号：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_account"]); ?></td>
            <td style="width:50px;">备注：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_note"]); ?></td>
          </tr>
          <tr>
            <td style="width:50px;">已付金额：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_paid"]); ?></td>
            <td style="width:50px;">资料上传：</td>
            <td  style="width:100px;"><?php echo ($find["transfer_pic"]); ?></td>
          </tr>
          <tr>
            <td>财务备注信息：</td>
            <td  colspan="3"><?php echo ($find["transfer_information"]); ?></td>
          </tr>
          <tr>
            <td>部门主管</td>
            <td>
			       <?php echo ($uname); ?>
            </td>
            <td>
              <button type="button" class="layui-btn layui-btn-primary layui-btn-lg" onclick="yes()">通过</button></td>
            <td>
              <button type="button" class="layui-btn layui-btn-primary layui-btn-lg" onclick="Not(<?php echo ($find["id"]); ?>)">残忍拒绝</button>
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
      		}else{
            return false;
          }
    }
    function Not($id)
    {
      var b=confirm("您将要拒绝了！");
      if(b){
        location.href = "<?php echo C('HOME_PATH');?>"+'/Texamination/Not?id='+($id);
      }else{
        return false;
      }
    }

</script>
</body>
</html>