<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<?php 
  require_once '../inc/session.php';
  require_once '../inc/db.php';

  if(is_login()) 
    $name=current_user()->name;
  else{
    set_notice('必须登录后方可使用本功能');
    redirect_to('../sessions/new.php');
   }
?>
<form action="../comments/save.php" method="post">
  <input type="hidden" name="post_id" value='<?php echo $_GET['id']; ?>'>
  <input type="hidden" name="user_name" value='<?php echo $name ?>'>
  <label for="title">标题</label>
  <input type="text" name="title" value="">
  <br/>
  <label for="body">正文</label>
  <textarea name="body"></textarea>
  <br/>
  <input type="submit" value="提交">
</form>
</body>
