<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/login.css" />
	<title>Login Page</title>
</head>
<body>

	<div class="container">
	    <div class="row">
	        <div class="col-md-6">
	            <div class="card">
	                <form class="box" method="post">
	                	@csrf
	                    <h1>Login</h1>
	                    <p class="text-muted"> Please enter your login and password!</p>
	                    <input type="text" name="email" placeholder="E-mail" id="email">
	                    <input type="password" name="password" placeholder="Password" id="password"> <a class="forgot text-muted" href="#">Forgot password?</a> <input type="submit" value="Login" id="loginButton">
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
