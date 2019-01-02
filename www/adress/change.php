<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head></head>
<body>
<form action="../cart/balance.php" method="post"> 
 	<?php 
		$sql="select * from adress where user_id = :user_id";
		$query=$db->prepare($sql);
		$query->bindParam(':user_id',$_SESSION['userid'],PDO::PARAM_INT);
		$query->execute();
		while($post=$query->fetchObject()){

			?>
			<input type="radio" name="id" value="<?php echo $post->id ?>">
					<?php echo "收货人:" ?>
					<?php echo $post->name ?>
					<br>
					<?php echo "联系方式:" ?>
					<?php echo $post->phone ?>
					<br>
					<?php echo "收货地址:" ?>
					<?php echo $post->ad ?>
					<br>
					<?php echo "-------------------------------------------------" ?>		
			<br>
		<?php } ?> 
		<input type="submit" name="提交">
</form>


	 
</body>
</html>