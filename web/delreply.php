<?php require_once("../coon.php");?>
<?php
session_start();
$username=$_SESSION['username'];
$words=$_SESSION['words'];
$admin=$_SESSION['admin'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>删除回复</title>
    <style>

    </style>
</head>
<?php
if(isset($_GET["id"]))
{
    $id=$_GET['id'];
    $sql="select * from text where id='$id'";
    $rel2=mysqli_query($coon,$sql);
    $rel=mysqli_fetch_array($rel2);
}else {
    $rd=$_GET['rd'];
    $resql="delete from text where id='$rd'";
    $rdque=mysqli_query($coon,$resql);
    if($rdque){
        echo "<script>alert('留言删除成功！');</script>";
        if($admin==1){
            echo "<script>window.location='./adminwelcome.php';</script>";
        }else{
            echo "<script>window.location='../welcome.php';</script>";
        }
    }
    else{
        echo "<script>alert('留言删除失败！');history.back();</script>";
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
	<div  class="container">
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
						<h2 style="margin-right: 40px;">已留言</h2>
					</span>
				</div>

				<div class="left-no" style=" text-align: center;margin-right: 40px;"">
					<span><?php echo $words; ?></span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
				<hr>
				<div class="left-hy">欢迎：<?php echo $username;?></div>
			</div>
		</div>
		<div class="lyb" id="show" >
    <form action="delreply.php?rd=<?php echo $id; ?>" method="post">
        <table>
            <tbody>
                <tr>
                    <td  style="text-align: right;">序号：</td>
                    <td><?php echo $id;?></td>
                    </tr>
                    <tr>
                    <td style="text-align: right;">主题：</td>
                    <td><?php echo $rel['Theme'];?></td>
                    </tr>
                    <tr>
                    <td style="text-align: right;">内容：</td>
                    <td><textarea name="text" from="text" style="height: 120px; "><?php echo $rel['text'];?></textarea></td>
                    </tr>
                    <tr>
                    <td style="text-align: right;">回复：</td>
                    <td><textarea name="reply" from="reply" style="height: 120px; " readonly ><?php echo $rel['reply'] ;?></textarea></td>
                    </tr>
                    <tr>
                    <td style="text-align: right;">发布时间：</td>
                    <td><?php echo $rel['time'];?></td>
                    </tr>
                    <tr>
                    <td style="text-align: right;">发布IP地址：</td>
                    <td><?php echo $rel['ip'];?></td>
                    </tr>
                </tr>
                <tr>
                    <td colspan="6" style=" text-align: center;">
                        <input type="submit" value="确认删除" style=" width:150px;">
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