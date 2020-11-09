<?php require_once("../coon.php");?>
<?php
session_start();
$username=$_SESSION['username'];
$words=$_SESSION['words'];
$face=$_SESSION['face'];
// $id=$_GET['id'];
if(isset($_GET["id"]))
{
    $id=$_GET['id'];
    $sql=mysqli_query($coon,"select * from text where id='$id'");
    $rel=mysqli_fetch_array($sql);
    
}else {
    $Theme=$_POST['Theme'];
    $text=$_POST['text'];
    $rd=$_GET['rd'];
    $resql="update text set Theme='$Theme',text='$text' where id='$rd'";
    $rdque=mysqli_query($coon,$resql);
    if($rdque){
        echo "<script> 
            var t=50;//设定跳转的时间 
            setInterval('refer()',100); //启动1秒定时 
            function refer(){  
                if(t==0){ 
                    window.location='../welcome.php';
                } 
                var y=Math.ceil(t/10)
                document.getElementById('show').innerHTML=''+'留言修改成功'+'<br>'+y+'秒后跳转到首页'; // 显示倒计时 
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
                document.getElementById('show').innerHTML=''+'留言修改失败！'+'<br>'+y+'秒后跳转到留言'; // 显示倒计时 
                t--; // 计数器递减 
            } 
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>修改留言</title>
	<link rel="stylesheet" type="text/css" href="../css/systyle.css">
</head>


<body>
	<div id="show" class="container">
		<div class="top-container">
		<div class="top-text">
					<h1>修改留言</h1>
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
				<div><img src="../img/<?php echo $face; ?>" alt="me"></div>
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
        <form action="updatewords.php?rd=<?php echo $id; ?>" method="post">
        <table>
            <tbody>
                <tr style="width:100%;">
                    <td style="text-align: right;">序号：</td>
                    <td><?php echo $id;?></td>
                </tr>
                <tr style="width:100%;">
                    <td  style="text-align: right;">主题：</td>
                    <td><input type="text" name="Theme" id="Theme" style=" width:90%;" value="<?php echo $rel['Theme'];?>"></td>
                    </tr>
                    <tr style=" width:100%; height:100px">
                    <td  style="text-align: right;">内容：</td>
                    
                    <td><textarea name="text" from="text" ><?php echo $rel['text'];?></textarea></td>
                    </tr>
                    <tr style=" width:100%;">
                    <td  style="text-align: right;">回复：</td>
                    <td><textarea name="reply" from="reply" readonly ><?php echo $rel['reply'] ;?></textarea></td>
                    </tr>
                    <tr style=" width:100%;">
                    <td style="text-align: right;">发布时间：</td>
                    <td><?php echo $rel['time'];?></td>
                    </tr>
                    <tr style="width:100%;">
                    <td style="text-align: right;">发布IP地址：</td>
                    <td><?php echo $rel['ip'];?></td>
                    </tr>
                </tr>
                <tr>
                    <td colspan="6" style=" text-align: center;">
                        <input type="reset" value="重置"  style=" width:150px;">
                        <input type="submit" value="确认修改" style="width:150px;">
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