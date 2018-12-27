<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>历史订单</title>
</head>

<body>
  <table border=1>
    <caption><h1>历史订单</h1></caption>
    <thead>
      <tr>
        <th>昵称</th>
        <th>名称</th>
        <th>单价/元</th>
        <th>数量</th>
        <th>合计/元</th>
        <th>下单时间</th>
        <th>姓名</th>
        <th>联系方式</th>
        <th>收货地址</th> 
        <th>操作</th>
      </tr>
    </thead>
      <?php 
        require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/common.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/session.php';
         $query = $db->query('select * from orders_ad_histories join users on orders_ad_histories.user_id=users.id join adress on orders_ad_histories.a_id = adress.id order by creat_at ');
        while ($post= $query->fetchObject() ) {         
      ?>
          <tr>
            <td><?php echo $post->nickname ?></td>
            <td><?php echo $post->cname; ?></td>
            <td><?php echo $post->price; ?></td>
            <td><?php echo $post->num; ?></td>
            <td><?php echo $post->total; ?></td>    
            <td><?php echo $post->creat_at; ?></td>
            <td><?php echo $post->name ?></td>
            <td><?php echo $post->phone ?></td>
            <td><?php echo $post->ad ?></td>
            <td><a href="delete.php?id=<?php echo $post->oid?>">删除历史纪录</a></td>
          </tr> 
      <?php } ?>
  </table>
  <br>
  <a href="../../">返回首页</a>
</body>
</html>