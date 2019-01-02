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

if( login($_POST['name'] , $_POST['password']) ){
	redirect_to('/');	
}else{		
 ?> 
 <script>
   alert('用户名或密码错误!');
   window.history.back(-1);
 </script>
<?php } ?>
</body>
</html>



	




