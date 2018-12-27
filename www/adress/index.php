<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<title>show</title>
</head>
<body>
	<?php 
		require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
		require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
		require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/session.php';

		$query=$db->query('select * from adress where user_id = ' . $_SESSION['userid']);
		while($post=$query->fetchObject()){
			?>
			<ul>
				<li>
					<?php echo "姓名:" ?>
					<?php echo $post->name ?>
					<br>
					<?php echo "联系方式:" ?>
					<?php echo $post->phone ?>
					<br>
					<?php echo "收货地址:" ?>
					<?php echo $post->ad ?>
					<br>
					<a href="edit.php?id=<?php echo $post->id?>">编辑</a>
					<a href="delete.php?id=<?php echo $post->id?>">删除</a>
				</li>
			</ul>
		<?php } ?>
		<a href="new.php">新增</a>
		<br>
		<a href="../personalinformation.php">返回上一页</a>
		<br>
		<a href="../index.php">返回首页</a>
</body>

</html>