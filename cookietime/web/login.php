<?php
	$key = "dd02c7c2232759874e1c205587017bed";
	$flag = "flag{wantmorecookie}";
	// get data
	$data = $_REQUEST;

	session_start();
	$sid = session_id();
	if($_SESSION['cookieset']==0){
		setcookie("llin_authentication","0");
		$_SESSION['cookieset']=1;
	}
	// values
	$password = $data['password'];
	$token = $data['authkey'];
	// result goes in this
	$result = array(
		'success' => 0,
		'content' => null
	);
	if ((intval($_COOKIE["llin_authentication"])==1) || (strcmp($password,$key) == 0)){
		$result['success']=1;
		setcookie("llin_authentication","1");
		$info = '<span class="glyphicon glyphicon-ok"></span>';
		$content = '<div class="alert alert-info"><strong>Message Decoded! </strong>&nbsp;&nbsp;<i>Message:</i> '.$flag.'</div>';
		$result['content']=$content;
		$result['icon']=$info;
	}	
	echo json_encode($result);
?>
