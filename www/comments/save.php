<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';

$sql = "insert into comments(post_id,user_id,title,body,create_at) values(:post_id,:user_id,:title, :body, :create_at);" ;	
$query = $db->prepare($sql);
$query->bindParam(':post_id',$_POST['post_id'],PDO::PARAM_INT);
$query->bindParam(':user_id',$_POST['user_id'],PDO::PARAM_STR);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':create_at',$_POST['create_at'],PDO::PARAM_STR);

if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../category/commodity.php?id=" . $_POST['post_id']);
};
?>