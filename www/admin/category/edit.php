<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
	<?php
		require_once '../inc/db.php';
		$id = $_GET['id'];
    $query = $db->prepare('select * from category where id = :id');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();
	?>
	<h1>edit post:</h1>

	<form action="update.php" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		<br/>
		<label for="name">name</label>
		<textarea name="name">
			<?php echo $post->name; ?>
		</textarea>

		<br>
		<input type="submit" value="提交" />
	</form>
</body>
</html>