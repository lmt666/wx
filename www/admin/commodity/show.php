<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show</title>
</head>
<body>
  <?php        
    require_once '../inc/db.php';    
    
    $query = $db->prepare('select * from commodity where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();    
  ?>

  <h1><?php echo $post->title; ?>  </h1>
  <p><img src="<?php echo $post->pic ?>" alt=></p>
  <p><?php echo htmlentities($post->body); ?></p>
  <p>价格:<?php echo htmlentities($post->price); ?>元</p>
  <p><?php echo htmlentities($post->data); ?></p>

</body>
</html>