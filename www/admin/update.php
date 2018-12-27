<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
$id = $_POST['id'];
$sql = "update details set title = :title, jj = :jj, body = :body, price = :price, data = :data where id = :id;" ;	
$query = $db->prepare($sql);
$query->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindValue(':jj',$_POST['jj'],PDO::PARAM_STR);
$query->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindValue(':price',$_POST['price'],PDO::PARAM_STR);
$query->bindValue(':data',$_POST['data'],PDO::PARAM_STR);


echo $query->bindValue(':id',$id,PDO::PARAM_INT);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("details.php?id={$id}");
};
?>