<?php require_once("../coon.php");?>
<?php
$username=$_POST['username'];
$id=$_POST['id'];
$sql2="select * from user where id='$id'";
$ret=mysqli_query($coon,$sql2);
$rel=mysqli_fetch_array($ret);
if($rel==false){
    echo "<script> 
            var t=50;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    window.location='../welcome.php';
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'用户不存在'+'<br>'+y+'秒后跳转到首页'; // 显示倒计时 
                t--; // 计数器递减 
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
    $sql="UPDATE user
    SET username='$username',password='$password',ssex='$ssex',tel='$tel',email='$email',face='$face'
    WHERE id=$id";
    $rul=mysqli_query($coon,$sql);
    if($rul){
        echo "<script> 
            var t=50;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    window.location='../welcome.php';
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'更新成功'+'<br>'+y+'秒后跳转到首页'; // 显示倒计时 
                t--; // 计数器递减 
            } 
            </script>";
    }
    else{
        echo "<script> 
            var t=50;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    history.back();//#设定跳转的链接地址 
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'更新失败'+'<br>'+y+'秒后跳转到留言'; // 显示倒计时 
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
            
        </style>
    </head>
    <body>
        <div id="show"></div>
    </body>
</html>