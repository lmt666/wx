<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';
$id = $_POST['id'];
$sql = "update category set name = :name where id = :id;" ;	
$query = $db->prepare($sql);
$query->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};
?>