<?php
// hmm, want a flag? ? ?  flag{iknowhowtoreadsource}
// note remove:  FOR PRODUCTION REMOVE SRSLY DONT FORGET...
// flag in ../flag01.php
// flag in /flag02.php 
// flag in /etc/flag.txt
// cat /etc/shadow, 4 users. what are those 4 users?

// challenge 2  (have document path, first has no path, just request file)
// borrowed from CSAW Quals
function clean($v) {
     $v=str_replace("\0", "", $v);
     $o=$v;
     do {
        $v=preg_replace("|/\.*/|", "/", $v);
        $v=preg_replace("|^/|", "", $v);
     } while($o!=$v && $o=$v);
     return $v;
}
echo "<p> The flag around the file system in etc/</p>";
if(!isset($_REQUEST['file'])){
	echo "<ul>\n";
	foreach(glob("*.*") as $file){
		$fn = basename(__FILE__);
		echo "<li><a href=\"$fn?file=$file\">$file</a></li>\n";
	}
	echo "</ul>\n";
} else {
	if(stristr(__FILE__,$_REQUEST['file'])){
		die("DONT HACK!");
	} else {
		$file = clean($_REQUEST['file']);
	}
	header("Pragma: public");
	//header("Content-Type: application/force-download");
	//header( "Content-Disposition: attachment; filename=".basename($file));
	echo file_get_contents($file);
	die();
}
