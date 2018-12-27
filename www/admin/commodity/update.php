<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
$id = $_POST['id'];
$q=$db->query('select * from commodity where id = ' . $id);
$p=$q->fetchObject();
$sql = "update commodity set title = :title, body = :body, price = :price, data = :data, stock = :stock where id = :id;" ;	
$query = $db->prepare($sql);
$query->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindValue(':price',$_POST['price'],PDO::PARAM_STR);
$query->bindValue(':data',$_POST['data'],PDO::PARAM_STR);
$query->bindValue(':stock',$_POST['stock'],PDO::PARAM_INT);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("commodity.php?id=" . $p->c_id);
};
?>