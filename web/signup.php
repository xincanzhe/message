<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../css/systyle.css">
	<title>注册</title>
	<script src="../js/SignUp.js"></script>
</head>

<body>
	<div class="container">
		<div class="top-container">
		<div class="top-text">
					<h1>留言板</h1>
				</div>
			<nav>
				<a href="../welcome.php">首页</a>|
				<a href="./text.php">留言页面</a>|
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
						<h2 style="margin-left: 90px;">已留言 </h2>
					</span>
				</div>

				<div class="left-no" style="margin-left: 90px;">
					<span><?php echo "0"; ?></span>
				</div>
				<hr>
				<div class="left-hy">欢迎<?php echo "游客"; ?></div>
			</div>
		</div>
		<div class="lyb" style="padding-left: 10%; padding-top:30px;width: 55%;" >
			<form action="./sigupsave.php" method="post">
				<div class="text">
					<div class="tion">
						<p>用户账户：</p>
					</div><input type="text" name="username" id="username" onblur="cllss('username')"><span id="muser">*</span>
				</div>
				<div class="text">
					<div class="tion">
						<p>账户密码：</p>
					</div><input type="password" name="password" id="password" onblur="cllss('upass')"><span id="mpass">*</span>
				</div>
				<div class="text">
					<div class="tion">
						<p>确认密码：</p>
					</div><input type="password" name="rpassword" id="rpassword" onblur="cllss('rpass')"><span id="mrpass">*</span>
				</div>
				<div class="text">
					<div class="tion">
						<p>电子邮箱：</p>
					</div><input type="email" name="email" id="email" onblur="cllss('uemail')"><span id="memail">*</span>
				</div>
				<div class="text">
					<div class="tion">
						<p>电话号码：</p>
					</div><input type="tel" name="tel" id="tel" maxlength="11" onblur="cllss('tel')"><span id="mtel">*</span>
				</div>
				<div class="text">
					<div class="tion">
						<p>用户性别：</p>
					</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id='ssex' style="width:200px;"><input type="radio" name="ssex" id="ssem" value="1" >男<input type="radio" name="ssex" id="ssev" style="margin-left: 40px;" value="2">女</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span id="mtel"></span>
				</div>
				<div class="text" >
					<div class="tion">
						<p>用户头像：</p>
					</div>
					<div id="face" >
						<input type="radio" name="face" id="face1" value="1.jpg"><img src="..\img\1.jpg" width="30px"
							height="30px" style="margin-left: 20px;">
						<input type="radio" name="face" id="face2" value="2.jpg"><img src="..\img\2.jpg" width="30px"
							height="30px" style="margin-left: 20px;">
						<!-- <br> -->
						<input type="radio" name="face" id="face3" value="3.jpg"><img src="..\img\3.jpg" width="30px"
							height="30px" style="margin-left: 20px;">
						<input type="radio" name="face" id="face4" value="4.jpg"><img src="..\img\4.jpg" width="30px"
							height="30px" style="margin-left: 20px;">
					</div>
				</div>
				<div class="text"><input type="submit" value="注册" id="tijiao">
				<input type="reset" value="重置" id="rest"></div>
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