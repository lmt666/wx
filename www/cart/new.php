<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>加入购物车</title>
</head>
<body>
<?php 

  if(!is_login()){
  ?>
    <script>
      alert('你还未登陆!');
      window.location = "../sessions/new.php";
    </script>
<?php }
		$id = $_GET['id'];
    $query = $db->prepare('select * from commodity where id = :id');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();	
 ?>

<form action="save.php" method="post">
	<input type="hidden" name="id" value="<?php echo $post->id ?>">
	<label for="title">请输入商品数量</label>
	<input type="number" min="1" name="num" value="1" />
	<input type="hidden" name="cname" value="<?php echo $post->title; ?>" />
	<input type="hidden" name="price" value="<?php echo $post->price; ?>" />
	<input type="hidden" name="id" value="<?php echo $post->id ?>">

	<br/>
	<input type="submit" value="提交" />
</form>

</body>
</html>