<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>show</title>
</head>
<body>
<table border=1>
    <caption><h1></h1></caption>
    <thead>
      <tr>
        <th>类别</th>
        <th>操作</th>        
      </tr>
    </thead>
    <tbody>
<?php 
        require_once '../inc/db.php';
        $query = $db->query('select * from category where id = ' . $_GET['id']);
        while ( $post =  $query->fetchObject() ) {  
      ?>
          <h2><?php echo $post->name ?></h2>
      <?php  } ?>    
 <?php 
        require_once '../inc/db.php';
         if($_GET['id']!='0')
           $query = $db->query('select * from commodity where c_id =' . $_GET['id']);
        else
          $query = $db->query('select * from commodity');
        while ( $post =  $query->fetchObject() ) {  
      ?>
        <tr>
          <td><a href="show.php?id=<?php echo $post->id ?>"><?php echo $post->title ?></a></td>       
          <td><a href="edit.php?id=<?php print $post->id; ?>">改</a>
              <a href="delete.php?id=<?php echo $post->id ?>">删</a></td>
          <br>
        </tr>
      <?php  } ?>    
        
        
</table>
<a href="new.php?id=<?php echo $_GET['id'] ?>">新增</a>
</body>
</html>