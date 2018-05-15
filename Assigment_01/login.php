<!-- client side code -->
<!doctype html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Assigment_01</title>

    <link rel="stylesheet"  href="/Assigment_01/public/css/bootstrap.min.css">
    <script src="/Assigment_01/public/js/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Assignment 01</a>
      <ul class="nav justify-content-end">
      </ul>
    </nav>
    <div class="container">
      <div class="row" align="center" style="padding-top: 100px;">
        <div class="col-12">
          <div class="card">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <form action='login.php' method='POST' enctype='multipart/form-data'>       
                    <div class="form-group row">
                      <label for="Email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Login</button>
                  </form>
                </div>
                <div class="col-sm-2"></div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script src="/Assigment_01/public/js/bootstrap.min.js"></script>
    <script src="/Assigment_01/public/js/popper.min.js"></script>
  </body>
</html>
<!-- server side code -->
<?php
	//chech whether login button is pressed
  if(isset($_POST['submit']))
  {
    //if pressed run login function
		login();
	}
?>
<?php
	function login()
	{
    //hardcoded email and password
    //recomended to use database to store credentials
		$email='shadow@gmail.com';
		$password='shadow';

		$input_email = $_POST['email'];
		$input_pwd = $_POST['password'];
    //check whether credentials match with the hardcoded credentials
		if(($input_email == $email)&&($input_pwd == $password))
		{
      //start the session
			session_set_cookie_params(300);
			session_start();
			session_regenerate_id();
			//create the session cookie
			setcookie('session_cookie', session_id(), time() + 300, '/');
      //store session CSRF token in the memory
			$_SESSION['CSRF_Token'] = generate_token();
      //redirect to the profile.php
			header("Location:profile.php");
   		exit;
		}
		else
		{
      //if credentials doesn't match display below error message
			echo "<script>alert('email or password is incorrect!')</script>";
		}
	}
	
  function generate_token()
	{
    //generate session CSRF token and return it
	  return sha1(base64_encode(openssl_random_pseudo_bytes(30)));
	}
?>
