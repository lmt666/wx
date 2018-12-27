<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
$sql = 	"delete from comments where id = :id" ;
$query = $db->prepare($sql);
$query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);

$q=$db->query('select * from comments where id = ' . $_POST['id']);
$post=$q->fetchObject();
$id=$post->post_id;
if (!$query->execute()) {
	print_r($query->errorInfo());
}else{
	redirect_to('../show.php?id=' . $id);

};
?>
