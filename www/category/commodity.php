<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show</title>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php         
    
    $query = $db->prepare('select * from commodity join category on c_id=category.cid where commodity.id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();  
  ?>

  <h1><?php echo $post->title; ?>  </h1>
  <div class="image">
    <img src="<?php echo $post->pic ?>" alt="" style="height: 200px;width: 200px;">
  </div>
  <div class="font2">
    <b>
      <i>￥<?php echo htmlentities($post->price); ?></i>
    </b>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="details">
    <p>介绍:<?php echo htmlentities($post->body); ?></p>
    <p>分类:<?php echo $post->name; ?></p>  
    <p>生产日期:<?php echo htmlentities($post->data); ?></p>
    <p>库存:<?php echo htmlentities($post->stock); ?></p>
  </div>
  <div class="col-md-9">
        <table class="table table-striped">
        <tr>
          <th><h2>评论列表</h2></th>
        </tr>
        <?php 

          $query = $db->query( 'select * from comments join users on comments.user_id = users.id where post_id = ' . $_GET['id']);
          while ( $p =  $query->fetchObject() ) {
        ?>
        <tr>
          <td>
            <b><?php echo "用户:"?></b>
            <?php echo $p->nickname ?>
            <br>
            <b><?php echo "标题:" ?></b>
            <?php echo $p->title ?>
            <br/>
            <b><?php echo "内容:" ?></b>
            <?php echo $p->body ?>
            <br/>
            <b><?php echo "发表时间:" ?></b>
            <?php echo $p->create_at ?>

          </td>
        </tr>
        <?php } ?>
       </table>
       <a href="../comments/new.php?id=<?php echo $post->id;?>">评论</a>
       <br>
       <a href="show.php?id=<?php echo $post->c_id?>">返回上一页</a>
       <br>
       <a href="../">返回首页</a>
<style>
  .font2 > b {
  font-size: 40px;
/*  text-shadow: 5px 5px 5px black;*/
  color: red;
  float:left;
  line-height: 200px;
  }

  .image{
    float:left;
  }

</style>


</body>
</html>