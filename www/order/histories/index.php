<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../../vendor/autoload.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>历史订单</title>
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
      window.history.back(-1);
    </script>
  <?php } ?>
  <h1>个人资料</h1>
  <div class="container" style="position: fixed; left:0;">
    <div class="row">
      <div class="col-xs-3">
      <b><?php 
              if(@$_SESSION['userid']){
                $query=$db->query('select * from users where id = ' . $_SESSION['userid']);
                $post=$query->fetchObject();
                echo "余额:";
                echo $post->money;
              }
            ?></b>
        <ul class="nav nav-pills nav-stacked">
          <li><a href="../" class="fff">订单</a></li>
          <li class="active"><a href="./" class="fff">历史订单</a></li>
          <li>          
            <a href="../../money/edit.php">充值</a>
          </li>
          <li><a href="../../adress/">收货地址</a></li>
        </ul>
      </div>
      <div class="col-md-9">
        <table class="table table-striped">
          <caption><h1>历史订单</h1></caption>
            <thead>
              <tr>
                <th>名称</th>
                <th>单价/元</th>
                <th>数量</th>
                <th>合计/元</th>
                <th>下单时间</th>
                <th></th>     
              </tr>
            </thead>
              <?php 
                $query = $db->query('select * from orders_histories where user_id = ' . $_SESSION['userid']);
                while ($post= $query->fetchObject() ) {         
              ?>
                  <tr>
                    <td><?php echo $post->cname; ?></td>
                    <td><?php echo $post->price; ?></td>
                    <td><?php echo $post->num; ?></td>
                    <td><?php echo $post->total; ?></td>    
                    <td><?php echo $post->creat_at; ?></td>
                    <td><a href="delete.php?id=<?php echo $post->id ?>" title="删除" class="fff"><span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr> 
              <?php } ?>
        </table>
      </div>
    </div>
    <a href="../../">返回首页</a>
  </div>
</body>
</html>