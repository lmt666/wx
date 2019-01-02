<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>购物车</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php 

  if(!is_login()){
  ?>
    <script>
      alert('你还未登陆!');
      window.location="../sessions/new.php";
    </script>
  <?php } ?>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <table class="table table-striped">
          <caption><h1>购物车</h1></caption>
          <thead>
            <tr>
              <th></th>
              <th>名称</th>
              <th>单价/元</th>
              <th>数量</th>
              <th>合计/元</th>
              <th>下单时间</th> 
              <th></th>       
            </tr>
          </thead>
          <?php 
              require_once '../inc/db.php';
              require_once '../inc/session.php';
              $sum='0';
              $query = $db->query('select * from cart where user_id = ' . $_SESSION['userid']) ;
              while ( $post =  $query->fetchObject() ) {
        
             ?>
            <tr>
              <td><img src=" <?php echo $post->pic ?>" alt=""></td>
              <td><?php echo $post->cname; ?></td>
              <td><?php echo $post->price; ?></td>
              <td><?php echo $post->num; ?></td>
              <td><?php echo $post->total; ?></td>    
              <td><?php echo $post->creat_at; ?></td>
              <td>
                <a href="delete.php?id=<?php echo $post->id ?>" title="删除" class="fff"><span class="glyphicon glyphicon-trash"></span></a>
              </td>    
            </tr> 

          <?php 
              $sum=$sum+$post->total;
            } ?>
        </table>
        <?php echo "合计" . $sum . "元"; ?>
        <form action="balance.php" method="post">
            <input type="hidden" name="sum" value="<?php echo $sum ?>">
            <div>
              <button type="submit" class="btn btn-success pull-left" name="submit">结算</button>
            </div>                  
          </form>
      </div>
    </div>
  </div>
  <br>
  <a href="../index.php">返回首页</a>

  <style>
    a.fff:visited{
      color:black;
      text-decoration:none;
    }
    a.fff:link {
      text-decoration:underline;
      color:black;
    }
    a.fff:hover {
      text-decoration:underline;
      color:grey;
    }
    a.fff:active {
    text-decoration:underline;
    color:black;
    }
  </style>  
</body>
</html>