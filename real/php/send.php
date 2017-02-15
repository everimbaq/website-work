<?php
header("Content-Type: text/html;charset=utf-8"); 

//引入发送邮件类
require("smtp.php"); 

//使用163邮箱服务器
$smtpserver = "smtp.163.com";

//163邮箱服务器端口 
$smtpserverport = 25;

//你的163服务器邮箱账号
$smtpusermail = "fami2015@163.com";

//收件人邮箱
$smtpemailto = "2802818977@qq.com";

//你的邮箱账号(去掉@163.com)
$smtpuser = "fami2015";//SMTP服务器的用户帐号

//你的邮箱密码
$smtppass = "chpwzmvmsyptilfb"; //SMTP服务器的用户密码

//邮件主题 
$mailsubject = "晨正官网留言";

//邮件内容 
$mailbody ="姓名：".$_POST["name"]."\n"."手机号：".$_POST['mobile']."邮箱：".$_POST["email"]."\n"."\n"."留言：".$_POST['message'];

//邮件格式（HTML/TXT）,TXT为文本邮件 
$mailtype = "TXT";

//这里面的一个true是表示使用身份验证,否则不使用身份验证. 
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);

//是否显示发送的调试信息 
$smtp->debug = TRUE;

//发送邮件
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 

if(mail($smtpemailto, $mailbody))
{
	echo 'sent'; // we are sending this text to the ajax request telling it that the mail is sent..      
}else{
	echo 'failed';// ... or this one to tell it that it wasn't sent    
}
?>
