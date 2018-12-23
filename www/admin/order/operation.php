<?php 
require_once '../inc/common.php';
require_once '../inc/db.php';
$id=$_GET['id'];
$status='已发货';
$sql='update orders set status = :status where id = :id';
$query=$db->prepare($sql);
$query->bindValue('status',$status,PDO::PARAM_STR);
$query->bindValue(':id',$id,PDO::PARAM_INT);
$q=$db->prepare('inert into orders_ad_histories(user_name,name,price,num,total) values(:user_name,:name,:price,:num,:total');

if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};
 ?>