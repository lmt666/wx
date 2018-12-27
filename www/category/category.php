<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>物品分类</title>
</head>

<body>
	<h1>物品分类</h1>
   <div id="nav">
<nav class="container">
<ul>
  <li><a href="show.php?id=0">全部</a></li>
</ul
	<?php 
        require_once '../inc/db.php';
        
        $query = $db->query('select * from category');
        while ( $post =  $query->fetchObject() ) {  
      ?>
          <ul>
            <li><a href="show.php?id=<?php echo $post->cid ?>"><?php echo $post->name ?></a></li>    
          </ul> 
      <?php  } ?>
</nav>
</div>
<a href="../">返回首页</a>
</body>
</html>