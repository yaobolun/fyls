<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/zjtr/Public/bootstrap/css/bootstrap.min.css">
<script src="/zjtr/Public/bootstrap/js/jquery-1.8.1.min.js"></script>
<script src="/zjtr/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="/zjtr/Public/home/head.css"> -->
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>登录</title>
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
}
.top2 a{
  color:#000; text-decoration:none;
}
.top2 a:hover{
  color: #008cd6;
  /*text-decoration: underline;*/
}

.gwc{
  float:right;
 }

</style>
<div class='top2'>
   <h2><a href="/zjtr/Home/Mall/index">中建天润商城</a></h2>

   <div class='gwc'>
     <span>已有账号，<a href='/zjtr/Home/Mall/login'>立即登录</a></span>
   </div>
</div>


<style>
.login_content{
	background:url(/zjtr/Public/images/bg.jpg);
    background-size:100% 100%;
    margin-bottom: 2%;
    padding:4% 0;
}
.zm{
	background:#fff;
	width: 20%;
	border-radius: 3px;
	padding: 1%
}
.zm img{
	width: 10%;

}
.zm input{
	border:0;
	border-bottom: 1px solid #E1E1E1;
	height:40px;
	width:90%;
	color: #E1E1E1;
	padding-left: 2%;
}
.wj{
	overflow: hidden;
	padding:3% 0 0 0;
}
.wj span{
	float: right;
}
.wj a{
	color:#999;
}
/*设置input placeholder字体颜色*/
::-webkit-input-placeholder {
                  
                       color: #E1E1E1;

                   }
:-moz-placeholder {/* Firefox 18- */

color: #E1E1E1;
}

::-moz-placeholder{/* Firefox 19+ */

color: #E1E1E1;

}

:-ms-input-placeholder {

color: #E1E1E1;

}
.dlan{
	margin-top: 1%;
}
.dlan input{
	width: 20%;
	border:1px solid #008CD6;
	background:#008CD6;
	color:#fff;
	padding: 0.5% 0;

}
.zcyh{
	margin-top: 1%;
	width: 20%;
	background:#669900;
	color:#fff;
	padding: 0.5% 0;
}
.zcyh a{

	color:#fff;
}
</style>
<div class='login_content'>
  <center>
   <form action='' method='post'>
     <div class='zm'>
          <div>
              <img src='/zjtr/Public/images/yhm.png'><input type='text' id='name' name='Name' placeholder="账户名" style='color:#000'>
          </div>
          <div>
              <img src='/zjtr/Public/images/mima.png'><input type='password' id='pass' name='Pass' placeholder="密码" style='color:#000'>
          </div>
          <div class='wj'>
             <!--  <img src='/zjtr/Public/images/mima.png'> --><span><a href='/zjtr/Home/Mall/wjmm'>忘记密码了？</a></span>
          </div>
     
     </div> 
      <div class='dlan'>
            <input type='submit' value='登录' name='sub' onclick='return yanzheng();'>
      </div>
   </form> 
    <div class='zcyh'>
             <a href='/zjtr/Home/Mall/register'>注册新用户 </a>
    </div>
   </center>
</div>
<script>
//检查是否填写表单
function  yanzheng(){
var name=$('#name').val();
var pass=$('#pass').val();
if(name==''){
alert('请输入用户名！');return false;
}
if(pass==''){
alert('请输入密码！');return false;
}
}
</script>
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