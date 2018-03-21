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
<!--header-->
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
    <dd><a href="/fyls/admin.php/Approval/travel">外出审批</a></dd>
    </dl>
  </li>
  <li>
   <dl>
    <dt>财务管理</dt>
    <!--当前链接则添加class:active-->
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
       <h2 class="fl">管理员添加</h2>
       <a class="fr top_rt_btn" href="/fyls/Admin/People/people">返回人员列表</a>
      </div>
     <section>


     <form action="" name="form1" method="post" enctype="multipart/form-data">

      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">员工名称：</span>
        <input type="text" class="textbox textbox_295" id="name" placeholder="员工名称..." name="name" />
         
       </li>
       <li>
        <span class="item_name" style="width:120px;">密码：</span>
        <input type="password" class="textbox textbox_295" id="pass" placeholder="密码..." name="password" />
        
       </li>

       <li>
        <span class="item_name" style="width:120px;">部门：</span>
        <select name="department_id" id="department_id" style='width:307px;height:38px;border: 1px #4fa3d3 solid;' onchange="changeDep()">
          <option value="0">--请选择--</option>
          <?php if(is_array($dep)): foreach($dep as $key=>$department): ?><option  value="<?php echo ($department["id"]); ?>">
                    <?php echo ($department["department_name"]); ?>
              </option><?php endforeach; endif; ?>
        </select>
        <!-- <input type="text" class="textbox textbox_295" id="pass" placeholder="" name="department_id" /> -->
        
       </li>

       <li>
        <span class="item_name" style="width:120px;">岗位：</span>


        <select name="station" style='width:307px;height:38px;border: 1px #4fa3d3 solid;' >
          <option value="0">--请选择--</option>
          <?php if(is_array($sta)): foreach($sta as $key=>$station_name): ?><option  value="<?php echo ($station_name["id"]); ?>" <?php if($station_name['id'] == $sel['station_id']){ echo "selected='selected'";}?>>
                    <?php echo ($station_name["station_name"]); ?>
              </option><?php endforeach; endif; ?>  
          <!-- <?php if(is_array($sta)): foreach($sta as $key=>$station): ?><option  value="<?php echo ($station["id"]); ?>" >
                    <?php echo ($station["station_name"]); ?>
              </option><?php endforeach; endif; ?> -->

        </select>
        <!-- <input type="text" class="textbox textbox_295" id="pass" placeholder="" name="station_id" /> -->
        
       </li>
        
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" name="sub" onClick="return yz()"/>
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
 <script src="/fyls/Public/admin/js/jquery.js"></script>
<script language="javascript">  

  function yz(){
    if($("#name").val()==''||$("#name").val().length<1)
    {
      alert('User name cannot be empty and no less than 1 bits');
      return false;
    }
    if($("#pass").val()==''||$("#pass").val().length<4)
    {
      alert('Password cannot be empty and no less than 5 bits');
      return false;
    }
  }
  
</script>
<script type="text/javascript">

  function changeDep(){
     var department_id = $("#department_id").val();//得到第一个下拉列表的值
     $.ajax({

        type:'post',
        url:"/fyls/admin.php/People/add",
        data:{'did':department_id},
        dataType: "json",
        success:function(data){
          var length = JSON.stringify(data.length);
            //alert(length);
            var jName=document.form1.station;
            jName.length=1; 
            for(var i=0;i<length;i++){
                var station_name =  eval(JSON.stringify(data[i]['station_name']));
                var station_id =  eval(JSON.stringify(data[i]['id']));
                // alert(station_id);
                jName[i+1]=new Option("--"+station_name+"--",station_id); 
            }  

        }
     });
  }

</script>
</body>
</html>