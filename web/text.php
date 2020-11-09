<?php
session_start();
if(isset($_SESSION['username'])) {
	$username=$_SESSION['username'];
	$words=$_SESSION['words'];
} else {
	$username="游客";
	$words=0;
	echo "<script> 
			var t=50;//设定跳转的时间 
			setInterval('refer()',100); //启动1秒定时 
			function refer(){  
				if(t==0){ 
					location='../login.html'; //#设定跳转的链接地址 
				} 
				var y=Math.ceil(t/10)
				document.getElementById('show').innerHTML=''+'您还未登录，不允许留言'+'<br>'+y+'秒后跳转到登录页面'; // 显示倒计时 
				t--; // 计数器递减 
			} 
	</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>留言页面</title>
	<link rel="stylesheet" type="text/css" href="../css/systyle.css">
</head>


<body>
	<div id="show" class="container">
		<div class="top-container">
		<div class="top-text">
					<h1>留言板</h1>
				</div>
			<nav>
				<a href="../welcome.php">首页</a>|
				<a href="text.php">留言页面</a>|
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
				<div class="left-wz">
					<span>
						<h2 style="margin-left: 90px;">已留言</h2>
					</span>
				</div>

				<div class="left-no" style="margin-left: 90px;">
					<span><?php echo $words; ?></span>
				</div>
				<hr>
				<div class="left-hy">欢迎：<?php echo $username;?></div>
			</div>
		</div>
		<div class="lyb" >
		<form action="textsave.php" method="post">
			<table>
				<tbody>
					<tr>
						<td colspan="2" align="center">留言</td>
					</tr>
					<tr>
						<td style="text-align: right;">用户名：</td>
						<td><input type="username" id="username" value="<?php echo $username;?>" readonly="readonly" style="margin-left:-0px;" ></td>
					</tr>
					<tr>
						<td style="text-align: right;">主题：</td>
						<td><input type="text" name=" Theme" id="Theme" style="margin-left:-0px;"></td>
					</tr>
					<tr>
						<td style="text-align: right;">留言：</td>
						<td><textarea name="text" from="text" style="height: 200px;"placeholder="请输入你的留言..."></textarea></td>
					</tr>
					<tr>
						<td colspan="2" style=" text-align: center;"><input type="reset" value="重置" style="width:100px">
						<input type="submit" value="提交" style="width:100px"></td>
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