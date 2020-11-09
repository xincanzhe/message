<?php require_once("../coon.php");?>
<?php
$username=$_POST['username'];
$sql2="select * from user where username='$username'";
$ret=mysqli_query($coon,$sql2);
$rel=mysqli_fetch_array($ret);
if($rel==true){
    echo "<script> alter('')</script>";
    echo "<script> 
    var t=50;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    history.back(); //#设定跳转的链接地址 
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'用户已存在'+'<br>'+y+'秒后跳转到登录页面'; // 显示倒计时 
                t--; // 计数器递减 
                //本文转自： 
            } 
            </script>";
}
else{
    $password=$_POST['password'];
    $tel=$_POST['tel'];
    $ssex=$_POST['ssex'];
    $email=$_POST['email'];
    $face=$_POST['face'];
    $admin=0;
    $sql=" INSERT INTO user (username,password,ssex,tel,email,face,admin)
    VALUES ('$username','$password','$ssex','$tel','$email','$face','$admin')";
    $rul=mysqli_query($coon,$sql);
    if($rul){
        echo "<script> 
            var t=50;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    location='../login.html'; //#设定跳转的链接地址 
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'注册成功'+'<br>'+y+'秒后跳转到登录页面'; // 显示倒计时 
                t--; // 计数器递减 
            } 
            </script>";
    }
    else{
        echo "<script> 
            var t=30;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    history.back(); //#设定跳转的链接地址 
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'注册失败'+'<br>'+y+'秒后跳转到注册页面'; // 显示倒计时 
                t--; // 计数器递减 
            } 
            </script>";
    }
}
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
            /* margin-top:-200px; */
            z-index:100;
		}
        </style>
    </head>
    <body>
        <div id="show"></div>
    </body>
</html>