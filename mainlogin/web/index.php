
<!DOCTYPE html>
<html>
	<head>
    		<meta charset="UTF-8">
    		<title>Admin Page</title>
    		<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>    
    		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
<?php
	$db = new SQLite3('master.sdb');
	if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$query = "SELECT isadmin FROM users WHERE username = '" . $username . "' AND password = '" . $password. "';";
		$result = $db->query($query);
		while($r = $result->fetchArray()) {
			if($r['isadmin'] == 1){
				$admin=1;
				echo "flag{ieatcake}";
				var_dump($r);
			}
		}
		if($r['isadmin'] != 1){
			echo '<div align="center"><p>Error! Valid Username and Password Needed</p></div>';
		}	
	}
	
?>
		<section class="login-form-wrap">
			<h1>Authenticate to Continue</h1>
				<form class="login-form" method="post" action="index.php">
					<label>
						<input type="text" name="username" required placeholder="Username">
					</label>
					<label>
						<input type="password" name="password" required placeholder="Password">
					</label>
					<input type="submit" value="Login">
					<input type="hidden" name="reset" value="false">
				</form>
			<h5><a href="#" onsubmit="document.getElementById('reset').value = 'My value'; javascript:document.getElementById('login-form').submit();">Forgot password</a></h5>	
		</section>
	</body>
</html>
