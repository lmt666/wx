<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
$sql="delete from orders_ad_histories where oid = :id";
$query=$db->prepare($sql);
$query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
if(!$query->execute()){
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};

 ?>