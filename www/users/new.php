<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户</title>
</head>
<body>   	
	<h1> 注册新用户 </h1>
	<div id="notice"  style="background-color:yellow;">
 		<?php if(isset($_GET['notice'])) echo $_GET['notice']; ?>
 	</div>

	<form action="save.php" method="post">
	   name<input type="text" name="name" />
	   <br/>
	   password<input type="password" name="password" />
	   <input type="submit" value="注册"/>
	</form>

</body>
</html>

