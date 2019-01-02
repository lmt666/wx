<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head></head>
<body>	
<?php

$name = trim($_POST['name']);
	if(load_user($name)){
    ?> 
	  <script>
	    alert('用户名已存在！');
	    window.history.back(-1);
	  </script>
	<?php 				
	}else{
		$pwd = encrypt_password($_POST['password']); 

		$sql = "insert into users(nickname,password) values(:nickname, :password);" ;	
		$query = $db->prepare($sql);
		$query->bindParam(':nickname',$name,PDO::PARAM_STR);
		$query->bindParam(':password',$pwd,PDO::PARAM_STR);
				
		if (!$query->execute()) {	
			print_r($query->errorInfo());
		}else{
			redirect_to("../sessions/new.php");
		};
	}

?> 
</body>
</html>
	




