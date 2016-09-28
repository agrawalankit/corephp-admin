<?php
include_once "config.php"; 

if($admin_login)
{
	$aClassDb->sendUrl('home.php','You alredy login');
}

$aErrors = array();

if(isset($_POST['val']))
{
	$aVals = $_POST['val'];
	$aChkLogin = $aClassDb->checkLogin('users',$aVals['email'],$aVals['password'],1); 
	if($aChkLogin)
	{
		$_SESSION['ADMIN_LOGIN'] = true;
		$aClassDb->sendUrl('home.php','Login successfully !!');
	}
	else
	{
		$aErrors[] = 'Login failed,please try again';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Admin</title>
<link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/sb-admin-2.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Please Sign In</h3>
				</div>
				<div class="panel-body">
					<?php include_once "include/error.php";  ?>
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="val[email]" type="email" autofocus required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="val[password]" type="password" value="" required>
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">Login</button>                       
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>