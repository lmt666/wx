<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>personal information</title> 
</head>
<body>
<?php 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/session.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';

  if(!is_login()){
      set_notice('必须登录后方可使用本功能');
      redirect_to('../sessions/new.php');
  }
?>
<ul>
<li><a href="./order/" class="fff">订单</a></li>
<br>
<li><a href="./order/histories" class="fff">历史订单</a></li>
<br>
<li>
<?php 
if(@$_SESSION['userid']){
  $query=$db->query('select * from users where id = ' . $_SESSION['userid']);
  $post=$query->fetchObject();
  echo "余额:";
  echo $post->money;
}
 ?>
 <a href="./money/edit.php">充值</a>
</li>
<br>
<li><a href="./adress/">收货地址</a></li>
<br>
</ul>
<a href="./">返回首页</a>
</body>
</html>