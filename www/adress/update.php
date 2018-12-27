<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';

	$sql="update adress set name=:name,phone=:phone,ad=:ad";
	$query=$db->prepare($sql);
	$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
	$query->bindParam(':phone',$_POST['phone'],PDO::PARAM_STR);
	$query->bindParam(':ad',$_POST['ad'],PDO::PARAM_STR);
	
	if(!$query->execute()){
		print_r($query->errorInfo());
	}else{
		redirect_to('./');
	}

 ?>