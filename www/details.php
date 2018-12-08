<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>详细内容</title>
</head>
<style typpe="text/css">
  h1,p {
    text-align: center;
  }

</style>
<body>
  <?php        
    require_once './inc/db.php';    

    $query = $db->prepare('select * from details where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();    
  ?>
  <h1><?php echo $post->title; ?>  </h1>
  <p><?php echo htmlentities($post->body); ?></p>
  <p>价格:<?php echo htmlentities($post->price); ?>元</p>
  <p><?php echo htmlentities($post->data); ?></p>
  <h2>评论列表</h2>
    <form action="./comments/save.php" method="post">
      <input type="hidden" name="post_id" value='<?php echo $_GET['id']; ?>'>
      <label for="title">标题</label>
      <input type="text" name="title" value="">
      <br/>
      <label for="body">正文</label>
      <textarea name="body"></textarea>
      <br/>
      <input type="submit" value="提交">
    </form>
  <?php 
          require_once './inc/db.php';

          $query = $db->query( 'select * from comments where post_id = ' . $_GET['id']);
          while ( $post =  $query->fetchObject() ) {
        ?>
        <ul>
          <li>
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