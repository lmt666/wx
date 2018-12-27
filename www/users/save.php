<?php
require_once '../inc/session.php';
require_once '../inc/db.php';
require_once '../inc/common.php';

$name = trim($_POST['name']);
	if(load_user($name)){		
		set_notice('用户名已存在！');
		redirect_back();
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
	




