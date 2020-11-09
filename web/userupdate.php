<?php require_once("../coon.php");?>
<?php
session_start();
if (isset($_SESSION['username'])) {
  $username=$_SESSION['username'];
  $face=$_SESSION['face'];
  $pagesize=5;
    $words=$_SESSION['words'];
  $sqlnum=mysqli_query($coon, "select * from user where username='$username'");  //执行查询语句
    //使用mysqli_fetch_array获取查询结果，返回值为数组
    $info=mysqli_fetch_array($sqlnum);
    $pagesize=5;
} else {
  $username="游客";
  $face='1.jpg';
  $total=0;
  $pagesize=0;
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../css/systyle.css">
	<title>修改个人信息</title>
</head>

<body>
	<div class="container">
		<div class="top-container">
		<div class="top-text">
					<h1>留言板</h1>
				</div>
			<nav>
				<a href="../welcome.php">首页</a>|
				<a  href="./text.php">留言页面</a>|
				<a  href="./userupdate.php">个人信息修改</a>
				<!-- |
				<a href=""></a> -->
			</nav>
			
			<div class="top-dc">
				<a href="../login.html">登 入</a> | <a href="./logout.php">注 销</a>
			</div>
		</div>

		

		<div class="left-container">
			<div class="icon1">
            <div><img src="../img/<?php echo $face; ?>" alt="me"></div>
			</div>

			<div class="left-sc">
				<div class="left-wz">
					<span>
                    <h2 style="margin-left: 70px;">共有 | 显示</h2>
					</span>
				</div>

				<div class="left-no" style="margin-left: 60px;">
                <span><?php echo $words; ?></span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><?php echo $pagesize; ?></span>
				</div>
				<hr>
				<div class="left-hy">欢迎：<?php echo $username;?></div>
			</div>
		</div>
		<div class="lyb" >
    <form action="./userupdatesave.php" method="post">
        <table>

            <tbody style="height:100%">
                <tr class="top">
                    <td colspan="3" align="center">修改个人信息<input type="hidden" name="id" id="id"
                            value="<?php echo $info['id'];?>"></td>
                </tr>
                <tr>
                    <td>用户名：</td>
                    <td><input type="username" id="username" name="username" value="<?php echo $info['username'];?>">
                    </td>
                    
                </tr>
                <tr>
                    <td>密码：</td>
                    <td><input type="password" name="password" id="password" value="<?php echo $info['password'];?>">
                    </td>
                    
                </tr>
                <tr>
                    <td>确认密码：</td>
                    <td><input type="password" name="password" id="rpassword" value="<?php echo $info['password'];?>">
                    </td>
                    
                </tr>
                <tr>
                    <td>性别：</td>
                    <td><input type="radio" name="ssex" id="ssem" value="1" style="width:10px;height:10px"
                        <?php if($info['ssex']=='1') echo "checked";?>>男
                        <input type="radio" name="ssex" id="ssev" value="2"
                            <?php if($info['ssex']=='2') echo "checked";?> style="width:10px;height:10px">女
                    </td>
                    
                </tr>
                <tr>
                    <td>手机号：</td>
                    <td><input type="tel" name="tel" id="tel" value="<?php echo $info['tel'];?>"></td>
                    
                </tr>
                <tr>
                    <td>电子邮箱：</td>
                    <td><input type="email" name="email" id="email" value="<?php echo $info['email'];?>"></td>
                    
                </tr>
                <tr>
                    <td>头像：</td>
                    <td>
                        <input type="radio" name="face" id="face1" value="1.jpg"
                            <?php if($info['face']=='1.jpg') echo "checked";?>><img src="..\img\1.jpg" style="width:30px;height:30px;">
                        <input type="radio" name="face" id="face2" value="2.jpg"
                            <?php if($info['face']=='2.jpg') echo "checked";?>><img src="..\img\2.jpg" style="width:30px;height:30px;">
                        <input type="radio" name="face" id="face3" value="3.jpg"
                            <?php if($info['face']=='3.jpg') echo "checked";?>><img src="..\img\3.jpg" style="width:30px;height:30px;">
                        <input type="radio" name="face" id="face4" value="4.jpg"
                            <?php if($info['face']=='4.jpg') echo "checked";?>
                        >
                        <img src="..\img\4.jpg" style="width:30px;height:30px;">
                    </td>
                    
                </tr>
                <tr>

                    <td colspan="2" style=" text-align: center;"><input type="reset" align="left" value="重置">&nbsp;&nbsp;<input type="submit" margin="10px"
                            align="right" value="提交"></td>
                   
                </tr>
            </tbody>
        </table>
    </form>
    </div>
		<div class="down-container" style="width:100%;">
			<div class="down-text">
				<p>刘林 318255030211</p>
			</div>
	</div>

</body>

</html>