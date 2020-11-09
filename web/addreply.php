<?php require_once("../coon.php");?>
<?php
session_start();
$username=$_SESSION['username'];
$words=$_SESSION['words'];
$admin=$_SESSION['admin'];
if($admin!=1){ 
    echo "<script> 
    var t=50;//设定跳转的时间 
    setInterval('refer()',100); //启动1秒定时 
    function refer(){  
        if(t==0){ 
            location='../welcome.php'; //#设定跳转的链接地址 
        } 
        var y=Math.ceil(t/10)
        document.getElementById('show').innerHTML=''+'您不是管理员，没有权限访问该页面'+y+'秒后跳转到首页'; // 显示倒计时 
        t--; // 计数器递减  
    } 
    </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>添加回复</title>
    <link rel="stylesheet" type="text/css" href="../css/systyle.css">
</head>
<?php
$id=@$_GET['id'];
$sql=mysqli_query($coon,"select * from text where id='$id'");
$rel=mysqli_fetch_array($sql);
?>
<body>
	<div  class="container">
		<div class="top-container">
		<div class="top-text">
					<h1 >留言板</h1>
				</div>
			<nav>
				<a href="../adminwelcome.php">首页</a>|
				<a href="./usermanage.php">用户管理</a>|
				<a href="userupdate.php">个人信息修改</a>
				<!-- |
				<a href=""></a> -->
			</nav>
			
			<div class="top-dc">
				<a href="../login.html">登 入</a> | <a href="./logout.php">注 销</a>
			</div>
		</div>

		

		<div class="left-container">
			<div class="icon1">
				<div><img src="../img/1.jpg" alt="me"></div>
			</div>

			<div class="left-sc">
				<div class="left-wz" style=" text-align: center;">
					<span>
						<h2 style="margin-right: 40px;">已留言</h2>
					</span>
				</div>

				<div class="left-no" style=" text-align: center; margin-right: 40px;"">
					<span><?php echo $words; ?></span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
				<hr>
				<div class="left-hy">欢迎：<?php echo $username;?></div>
			</div>
		</div>
		<div class="lyb" id="show">
    <form action="replysave.php" method="post">
        <table>
            <tbody>
                <tr>
                <tr>
                    <td style="text-align: right;">序号：</td>
                    <td><input type="text" name="id" id="id" value="<?php echo $id ?>" readonly></td>
                    </tr>
                    <tr>
                    <td style="text-align: right;">主题：</td>
                    <td><input type="text" name="Theme" id="Theme" value="<?php echo $rel['Theme'] ?>"></td>
                    </tr>
                    <tr>
                    <td style="text-align: right;">内容：</td>
                    <td><textarea name="text" from="text" readonly style="height: 120px;"><?php echo $rel['text'];?></textarea></td>
                    </tr>
                    <tr>
                    <td style="text-align: right; ">回复：</td>
                    <td><textarea name="reply" from="text" style=" height: 120px;"></textarea></td>
                    </tr>
                </tr>
               
                <tr>
                    <td colspan="3"  style=" text-align: center;">
                        <input type="reset" value="重置" style="width:100px">
                        <input type="submit" value="提交" style="width:100px">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    </div>

</div>
<div class="down-container">
    <div class="down-text">
        <p>刘林 318255030211</p>
    </div>
</div>
</body>

</html>