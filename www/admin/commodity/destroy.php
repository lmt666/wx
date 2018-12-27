<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
$q=$db->query('select * from commodity where id = ' . $_POST['id']);
$p=$q->fetchObject();
$sql = 	"delete from commodity where id = :id" ;
$query = $db->prepare($sql);
$query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
if (!$query->execute()) {
	print_r($query->errorInfo());
}else{
	redirect_to("commodity.php?id=" . $p->c_id);
};
?>