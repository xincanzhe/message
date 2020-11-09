<!-- 建立与MySQL的链接 -->
<?php
//创建数据库链接
$coon=mysqli_connect("localhost","root","root","test");
//判断是否链接成功
if(mysqli_connect_errno($coon))
{
    echo "链接失败：".mysqli_connect_error();
}
// else echo "链接成功";
//设置字符为utf-8、
@mysqli_set_charset($coon,'utf8');
@mysqli_query($coon,'utf8');
?>