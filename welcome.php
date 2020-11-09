<?php require_once("coon.php");?>
<?php
session_start();
if (isset($_SESSION['username'])) {
  $username=$_SESSION['username'];
  $face=$_SESSION['face'];
  $sqlnum=mysqli_query($coon, "select count(*) as total from text where username='$username'");  //执行查询语句
    //使用mysqli_fetch_array获取查询结果，返回值为数组
    $num=mysqli_fetch_array($sqlnum);
    $total=$num['total'];
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
	<link rel="stylesheet" type="text/css" href="css/systyle.css">
	<title>主页</title>
</head>

<body>
	<div class="container">
		<div class="top-container">
		<div class="top-text">
					<h1>留言板</h1>
				</div>
			<nav>
				<a href="./welcome.php">首页</a>|
				<a href="./web/text.php">留言页面</a>|
				<a href="./web/userupdate.php?id=<?php echo $username; ?>">个人信息修改</a>
				<!-- |
				<a href=""></a> -->
			</nav>
			
			<div class="top-dc">
				<a href="login.html">登 入</a> | <a href="web/logout.php">注 销</a>
			</div>
		</div>

		

		<div class="left-container">
			<div class="icon1">
				<div><img src="img/<?php echo $face; ?>" alt="me"></div>
			</div>

			<div class="left-sc">
				<div class="left-wz" style=" text-align: center;">
					<span>
						<h2 style="margin-right: 30px;">共有 | 显示</h2>
					</span>
				</div>

				<div class="left-no" style=" text-align: center;margin-right: 90px;"">
                    <span ><?php echo $total;  
                     $_SESSION['words']=$total;
                    ?></span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span><?php echo $pagesize; ?></span>
				</div>
				<hr>
				<div class="left-hy">欢迎：<?php echo $username;?></div>
			</div>
		</div>
		<div class="lyb">
    <table style="height:90%">
  <tbody>
    <tr>
      <td>序号</td>
      <td>主题</td>
      <td>内容</td>
      <td>回复</td>
      <td>管理</td>
      <td>发布时间</td>
    </tr>  
    <?php
    //使用Select count（*）语句统计gbook表有多少该用户发表的记录
   
    //定义$total存储表的总记录总数
    
    if ($total==0) {
        //若果记录总数为0则显示无数据
        echo "本系统暂无你的任何留言！"."<a href='./web/text.php'>添加回复</a>";
        $pagesize=0;
        $page=0;
        $pagecount=0;
    } else {
        //设置每页显示5条记录
        
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
        $sql=mysqli_query($coon, "select * from text where username='$username' order by ID asc limit ".($page-1)*$pagesize.",$pagesize");
        //使用mysqli_fetch_array查询所有记录集，并定义为$info,使用while循环遍历每条记录
        while ($info=mysqli_fetch_array($sql)) {
            ?>
    <tr>
      <td><?php echo $info['id'] ; ?></td>
      <td><?php echo $info['Theme'] ; ?></td>
      <td><textarea name="text" from="text" style="height:100px" ><?php echo $info['text'];?></textarea></td>
      <td><textarea name="reply" from="reply" style="height:100px"  readonly ><?php echo $info['reply'] ;?></textarea></td>
      <td><a href="./web/updatewords.php?id=<?php echo $info['id']; ?>">更新留言</a><br><a href="./web/delreply.php?id=<?php echo $info['id']; ?>">删除回复</a></td>
    <td><?php echo $info['time'] ; ?></td>
    </tr>
    <?php
        }
    }
    ?>
  </tbody>
</table>
<table>
  <tbody>
    <tr>
      <td>
        共有数据<?php echo $total;//显示总页数?>条，
        每页显示<?php echo $pagesize;//显示每页的总条数?>条，
        第<?php echo $page;//显示当前页码?>页/共<?php echo $pagecount;//显示总页码数?>页&nbsp;
        <a href='./web/text.php' style="color:#7d68d1">添加回复</a>
       <?php
      /*如果当前页不是首页*/
      if ($page!=1) {
          /*显示“首页”超连接*/
          echo "<a href=welcome.php?page=1>首页</a>&nbsp;";
          /*显示“上一页”超链接*/
          echo "<a href=welcome.php?page=".($page-1).">上一页</a>&nbsp;";
      }
      /*如果当前页不是尾页*/
      if ($page<$pagecount) {
          /*显示“下一页”超链接*/
          echo "<a href=welcome.php?page=".($page+1).">下一页</a>&nbsp;";
          /*显示“尾页”超链接*/
          echo "<a href=welcome.php?page=".$pagecount.">尾页</a>&nbsp;";
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
