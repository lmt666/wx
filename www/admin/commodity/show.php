<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show</title>
</head>
<body>
  <?php        
    require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';    
    
    $q = $db->prepare('select * from commodity join category on c_id=category.cid where commodity.id = :id');
    $q->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $q->execute();
    $p = $q->fetchObject();    
  ?>

  <h1><?php echo $p->title; ?>  </h1>
  <p><img src="<?php echo $p->pic ?>" alt=></p>
  <p>介绍:<?php echo htmlentities($p->body); ?></p>
  <p>分类:<?php echo $p->name; ?></p>
  <p>价格:<?php echo htmlentities($p->price); ?>元</p>
  <p>生产日期:<?php echo htmlentities($p->data); ?></p>
  <p>库存:<?php echo htmlentities($p->stock); ?></p>
<h2>评论列表</h2>
  <?php 

          $query = $db->query( 'select * from users join comments on comments.user_id = users.id where post_id = ' . $_GET['id']);
          while ( $post =  $query->fetchObject() ) {
        ?>
        <ul>
          <li>
            <?php echo "用户:" ?>
            <?php echo $post->nickname ?>
            <br>
            <?php echo "标题:" ?>
            <?php echo $post->title ?>
            <br/>
            <?php echo "内容:" ?>
            <?php echo $post->body ?>
            <br/>
            <?php echo "发表时间:" ?>
            <?php echo $post->create_at ?>
            <br>
            <a href="./comments/delete.php?id=<?php echo $post->id ?>">删除评论</a>
          </li>
        </ul>
        <?php } ?>
  <a href="commodity.php?id=<?php echo $p->c_id ?>">返回上一页</a>
  <br>
  <a href="../">返回首页</a>
</body>
</html>