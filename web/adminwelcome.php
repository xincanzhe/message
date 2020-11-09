<?php require_once("../coon.php");?>
<?php
session_start();
$username=$_SESSION['username'];
// $words=$_SESSION['words'];
$admin=$_SESSION['admin'];
if($admin==1){
  $sqlnum=mysqli_query($coon, "select count(*) as total from text");  //执行查询语句
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
<html lang="cn">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>留言管理页面</title>
  <link rel="stylesheet" type="text/css" href="../css/systyle.css">
  <style>

        /* 滚动条宽度 */
        ::-webkit-scrollbar {
            width: 5px;
            background-color: transparent;
        }

        /* 滚动条颜色 */
        ::-webkit-scrollbar-thumb {
            background-color: #27314d;
        }

        table {
            width: 99%;
            border-spacing: 0px;
            border-collapse: collapse;
        }

        table caption {
            font-weight: bold;
            font-size: 24px;
            line-height: 50px;
        }

        table th,
        table td {
            height: 50px;
            text-align: center;
            border: 1px solid gray;
        }

        table thead {
            color: white;
            background-color: #38F;
        }

        table tbody {
            display: block;
            width: calc(100% + 8px);
            /*这里的8px是滚动条的宽度*/
            height: 430px;
            overflow-y: auto;
            /* z-index:-100; */
            -webkit-overflow-scrolling: touch;
        }

        table tfoot {
            background-color: #71ea71;
        }

        table thead tr,
        table tbody tr,
        table tfoot tr {
            box-sizing: border-box;
            table-layout: fixed;
            display: table;
            width: 100%;
        }

        table tbody tr:nth-of-type(odd) {
            background: #EEE;
        }

        table tbody tr:nth-of-type(even) {
            background: #FFF;
        }

        table tbody tr td {
            border-bottom: none;
        }
  </style>
</head>


<body>
	<div id="show" class="container">
		<div class="top-container">
		<div class="top-text">
					<h1>留言板</h1>
				</div>
			<nav>
				<a href="./adminwelcome.php">首页</a>|
        <a href="./text.php">用户留言</a>|
				<a href="./userupdate.php">个人信息</a>
				|
				<a href="./usermanage.php">用户管理</a>
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
				<div class="left-wz" style=" text-align: center;margin-right: 40px;"">
					<span>
						<h2>已有留言</h2>
					</span>
				</div>

				<div class="left-no" style=" text-align: center;margin-right: 40px;"">
			<span><?php echo $total; $_SESSION['words']=$total;?></span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</div>
				<hr>
				<div class="left-hy">欢迎：<?php echo $username;?></div>
			</div>
		</div>
		<div class="lyb">
  <table>

    <tbody>
      <tr>
        <td>序号</td>
        <td>主题</td>
        <td>内容</td>
        <td>回复</td>
        <td>管理</td>
        <td>发布时间</td>
        <td>发布IP地址</td>
      </tr>
      <?php
  //   //使用Select count（*）语句统计text表有多少该用户发表的记录
  // $sqlnum=mysqli_query($coon, "select count(*) as total from text");  //执行查询语句
  //   //使用mysqli_fetch_array获取查询结果，返回值为数组
  //   $num=mysqli_fetch_array($sqlnum);
  //   //定义$total存储表的总记录总数
  //   $total=$num['total'];
    if ($total==0) {
        //若果记录总数为0则显示无数据
        echo "本系统暂无任何留言！";
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
        $sql=mysqli_query($coon, "select * from text order by ID asc limit ".($page-1)*$pagesize.",$pagesize");
        //使用mysqli_fetch_array查询所有记录集，并定义为$info,使用while循环遍历每条记录
        while ($info=mysqli_fetch_array($sql)) {
            ?>
      <tr>
        <td><?php echo $info['id'] ; ?></td>
        <td><?php echo $info['Theme'] ; ?></td>
        <td><textarea name="" id="" cols="10" rows="10" readonly><?php echo $info['text'] ; ?></textarea></td>
        <td><textarea name="" id="" cols="10" rows="10" readonly><?php echo $info['reply']; ?></textarea></td>
        <td><a href="addreply.php?id=<?php echo $info['id']; ?>">添加回复</a><br>
        <a href="delreply.php?id=<?php echo $info['id']; ?>">删除留言</a></td>
        <td><?php echo $info['time'] ; ?></td>
        <td><?php echo $info['ip']?></td>
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
          echo "<a href=adminwelcome.php?page=1>首页</a>&nbsp;";
          /*显示“上一页”超链接*/
          echo "<a href=adminwelcome.php?page=".($page-1).">上一页</a>&nbsp;";
      }
      /*如果当前页不是尾页*/
      if ($page<$pagecount) {
          /*显示“下一页”超链接*/
          echo "<a href=adminwelcome.php?page=".($page+1).">下一页</a>&nbsp;";
          /*显示“尾页”超链接*/
          echo "<a href=../web/adminwelcome.php?page=".$pagecount.">尾页</a>&nbsp;";
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