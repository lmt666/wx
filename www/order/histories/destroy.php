<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../../vendor/autoload.php';

$sql="delete from orders_histories where id = :id";
$query=$db->prepare($sql);
$query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
if(!$query->execute()){
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};

 ?>