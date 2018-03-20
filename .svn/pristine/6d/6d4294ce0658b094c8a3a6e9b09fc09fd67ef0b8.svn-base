<?php
/**
 * 以kohana框架为例，进行介绍说明
 * @author liuchaohang <[email address]>
 * @date(2017/3/30)
 */
/**
     * 发送邮件执行方法
     * @author liuchaohang
     * @time 2017/3/30
     * @param string $email go send email address
     * @param int $au_id [邮箱地址所属用户的ID]
     * @param string $username want update password for user;
     */

    public function send_email($email,$au_id,$username){
        require_once "PHPMailer/class.phpmailer.php"; //引入PHPMailer文件
        $mail = new PHPMailer(true);//实例化类
        $mail ->CharSet = "UTF-8";
        $address = $email;//收件人地址
        $mail->IsSMTP(); // 使用SMTP方式发送
        $mail->Host = "smtp.163.com"; //使用163邮箱服务器
        $mail->SMTPAuth = true; // 启用SMTP验证功能
        $mail->Username = "randolph135@163.com"; //你的163服务器邮箱账号
        $mail->Password = "rugule13579"; // 163邮箱SMTP密码
        $mail->Port = 25;//邮箱服务器端口号
        $mail->From = "randolph135@163.com"; //邮件发送者email地址
        $mail->FromName = "包头工商视频委托验证系统";//发件人名称
        $mail->AddAddress("$address", "$username"); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//        $mail->AddAttachment("D:\abc.txt"); // 添加附件(注意：路径不能有中文)
        $mail->IsHTML(true);//是否使用HTML格式
        $mail->Subject = "管理员密码修改"; //邮件标题
        $uid = base64_encode("au_id=$au_id");
        $url = "http://project.btgc.com/admin/forget/update?au_name=$uid";
        $content = "注：本邮件由包头工商视频委托验证系统自动发送，请勿回复！修改登录密码，点击下面的链接跳转至指定的页面做修改：$url";

        $mail->Body = "$content"; //邮件内容，上面设置HTML，则可以是HTML
        if (!$mail->Send()) {
            echo "邮件发送失败. <p>";
            echo "错误原因: " . $mail->ErrorInfo;
            exit;
        }else{
            echo 1;
            exit;
        }
    }