<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<title>delete</title>
</head>
<body>
	<form action="destroy.php" method="post">
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
		是否删除?
		<input type="submit" value="提交">
	</form>
</body>
</html>