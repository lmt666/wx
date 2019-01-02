<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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
          <li><a href="../order/" class="fff">订单</a></li>
          <li><a href="../order/histories/" class="fff">历史订单</a></li>
          <li class="active">            
            <a href="./edit.php">充值</a>
          </li>
          <li><a href="../adress/">收货地址</a></li>
        </ul>
      </div>
      <div class="form-horizontal col-md-offset-3" id="login_form">
            <h3 class="form-title"></h3>
            <br>
            <br>
            <br>
            <br>
            <form action="update.php" method="post">
                <div class="col-md-9">
                    <div class="form-group">                 
                        <input class="form-control required" type="text" placeholder="请输入金额(元)" name="money" autofocus="autofocus"/>
                    </div>
                    <div class="form-group col-md-offset-9">
                      <button type="submit" class="btn btn-success pull-left" name="submit">充值</button>
                    </div>                    
                </div>
            </form>
        </div>
    </div>
    <a href="../">返回首页</a>
  </div>

</body>
</html>