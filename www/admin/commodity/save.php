<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';

$dest_path = "/uploads/commodity-" . rand() . ".jpg";
$dest = '../..' . $dest_path;
move_uploaded_file($_FILES["pic"]["tmp_name"], $dest);

$sql = "insert into commodity(c_id,title,pic,body,price,data,stock) values(:c_id, :title, :pic, :body, :price, :data, :stock);" ;	
$query = $db->prepare($sql);
$query->bindParam(':c_id',$_POST['c_id'],PDO::PARAM_INT);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':pic',$dest,PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':price',$_POST['price'],PDO::PARAM_STR);
$query->bindParam(':data',$_POST['data'],PDO::PARAM_STR);
$query->bindParam(':stock',$_POST['stock'],PDO::PARAM_INT);

if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("commodity.php?id=" . $_POST['c_id']);
};
?>