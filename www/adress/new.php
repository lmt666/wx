<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<title>new</title>
</head>
<body>
<form action="save.php" method="post">
<input type="hidden" name="user_id" value="$_SESSION['userid']">
<label for="name">name</label>
<input type="text" name="name" value="">
<br>
<label for="phone">phone</label>
<input type="text" name="phone" value="">
<br>
<label for="ad">adress</label>
<textarea name="ad"></textarea>
<br>
<label for="def">设置默认</label>
<input type="checkbox" name="def" value=1>
<br>
<input type="submit" value="提交">

</form>	


</body>
</html>