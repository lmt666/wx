<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';

$hash= password_hash($_POST['password'],PASSWORD_DEFAULT);

$query = $db->query('select name from users');
while($post=$query->fetchObject()){
	$n=$post->name;
	if($_POST['name']==$n){
		redirect_to('123.php');
	}
}
$sql = "insert into users(name,password) values(:name, :password);" ;	
$query = $db->prepare($sql);
$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
$query->bindParam(':password',$hash,PDO::PARAM_STR);
if(!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../sessions/new.php");
};
?>