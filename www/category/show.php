<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>show</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-md-12 column">
  <ul class="nav nav-tabs">
    <li>
       <a href="../index.php">首页</a>
    </li>
    <li class="active">
       <a href="./show.php?id=0">物品分类</a>
    </li>
  </ul>
</div>
<br>
<br>
<br>
<h1>
<?php        
    if($_GET['id']=='0'){
      echo "全部";
    }else{
      $q=$db->query('select * from category where cid = ' . $_GET['id']);
      $p=$q->fetchObject();
      echo $p->name; 
    };
?>
</h1>
 <div class="container" style="position:fixed; left:0;">
      <div class="row">

          <div class="col-xs-3">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="show.php?id=0">全部</a></li>
                <?php                  
                    $query = $db->query('select * from category');
                    while ( $post =  $query->fetchObject() ) {  
                  ?>        
                      <li><a href="show.php?id=<?php echo $post->cid ?>"><?php echo $post->name ?></a></li>               
                  <?php  } ?>
              </ul>
          </div>
          <div class="col-md-9">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>名称</th>
                    <th></th>        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if($_GET['id']!='0')
                      $pager = new Pager('select * from commodity where c_id =' . $_GET['id'] );
                    else
                      $pager = new Pager('select * from commodity');
                    $query = $pager->query(@$_GET['page']);
                    while ($post=$query->fetchObject() ) {  
                  ?>
                    <tr>
                      <td><a href="commodity.php?id=<?php echo $post->id ?>"><?php echo $post->title ?></a></td>
                      <td><a href="../cart/new.php?id=<?php echo $post->id ?>" title="加入购物车"><span class="glyphicon glyphicon-shopping-cart"></span></a></td>
                      <br>
                    </tr>
                  <?php  } ?>
            </table>
            <?php echo $pager->nav_html(); ?> 
          </div>
      </div>
 </div>



 
</body>
</html>