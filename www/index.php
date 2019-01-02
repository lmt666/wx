<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>XXXX</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .fakeimg {
        height: 200px;
         background: #aaa;
    }
  </style>
</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0">
  <div id="user"> 
        <?php 

          if(is_login()){
            $q=$db->prepare('select power from users where id = :id');
            $q->bindParam(':id',$_SESSION['userid'],PDO::PARAM_INT);
            $q->execute();
            $p=$q->fetchObject();
            if($p->power!='0'){
              ?>
              <div class="head" style="float: right"> 
                <a href="./admin/" title="后台" class="fff"><span class="glyphicon glyphicon-transfer" style="font-size: 20px;"></span></a>
              </div >
        <?php }} ?>
           
        <div class="head" style="float: right"> 
          <a href="./order/" title="个人资料" class="fff"><span class="glyphicon glyphicon-user" style="font-size: 20px;"></span></a>
        </div >

        <div class="head" style="float: right"> 
          <a href="./cart/cart.php" title="购物车" class="fff"><span class="glyphicon glyphicon-shopping-cart" style="font-size: 20px"></span></a>
        </div >
        <?php 
          if(is_login()){
          ?>
            <div class="head" style="float: right"> 
              <a href="./sessions/delete.php" title="退出登陆" class="fff"><span class="glyphicon glyphicon-log-out" style="font-size: 20px;"></span></a>
            </div >
          <?php 
          }else{
           ?>
            <div class="head" style="float: right"> 
              <a href="./sessions/new.php" title="登陆" class="fff"><span class="glyphicon glyphicon-log-in" style="font-size: 20px;"></span></a>
            </div >
        <?php } ?>
          <div class="head" style="float: right"> 
            <a href="./users/new.php" title="注册" class="fff"><span class="glyphicon glyphicon-plus" style="font-size: 20px;"></span></a>   
          </div >
          <div class="head" style="float: right"> 
              <?php 
                if(is_login()){
                  $q=$db->prepare('select power from users where id = :id');
                  $q->bindParam(':id',$_SESSION['userid'],PDO::PARAM_INT);
                  $q->execute();
                  $p=$q->fetchObject();
                  if($p->power=='0'){
                  echo '当前用户:' . current_user()->nickname;
                  }else{
                    echo '当前管理员:' . current_user()->nickname;
                  }
                }
                else
                  echo "你还未登陆";
              ?>           
          </div >

  </div>

  <h1>XXXX</h1>
 
</div>

<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <ul class="nav nav-tabs">
        <li class="active">
           <a href="./index.php">首页</a>
        </li>
        <li>
           <a href="./category/show.php?id=0">物品分类</a>
        </li>
      </ul>
      <div class="carousel slide" id="carousel-863066" style="width:800px ; height: 500px;margin: 0 auto;">
        <ol class="carousel-indicators">
          <li class="active" data-slide-to="0" data-target="#carousel-863066">
          </li>
          <li data-slide-to="1" data-target="#carousel-863066">
          </li>
          <li data-slide-to="2" data-target="#carousel-863066">
          </li>
        </ol>
        <div class="carousel-inner" style="width:800px ; height: 500px;">
          <div class="item active">
            <a href="./category/commodity.php?id=3"><img alt="" src="img/desktop.jpg" width="100%" height="auto" /></a>
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <a href="./category/commodity.php?id=5"><img alt="" src="img/phone.jpg" width="100%" height="auto" style="width: 600px;height:500px"/></a>
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <a href="./category/commodity.php?id=23"><img alt="" src="img/shubiao.jpg" width="100%" height="auto" style="width: 600px;height:500px"/></a>
            <div class="carousel-caption">
            </div>
          </div>
        </div> <a class="left carousel-control" href="#carousel-863066" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-863066" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<div class="jumbotron text-center" style="margin-bottom:0">
</div>

<style>
#user{
  position:fixed; 
  top:0; 
  width:100%; 
  text-align: right;
  z-index: 0;
}

.head{
      top:0;
      text-align: right;
      z-index: 0;
      margin:8px;
}

.fff:visited{
  color:black;
  text-decoration:none;
}
.fff:link {
  text-decoration:underline;
  color:black;
}
.fff:hover {
  text-decoration:underline;
  color:grey;
}
.fff:active {
  text-decoration:underline;
  color:black;
}

img{
  margin: 5px;
}

</style>
</body>
</html>