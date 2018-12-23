<?php 
require_once './inc/session.php';
require_once './inc/db.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>XXXX</title> 
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

<div id="main">
<div id="title">
<div id="user">
<?php 
  if(is_login()) 
    echo '当前用户: ' . current_user()->name;
  else
    echo "你还未登陆";
?>
<br>
<a href="./users/new.php" class="fff">注册</a>
<br>
<a href="./sessions/new.php" class="fff">登陆</a>
<br>
<a href="./sessions/delete.php" class="fff">退出</a>
<br>
<a href="./cart/cart.php" class="fff">购物车</a>
<br>
<a href="./order/" class="fff">订单</a>
<br>
<a href="./order/histories" class="fff">历史订单</a>
<br>
<a href="./admin/" class="fff">管理后台</a>
</div>

<h1>XXXX</h1>
</div>
<div id="search">

	<form action="" method="get">
	<input type="search"  >
	<input type="submit" value="搜索" >
	</form>
</div>

<div id="nav">
<nav>
	<ul>
		<li><a href="index.php" class="eee" >首页</a></li>
		<li><a href="./category/category.php" class="eee" >物品分类</a></li>
		<li><a href="specials.html" class="eee" >特价商品</a></li>
		<li><a href="contact.html" class="eee" >联系我们</a></li>
		<li><a href="about.html" class="eee" >关于我们</a></li>
	</ul>

</nav>
</div>
<?php 
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
            <a href="./cart/cart-add.php?id=<?php print $post->id; ?>">加入购物车</a> 
            <a href="details.php?id=<?php print $post->id; ?>">详细信息</a> 
            </div>
              
            <br>       
        </div>
      <?php  } ?>
</div>
</div>

</body>
</html>
