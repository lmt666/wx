<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>XXXX</title> 
<link rel="stylesheet" href="../css/style.css">

</head>
<body>
<?php 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/session.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';

  if(!is_login()){
      set_notice('必须登录后方可使用本功能');
      redirect_to('../sessions/new.php');
  }
  else{
    $q=$db->prepare('select power from users where id = :id');
    $q->bindParam(':id',$_SESSION['userid'],PDO::PARAM_INT);
    $q->execute();
    $p=$q->fetchObject();
    if($p->power=='0'){
      redirect_to("warning.php");
    }
  }
?>
<div id="main">
<div id="title">
<div id="user">
<?php echo '当前用户: ' . current_user()->nickname; ?>
<br>
  <a href="./order/" class="fff">订单</a>
  <br>
  <a href="./order/histories/" class="fff">历史纪录</a>
  <br>
  <a href="../" class="fff">返回前台</a>
</div>
<h1>XXXX</h1>
</div>



<div id="nav">
<nav>
	<ul>
		<li><a href="index.php" class="eee" >首页</a></li>
		<li><a href="./category" class="eee" >物品分类</a></li>
		<li><a href="specials.html" class="eee" >特价商品</a></li>
		<li><a href="contact.html" class="eee" >联系我们</a></li>
		<li><a href="about.html" class="eee" >关于我们</a></li>
	</ul>

</nav>
</div>
<?php 
        require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';

        $query = $db->query('select * from details');
        while ( $post =  $query->fetchObject() ) {
      ?>
        <style>
          h2,p,div{
            text-align: center;
          }
          #t{
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
          }
        </style>
        <div id="fff">
            <h2><?php echo $post->title; ?></h2>
            <br>
            
            <br>
            <p><?php echo $post->jj; ?></p>
            <br>
            <div id="t">
            <a href="details.php?id=<?php print $post->id; ?>">详细信息</a> 
            <a href="edit.php?id=<?php print $post->id; ?>">改</a> 
            </div>
              
            <br>       
        </div>
      <?php  } ?>
</div>
</div>
</body>
</html>
