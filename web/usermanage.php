<?php require_once("../coon.php");?>
<?php
session_start();
$username=$_SESSION['username'];
$face=$_SESSION['face'];
$admin=$_SESSION['admin'];
if($admin==1){
  $sqlnum=mysqli_query($coon, "select count(*) as total from user");  //执行查询语句
//使用mysqli_fetch_array获取查询结果，返回值为数组
$num=mysqli_fetch_array($sqlnum);
$total=$num['total'];
$pagesize=5;  
}else{
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../css/systyle.css">
	<title>用户管理页面</title>
</head>

<body>
	<div class="container">
		<div class="top-container">
		<div class="top-text">
					<h1>留言板</h1>
				</div>
			<nav>
				<a href="./adminwelcome.php">首页</a>|
        <a href="./text.php">留言页面</a>
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
				<div><img src="../img/<?php echo $face; ?>" alt="me"></div>
			</div>

			<div class="left-sc">
				<div class="left-wz" style=" text-align: center;">
					<span>
						<h2 style="margin-right: 40px;">共有 | 显示</h2>
					</span>
				</div>

				<div class="left-no" style=" text-align: center;  margin-right: 90px;"">
                    <span><?php echo $total;  
                    ?></span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span><?php echo $pagesize; ?></span>
				</div>
				<hr>
				<div class="left-hy">欢迎：<?php echo $username;?></div>
			</div>
		</div>
		<div class="lyb" >
    <table>
  <tbody>
    <tr>
      <td>id</td>
      <td>用户名</td>
      <td>电话号码</td>
      <td>电子邮箱</td>
      <td>头像</td>
      <td>是否为管理员</td>
      <td>管理</td>
    </tr>  
    <?php
    //使用Select count（*）语句统计gbook表有多少该用户发表的记录
 
    //定义$total存储表的总记录总数
    
    if ($total==0) {
        //若果记录总数为0则显示无数据
        echo "本系统暂无你的任何留言！";
    } else {
        //设置每页显示5条记录
        $pagesize=5;
        //每页显示5条记录，如果总记录数不能被5整除，则加1页放尾数记录，定义$pagecount存放总页数数据
     $pagecount=ceil($total/$pagesize); //ceil()返回大于或者等于指定表达式的最小整数
      if ((isset($_GET['page']))) {
          //获取地址栏page参数，没有，则要显示第一页内容，$page值设置为1
        
          $page=intval($_GET['page']);
      } else {
          //获取地址栏page参数，有，则显示该页的内容，$page值设置为地址栏page参数变量值
          $page=1;
      }
        //设置gbook数据表按ID升序排序查询出每页数据
        $sql=mysqli_query($coon, "select * from user order by ID asc limit ".($page-1)*$pagesize.",$pagesize");
        //使用mysqli_fetch_array查询所有记录集，并定义为$info,使用while循环遍历每条记录
        while ($info=mysqli_fetch_array($sql)) {
            ?>
    <tr>
      <td><?php echo $info['id'] ; ?></td>
      <td><?php echo $info['username'] ; ?></td>
      <td><?php echo $info['password'] ; ?></td>
      <td><?php echo $info['email'];?></td>
      <td><?php echo $info['face']; ?></td>
      <td><?php echo $info['admin'] ; ?></td>
      <td><a href="deluser.php?id=<?php echo $info['id'];?>">删除用户</a></td>
    </tr>
    <?php
        }
    }
    ?>
  </tbody>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td>
        共有数据<?php echo $total;//显示总页数?>条，
        每页显示<?php echo $pagesize;//显示每页的总条数?>条，
        第<?php echo $page;//显示当前页码?>页/共<?php echo $pagecount;//显示总页码数?>页&nbsp;
       <?php
      /*如果当前页不是首页*/
      if ($page!=1) {
          /*显示“首页”超连接*/
          echo "<a href=adminwelcom.php?page=1>首页</a>&nbsp;";
          /*显示“上一页”超链接*/
          echo "<a href=adminwelcom.php?page=".($page-1).">上一页</a>&nbsp;";
      }
      /*如果当前页不是尾页*/
      if ($page<$pagecount) {
          /*显示“下一页”超链接*/
          echo "<a href=adminwelcom.php?page=".($page+1).">下一页</a>&nbsp;";
          /*显示“尾页”超链接*/
          echo "<a href=adminwelcom.php?page=".$pagecount.">尾页</a>&nbsp;";
      }
      ?>
      </td>
    </tr>
  </tbody>
</table>
</div>

</div>
<div class="down-container">
  <div class="down-text">
    <p>刘林 318255030211</p>
  </div>
</div>

</body>

</html>