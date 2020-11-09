<?php
session_start();
session_destroy();
// setcookie("username", "", time()-3600);
// setcookie("face","",time()-3600);
// setcookie("admin","",time()-3600);
echo "<script> 
var t=50;//设定跳转的时间 
setInterval('refer()',100); //启动1秒定时 
function refer(){  
    if(t==0){ 
        location='../welcome.php'; //#设定跳转的链接地址 
	} 
	var y=Math.ceil(t/10)
    document.getElementById('show').innerHTML=''+'退出登录成功'+'<br>'+y+'秒后跳转到首页'; // 显示倒计时 
    t--; // 计数器递减  
} 
</script>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #show{
            font-size: 40px;
            text-align: center;
			color:#ffffff;
			background-image: linear-gradient(to bottom right,rgb(114,135,254),rgb(130,88,186));
			width: 100%;
			height: 100%;
			margin-left: auto;
			margin-right: auto;
            line-height:400px;
		}
        </style>
    </head>
    <body>
        <div id="show"></div>
    </body>
</html>