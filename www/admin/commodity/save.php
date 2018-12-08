<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';

$dest_path = "/uploads/commodity-" . rand() . ".jpg";
$dest = $_SERVER["DOCUMENT_ROOT"] . $dest_path;
move_uploaded_file($_FILES["pic"]["tmp_name"], $dest);

$sql = "insert into commodity(c_id,title,pic,body,price,data) values(:c_id, :title, :pic, :body, :price, :data);" ;	
$query = $db->prepare($sql);
$query->bindParam(':c_id',$_POST['c_id'],PDO::PARAM_INT);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':pic',$dest,PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':price',$_POST['price'],PDO::PARAM_STR);
$query->bindParam(':data',$_POST['data'],PDO::PARAM_STR);

if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../category");
};
?>