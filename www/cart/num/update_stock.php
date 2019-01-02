<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../../vendor/autoload.php';

 $sql="update commodity set stock = stock - :num where id = :id;";
 $query=$db->prepare($sql);
 $query->bindParam(':num',$_GET['num'],PDO::PARAM_INT);
 $query->bindParam(':id',$_GET['id'],PDO::PARAM_INT);
 if (!$query->execute()) { 
  print_r($query->errorInfo());
}else{
  redirect_to("../cart.php");
};


 ?>