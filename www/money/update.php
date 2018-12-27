<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
	$sql="update users set money = money + :money where id = :id";
	$query=$db->prepare($sql);
	$query->bindParam(':id',$_SESSION['userid'],PDO::PARAM_INT);
	$query->bindParam(':money',$_POST['money'],PDO::PARAM_INT);
	if(!$query->execute()){
		print_r($query->errorInfo());
	}else{
		redirect_to('../personalinformation.php');
	}

 ?>