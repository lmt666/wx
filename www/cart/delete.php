<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>delete</title>
</head>
<body>	
	<?php $id = $_GET['id']; ?>
	<form action="destroy.php" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		是否删除?
		<input type="submit" value="确定">
	</form>	
	<form action="cart.php" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		<input type="submit" value="取消">
	</form>	
</body>
</html>