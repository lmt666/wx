<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';
$sql = "insert into category(name) values(:name);" ;	
$query = $db->prepare($sql);
$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("./");
};
?>