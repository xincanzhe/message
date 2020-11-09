<?php require_once("../coon.php");?>
<?php
session_start();
$username=$_SESSION['username'];
$words=$_SESSION['words'];
if(isset($_GET["id"]))
{
    $id=$_GET['id'];
    $sql="select * from user where id='$id'";
    $rel2=mysqli_query($coon,$sql);
    $rel=mysqli_fetch_array($rel2);
    if($rel['admin']==1){
        echo "<script> 
			var t=50;//设定跳转的时间 
			setInterval('refer()',100); //启动1秒定时 
			function refer(){  
				if(t==0){ 
				    history.back(); //#设定跳转的链接地址 
				} 
				var y=Math.ceil(t/10)
				document.getElementById('show').innerHTML=''+'该用户是管理员，不允许删除。'+'<br>'+y+'秒后跳转到用户管理页面'; // 显示倒计时 
				t--; // 计数器递减 
			} 
</script>";
    }
}else {
    $rd=$_GET['rd'];
    $resql="delete from user where id='$rd'";
    $rdque=mysqli_query($coon,$resql);
    if($rdque){
        echo "<script>alert('用户删除成功！');window.location='../web/usermanage.php';</script>";
    }
    else{
        echo "<script>alert('用户删除失败！');history.back();;</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>主 页</title>
	<link rel="stylesheet" type="text/css" href="../css/systyle.css">
</head>


<body>
	<div class="container">
		<div class="top-container">
		<div class="top-text">
					<h1>留言板</h1>
				</div>
			<nav>
				<a href="./welcome.php">首页</a>|
				<a href="./text.php">留言页面</a>|
				<a href="./userupdate.php">个人信息修改</a>
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
						<h2>已留言</h2>
					</span>
				</div>

				<div class="left-no" style=" text-align: center;">
					<span><?php echo $words; ?></span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
				<hr>
				<div class="left-hy">欢迎：<?php echo $username;?></div>
			</div>
		</div>
		<div class="lyb" id="show">
<body>
    <form action="deluser.php?rd=<?php echo $id; ?>" method="post">
        <table>
            <tbody>
                <tr>
                    <td>序号</td>
                    <td>用户名</td>
                    <td>电话号码</td>
                    <td>电子邮箱</td>
                    <td>头像</td>
                    <td>是否为管理员</td>
                </tr>
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $rel['username'] ; ?></td>
                    <td><?php echo $rel['password'] ; ?></td>
                    <td><?php echo $rel['email'];?></td>
                    <td><img src="../img/<?php echo $rel['face']; ?>" width="50px" height="50px"></td>
                    <td><?php echo $rel['admin'] ; ?></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <input type="submit" value="确认删除">
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
