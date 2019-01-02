<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<?php 

  if(is_login()) 
    $id=$_SESSION['userid'];
  else{
    set_notice('必须登录后方可使用本功能');
    redirect_to('../sessions/new.php');
   }
?>
<form action="../comments/save.php" method="post">
  <input type="hidden" name="post_id" value='<?php echo $_GET['id']; ?>'>
  <input type="hidden" name="user_id" value='<?php echo $id ?>'>
  <label for="title">标题</label>
  <input type="text" name="title" value="">
  <br/>
  <label for="body">正文</label>
  <textarea name="body"></textarea>
  <br/>
  <input type="submit" value="提交">
</form>
<a href="../category/commodity.php?id=<?php echo $_GET['id'] ?>">返回上一页</a>
<br>
<a href="../">返回首页</a>
</body>
