<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';

$query = $db->prepare('select * from users where name = :name');
$query->bindValue(':name',$_POST['name'],PDO::PARAM_INT);
$query->execute();
$hash = $query->fetchObject()->password;  

//$hash= password_hash($_POST['password'],PASSWORD_DEFAULT);

if(password_verify($_POST['password'], $hash)){
  header('Content-Type:text/html; charset=utf-8;');
  echo "密码正确，登录成功";
  setcookie("name",$_POST['name'],time()+3600*24,'/');
  redirect_to('../login.php');
  //$_COOKIE['name']=$_POST['name']
}else{
  header('Content-Type:text/html; charset=utf-8;');
  echo "密码错误";
  
};
//redirect_to('../index.php?user=');
?>