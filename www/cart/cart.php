<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>购物车</title>
</head>

<body>
<?php 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/session.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';

  if(!is_login()){
      set_notice('必须登录后方可使用本功能');
      redirect_to('../sessions/new.php');
  }
?>
  <table border=1>
    <caption><h1>购物车</h1></caption>
    <thead>
      <tr>
        <th>名称</th>
        <th>单价/元</th>
        <th>数量</th>
        <th>合计/元</th>
        <th>下单时间</th> 
        <th>操作</th>       
      </tr>
    </thead>
   <?php 
        require_once '../inc/db.php';
        require_once '../inc/session.php';
        $sum='0';
        $query = $db->query('select * from cart where user_id = ' . $_SESSION['userid']) ;
        while ( $post =  $query->fetchObject() ) {
        
      ?>
          <tr>
            <td><?php echo $post->cname; ?></td>
            <td><?php echo $post->price; ?></td>
            <td><?php echo $post->num; ?></td>
            <td><?php echo $post->total; ?></td>    
            <td><?php echo $post->creat_at; ?></td>
            <td><a href="delete.php?id=<?php echo $post->id; ?>">删除</td>    
          </tr> 

      <?php 
        $sum=$sum+$post->total;
      } ?>
  </table>
  <?php echo "合计" . $sum . "元"; ?>
  <br>
  <form action="balance.php" method="post">
    <input type="hidden" name="sum" value="<?php echo $sum ?>">
    <input type="submit" name="结算">
  </form>
  <br>
  <a href="../index.php">返回首页</a>
</body>
</html>