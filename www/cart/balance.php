<?php 
require_once '../inc/db.php';
require_once '../inc/common.php';

	$query = $db->query('select total from cart');
	$sum='0';

	while ($post=$query->fetchObject() ) {
	?>
<?php  
	$sum=$sum+$post->total;
} header("content-type:text/html;charset=utf-8");
  echo "总计" . $sum . "元，是否提交？"
 ?>
  <form action="../order/save.php">
	<input type="submit" value="提交">
  </form> 
