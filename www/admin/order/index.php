<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>订单</title>
</head>

<body>
  <table border=1>
    <caption><h1>订单</h1></caption>
    <thead>
      <tr>
        <th>名称</th>
        <th>单价/元</th>
        <th>数量</th>
        <th>合计/元</th>
        <th>下单时间</th>
        <th>发货状态</th> 
        <th>操作</th>     
      </tr>
    </thead>
      <?php 
        require_once '../inc/db.php';
        require_once '../inc/common.php';
        $query = $db->query('select * from orders');
        while ($post= $query->fetchObject() ) {         
      ?>
          <tr>
            <td><?php echo $post->name; ?></td>
            <td><?php echo $post->price; ?></td>
            <td><?php echo $post->num; ?></td>
            <td><?php echo $post->total; ?></td>    
            <td><?php echo $post->creat_at; ?></td>
            <td><?php echo $post->status ?></td>
            <td><a href="operation.php?id=<?php echo $post->id ?>">发货</a></td>
          </tr> 
      <?php } ?>
  </table>
  <br>
  <a href="../index.php">返回首页</a>
</body>
</html>