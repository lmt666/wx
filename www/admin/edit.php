<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
	<?php
		require_once './inc/db.php';
		$id = $_GET['id'];
    $query = $db->prepare('select * from details where id = :id');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();
	?>
	<h1>edit post:</h1>

	<form action="update.php" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		<label for="title">title</label>
		<input type="text" name="title" value="<?php echo $post->title ?>" />
		<br/>
		<label for="jj">jj</label>
		<textarea name="jj">
			<?php echo $post->jj; ?>
		</textarea>
		<br/>
		<label for="body">body</label>
		<textarea name="body">
			<?php echo $post->body; ?>
		</textarea>
		<br/>
		<label for="price">price</label>
		<input type="int" name="price" value="<?php echo $post->price ?>" />
		<br/>
		<label for="data">data</label>
		<textarea name="data">
			<?php echo $post->data; ?>
		</textarea>
		<br>
		<input type="submit" value="提交" />
	</form>
</body>
</html>