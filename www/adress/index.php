<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<title>show</title>
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
          <li>          
            <a href="../money/edit.php">充值</a>
          </li>
          <li class="active"><a href="./">收货地址</a></li>
        </ul>
      </div>
      <div class="col-md-9">
        <table class="table table-striped">
        <tr>
  			  <th></th>
        </tr>
      	<?php 
			$query=$db->query('select * from adress where user_id = ' . $_SESSION['userid']);
			while($post=$query->fetchObject()){
				?>
				<tr>
					<td>
						<b>姓名:</b>
						<?php echo $post->name ?>
						<br>
						<b>联系方式:</b>
						<?php echo $post->phone ?>
						<br>
						<b>收货地址:</b>
						<?php echo $post->ad ?>
						<br>
            <?php 
              if($post->def=='1'){
                echo '(默认)';
              }
             ?>
            <br>
						<a href="edit.php?id=<?php echo $post->id?>" title="编辑"><span class="glyphicon glyphicon-edit"></span></a>
						<a href="delete.php?id=<?php echo $post->id?>" title="删除"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
			<?php } ?>
		</table>
		<form action="new.php">
            <button type="submit" class="btn btn-success pull-left" name="submit">新增</button>
        </form>
            
       </div>
    </div>
    <a href="../">返回首页</a>
  </div>

</body>

</html>