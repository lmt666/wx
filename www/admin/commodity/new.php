<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<h1>New post</h1>
 

<form action="save.php" method="post" enctype="multipart/form-data">
	<?php 
        require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
        
        $query = $db->query('select * from category');
	    @$query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
	    $query->execute();
	    $post = $query->fetchObject();      
      ?>
	<br>
	<label for="pic">pic</label>
	<input type="file" name="pic" value="" >
	<br>
	<input type="hidden" name="c_id" value='<?php echo $_GET['id'] ?>'>
	<label for="title">title</label>
	<input type="text" name="title" value="" />
	<br/>
	<label for="body">body</label>
	<textarea name="body"></textarea>
	<br/>
	<label for="price">price</label>
	<input type="int" name="price" value="" />
	<br/>
	<label for="data">data</label>
	<textarea name="data"></textarea>
	<br/>
	<label for="stock">stock</label>
	<input type="number" min="0" name="stock" value="0">
	<br>
	<input type="submit" value="提交" />
</form>

</body>
</html>