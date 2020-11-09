<?php require_once("../coon.php");?>
<?php
$id=$_POST['id'];
$Theme=$_POST['Theme'];
$reply=$_POST['reply'];
$sql="update text set Theme='$Theme',reply='$reply' where id='$id'";
$rel=mysqli_query($coon,$sql);
if($rel){
    echo "<script> 
var t=50;//设定跳转的时间 
setInterval('refer()',100); //启动1秒定时 
function refer(){  
    if(t==0){ 
        window.location='../web/adminwelcome.php'; //#设定跳转的链接地址 
	} 
	var y=Math.ceil(t/10)
    document.getElementById('show').innerHTML=''+'留言回复成功'+'<br>'+y+'秒后跳转到管理员首页'; // 显示倒计时 
    t--; // 计数器递减  
} 
</script>";
}
else{
    echo "<script> 
var t=30;//设定跳转的时间 
setInterval('refer()',100); //启动1秒定时 
function refer(){  
    if(t==0){ 
        history.back(); //#设定跳转的链接地址 
	} 
	var y=Math.ceil(t/10)
    document.getElementById('show').innerHTML=''+'留言回复失败！'+'<br>'+y+'秒后跳转到回复页面'; // 显示倒计时 
    t--; // 计数器递减  
} 
</script>";
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
		}
</style>
<div id="show"></div>