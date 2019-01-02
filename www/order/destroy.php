<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';

$sql = "delete from orders where oid = :oid" ;
$query = $db->prepare($sql);
$query->bindValue(':oid',$_GET['id'],PDO::PARAM_INT);
if (!$query->execute()) {
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};
?>