<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
	<?php
		require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
		$id = $_GET['id'];
    $query = $db->prepare('select * from commodity where id = :id');
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
		<label for="stock">stock</label>
		<input type="number" min="0" name="stock" value="<?php echo $post->stock ?>">
		<br>
		<input type="submit" value="提交" />
	</form>
</body>
</html>