<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<title>new</title>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h1>新增收货地址</h1>
			<form action="save.php" role="form" method="post">
				<div class="form-group">
					<label for="name">name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="phone">phone</label>
					<input type="text" name="phone" class="form-control">
				</div>
				<div class="form-group">
					<label for="ad">adress</label>
					<textarea name="ad" class="form-control"></textarea>
				</div>
				<label for="def">设置默认</label>
				<input type="checkbox" name="def" value=1>
				<br>
				<button type="submit" class="btn btn-default">提交</button>
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