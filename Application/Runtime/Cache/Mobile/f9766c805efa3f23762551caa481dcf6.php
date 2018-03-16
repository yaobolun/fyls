<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/zjtr/Public/bootstrap/css/bootstrap.min.css">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ($mbx["type"]); ?></title>
<!-- <script>
if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    window.location.href = "#";//手机
} else {
    window.location.href = "http://zjtr.calf360.com/Home/";//pc
}
</script> -->
<style>
.nav li a{
  color:#fff;
}
.actives{
  background:#087EB7;
 
}



</style>
</head>

<body class="body_head"> 
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style='background:#37ADE7;border:1px solid #37ADE7'>
    <div class="container-fluid">
    <div class="navbar-header">
    <a href="javascript:history.back();">  
    <button class="navbar-toggle" style='float:left;margin:0;padding:0;margin-top:10px;border:0'>
    <img src='/zjtr/Public/images/m/fanhui.png' style='width:30px;'></button></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse" style='float:left;border:0'>
           
           <p style='border:1px solid #fff;width:22px;margin:0;padding:0;margin-bottom:6px'></p>
           <p style='border:1px solid #fff;width:22px;margin:0;padding:0;margin-bottom:6px'></p>
           <p style='border:1px solid #fff;width:22px;margin:0;padding:0;'></p>
        </button>
        <a class="navbar-brand" href="#" style='float:right;margin-right:35%;color:#fff'>中建天润</a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav">
            <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php if($nav["id"] == $n): ?>class="actives"<?php endif; ?>><a href="/zjtr/Mobile/<?php echo ($nav["url"]); ?>?active=<?php echo ($nav["id"]); ?>" style='color:#fff'><?php echo ($nav["type"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 

        </ul>
    </div>
    </div>
</nav>
 <div style='margin-top:10%'></div>



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
function show_confirm()
{
var a=confirm("确认删除吗?");
  
if(a){
}else{
return false;
}

}
</script>
<style>
table{
	margin-bottom: 10px;

}
.gwc_tb1 {
  width:100%;
 color:#828282;
  border-bottom: 1px solid #EBEBEB
}
.gwc_tb1 tr{
	height:40px;
}
.gwc_tb2{
width:100%;
}
.gwc_tb2 tr{
    width:100%;
	background:#F3F3F3;
	box-shadow: 0px 1px 1px  #888888;/*边框阴影效果*/

}
.gwc_tb2 td{
	

}
.gwc_tb3{

	background:#F3F3F3;
	width:100%;

}
..gwc_tb3 tr{
	width:100%;
	border:1px solid #000;
}

</style>

<form action='/zjtr/Mobile/Mall/goudel' method='post'>
<div class="gwc" style="width:100%;margin-top:70px">
	<table cellpadding="0" cellspacing="0" class="gwc_tb1">
		<tr>
			<td class="tb1_td1" style='float:left;margin-left:20px'><input id="Checkbox1" type="checkbox"  class="allselect" style=''/>&nbsp;&nbsp;&nbsp;全选</td>
			
			<!-- <td class="tb1_td3">商品信息</td>
			<td class="tb1_td4">单价</td>
			<td class="tb1_td5">数量</td>-->
			<?php if($data != null): ?><td class="tb1_td7" style='float:right;margin-right:20px'><input type='submit' name='del' value='删除' style='border:0;background:#fff;' onclick='return show_confirm();'></td>

			<a href='/zjtr/Mobile/Mall/bianji'><td class="tb1_td6" style='float:right;margin:1px 0 0 20px;color:#828282;' >编辑</td> </a><?php endif; ?>
		</tr>
	</table>
		   <script>
       function   xxk1(){
		  $("#sc").show();
		  $("#goumai").hide();
       }
       
</script>
<?php if($data == null): ?>您的购物车是空的！<?php endif; ?>


	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="gwc_tb2">
		<tr>
			<td class="tb2_td1">
			
			<input type="checkbox"  name="newslist<?php echo ($data["n"]); ?>" class='newslist' id="newslist-<?php echo ($data["n"]); ?>" style='margin-left:15px'/>
			<input type="hidden"  name="sid[]" value='<?php echo ($data["sid"]); ?>'/>
			<input type="hidden"  name="spid[]" value='<?php echo ($data["spid"]); ?>'/>
			</td>
			<td class="tb2_td2" style='width:120px'><a href="#"><img src="/zjtr/Public/<?php echo ($data["img"]); ?>" width='100' height='100' style='margin:5px 0'/></a></td>
			<td class="tb2_td3" >
			<a href="#"><p style='color:#000;margin-bottom:15px'><?php echo ($data["title"]); ?></p><input type='hidden' value='<?php echo ($data["title"]); ?>' name='tit[]'>
			<p style='color:#F4453C;margin-bottom:15px'>￥<?php echo ($data["dan"]); ?></p><input type='hidden' value='<?php echo ($data["dan"]); ?>' name='dan[]'></a>
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
				
				<input id="min<?php echo ($data["n"]); ?>" name=""  style="width:30px;height:30px; border:1px solid #ccc;color:#CCCCCC;background:#f3f3f3;" type="button" value="-" /><input id="text_box<?php echo ($data["n"]); ?>" name="shu[]" type="text" value="<?php echo ($data["shu"]); ?>" style=" width:30px; height:30px; text-align:center; border:1px solid #ccc;border-left:0;border-right:0" /><input id="add<?php echo ($data["n"]); ?>" name="" style=" width:30px;height:30px;  border:1px solid #ccc;color:#CCCCCC;background:#f3f3f3" type="button" value="+" />
			</td>
			
			<td class="tb1_td5" style='float:right;margin:70px 10px 0 0'>
			  
				
				
			</td>
			<!-- <td class="tb1_td6"><label id="total<?php echo ($data["n"]); ?>" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></td> -->
			<td class="tb1_td7"   style=' background:#DE443C;text-align:center;color:#fff'><a href="/zjtr/Mobile/Mall/del?id=<?php echo ($data["sid"]); ?>" style='color:#fff;' onclick='return show_confirm();'>删除</a></td>
		</tr>
	</table><?php endforeach; endif; else: echo "" ;endif; ?>
</div>	
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

<span style='font-size:16px;color:#008CD6;margin-left:10px'>收货地址：</span>
			 <select name='address' style='border:0px solid red;font-size:16px;color:#008CD6;'>
			     <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i;?><option><?php echo ($address["a_address"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>    
			 </select>
			 
</div>

<table class="gwc_tb3" >
		<tr>
		    <td class="tb3_td1" ></td>
			<td class="tb1_td1" style='float:left;padding:8px 0px;' >
			<input id="Checkbox2" type="checkbox"  class="allselect" style='margin-left:15px;'/>全选</td>
			
			<!-- <td class="tb3_td2" style='width:120px'>已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">0</label> 件</td> -->
			<td class="tb3_td4" style='float:right'><input type='submit' name='gou' value='提交信息' style='padding:8px 20px;color:#fff;border:0;background:#008CD6;'></td>
			<td class="tb3_td3" style='font-size:14px;float:right;padding:8px 0px;margin-right:20px'>合计<!-- (不含运费) -->:<span>￥</span><span style=" color:#ff5500;"><label id="zong1" style="color:#ff5500;font-size:14px; font-weight:bold;">0.00</label></span></td>
			
		</tr>
	</table>
<form>
<style>
p{
  margin:0;
  padding:0;
}
.f_dh{
  overflow: hidden;
  background:#fff;

}
.f_dh p{
  float:left;
  width: 20%;
  
  text-align: center;
/*  border:1px solid red;*/

}
.f_dh p img{
   margin-top: 5px;
  width: 50%
}
.dl{
  overflow: hidden;
  margin-top: 10%;
  background: #FAFAFA;
  padding:2% 0;
  margin-bottom:5%;
  
}
.dl p{
  float: left;
    /*border:1px solid red;*/
}  
.dl  .dlzc2{
  float:right;
}
.dl .x{
  width:2%;
  text-align: center;
  color:#EDEDED;
}
.dl .dlzc1,.dlzc2{
  color:#000;
  width:49%;
  text-align: center;
/*  border:1px solid red;*/
}
.dbxx{
  background: #D9D9D9;
  padding: 2% 0;
  color:#808080;
  margin-bottom:5%;

}
</style>

<div class='footer' >
     <?php if($_COOKIE["zjtr_id"] == null): ?><div class='dl'>
     
             <a href='/zjtr/Mobile/Mall/login'><p class='dlzc1'>登录</p></a><p class='x'>|</p><a href='/zjtr/Mobile/Mall/register'><p class='dlzc2'>注册</p></a>
            
      </div><?php endif; ?>
<!--       <div class='dbxx'>
      <center>
            <p>Copyright © 2017 北京中建天润文化发展有限公司</p>
            <p>京ICP备 09059684号 -1</p>
            <p>中国·北京·石景山杨庄路华信大厦</p> 
        </center>    
      </div> -->
      
     <div class='f_dh navbar-fixed-bottom'>
           <a href='/zjtr/Mobile/Mall/product?active=14'>
            <p><?php if($m == 2): ?><img src='/zjtr/Public/images/m/xcp.png'>
            <?php else: ?><img src='/zjtr/Public/images/m/cp.png'><?php endif; ?></p></a>
           <a href='tel:18610151215'> <p><img src='/zjtr/Public/images/m/dh.png'></p></a>
           <a href='/zjtr/Mobile/Mall/index'> <p><?php if($m == 1): ?><img src='/zjtr/Public/images/m/xsc.png'>
           <?php else: ?><img src='/zjtr/Public/images/m/sc.png'><?php endif; ?></p></a>
           <a href='/zjtr/Mobile/Mall/cart'> <p><?php if($g == 1): ?><img src='/zjtr/Public/images/m/xgwc.png'><?php else: ?><img src='/zjtr/Public/images/m/gwc.png'><span style='display: block;background:red;color:#FFF;border-radius: 10px;position: absolute;right: 20%;top: 0px;width:20px'><?php echo ($tishi); ?></span><?php endif; ?></p></a>
           <a href='/zjtr/Mobile/My/index'> <p><?php if($p == 1): ?><img src='/zjtr/Public/images/m/xwd.png'><?php else: ?><img src='/zjtr/Public/images/m/wd.png'><?php endif; ?></p></a>
      </div>
</div>
</body>
</html>