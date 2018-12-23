<?php
 require_once '../../inc/common.php';
 require_once '../../inc/db.php';
 require_once '../../inc/session.php';
$sql = "delete from cart where user_id = :user_id";
$query = $db->prepare($sql);
$query->bindValue(':user_id',$_SESSION['userid'] ,PDO::PARAM_INT);
if (!$query->execute()) {
	print_r($query->errorInfo());
}else{
	redirect_to("../../order");
};
?>