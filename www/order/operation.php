<?php 
require_once '../inc/common.php';
require_once '../inc/db.php';
require_once '../inc/session.php';
	$id=$_GET['id'];
	$query=$db->query('select * from orders where oid = ' . $id);
	$post=$query->fetchObject();
	$sql="insert into orders_histories(user_id,cname,price,num,total,creat_at) values(:user_id,:cname,:price,:num,:total,:creat_at)";
	$query=$db->prepare($sql);	
	$query->bindParam(':user_id',$_SESSION['userid'],PDO::PARAM_INT);
	$query->bindParam(':cname',$post->cname,PDO::PARAM_STR);
	$query->bindParam(':price',$post->price,PDO::PARAM_INT);
	$query->bindParam(':num',$post->num,PDO::PARAM_INT);
	$query->bindParam(':total',$post->total,PDO::PARAM_INT);
	$query->bindParam(':creat_at',$post->creat_at,PDO::PARAM_STR);

	if(!$query->execute()){
		print_r($query->errorInfo());
	}
?>

<?php  
	$id=$_GET['id'];
	$query=$db->query('select * from orders where oid = ' . $id);
	$post=$query->fetchObject();
	$query=$db->prepare('insert into orders_ad_histories(user_id,cname,price,num,total,creat_at,a_id) values(:user_id,:cname,:price,:num,:total,:creat_at,:a_id)');
	$query->bindParam(':user_id',$_SESSION['userid'],PDO::PARAM_INT);	
	$query->bindParam(':cname',$post->cname,PDO::PARAM_STR);
	$query->bindParam(':price',$post->price,PDO::PARAM_INT);
	$query->bindParam(':num',$post->num,PDO::PARAM_INT);
	$query->bindParam(':total',$post->total,PDO::PARAM_INT);
	$query->bindParam(':creat_at',$post->creat_at,PDO::PARAM_STR);
	$query->bindParam(':a_id',$post->a_id,PDO::PARAM_INT);

	if(!$query->execute()){
		print_r($query->errorInfo());
	}else{
		redirect_to("destroy.php?id={$id}");
	}
?>
