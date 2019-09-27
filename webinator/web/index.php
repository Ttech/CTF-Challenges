<?php
if(eregi("admin",$_GET[id])) {
  echo("<h1>AUTHENTICATION DENIED!</h1>");
  exit();
}

$_GET[id] = urldecode($_GET[id]);
if($_GET[id] == "admin")
{
  echo "<p>Access granted!</p>";
  echo "<p>Key: flag{upgradeyourphpnow} </p>";
  die("<br>");
}
?>


<br><br>
<div align="center"><p>Can you authenticate to this website?</p></div>
