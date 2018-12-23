<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show</title>
</head>
<body>
  <?php        
    require_once '../inc/db.php';    
    
    $query = $db->prepare('select * from commodity join category on c_id=category.id where commodity.id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();  
  ?>

  <h1><?php echo $post->title; ?>  </h1>
  <p>介绍:<?php echo htmlentities($post->body); ?></p>
  <p>分类:<?php echo $post->name; ?></p>
  <p>价格:<?php echo htmlentities($post->price); ?>元</p>
  <p>生产日期:<?php echo htmlentities($post->data); ?></p>
  <p>库存:<?php echo htmlentities($post->stock); ?></p>
 <h2>评论列表</h2>

 <a href="../comments/new.php?id=<?php echo $post->id;?>">我要评论</a>
  <?php 
          require_once '../inc/db.php';

          $query = $db->query( 'select * from comments where post_id = ' . $_GET['id']);
          while ( $post =  $query->fetchObject() ) {
        ?>
        <ul>
          <li>
            <?php echo "用户:"?>
            <?php echo $post->user_name ?>
            <br>
            <?php echo "标题:" ?>
            <?php echo $post->title ?>
            <br/>
            <?php echo "内容:" ?>
            <?php echo $post->body ?>
            <br/>
            <?php echo "发表时间:" ?>
            <?php echo $post->create_at ?>

          </li>
        </ul>
        <?php } ?>
</body>
</html>