<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>   	

<div class="container">
    <div class="form row">
        <div class="form-horizontal col-md-offset-3" id="login_form">
            <h3 class="form-title">LOGIN</h3>
            <form action="save.php" method="post">
                <div class="col-md-9">
                    <div class="form-group">
                        <i class="fa fa-user fa-lg"><img src="../img/user.png" alt=""></i>                     
                        <input class="form-control required" type="text" placeholder="Nickname" id="username" name="name" autofocus="autofocus"   maxlength="20"/>
                    </div>
                    <div class="form-group">
                         <i class="fa fa-lock fa-lg"><img src="../img/password.jpg" style="height: 18px;width: 14px;" alt=""></i>
                         <input class="form-control required" type="password" placeholder="Password" id="password" name="password" maxlength="20"/>
                    </div>
                    <div class="form-group col-md-offset-9">
                      <button type="submit" class="btn btn-success pull-left" name="submit">登录</button>
                    </div>                    
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body{
        background: url("../img/background1.jpg");
        background-size:cover; 
    }

    .form{background: rgba(255,255,255,0.2);width:400px;margin:120px auto;}
    .fa{display: inline-block;top: 27px;left: 6px;position: relative;color: #ccc;}
    input[type="text"],input[type="password"]{padding-left:26px;}
</style>

</body>
</html>

