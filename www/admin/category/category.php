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
	<?php 
        require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
        
        $query = $db->query('select * from category');
        
        while ( $post =  $query->fetchObject() ) { 
      ?>         
          
         <ul>
            <li><?php echo $post->name ?>
                <a href="edit.php?id=<?php echo $post->cid ?>">编辑</a>
                <a href="delete.php?id=<?php echo $post->cid ?>">删除</a>
            </li>    
          </ul> 
      <?php  } ?>
</nav>
</div>
<a href="new.php">新增</a>
</body>
</html>