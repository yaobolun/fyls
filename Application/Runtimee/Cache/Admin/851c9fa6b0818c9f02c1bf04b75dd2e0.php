<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<<<<<<< HEAD

<style type="text/css">
.dd{
  margin: 0;
  height: 40px;
  line-height: 40px;
/*  border-bottom: 1px #e9e9e9 dotted;*/
  border-bottom-width: 1px;
  border-bottom-style: dotted;
  border-bottom-color: rgb(233, 233, 233);
  display: block;
  padding-left:15px;

}
</style>

<link rel="stylesheet" type="text/css" href="/fyls/Public/admin/css/style.css">
<link rel="stylesheet" href="/fyls/Public/layui/css/layui.css"  media="all">
=======
<link rel="stylesheet" type="text/css" href="/fyls/Public/admin/css/style.css">
<link rel="stylesheet" href="/fyls/Public/layui/css/layui.css"  media="all">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
>>>>>>> origin/liushuai
<script src="/fyls/Public/admin/js/jquery.js"></script>
<script src="/fyls/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/fyls/Public/layui/layui.js" charset="utf-8"></script>
<script>
<<<<<<< HEAD
=======

>>>>>>> origin/liushuai
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
<<<<<<< HEAD
=======
			
>>>>>>> origin/liushuai
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
<<<<<<< HEAD
<div class="layui-collapse" lay-filter="test">
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">审批管理</h1>
    <div class="layui-colla-content">
         <dd><a class="dd" href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
         <dd><a class="dd" href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
         <dd><a class="dd" href="/fyls/admin.php/Expre/express">快递管理</a></dd>
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">财务管理</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Transfer/transfer">转账申请列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Arrival/arrival">到账申请列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Qualifications/qualifications">资质到账凭证申请列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Refund/refund">退款企业凭证申请列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Voucher/voucher">退款人才凭证申请列表</a></dd>
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">请假 | 外出</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Leave/leave_list">我的请假</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Travel/travel_list">我的外出</a></dd>
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">快递信息</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Expre/expre_index">快递列表</a></dd>
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">后台登录设置</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Parameter/parameter">参数</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Admin/admin">管理员</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Department/department">部门管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Station/station">岗位管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/People/people">人员管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Journal/journal">日志管理</a></dd>
    </div>
  </div>
</div>
 <!-- <ul>
 <li>
   <dl>
    <dt>审批管理</dt>
<<<<<<< HEAD:Application/Runtime/Cache/Admin/13319fabdf35cb42221c726e4f023358.php
    <dd><a class="dd" href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
=======
=======
 <uhl>
 <li>
   <dl>
    <dt>审批管理</dt>
>>>>>>> origin/liushuai
    <dd><a href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
    <dd><a href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
    <dd><a href="/fyls/admin.php/Texamination/texamination">转账管理</a></dd>
    <dd><a href="/fyls/admin.php/Aexamination/aexamination">到账管理</a></dd>
    <dd><a href="/fyls/admin.php/Qexamination/qexamination">资质凭证到账凭证管理</a></dd>
    <dd><a href="/fyls/admin.php/Rexamination/rexamination">退款企业凭证管理</a></dd>
    <dd><a href="/fyls/admin.php/Vexamination/vexamination">退款人才凭证管理</a></dd>
<<<<<<< HEAD
>>>>>>> origin/liushuai:Application/Runtime/Cache/Admin/851c9fa6b0818c9f02c1bf04b75dd2e0.php
=======
>>>>>>> origin/liushuai
    </dl>
  </li>
  <li>
   <dl>
    <dt>财务管理</dt>
<<<<<<< HEAD
    <dd><a class="dd" href="/fyls/admin.php/Transfer/transfer">转账申请列表</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Arrival/arrival">到账申请列表</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Qualifications/qualifications">资质凭证到账凭证申请列表</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Refund/refund">退款企业凭证申请列表</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Voucher/voucher">退款人才凭证申请列表</a></dd>
    </dl>
  </li>

  <li>
   <dl>
    <dt> 请假 | 外出 </dt>
    <dd><a class="dd" href="/fyls/admin.php/Leave/leave_list">我的请假</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Travel/travel_list">我的外出</a></dd>
=======
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
>>>>>>> origin/liushuai
   </dl>
  </li>
  <li>
   <dl>
    <dt>快递信息</dt>
<<<<<<< HEAD
    <dd><a class="dd" href="/fyls/admin.php/Express/express">快递列表</a></dd>
=======
    <dd><a href="/fyls/admin.php/Express/express">快递列表</a></dd>
>>>>>>> origin/liushuai
   </dl>
  </li>
   <dl>
    <dt>网站栏目管理</dt>
<<<<<<< HEAD
    <dd><a class="dd" href="/fyls/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
=======
    <dd><a href="/fyls/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
>>>>>>> origin/liushuai
   </dl>
   <li>
   <dl>
    <dt>后台登录设置</dt>
<<<<<<< HEAD
    <dd><a class="dd" href="/fyls/admin.php/Parameter/parameter">参数</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Admin/admin">管理员</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Department/department">部门管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Station/station">岗位管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/People/people">人员管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Journal/journal">日志管理</a></dd>
=======
    <dd><a href="/fyls/admin.php/Parameter/parameter">参数</a></dd>
    <dd><a href="/fyls/admin.php/Admin/admin">管理员</a></dd>
    <dd><a href="/fyls/admin.php/Department/department">部门管理</a></dd>
    <dd><a href="/fyls/admin.php/Station/station">岗位管理</a></dd>
    <dd><a href="/fyls/admin.php/People/people">人员管理</a></dd>
    <dd><a href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
    <dd><a href="/fyls/admin.php/Journal/journal">日志管理</a></dd>
>>>>>>> origin/liushuai
   </dl>
  </li>   
  <li>
   <p class="btm_infor">© 小牛在线 技术支持</p>
  </li>
<<<<<<< HEAD
 </ul> -->
</aside>
<<<<<<< HEAD:Application/Runtime/Cache/Admin/13319fabdf35cb42221c726e4f023358.php
<script>
layui.use(['element', 'layer'], function(){
  var element = layui.element;
  var layer = layui.layer;
});
</script>
<meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">修改个人信息</h2>
       
      </div>
     <section>
        <div class="layui-tab">
          <ul class="layui-tab-title">
            <li class="layui-this">修改昵称</li>
            <li>修改密码</li>

          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                  <form action="/fyls/admin.php/Personal/name" method="post">
                        <ul class="ulColumn2">
                         <li>
                          <span class="item_name" style="width:120px;">新昵称：</span>
                          <input type="text" class="textbox textbox_295" required="required" name="name"/>
                         </li>
                         <li>
                          <span class="item_name" style="width:120px;"></span>
                          <input type="submit" class="link_btn" value="提交" name="sub" onClick="return yz()"/>
                         </li>
                        </ul>
                  </form>
            </div>
            <div class="layui-tab-item">
              <form action="/fyls/admin.php/Personal/Pass" method="post">
                  <ul class="ulColumn2">
                   <li>
                    <span class="item_name" style="width:120px;">原始密码：</span>
                    <input type="password" required="required" class="textbox textbox_295" name="pass" />
                   </li>
                   <li>
                    <span class="item_name" style="width:120px;">新密码：</span>
                    <input type="password" required="required" class="textbox textbox_295" name="password" />
                   </li>
                   <li>
                    <span class="item_name" style="width:120px;">确认新密码：</span>
                    <input type="password" required="required" class="textbox textbox_295" name="password1" />
                   </li>
                   <li>
                    <span class="item_name" style="width:120px;"></span>
                    <input type="submit" class="link_btn" name="sub" value="提交" onClick="return yz()"/>
                   </li>
                  </ul>
              </form>
            </div>
          </div>
        </div>
            
=======
=======
 </ul>
</aside>
>>>>>>> origin/liushuai
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">修改到账配备信息</h2>
       <a href="/fyls/Admin/Arrival/arrival" class="fr top_rt_btn add_icon">返回到账列表</a>
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">

      
      <table class="table">
      <tr>
        <th>企业价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="企业注册资金" name="aequipment_aenterprise" value="<?php echo ($sel["aequipment_aenterprise"]); ?>" required="required"/></td>
        <th>签约年限</th>
        <td>
        <div class="layui-input-inline">
        <input type="text" class="textbox textbox_295" id="test5" placeholder="合同签约年份" name="aequipment_contrac" value="<?php echo ($sel["aequipment_contrac"]); ?>" required="required"/>
          </div>
</td>
      </tr>
      <tr>
        <th>配备人才</th>
        <td><input type="text" class="textbox textbox_295" placeholder="姓名" name="aequipment_qualified" value="<?php echo ($sel["aequipment_qualified"]); ?>" required="required"/></td>
        <th>级别</th>
        <td>
        <select name="aequipment_level" required="required" style='width:307px;height:38px;border: 1px #4fa3d3 solid;'>
        <option value="<?php echo ($sel["aequipment_level"]); ?>">--请选择--</option>
        <option value="一级">一级</option>
        <option value="二级">二级</option>
        <option value="中级">中级</option>
        <option value="高级">高级</option>
        <option value="初级">初级</option>
        <option value="注册类">注册类</option>
        <option value="八大员">八大员</option>
        <option value="技工">技工</option>
        </select>
        <!-- <input type="text" class="textbox textbox_295" placeholder="申请人所在公司级别" name="aequipment_level" value="<?php echo ($sel["aequipment_level"]); ?>" required="required"/> -->
        </td>
      </tr>
      <tr>
        <th>专业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="专业" name="aequipment_major" value="<?php echo ($sel["aequipment_major"]); ?>" required="required"/></td>
        <th>人才价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人才价格" name="aequipment_talent" value="<?php echo ($sel["aequipment_talent"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>请选择客服</th>
        <td>
          <select name="aequipment_customer" style='width:307px;height:38px;border: 1px #4fa3d3 solid;'>
            <option value="">--请选择--</option>
            <?php if(is_array($sel)): foreach($sel as $key=>$sel): ?><option value="<?php echo ($sel["aequipment_customer"]); ?>" <?php if($sel.aequipment_customer==$sel.id) { echo "selected";}?>>
                      <?php echo ($xiugaikefu["name"]); ?>
                </option><?php endforeach; endif; ?>
          </select>
       </td>
       </tr>
       </table>
      <input type="hidden" name='id' value="<?php echo ($sel["id"]); ?>"/>
      <input type="hidden" name='aid' value="<?php echo ($sel["aid"]); ?>"/>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input name="id" type="hidden" value="<?php echo ($sel["id"]); ?>" />

        <input type="submit" class="link_btn" name="sub"/>
       </li>
      </ul>
      </form>
<<<<<<< HEAD
>>>>>>> origin/liushuai:Application/Runtime/Cache/Admin/851c9fa6b0818c9f02c1bf04b75dd2e0.php
=======
>>>>>>> origin/liushuai
     </section>
 </div>
</section>
<script type="text/javascript">
  layui.use('laydate', function(){
    var laydate = layui.laydate;

<<<<<<< HEAD
<<<<<<< HEAD:Application/Runtime/Cache/Admin/13319fabdf35cb42221c726e4f023358.php
  function yz(){
    if($("#pass").val()==''||$("#pass").val().length<5)
    {
      alert('请填写密码！并且大于5个字符！');
      return false;
    }
  }

  layui.use('element', function(){
  var $ = layui.jquery
  ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
  
  
});
  
</script>
=======
=======
>>>>>>> origin/liushuai
      //时间选择器
      laydate.render({
        elem: '#test5'
        ,type: 'datetime'
      });
    });
<<<<<<< HEAD
>>>>>>> origin/liushuai:Application/Runtime/Cache/Admin/851c9fa6b0818c9f02c1bf04b75dd2e0.php
=======
>>>>>>> origin/liushuai

    layui.use('laydate', function(){
    var laydate = layui.laydate;

      //时间选择器
      laydate.render({
        elem: '#test1'
        ,type: 'datetime'
      });
    });
</script>
</body>
</html>