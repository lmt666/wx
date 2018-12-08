<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>加入购物车</title>
</head>
<body>
<?php
		require_once '../inc/db.php';
		$id = $_GET['id'];
    $query = $db->prepare('select * from details where id = :id');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();	

   
 ?>

<form action="save.php" method="post">
	<label for="title">请输入商品数量</label>
	<input type="number" min="1" name="num" value="1" />
	<label for="title"></label>	
	<input type="hidden" name="name" value="<?php echo $post->title; ?>" />
	<label for="title"></label>	
	<input type="hidden" name="price" value="<?php echo $post->price; ?>" />

	<br/>
	<input type="submit" value="提交" />

</form>

</body>
</html>