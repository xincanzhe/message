<?php require_once("../coon.php");?>
<?php
session_start();

    $ip=$_SERVER["REMOTE_ADDR"];
    $user=$_SESSION['username'];
    // $password=$_POST['password'];
    $text=$_POST['text'];
    $Theme=$_POST['Theme'];
    if(($text==null)||($Theme==null)){
        echo "<script> 
            var t=50;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    history.back();//#设定跳转的链接地址 
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'留言不允许未空'+'<br>'+y+'秒后跳转到留言页面'; // 显示倒计时 
                t--; // 计数器递减 
            } 
            </script>";
    }else{
        $liuyan="insert into text (username,Theme,text,ip) values ('$user','$Theme','$text','$ip')";
    $sql=mysqli_query($coon,$liuyan);
    if($sql){
        echo "<script> 
            var t=50;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    window.location='../welcome.php';
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'留言发布成功！'+'<br>'+y+'秒后跳转到首页'; // 显示倒计时 
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
                document.getElementById('show').innerHTML=''+'留言发布失败！'+'<br>'+y+'秒后跳转到留言'; // 显示倒计时 
                t--; // 计数器递减 
            } 
            </script>";
    }
    }

?>
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
<div id="show">

</div>