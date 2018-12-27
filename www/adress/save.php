<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
$sql='insert into adress(user_id,name,phone,ad,def) values(:user_id,:name,:phone,:ad,:def)';
$query=$db->prepare($sql);
$query->bindParam(':user_id',$_POST['user_id'],PDO::PARAM_INT);
$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
$query->bindParam(':phone',$_POST['phone'],PDO::PARAM_STR);
$query->bindParam(':ad',$_POST['ad'],PDO::PARAM_STR);
$query->bindParam(':def',$_POST['def'],PDO::PARAM_INT);
if(!$query->execute()){
	print_r($query->errorInfo());
}else{
	redirect_to('./');
}
 ?>