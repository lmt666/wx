<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head></head>
<body>
<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';
require_once '../inc/session.php';
$s="select * from commodity where id = :id";
$query=$db->prepare($s);
$query->bindParam(':id',$_POST['id'],PDO::PARAM_INT);
$query->execute();
$post=$query->fetchObject();
$stock=$post->stock;
if($_POST['num']>$stock){
	echo "库存不足!!!";
}else{
	$sql = "insert into cart(user_id,cname,price,num,total,co_id) values(:user_id,:cname,:price,:num,:total,:co_id);" ;  
$query = $db->prepare($sql);
$total=$_POST['price'] * $_POST['num'];
$query->bindParam(':user_id',$_SESSION['userid'],PDO::PARAM_STR);
$query->bindParam(':cname',$_POST['cname'],PDO::PARAM_STR);
$query->bindParam(':price',$_POST['price'],PDO::PARAM_INT);
$query->bindParam(':num',$_POST['num'],PDO::PARAM_INT);
$query->bindParam(':total',$total,PDO::PARAM_INT);
$query->bindParam(':co_id',$_POST['id'],PDO::PARAM_INT);

if (!$query->execute()) { 
  print_r($query->errorInfo());
}else{
  redirect_to("./num/update_stock.php?num=" . $_POST['num'] . "&id=" . $_POST['id']);
};
}

?>
</body>
</html>

