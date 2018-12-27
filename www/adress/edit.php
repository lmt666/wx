<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<title>edit</title>
</head>
<body>
	<?php 
		require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
		require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';

		$query=$db->prepare('select * from adress where id = :id');
		$query->bindParam(':id',$_GET['id'],PDO::PARAM_INT);
		$post=$query->fetchObject();
	 ?>
	 <form action="update.php" method="post">
		<label for="name">name</label>
		<input type="text" name="name" value="<?php echo $post->name ?>">
		<br>
		<label for="phone">phone</label>
		<input type="text" name="phone" value="<?php echo $post->phone ?>">
		<br>
		<label for="ad">adress</label>
		<textarea name="ad"><?php echo $post->ad ?></textarea>
		<br>
		<input type="submit" value="提交">
	 </form>
</body>
</html>