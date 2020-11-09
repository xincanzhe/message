<?php require_once("coon.php");?>

<?php
$username=$_POST['username'];
$password=$_POST['password'];
// echo $username;
$mysql="select * from user where username='$username'";
$sql=mysqli_query($coon,$mysql);
$info=mysqli_fetch_array($sql);
if($info==null){
    echo "<script> 
            var t=50;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    window.location='../welcome.php';
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'用户名已存在'+'<br>'+y+'秒后跳转到注册页面'; // 显示倒计时 
                t--; // 计数器递减 
            } 
            </script>";
}else{
   
    if($_POST)
    {
    //保存正确的用户名和密码信息
    //判断用户信息是否正确
    if($password==$info['password'])
    {
        //保存登录信息到Session，并跳转到首页
        $face=$info['face'];
        $admin=$info['admin'];
        session_start();
        // setcookie("username", "$username", time()+3600);
        // setcookie("face","$face",time()+3600);
        // setcookie("admin","$admin",time()+3600);
        $_SESSION['username']=$info['username'];
        // $_SESSION['password']=$info['password'];
        $_SESSION['face']=$info['face'];
        $_SESSION['admin']=$info['admin'];
        //判断用户名是不是管理员账户
        if($info['admin']==1){
            header('location:./web/adminwelcome.php');
        }else{
            header('location:welcome.php');
        }
    }
    else
    {
        echo "<script> 
    var t=50;//设定跳转的时间 
    setInterval('refer()',100); //启动1秒定时 
    function refer(){  
        if(t==0){ 
            location='./login.html'; //#设定跳转的链接地址 
        } 
        var y=Math.ceil(t/10)
        document.getElementById('show').innerHTML=''+'用户名或密码输入不正确，登录失败！请重新登录'+'<br/>'+y+'秒后跳转到首页'; // 显示倒计时 
        t--; // 计数器递减  
    } 
    </script>";

    }
    }
    else
    {  
    header('location:login.html');
    }
}
// echo $_SESSION['username'];
?>
<div id="show"></div>