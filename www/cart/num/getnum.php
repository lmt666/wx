<?php
 require_once '../../inc/common.php';
 require_once '../../inc/db.php';
$sql="select * from cart where id = :id";
$query=$db->prepare($sql);
$query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
$query->execute();
$post=$query->fetchObject();
$num=$post->num;
$co_id=$post->co_id;
if(!$query->execute()){
	print_r($query->errorInfo());
}else{
	redirect_to("return_stock.php?num={$num}&co_id={$co_id}&id=" . $_POST['id']);
};
?>

