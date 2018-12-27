<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head></head>
<body>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
 ?>
	<form action="update.php" method="post">
		<label for="money">add</label>
		<input type="int" name="money" value=''>
		<input type="submit" value="提交">
	</form>
	<a href="../personalinformation.php">返回上一页</a>
	<br>
	<a href="../index.php">返回首页</a>
</body>
</html>