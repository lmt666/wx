<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<title>结算</title>
</head>
<body>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/session.php';

	$query=$db->query('select * from users where id = ' . $_SESSION['userid']);
	$post=$query->fetchObject();
	if(@$_POST['sum']>$post->money){
		redirect_to('warning.php');
	}else{
?>

<?php 

	$sql="update users set money = money - :money where id = :id";
	$query=$db->prepare($sql);
	$query->bindParam(':id',$_SESSION['userid'],PDO::PARAM_INT);
	$query->bindParam(':money',$_POST['sum'],PDO::PARAM_INT);
	if(!$query->execute()){
		print_r($query->errorInfo());
	}
}
?>

<?php 
if(!@$_POST['id']){
	$query=$db->query('select * from adress where def = 1 and user_id = ' . $_SESSION['userid']);
}else{
	$query=$db->query('select * from adress where id = ' . $_POST['id']);
};
	
	$post=$query->fetchObject();
	if($post){
	  ?>
	<?php echo "收货人:" ?>
	<?php echo $post->name ?>
	<br>
	<?php echo "联系方式:" ?>
	<?php echo $post->phone ?>
	<br>
	<?php echo "地址:" ?>
	<?php echo $post->ad ?>
	<br>
	
	<?php } ?>
	<a href="../adress/change.php">更改</a>
	<br>
	<a href="../adress/new.php">新增</a>
	<br>
	<?php echo "********************************************************************************" ?>
	<br>
	<?php 
		$q=$db->query('select * from cart where user_id = ' . $_SESSION['userid']);
		while($p=$q->fetchObject()){
			?>
				<?php echo "名称:" ?>
				<?php echo $p->cname ?>
				<br>
				<?php echo "单价:" ?>
				<?php echo $p->price ?>
				<br>	
				<?php echo "数量:" ?>
				<?php echo $p->num ?>
				<br>
				<?php echo "合计:" ?>
				<?php echo $p->total ?>
				<br>
				<?php echo "------------------------------------------------------------------------------------" ?>
				<br>
			</ul>
		<?php } ?>
  <form action="../order/save.php" method="post">
	<input type="hidden" name="a_id" value="<?php echo $post->id ?>">
	<input type="submit" value="提交">
  </form> 
</body>
</html>
