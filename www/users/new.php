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
	<div class="row clearfix">
		<div class="col-md-12 column">
		<h1> 注册新用户 </h1>
			<form action="save.php" role="form" method="post">
				<div class="form-group">
					 <label for="name">Nickname</label><input type="text" name="name" class="form-control" />
				</div>
				<div class="form-group">
					 <label for="password">Password</label><input type="password" name="password" class="form-control" />
				</div>
				<div>
					<label for="captcha">验证码</label><input type="varchar" name="captcha" class="form-control"><img src="captcha.php" alt="">
				</div>
                     <button type="submit" class="btn btn-default">注册</button>
			</form>
		</div>
	</div>
</div> 

<style>
  .row{
  	width:400px;margin:120px auto;
  }
</style>


</body>
</html>

