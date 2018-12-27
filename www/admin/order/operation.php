<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head></head>
<body>
	<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/session.php';
	$id=$_GET['id'];
	$status="已发货";
		$sql="update orders set status = :status where oid = :oid";
		$query=$db->prepare($sql);	
		$query->bindParam(':oid',$id,PDO::PARAM_INT);
		$query->bindParam(':status',$status,PDO::PARAM_STR);
	if(!$query->execute()){
		print_r($query->errorInfo());
	}else{
		redirect_to("./");
	};
 	?>
</body>
</html>
