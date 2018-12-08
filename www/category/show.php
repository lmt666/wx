<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show</title>
</head>
<body>
<table border=1>
    <caption><h1></h1></caption>
    <thead>
      <tr>
        <th>类别</th>
        <th>操作</th>        
      </tr>
    </thead>
    <tbody>
 <?php 
        require_once '../inc/db.php';
        
        $query = $db->query('select * from commodity where c_id =' . $_GET['id']);
        while ( $post =  $query->fetchObject() ) {  
      ?>
        <tr>
          <td><a href="commodity.php?id=<?php echo $post->id ?>"><?php echo $post->title ?></a></td>
          <td><a href="../cart/cart_add.php?id=<?php echo $post->id ?>">加入购物车</a></td>
          <br>
        </tr>
      <?php  } ?>
</table>
</body>
</html>