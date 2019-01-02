<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';

	if($_POST['def']=='1'){
		$q=$db->prepare('update adress set def = :def');
		$q->bindValue('def','0',PDO::PARAM_INT);
		if(!$q->execute()){
		  print_r($q->errorInfo());
	    }
    
		$sql="update adress set name=:name,phone=:phone,ad=:ad,def=:def where id = :id";
		$query=$db->prepare($sql);
		$query->bindParam(':id',$_POST['id'],PDO::PARAM_INT);
		$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
		$query->bindParam(':phone',$_POST['phone'],PDO::PARAM_STR);
		$query->bindParam(':ad',$_POST['ad'],PDO::PARAM_STR);
		$query->bindParam(':def',$_POST['def'],PDO::PARAM_INT);
		
		if(!$query->execute()){
			print_r($query->errorInfo());
		}else{
			redirect_to('./');
		}

	}else{
		$sql="update adress set name=:name,phone=:phone,ad=:ad where id = :id";
		$query=$db->prepare($sql);
		$query->bindParam(':id',$_POST['id'],PDO::PARAM_INT);
		$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
		$query->bindParam(':phone',$_POST['phone'],PDO::PARAM_STR);
		$query->bindParam(':ad',$_POST['ad'],PDO::PARAM_STR);
		
		if(!$query->execute()){
			print_r($query->errorInfo());
		}else{
			redirect_to('./');
		}
	}

 ?>