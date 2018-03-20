<?php
namespace Mobile\Controller;
use Think\Controller;
use Think\Verify;
header("Content-Type: text/html;charset=utf-8"); 
class MallController extends PublicController {
     //判断是否登录
        public function p(){
        if($_COOKIE['zjtr_id']=='')
        {
        echo    $this->jump('请登录',"Mall/login");
        }else {
        
          
        }
    }
    public function ps(){
        if($_COOKIE['zjtr_id']=='')
        {
        
        }else {
            
          echo    $this->jump('您已登录',"Mall/index");
        }
    }
    /*首页*/
    public function index(){
            $this->gongyou();
            $this->tishi();
            $rc=M('report_categories');//首页图标导航
            $dao=$rc->where('web=2 and ixm=2 ')->order('mpx asc')->select();
            $this->assign('dao',$dao);
            //print_r($dao);
            $this->assign('m',1);
			$this->display();
    }
    /*购物车*/
    public function   cart(){

        $this->gongyou();

          if($_COOKIE['zjtr_id']){

                $ar=M('Address');
                $address=$ar->where('a_user='.$_COOKIE['zjtr_id'])->select();//用户地址
                $this->assign('address',$address);
            }
        $n=M('New_x');
        $shopcart=M('Shopcart');
        if($_COOKIE['zjtr_id']){
            $up['cook']=$_COOKIE['PHPSESSID'];
            $zhuan=$shopcart->where($up)->select();
            foreach ($zhuan as $key => $value) {
               $member['l_id']=$_COOKIE['zjtr_id'];//加入购物车的人
               $add=$shopcart->where('sid='.$value['sid'])->save($member);
            }
            //print_r($zhuan);
            $map['l_id']=$_COOKIE['zjtr_id'];
        }else{
            $map['l_id']=0;
            $map['cook']=$_COOKIE['PHPSESSID'];
        }
        
        
        $data=$shopcart->where($map)->select();
        $m=1;
        $x=0;
        foreach ($data as $key => $value) {
            $dq=$n->find($data[$key]['w_id']);
            $imgs=explode(',',$dq['diagram']);
            $data[$key]['img']=$imgs[0];
            $data[$key]['dan']=$dq['price'];
            $count=count(explode(',',$data[$key]['license']));
            $data[$key]['license']=explode(',',$data[$key]['license']);
            $data[$key]['shuliang']=explode(',',$data[$key]['shuliang']);
            
            $data[$key]['shu']=0;
            for ($i=0; $i < $count; $i++) { 
               
                $data[$key]['shu']=$data[$key]['shuliang'][$i]+$data[$key]['shu'];
            }
            $data[$key]['zongjia']=$dq['price']*$zongshu;
            $data[$key]['title']=$dq['title'];
            $data[$key]['spid']=$dq['id'];
            $data[$key]['n']=$x++;
        }
//         echo $zongshu;
//          echo $shopcart->getLastsql();
//         echo '<pre>';

//          print_r($data);
// echo '<pre>';
        $this->assign('g',1);
        $this->assign('data',$data);
        $this->display();
        
    }
    /*编辑*/
    public function   bianji(){

        $this->gongyou();
        $this->tishi();
          if($_COOKIE['zjtr_id']){

                $ar=M('Address');
                $address=$ar->where('a_user='.$_COOKIE['zjtr_id'])->select();//用户地址
                $this->assign('address',$address);
            }
        $n=M('New_x');
        $shopcart=M('Shopcart');
        if($_COOKIE['zjtr_id']){
            $up['cook']=$_COOKIE['PHPSESSID'];
            $zhuan=$shopcart->where($up)->select();
            foreach ($zhuan as $key => $value) {
               $member['l_id']=$_COOKIE['zjtr_id'];//加入购物车的人
               $add=$shopcart->where('sid='.$value['sid'])->save($member);
            }
            //print_r($zhuan);
            $map['l_id']=$_COOKIE['zjtr_id'];
        }else{
            $map['l_id']=0;
        }
        $map['cook']=$_COOKIE['PHPSESSID'];
        
        $data=$shopcart->where($map)->select();
        $m=1;
        $x=0;
        foreach ($data as $key => $value) {
            $dq=$n->find($data[$key]['w_id']);
            $imgs=explode(',',$dq['diagram']);
            $data[$key]['img']=$imgs[0];
            $data[$key]['dan']=$dq['price'];
            $count=count(explode(',',$data[$key]['license']));
            $data[$key]['license']=explode(',',$data[$key]['license']);
            $data[$key]['shuliang']=explode(',',$data[$key]['shuliang']);
            
            $data[$key]['shu']=0;
            for ($i=0; $i < $count; $i++) { 
               
                $data[$key]['shu']=$data[$key]['shuliang'][$i]+$data[$key]['shu'];
            }
            $data[$key]['zongjia']=$dq['price']*$zongshu;
            $data[$key]['title']=$dq['title'];
            $data[$key]['spid']=$dq['id'];
            $data[$key]['n']=$x++;
        }
//         echo $zongshu;
//          echo $shopcart->getLastsql();
//         echo '<pre>';

//          print_r($data);
// echo '<pre>';
        $this->assign('g',1);
        $this->assign('data',$data);
        $this->display();
        
    }

        /*购买&删除*/
    public  function goudel(){
        $this->gongyou();
        $shopcart=M('Shopcart');
        if($_POST['del']){
            //print_r($_POST);
            $cou=count($_POST['sid']);
            for ($i=0; $i < $cou; $i++) { 
                if($_POST['newslist'.$i]){
                    $id[]=$_POST['sid'][$i];//获取当前选中的商品的id编号
                }
            }
            $cid=count($id);
            for ($j=0; $j < $cid; $j++) { 
                $del=$shopcart->delete($id[$j]);
            }
            if($del){
                echo    $this->jump('删除成功！',"Mall/cart");
            }else{
                echo    $this->jump('删除失败！',"Mall/cart");
            }


        }
        if($_POST['gou']){
            echo $this->p();
           // print_r($_POST);die;
            $order=M('transaction_information');//购买
            $cou=count($_POST['sid']);
            for ($i=0; $i < $cou; $i++) { 
                if($_POST['newslist'.$i]){
                    $id[]=$_POST['sid'][$i];//获取当前选中的购物车的id编号
                    $spid[]=$_POST['spid'][$i];//获取当前选中的商品的id编号
                    $shu[]=$_POST['shu'][$i];//获取当前选中的商品的数量
                    $dan[]=$_POST['dan'][$i];//获取当前选中的商品的单价
                    $tit[]=$_POST['tit'][$i];//获取当前选中的商品的单价
                }
            }
             $cid=count($id);
            for ($j=0; $j < $cid; $j++) { 
                    $add['state']=$spid[$j];//商品编号
                    $add['cp_title']=$tit[$j];//商品名字
                    $add['name']=$_COOKIE['zjtr_user'];//客户用户名
                    $add['email']=$shu[$j];//购买信息
                    $add['Order_number']="zjtr_".$id[$j].time();//订单号
                    $dingdan.=$add['Order_number'].',';
                    $add['companyaddress']=$_POST['address'];//收货地址
                    $add['companyphone']=$_COOKIE['zjtr_phone'];//联系电话
                    $add['price']=$dan[$j]*$shu[$j];
                    $add['num']=$shu[$j];
                    $a=$order->add($add);
            }
            
            if($a){
                for ($a=0; $a < $cid; $a++) { 
                    $shopcart->delete($id[$a]);
                }
                $this->send_email($dingdan);
                echo    $this->jump('购买成功',"Mall/cart");
            }else{
                echo    $this->jump('请选择购买商品',"Mall/cart");
            }
           
        }
    }
    /*购物车删除*/
    Public function  del(){
          $shopcart=M('Shopcart');
        if($_GET['id']){
            $del=$shopcart->delete($_GET['id']);
            if($del){
                echo    $this->jump('删除成功！',"Mall/cart");
            }else{
                echo    $this->jump('删除失败！',"Mall/cart");
            }
        }
    }
     /*登录*/
    public function login(){
        $this->ps();
            if($_POST['sub']){
                $user=M('User');
                
                $map=$user->create();
                $map['Pass']=md5($map['Pass']);
          
                
                $data=$user->where($map)->find();
                if($data){
                    cookie('zjtr_id',$data['id'],3600*24*30);
                    cookie('zjtr_user',$data['name'],3600*24*30);
                     cookie('zjtr_phone',$data['phone'],3600*24*30);
                    echo    $this->jump('登录成功！',"Mall/index");
                }else{
                    echo    $this->jump('登录失败！',"Mall/login");
                }
            }else{
             $this->display();    
            }
    }
    /*注册*/
    public function register(){
         $this->ps();
            if($_POST['sub']){
                if($_POST['Name']&& mb_strlen($_POST['Name'],"UTF8")>=6){
                    if($_POST['Pass']&&mb_strlen($_POST['Pass'],"UTF8")>=6&&mb_strlen($_POST['Pass'],"UTF8")<=16){
                            if($_POST['Pass']==$_POST['Pass_new']){
                                  if(preg_match("/^1[345789]{1}\d{9}$/",$_POST['Phone'])){
                                            $user=M("User");
                                            $map=$user->create();
                                            $data=$user->where("Name='".$map['Name']."'")->find();
                                            if($data){
                                                echo    $this->jump('用户名已被注册！',"Mall/register");
                                            }else{
                                                $map['Pass']=md5($map['Pass']);//md5加密
                                                $add=$user->add($map);
                                                if($add){
                                                    $data=$user->where("Name='".$map['Name']."' and Pass='".$map['Pass']."'")->find();
                                                    cookie('zjtr_id',$data['id'],3600*24*30);
                                                    cookie('zjtr_user',$data['name'],3600*24*30);
                                                    echo    $this->jump('注册成功！',"Mall/index");
                                                }else{
                                                    echo    $this->jump('注册失败！',"Mall/register");
                                                }
                                            }
                                    }else{
                                        echo    $this->jump('手机号格式不对',"Mall/register");
                                    }
                            }else{
                                echo    $this->jump('密码与确认密码不符',"Mall/register");
                            }
                    }else{
                        echo    $this->jump('密码小于6个字符或大于16个字符',"Mall/register");
                    }
                }else{
                    echo    $this->jump('用户名小于6个字符',"Mall/register");
                }
            }else{

              $this->display();    
            }
            
    }
    /*忘记密码*/
    public  function  wjmm(){
        if($_POST['sub']){
            $user=M("User");

            $map=$user->create();
            $data=$user->where("Name='".$map['Name']."'")->find();
            if($data){
                $up['Pass']=md5($map['Pass']);
                // print_r($up);die;
                $s=$user->where("Name='".$map['Name']."'")->save($up);
                if($s){
                    echo    $this->jump('密码更新成功！',"Mall/login");
                }else{
                    echo    $this->jump('密码更新失败！',"Mall/wjmm");
                }
            }else{
                echo    $this->jump('该账号不存在！',"Mall/wjmm");
            }

        }else{
            $this->display();
        }
    }
     /*安全退出*/
    public function anquan(){
      //session_destroy();//清除1
      cookie('zjtr_id',null);
      cookie('zjtr_user',null);
      if(empty($_COOKIE['user'])){
        echo $this->jump('您以安全退出！','Mall/index');
      }
       
    }

     /*商城服务*/
    public function scfw(){

            $this->gongyou();
            $this->tishi();
            $new=M('news');
            $rc=M('report_categories');//栏目
            $where['n_id']=$_GET['active'];
            $data=$new->where($where)->find();
            // echo $new->getLastsql();
            //print_r($data);die;
            $this->assign('data',$data);
           
            $mbx=$rc->find($_GET['active']);
            $this->assign('mbx',$mbx);
            $this->assign('m',2);
            $this->display();
    }


    /*产品展示*/
    public function product(){
           $this->gongyou();
           $this->tishi();
           // echo '<pre>';
           // print_r($_SERVER);echo '<pre>';die;
            $new_x=M('New_x');
            $rc=M('report_categories');//栏目
        
            $r=$rc->where("Type_id=".$_GET['active']."")->select(); 
            foreach ($r as $key => $value) {
                $i[]=$value['id'];
            }
            $map['n_type']=array('in',$i);
            
            $data=$new_x->where($map)->order('time desc')->select();
            
            foreach ($data as $key => $value) {
                $img=explode(',',$data[$key]['diagram']);
                $data[$key]['diagram']=$img[0];
            }
            
            $this->assign('data',$data);
            
            $mbx=$rc->find($_GET['active']);
            $this->assign('mbx',$mbx);
            $this->assign('m',2);
            $this->display();
    }
    /*新品发布*/
    public function release(){
             $this->gongyou();
             $this->tishi();
            $new_x=M('New_x');
            $rc=M('report_categories');//栏目
        
            $r=$rc->where("Type_id=".$_GET['active']."")->select(); 
            foreach ($r as $key => $value) {
                $i[]=$value['id'];
            }
            $map['n_type']=array('in',$i);
            
            $data=$new_x->where($map)->order('time desc')->select();
            
            foreach ($data as $key => $value) {
                $img=explode(',',$data[$key]['diagram']);
                $data[$key]['diagram']=$img[0];
            }
            
            $this->assign('data',$data);
            
            $mbx=$rc->find($_GET['active']);
            $this->assign('mbx',$mbx);
            $this->assign('m',2);
            $this->display('product');
    }
    /*服装服饰*/
    public function clothes(){
            $this->gongyou();
            $this->tishi();
            $new_x=M('New_x');
            $rc=M('report_categories');//栏目
        
            $r=$rc->where("Type_id=".$_GET['active']."")->select(); 
            foreach ($r as $key => $value) {
                $i[]=$value['id'];
            }
            $map['n_type']=array('in',$i);
            
            $data=$new_x->where($map)->order('time desc')->select();
            
            foreach ($data as $key => $value) {
                $img=explode(',',$data[$key]['diagram']);
                $data[$key]['diagram']=$img[0];
            }
            
            $this->assign('data',$data);
            
            $mbx=$rc->find($_GET['active']);
            $this->assign('mbx',$mbx);
            $this->assign('m',2);
            $this->display('product');
    }
    /*办公用品*/
    public function supplies(){
            $this->gongyou();
            $this->tishi();
            $new_x=M('New_x');
            $rc=M('report_categories');//栏目
        
            $r=$rc->where("Type_id=".$_GET['active']."")->select(); 
            foreach ($r as $key => $value) {
                $i[]=$value['id'];
            }
            $map['n_type']=array('in',$i);
            
            $data=$new_x->where($map)->order('time desc')->select();
            
            foreach ($data as $key => $value) {
                $img=explode(',',$data[$key]['diagram']);
                $data[$key]['diagram']=$img[0];
            }
            
            $this->assign('data',$data);
            
            $mbx=$rc->find($_GET['active']);
            $this->assign('mbx',$mbx);
            $this->assign('m',2);
            $this->display('product');
    }
    /*热门推荐*/
    public function how(){
            $this->gongyou();
            $this->tishi();
            $new_x=M('New_x');
            $rc=M('report_categories');//栏目
        
            $r=$rc->where("Type_id=".$_GET['active']."")->select(); 
            foreach ($r as $key => $value) {
                $i[]=$value['id'];
            }
            $map['n_type']=array('in',$i);
            
            $data=$new_x->where($map)->order('time desc')->select();
            
            foreach ($data as $key => $value) {
                $img=explode(',',$data[$key]['diagram']);
                $data[$key]['diagram']=$img[0];
            }
            
            $this->assign('data',$data);
            
            $mbx=$rc->find($_GET['active']);
            $this->assign('mbx',$mbx);
            $this->assign('m',2);
            $this->display('product');
    }
    /*产品详情*/
    public function details(){
            $this->gongyou();
            $this->tishi();
            //$col=M('colour');
           
            $n=M('New_x');
            $data=$n->find($_GET['id']);
            // $rc=M('report_categories');

            // $r=$rc->find($data['n_type']);
            // $where['col_id']=array('in',$data['colour']);
            // $colour=$col->where($where)->select();
            //echo $col->getLastsql();
            //$colour=explode(',',$data['colour']);//颜色组
            $img=explode(',',$data['diagram']);//图片组
            $data['diagram']=$img[0];//第一张图
            //print_r($data);die;

            // //相关产品
            // $map['id']=array('not in',$_GET['id']);
            // $map['n_type']=$data['n_type'];
            // $xg=$n->where($map)->limit(4)->select();
            //  foreach ($xg as $key => $value) {
            //     $img=explode(',',$xg[$key]['diagram']);
            //     $xg[$key]['diagram']=$img[0];
            // }
            // $this->assign('xg',$xg);
            // // echo $n->getLastsql().'<br>';
            // // print_r($xg);
            $this->assign('data',$data);
            // $this->assign('r',$r);
            $this->assign('img',$img);
            // $this->assign('colour',$colour);
            // $this->assign('n',$_GET['active']);
            $this->assign('m',2);
            $this->display();
    }
	/*
       购买&购物车

       
    */
       public  function  goumai(){
        $this->gongyou();
         //print_r($_POST);die;
        $order=M('transaction_information');//购买
        $shop=M('Shopcart');//加入购物车
        // $c=count($_POST['cols']);
        // if($_POST['ljgm']){//购买
        //     echo $this->p();
        //     $add['num']=0;
        //     for ($i=0; $i < $c; $i++) { 
        //         $j=$i+1;
        //         $colname[]=$_POST["BuyNum$j"];
        //         $add['num']=$add['num']+$_POST["BuyNum$j"];
        //     }
        //     for ($m=0; $m < $c; $m++) { 
        //        $ys[]=$_POST['cols'][$m].' 数量'.$colname[$m];
        //     }
        //     $string=implode(',',$ys);
        //     $add['state']=$_POST['spid'];//商品编号
        //     $add['cp_title']=$_POST['spmc'];//商品名字
        //     $add['name']=$_COOKIE['zjtr_user'];//客户用户名
        //     $add['email']=$string;//购买信息
        //     $add['Order_number']="zjtr_".$_POST['spid'].time();//订单号
        //     $add['companyaddress']=$_POST['address'];//收货地址
        //     $add['companyphone']=$_COOKIE['zjtr_phone'];//联系电话
        //     $add['price']=$_POST['price'];
        //     $a=$order->add($add);
        //     if($a){
        //         echo    $this->jump('购买成功',"Mall/index");
        //     }else{
        //         echo    $this->jump('购买失败',"Mall/index");
        //     }
        //  }
         if($_POST['jrgwc']){//加入购物车
            //print_r($_POST);die;
            //$add['prie']=$_POST['price'];
            $add['cook']=$_COOKIE['PHPSESSID'];
            $add['w_id']=$_POST['spid'];
            $add['l_id']=$_COOKIE['zjtr_id']?$_COOKIE['zjtr_id']:0;
            $add['license']='所有颜色';
            $add['shuliang']=$_POST['BuyNum'];
            $a=$shop->add($add);
            if($a){
                echo    $this->gwctz();
            }else{
                echo    $this->jump('添加购物车失败',"Mall/cart");
            }
           //print_r($add);
            // print_r($ys);
            // print_r($colname);
         }
       }
 /**
     * 发送邮件执行方法
     * @author liuchaohang
     * @time 2017/3/30
     * @param string $email go send email address
     * @param int $au_id [邮箱地址所属用户的ID]
     * @param string $username want update password for user;
     */
    public function send_email($dingdan){
         $emph=M('Emph');
            $em=$emph->find();
        require_once "Public/Send_Email/PHPMailer/class.phpmailer.php"; //引入PHPMailer文件
        $mail = new \PHPmailer(true);//实例化类
        $mail ->CharSet = "UTF-8";
        $address = '';//收件人地址
        $time=date("Y-m-d",time());
        $mail->IsSMTP(); // 使用SMTP方式发送
        $mail->Host = "smtp.163.com"; //使用163邮箱服务器
        $mail->SMTPAuth = true; // 启用SMTP验证功能
        $mail->Username = $em['femail']; //你的163服务器邮箱账号
        $mail->Password = $em['power']; // 163邮箱SMTP密码
        $mail->Port = 25;//邮箱服务器端口号
        $mail->From = $em['femail']; //邮件发送者email地址
        $mail->FromName = "中建天润";//发件人名称
        $mail->AddAddress($em['jemail'], "$kename"); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//        $mail->AddAttachment("D:\abc.txt"); // 添加附件(注意：路径不能有中文)
        $mail->IsHTML(true);//是否使用HTML格式
        $mail->Subject = "客户账单"; //邮件标题
        $content = "$time 订单：$dingdan,订单详情请登录后台查看";

        $mail->Body = "$content"; //邮件内容，上面设置HTML，则可以是HTML
        if (!$mail->Send()) {
            echo "邮件发送失败. <p>";
            echo "错误原因: " . $mail->ErrorInfo;
            exit;
        }else{
            return true;
            // echo $this->jump('邮件发送成功请注意查收！','Login/login');
            exit;
        }
    }
}