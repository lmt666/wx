<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';
$sql = "insert into cart(name,price,num,total) values(:name,:price,:num,:total);" ;  
$query = $db->prepare($sql);
$total=$_POST['price'] * $_POST['num'];
$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
$query->bindParam(':price',$_POST['price'],PDO::PARAM_INT);
$query->bindParam(':num',$_POST['num'],PDO::PARAM_INT);
$query->bindParam(':total',$total,PDO::PARAM_INT);


if (!$query->execute()) { 
  print_r($query->errorInfo());
}else{
  redirect_to("cart.php");
};
?>