<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<title>edit</title>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php 

	$query=$db->prepare('select * from adress where id = :id');
	$query->bindParam(':id',$_GET['id'],PDO::PARAM_INT);
	$query->execute();
	$post=$query->fetchObject();
	if($post->def=='1'){
   ?>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<h1>编辑收货地址</h1>
				<form action="update.php" role="form" method="post">
					<input type="hidden" name="id" value="<?php echo $post->id ?>">
					<div class="form-group">
						<label for="name">name</label>
						<input type="text" name="name" class="form-control" value="<?php echo $post->name ?>">
					</div>
					<div class="form-group">
						<label for="phone">phone</label>
						<input type="text" name="phone" class="form-control" value="<?php echo $post->phone ?>">
					</div>
					<div class="form-group">
						<label for="ad">adress</label>
						<textarea name="ad" class="form-control" ><?php echo $post->ad ?></textarea>
					</div>
					<button type="submit" class="btn btn-default">提交</button>
				</form>	
			</div>
		</div>
	</div>
	<?php }else{
		   		?>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<h1>编辑收货地址</h1>
				<form action="update.php" role="form" method="post">
				    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
					<div class="form-group">
						<label for="name">name</label>
						<input type="text" name="name" class="form-control" value="<?php echo $post->name ?>">
					</div>
					<div class="form-group">
						<label for="phone">phone</label>
						<input type="text" name="phone" class="form-control" value="<?php echo $post->phone ?>">
					</div>
					<div class="form-group">
						<label for="ad">adress</label>
						<textarea name="ad" class="form-control" ><?php echo $post->ad ?></textarea>
					</div>
					<label for="def">设置默认</label>
					<input type="checkbox" name="def" value="1">
					<br>
					<button type="submit" class="btn btn-default">提交</button>
				</form>	
			</div>
		</div>
	</div>
		   	<?php } ?> 


<style>
  .row{
  	width:400px;margin:120px auto;
  }
</style>
</body>
</html>