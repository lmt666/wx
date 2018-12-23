<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';
$id = $_POST['id'];
$sql = "update commodity set title = :title, body = :body, price = :price, data = :data, stock = :stock where id = :id;" ;	
$query = $db->prepare($sql);
$query->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindValue(':price',$_POST['price'],PDO::PARAM_STR);
$query->bindValue(':data',$_POST['data'],PDO::PARAM_STR);
$query->bindValue(':stock',$_POST['stock',PDO::PARAM_INT]);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../category");
};
?>