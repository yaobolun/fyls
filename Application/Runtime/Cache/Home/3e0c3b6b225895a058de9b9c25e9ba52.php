<?php if (!defined('THINK_PATH')) exit();?>
<link rel="stylesheet" href="/zjtr/Public/bootstrap/css/bootstrap.min.css">
<script src="/zjtr/Public/bootstrap/js/jquery-1.8.1.min.js"></script>
<script src="/zjtr/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="/zjtr/Public/home/head.css"> -->
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>购物车</title>
<!-- <script>
if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    window.location.href = "http://www.cscectr.com/Mobile/";//手机
} else {
    window.location.href = "#";//pc
}
</script> -->
<style>

div,p,dl,dt,dd,span,ul,li,h1,h2,h3,input,form,img{margin:0;padding:0;}
.top1{
  background:#ebebeb;
  border-bottom:1px solid #DEDEDE;
  overflow: hidden; 

}
.top1 p a{
  color:#333;
}
.top1 .top1_left{

  padding: 0.5% 0;
  /*margin-left: 20%;*/
  float:left;
  font-size: 14px
}

.top1 dl {
  
  float:right;
  /*border:1px solid red;*/
  
}
.top1 dl dt,dd{
  /*border:1px solid red;*/
  float:left;
}
.top1 dl dt{
  margin-right: 4%;
}
.top1 dl dd{
  padding-top: 3%;
 
}
.top1 dl dd a{
  color:#333;
  font-size: 14px
}
</style>
</head>

<body class="body_head"> 
  <div class='top1'>
  <div style='width:1200px;margin:0 auto;overflow:hidden;'>
     <p class='top1_left'>欢迎来到天润商城</p>

          <?php if($_COOKIE["zjtr_id"] == null): ?><dl style='width: 200px;'>
          <dt style="vertical-align: middle; height:30px; padding-top:3px"><img src='/zjtr/Public/images/mallhy.png' width="80%" ></dt>
          <dd ><a href='/zjtr/Home/Mall/login'>会员登录</a></dd>
          <dd style='float:right'><a href='/zjtr/Home/Mall/register'>会员注册</a></dd>
           </dl>
          <?php else: ?>
           <dl style='width: 230px;'>
          <dt style="vertical-align: middle; height:30px; padding-top:4px"><img src='/zjtr/Public/images/dmallhy.png' width="80%" ></dt>
          <dd ><a>欢迎&nbsp;<span style='color:#11B3F0'><?php echo ($_COOKIE['zjtr_user']); ?></span>&nbsp;登录</a>&nbsp;&nbsp;
          <a href='/zjtr/Home/Mall/anquan'>登出</a></dd>
           </dl><?php endif; ?>

   </div>
  </div>
  <div>

<style>

.top2{
  
  width:1200px;margin:0 auto;
  padding:2% 0%;
  /*border:1px solid red;*/
  overflow: hidden;
}
.top2 h2{
  float: left;
  margin-right: 3%;
  font-size: 34px;
  font-family: "黑体";
}
.sousuo{

  border:1px solid #11B3F0;
  float: left;
  width:500px;
  height:40px;
  overflow: hidden;
}

.sousuo  div{
  font-size: 18px;
  font-family: "微软雅黑";
  
  height:40px;
  line-height:40px;
  border-right: 1px solid #D2D2D2;
  width:56px;
  text-align: center;
  color:#6F7072;
  float: left;
}
.sousuo .sou{
  float: left;
  border:0;
  width:374px;
  height:40px;
  font-size: 16px;
  padding:0.8%;
}
.sousuo .ss{
  border:0;
  width:68px;
  background:#11B3F0;
  color:#fff;
  font-size: 16px;
  height:40px;
  line-height:40px;
  text-align: center;
}
.gwc{
  width:23%;
  float:right;
  overflow: hidden;
  /*border:1px solid red;*/
}
.gwc div{
  border:1px solid #969696;
  float: left;
  padding:2.5% 2% 2% 2%;
}
.gwc div a{
  color:#969696;
  font-size: 16px;
  font-family: "微软雅黑"
}
</style>
<div class='top2'>
   <h2>中建天润商城</h2>
   <div class='sousuo'> 
     <div>商品</div>
     <form action='/zjtr/Home/Mall/search' method='post'>
     <input type='text' class='sou' name='data' value='<?php echo ($_SESSION["data"]); ?>'>
     <input type='submit' class='ss' value='搜索'>
     </form>
   </div>
   <div class='gwc'>
      <div style='margin-right:0%;width:128px'>
      <?php if($wd != 1): ?><img src='/zjtr/Public/images/wdsc.png' style='width:22%;margin-right:8%'><a href='/zjtr/Home/My/index'>
      <?php else: ?>
      <img src='/zjtr/Public/images/wode.png' style='width:22%;margin-right:8%'><a href='/zjtr/Home/My/index'><?php endif; ?>
      我的商城</a></div>
      <div style='float:right;width:130px'>
      <?php if($gwc != 1): ?><img src='/zjtr/Public/images/gwcjs.png' style='width:20.5%;margin-right:0%'><a href='/zjtr/Home/Mall/cart'>
       <?php else: ?>
      <img src='/zjtr/Public/images/gouwc.png' style='width:22%;margin-right:0%'><a href='/zjtr/Home/Mall/cart'><?php endif; ?>
      购物车结算</a><!-- <span style='display: block;background:red;color:#FFF;border-radius: 10px;position: absolute;right:12%;text-align:center;top: 8%;width:20px'><?php echo ($tishi); ?></span> --></div>
   </div>
</div>
	<!-- <link rel="stylesheet" type="text/css" href="/zjtr/Public/mall/css/style.css">	 -->
<style>
@charset "utf-8";
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;color:#333;text-decoration:none;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
.hide{display:none;border:1px solid red;}
.clearfix:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0;}
.clearfix{*zoom:1;}
em,i,s{font-style:normal;}
/* 导航样式 */  
.header-wrap{background-color:#fff;width:100%}
.navwrap{background:#008CD6 /*url(../images/nav-bg.jpg) repeat-x*/;height:36px;box-shadow:0 1px 2px #999;-webkit-box-shadow:0 1px 2px #999;-moz-box-shadow:0 1px 2px #999}
#nav{height:36px;width:100%;margin:0 auto;position:relative;padding:0;z-index:99;}
.navbar{height:36px;padding-left:210px;position:relative}
.navbar a{float:left;width:107px;text-align:center;height:36px;line-height:36px;color:#fff;padding:0 1%;text-decoration:none;font-size:16px;font-family:"微软雅黑";white-space:nowrap;position:relative;top:-1px}
.navbar a.first{border-left:0 none}
.navbar a.last{border-right:0 none} 
.navbar a:hover{background-color:#0175B3;color:#fff}
.navbar a.current{background-color:#0175B3;/*box-shadow:0 0 10px #4f0000 inset;-webkit-box-shadow:0 0 10px #4f0000 inset;-moz-box-shadow:0 0 10px #4f0000 inset*/}
.navbar a:hover{text-decoration:none}
.navbar a.current:hover{color:#fff}
.navbar .navbt{width:105px;height:30px;position:absolute;top:3px;right:10px;background:url(../images/navbt.jpg) no-repeat;border:0 none;float:none;font-size:14px;line-height:30px;padding:0}
a.navbt span{background:url(../images/iconmap.jpg) no-repeat 1px 3px;padding-left:18px}
.navbar a.navbt:hover{background:transparent url(../images/navbt-hover.jpg) no-repeat}
.navbar a.navbt:hover span{background-image:url(../images/iconmap-hover.jpg)}

.pros{position:absolute;top:0px;left:0%;z-index:1000;width:25%;}
.pros h2{width:90%;height:36px;line-height:36px;color:#fff;font-size:16px;font-weight:400;font-family:"\5FAE\8F6F\96C5\9ED1"; background:#0175B3}
.subpage h2{width: 212px;font-size: 16px;font-family: '微软雅黑'}
.subpage h2 div{background:url(../images/qbfl.png) no-repeat 5% center;cursor:pointer;}/*全部分类背景图*/
.subpage h2 div p{margin-left: 19%}
.subpage .prosul{display:none}
.prosul{padding-left:3px;width:212px;overflow:hidden;height:524px;background-color:#4a9fc4;}
.prosul  .erji{
	/*border:1px solid red;*/
	width:170px;
	margin-left: 38px;
}
.prosul  .erji  a{
	color:#fff;
	height:23px;
	font-size: 14px;
	text-decoration:none;
}
.prosul  .erji:hover{
color:#fff;
}
.prosul  .erji  a:hover{
	color:#2f24c5;
	text-decoration:none;
}

.prosul li{line-height:40px;height:40px;overflow:hidden;margin-right:3px;padding-left:38px}
/*.prosul li.prosahover{border-bottom:1px #fff solid;background-color:#fff;margin-right:0;padding-right:3px;}*/
.prosul a{color:#ffd0c0;padding-right:8px;padding-right:6px;white-space:nowrap;display:inline-block;height:50px}
.prosul a.hot{background:url(../images/icon-hot.png) right 8px no-repeat}
.prosul li.prosahover a.hot{background-image:url(../images/icon-hot-hover.png)}
/*.prosul li.prosahover a{color:#636363}*/
.prosul li a.ti{font-size:16px;font-family:"\5FAE\8F6F\96C5\9ED1";color:#fff;	}
/*.prosul li.prosahover a.ti{color:#fff;text-decoration:none;}*/
/*.prosul li a:hover{color:#d03322}*/
.prosul li.nochild a:hover{color:#fff}
.prosul li i{float:right;display:block;width:3px;height:50px;text-indent:-999em;background-position:0 -276px;padding-right:12px}
.prosul li.prosahover i{background-position:0 -326px}
.prosul li.last{border-bottom:0 none}
/*.prosul li.bd-solid{border-bottom:1px #c22900 solid}*/
.prosul li.hotareas{background-image:none;padding-left:12px;line-height:26px;height:106px;*overflow:hidden}
.prosul li.hotareas i{line-height:30px;margin-top:-2px;height:40px;background-position:0 -279px}
.prosul li.hotareas a{line-height:30px;height:30px}
.prosul li.hotareas a.hot{background-position:right 0}
.prosul li h2{padding-left:0;line-height:40px;display:inline;font-size:14px;font-weight:400;}
.prosul li.prosahover h2{color:#d03322}
.prosmore{padding:15px 0 15px 15px;position:absolute;z-index:999;left:195px;top:38px;border-left:0 none;width:988px;height:524px}
.prosul .prosmore{text-align:left}
.prosul .prosmore span{float:left;height:36px;/*width:107px;*/line-height:22px;margin-right: 10px}
.prosul li .prosmore a{height:18px;line-height:18px;padding:0 4px;font-size: 16px;}
.prosul li .prosmore a:hover{background-color:#11B3F0;color:#fff}
.prosmore em{font-weight:400;padding-top:9px;display:inline-block}
.prosmore em.morehot{background:url(../images/icon-hot-more.png) right top no-repeat;padding-right:22px}
</style>	
		<div class="header-wrap">
			<div class="navwrap">
			<div style='width:1200px;margin:0 auto'>
				<div id="nav">
					<div class="navbar clearfix">
						
						<a href="/zjtr/Home/Index/index">网站首页</a>
						<?php if(is_array($djdh)): $i = 0; $__LIST__ = $djdh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$djdh): $mod = ($i % 2 );++$i;?><a <?php if($djdh["id"] == $n): ?>class="current"<?php endif; ?> href="/zjtr/Home/<?php echo ($djdh["url"]); ?>?active=<?php echo ($djdh["id"]); ?>"><?php echo ($djdh["type"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="pros subpage" style='width:212px'>
						<h2 id='spfldh' ><div><p>商品分类</p></div></h2>

						
						<ul class="prosul clearfix" id="proinfo" >
						<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><style>
						    .prosul .food<?php echo ($hh++); ?>{background:url(/zjtr/Public/<?php echo ($nav["photo"]); ?>) no-repeat;background-position:3px 6px}
						    </style>
							<li class="food<?php echo ($hhh++); ?>" >
								<a class="ti" href="/zjtr/Home/<?php echo ($nav["url"]); ?>?active=<?php echo ($nav["id"]); ?>"><?php echo ($nav["type"]); ?></a>
								
								<!-- <div class="prosmore hide" style='margin-left:16px;background-color:#fff;border:2px solid #f2f2f2'>
								</div>

								<div class="prosmore hide" style='margin-left:16px;'>
								  <?php if(is_array($nav["er"])): $i = 0; $__LIST__ = $nav["er"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$er): $mod = ($i % 2 );++$i;?><span ><em><a href="/zjtr/Home/<?php echo ($nav["url"]); ?>?active=<?php echo ($nav["id"]); ?>&id=<?php echo ($er["erid"]); ?>"><?php echo ($er["ername"]); ?></a></em></span><?php endforeach; endif; else: echo "" ;endif; ?>	
								</div> -->
								
							</li>
							<div class='erji'>
							<?php if(is_array($nav["er"])): $i = 0; $__LIST__ = $nav["er"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$er): $mod = ($i % 2 );++$i;?><a href="/zjtr/Home/<?php echo ($nav["url"]); ?>?active=<?php echo ($nav["id"]); ?>&id=<?php echo ($er["erid"]); ?>" ><?php echo ($er["ername"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>	
						   </div>
						   <li style='height:15px'></li><?php endforeach; endif; else: echo "" ;endif; ?>	
							   
						</ul>
						<!-- <ul class="prosul" id="proinfo1" style='z-index:-1;position: relative;left:0px;top:-524px;/*background-color:#0175B3;opacity:0.3;t透明效果*/'>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
		</div>

	
	<script src="/zjtr/Public/mall/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript">
		(function(){
			
			var $subblock = $(".subpage"), $head=$subblock.find('h2'), $ul = $("#proinfo"), $lis = $ul.find("li"), inter=false;
			
			$head.click(function(e){
				e.stopPropagation();
				if(!inter){
					$ul.show();
				}else{
					$ul.hide();
				}
				inter=!inter;
			});
			
			$ul.click(function(event){
				event.stopPropagation();
			});
			
			$(document).click(function(){
				$ul.hide();
				inter=!inter;
			});

			$lis.hover(function(){
				if(!$(this).hasClass('nochild')){
					$(this).addClass("prosahover");
					$(this).find(".prosmore").removeClass('hide');
				}
			},function(){
				if(!$(this).hasClass('nochild')){
					if($(this).hasClass("prosahover")){
						$(this).removeClass("prosahover");
					}
					$(this).find(".prosmore").addClass('hide');
				}
			});
			
		})();
		</script>

		<!-- 	<script type="text/javascript">
		(function(){
			
			var $subblock = $(".subpage"), $head=$subblock.find('h2'), $ul = $("#proinfo1"), $lis = $ul.find("li"), inter=false;
			
			$head.click(function(e){
				e.stopPropagation();
				if(!inter){
					$ul.show();
				}else{
					$ul.hide();
				}
				inter=!inter;
			});
			
			$ul.click(function(event){
				event.stopPropagation();
			});
			
			$(document).click(function(){
				$ul.hide();
				inter=!inter;
			});

			$lis.hover(function(){
				if(!$(this).hasClass('nochild')){
					$(this).addClass("prosahover");
					$(this).find(".prosmore").removeClass('hide');
				}
			},function(){
				if(!$(this).hasClass('nochild')){
					if($(this).hasClass("prosahover")){
						$(this).removeClass("prosahover");
					}
					$(this).find(".prosmore").addClass('hide');
				}
			});
			
		})();
		</script> -->
</body>
</html>
<!-- <link href="/zjtr/Public/gwc/css/index.css" rel="stylesheet" type="text/css" /> -->
<script type="text/javascript" src="/zjtr/Public/gwc/js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="/zjtr/Public/gwc/js/Calculation.js"></script>
<script type="text/javascript">
$(document).ready(function () {

	//jquery特效制作复选框全选反选取消(无插件)
	// 全选        
	$(".allselect").click(function () {
		
		if($(this).attr("checked")){
			$(".gwc_tb2 input[class=newslist]").each(function () {
				$(this).attr("checked", true);
				// $(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
			});
			GetCount();
		
		}
		else
   		{
			$(".gwc_tb2 input[class=newslist]").each(function () {
				if ($(this).attr("checked")) {
					$(this).attr("checked", false);
					//$(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
				} else {
					$(this).attr("checked", true);
					//$(this).next().css({ "background-color": "#3366cc", "color": "#000000" });
				} 
			});
			GetCount();
    
   		}
		
	});

	//反选
	$("#invert").click(function () {
		$(".gwc_tb2 input[class=newslist]").each(function () {
			if ($(this).attr("checked")) {
				$(this).attr("checked", false);
				//$(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
			} else {
				$(this).attr("checked", true);
				//$(this).next().css({ "background-color": "#3366cc", "color": "#000000" });
			} 
		});
		GetCount();
	});

	//取消
	$("#cancel").click(function () {
		$(".gwc_tb2 input[class=newslist]").each(function () {
			$(this).attr("checked", false);
			// $(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
		});
		GetCount();
	});

	// 所有复选(:checkbox)框点击事件
	$(".gwc_tb2 input[class=newslist]").click(function () {
		if ($(this).attr("checked")) {
			//$(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
		} else {
			// $(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
		}
	});

	// 输出
	$(".gwc_tb2 input[class=newslist]").click(function () {
		// $("#total2").html() = GetCount($(this));
		GetCount();
		//alert(conts);
	});
});
//******************
function GetCount() {
	var conts = 0;
	var aa = 0;
	$(".gwc_tb2 input[class=newslist]").each(function () {
		if ($(this).attr("checked")) {
			for (var i = 0; i < $(this).length; i++) {
				conts += parseInt($(this).val());
				aa += 1;
			}
		}
	});
	$("#shuliang").text(aa);
	$("#zong1").html((conts).toFixed(2));
	$("#jz1").css("display", "none");
	$("#jz2").css("display", "block");
}
</script>
<style>
table{
	margin-bottom: 10px;

}
.gwc_tb1 td{
  width:140px;
}
.gwc_tb2{
	width:100%;
	/*border:1px solid red;*/
}
.gwc_tb2 tr{
	width:100%;
	background:#F3F3F3;
	box-shadow: 0px 1px 1px  #888888;/*边框阴影效果*/

}
.gwc_tb2 .tb2_td1{
	width:70px;

	/*border: 1px solid red;*/

	/*width:180px;
*/}

.gwc_tb3{

	background:#F3F3F3;
	width:100%;

}
..gwc_tb3 tr{
	width:1200px;
	border:1px solid #000;
}

</style>
<div style='min-height:400px;margin-top:40px'>
<form action='/zjtr/Home/Mall/goudel' method='post'>
<div  style="width:1200px;margin: 0 auto;">
	<table cellpadding="0" cellspacing="0" class="gwc_tb1">
		<tr>
			<td class="tb1_td1" style='height:10px;' >
			<input id="Checkbox1" type="checkbox"  class="allselect" style='margin-left:15px'/>全选</td>
			
			<td class="tb1_td3" style='width:500px'>商品信息</td>
			<td class="tb1_td4" style='width:200px'>单价</td>
			<td class="tb1_td5" style='width:200px'>数量</td>
			<td class="tb1_td6" style='width:200px'>金额</td>
			<td class="tb1_td7" style='width:200px'>操作</td>
		</tr>
	</table>
		   
<?php if($data == null): ?><div  style="width:1200px;margin: 0 auto;background:#F3F3F3;
	box-shadow: 0px 1px 1px  #888888;/*边框阴影效果*/padding:20px 0;text-align:center">
您的购物车里没有商品！
</div><?php endif; ?>
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="gwc_tb2">
		<tr>
			<td class="tb2_td1" style='height:10px;line-height:10px'>
			
			<input type="checkbox"  name="newslist<?php echo ($data["n"]); ?>" class='newslist' id="newslist-<?php echo ($data["n"]); ?>" style='margin:-110px 0 0 15px'/>
			<input type="hidden"  name="sid[]" value='<?php echo ($data["sid"]); ?>'/>
			<input type="hidden"  name="spid[]" value='<?php echo ($data["spid"]); ?>'/>
			</td>
			<td class="tb2_td2" style='width:230px'>
			<a href="#"><img src="/zjtr/Public/<?php echo ($data["img"]); ?>" width='220' height='220' style='margin:5px 0'/></a></td>
			<td class="tb2_td3" style='width:230px'><a href="#"><?php echo ($data["title"]); ?><input type='hidden' value='<?php echo ($data["title"]); ?>' name='tit[]'></a></td>
			<td class="tb1_td4" style='padding-left:10px;width:150px'><?php echo ($data["dan"]); ?><input type='hidden' value='<?php echo ($data["dan"]); ?>' name='dan[]'></td>
			<td class="tb1_td5"  style='width:180px'>
			  
				<!---商品加减算总数---->
				<script type="text/javascript">
				$(function () {
					var t = $("#text_box<?php echo ($data["n"]); ?>");
					$("#add<?php echo ($data["n"]); ?>").click(function () {
						t.val(parseInt(t.val()) + 1)
						setTotal(); GetCount();
					})
					$("#min<?php echo ($data["n"]); ?>").click(function () {
						if(t.val()>0){
							t.val(parseInt(t.val()) - 1)
							setTotal(); GetCount();
						}
					})
					function setTotal() {

						$("#total<?php echo ($data["n"]); ?>").html((parseInt(t.val()) * <?php echo ($data["dan"]); ?>).toFixed(2));
						$("#newslist-<?php echo ($data["n"]); ?>").val(parseInt(t.val()) * <?php echo ($data["dan"]); ?>);
					}
					setTotal();
				})
				</script>
				
				<input id="min<?php echo ($data["n"]); ?>" name=""  style="width:20px; border:1px solid #ccc;color:#37ADE7;background:#f3f3f3;" type="button" value="-" /><input id="text_box<?php echo ($data["n"]); ?>" name="shu[]" type="text" value="<?php echo ($data["shu"]); ?>" style=" width:45px; text-align:center; border:1px solid #ccc;border-left:0;border-right:0" /><input id="add<?php echo ($data["n"]); ?>" name="" style=" width:20px; border:1px solid #ccc;color:#37ADE7;background:#f3f3f3" type="button" value="+" />
				
			</td>
			<td class="tb1_td6" style='width:170px'><label id="total<?php echo ($data["n"]); ?>" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></td>
			<td class="tb1_td7"><a href="/zjtr/Home/Mall/del?id=<?php echo ($data["sid"]); ?>">删除</a></td>
		</tr>
	</table><?php endforeach; endif; else: echo "" ;endif; ?>
	
	<!---总数---->
	<script type="text/javascript">
	$(function () {
		$(".quanxun").click(function () {
			setTotal();
			//alert($(lens[0]).text());
		});
		function setTotal() {
			var len = $(".tot");
			var num = 0;
			for (var i = 0; i < len.length; i++) {
				num = parseInt(num) + parseInt($(len[i]).text());

			}
			//alert(len.length);
			$("#zong1").text(parseInt(num).toFixed(2));
			$("#shuliang").text(len.length);
		}
		//setTotal();
	})
	</script>
<div style='margin:10px 0'>
<span style='font-size:16px;color:#008CD6;'>收货地址：</span>
			 <select name='address' style='border:0px solid red;font-size:16px;color:#008CD6;'>
			     <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i;?><option><?php echo ($address["a_address"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>    
			 </select>
</div>			 
</div>
<div class="gwc_tb3">
<table  style='width:1200px;margin:0 auto;margin-bottom:10px'>
		<tr style=''>
		    <!-- <td class="tb3_td1" style='width:290px'></td> -->
			<td class="tb1_td1" style='width:170px'><input id="Checkbox2" type="checkbox"  class="allselect" style=''/>全选</td>
			<td class="tb1_td1" style='width:730px'>
     			<input type='submit' name='del' value='删除' style='border:0;background:#F3F3F3;'>
			</td>
			<td class="tb3_td1">&nbsp;</td>
			<td class="tb3_td2" style='width:120px'>已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">0</label> 件</td>
			<td class="tb3_td3" style='width:200px'>合计(不含运费):<span>￥</span><span style=" color:#ff5500;"><label id="zong1" style="color:#ff5500;font-size:14px; font-weight:bold;">0.00</label></span></td>
			<td class="tb3_td4" ><input type='submit' name='gou' value='提交信息' style='float:right;padding:4px 10px;color:#fff;border:0;background:#008CD6;'></td>
		</tr>
	</table>
</div>	
<form>
</div>
<style>
.footer{
  margin-top: 10px
}
.footer .xt{
  background:#008CD6;
  height:2px;
}
.ggfg{
  overflow: hidden;
  width:1160px;
  margin:0 auto;
  padding:20px 0;
  /*border:1px solid red;*/
}
.ggfg .g{
  float:left;
  width:260px;
  margin-right: 1%;
  margin-left:1.1%;
}
.ggfg .t{
 font-weight: bold;
 color:#008CD6;
 font-size: 20px
}
.ggfg .c{
  font-size: 12px;
  color:#808080;
  line-height: 18px;
   font-size: 14px
}
.f_xt{
  float:left;
  width:1px;
  height:130px;
  margin:0 2px;
  margin-top: -2%;
  background: -webkit-linear-gradient(top,rgba(255,0,0,0),#D7D7D7,rgba(255,0,0,0)); /* Safari 5.1 - 6 */
  background: -o-linear-gradient(bottom,rgba(255,0,0,0),#D7D7D7,rgba(255,0,0,0)); /* Opera 11.1 - 12*/
  background: -moz-linear-gradient(bottom,rgba(255,0,0,0),#D7D7D7,rgba(255,0,0,0)); /* Firefox 3.6 - 15*/
  background: linear-gradient(to bottom, rgba(255,0,0,0),#D7D7D7,rgba(255,0,0,0)); /* 标准的语法 */
}
.bjp{
  background:#008CD6;
  color:#fff;
  height:60px;
  line-height: 60px;

}
.bjp span{
  font-size: 22px;
  font-family: "微软雅黑";
  margin-right: 32.5%;
}
.f_bottom{
margin: 15px;
 
 
}
.f_bottom span a{ 
  color:#808080;
  font-size:16px;font-family: "微软雅黑";
}

.f_bottom p{
  color:#808080;
  font-size:16px;font-family: "微软雅黑";
}
</style>
<center>
 
 </center>
<div class='footer'>
   <div class='xt'> </div>
   <div class='ggfg'>
         <div class='g'>
               <h4 class='t'>关于标准</h4>
               <p class='c'>全部产品严格按照CI统一标准制造，专业规范，安全放心。</p>
         </div>
         <div class='f_xt'></div>
         <div class='g'>
               <h4 class='t'>关于品质</h4>
               <p class='c'>精工制造，质地优良，十多年专业品质保障。</p>
         </div>
       <div class='f_xt'></div>
         <div class='g'>
               <h4 class='t'>付款与发货</h4>
               <p class='c'>款到发货，每日16:00前下单当日发货，16:00之后下单次日发货。</p>
         </div>
         <div class='f_xt'></div>
         <div class='g'>
               <h4 class='t'>关于退换货</h4>
               <p class='c'>收到货物后三天内可申请退换货，以货品无损坏，不影响二次销售为前提。</p>
         </div>
         
   </div>
   <div class='bjp'>
   <div style='width:1200px;
  margin:0 auto;'>
       <span><img src='/zjtr/Public/images/jgyh.png'>价格实惠</span>
       <span><img src='/zjtr/Public/images/bz.png'>标准化生产</span>
       <span style='margin-right:0'><img src='/zjtr/Public/images/pz.png'>品质可靠</span>
   </div>
   </div>
   <div class='f_bottom'>
   <center>
   <p>
       <span><a href='/zjtr/Home/Index/index'>首页</a></span>
       <span>|</span>
       <span><a href='/zjtr/Home/Index/contact?active=7&id=25'>联系我们</a></span>
       <span>|</span>
       <span><a href='/zjtr/Home/Index/about?active=2'>关于我们</a></span>
    </p>
    
    <p>网址：http://www.cscectr.com/技术支持：<a href='http://www.calf360.com/' target="_blank" style='color:#808080'>小牛在线</a></p>
    </center>
   </div>
</div>
</body>
</html>