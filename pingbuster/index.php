<?php
set_time_limit(30);
// halp 5 me 
	$debug = 1;

	function flag(){
		// FLAG 1
		echo "flag{sanitization5good4me}";
	}

	function debug(){
		echo "<!-- \n\nREQUEST\n\n";
		var_dump($_REQUEST);
		echo "\n\n SERVER\n\n";
		var_dump($_SERVER);
		echo "\n\n-->";
	}

	function me(){
		return basename(__FILE__);
	}
?>
<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN"> 
<html> 
	<head> 
		<title>WWW.Nyet</title> 
	</head> 
	<body bgcolor="#FFFFFF" text="#000000">
		<div align="center">
			<?php 
				if(mt_rand(0,1) == 0){ 
			?>
					<img src="internet.jpg" height=385" width="365" alt="The Internet"/>
			<?php }  else { ?>
					<img src="http://i.imgur.com/oNTlHKL.gif" alt="lol"/>
			<?php } ?>
			<!--интернет--><br><br><br>
			<p> Welcome to my site! I made this super cool page so you can test if a site is working or not! Really cool right?!</p>
			<br><br>
			<p><b>Your IP is: <?php echo $_SERVER['REMOTE_ADDR']; ?></b></p>
			<br/>
			<div id="pingdiv">
				<form method="post" id="ping" action="<?php echo me(); ?>">
					<input type="hidden" name="command" value="ping"/>
					<p>Ping an IP or Host:&nbsp;&nbsp; <input type="text" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>"></input></p>
					<p><input type="submit" name="submit" value="Ping!"></input></p>
				</form>
			</div>
			<div id="traceroutediv">
				<form method="post" id="traceroute" action="<?php echo me(); ?>">
					<input type="hidden" name="command" value="traceroute"/>
					<p>Traceroute an IP or Host:&nbsp;&nbsp; <input type="text" name="ip"></input></p>
					<p><input type="submit" name="submit" value="Trace!"></input></p>
				</form>
			</div><br/><br/><br/><hr>
			<div id="output">
			<?php if(isset($debug)) { debug(); } ?>
			<textarea rows="8" cols="80" disabled="readonly">
<?php
	if(isset($_REQUEST['ip'])){
		if(stristr($_REQUEST['command'],'&') || stristr($_REQUEST['command'],'|') || stristr($_REQUEST['command'],'`')){
			die("not so fast");
		}
		if(stristr($_REQUEST['ip'],'&') || stristr($_REQUEST['ip'],'|')){
			die("not so fast");
		}
		if($_REQUEST['command'] == 'ping'){
			system($_REQUEST['command'] . " -c 4 -w 5 " . $_REQUEST['ip']);
		} else {
			passthru($_REQUEST['command'] . " " . $_REQUEST['ip']);
		}
	}
?>
				</textarea>
			</div><br />
		</div>
	</body>
</html>
