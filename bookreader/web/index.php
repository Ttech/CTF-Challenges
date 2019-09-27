<?php
$flag='flag{booksholdnosecrets}';
?>
<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
<title>Book Reader</title>
<style>
html,textarea{
    font:1em/1.6 sans-serif
}
body{
    padding:0 1em
}
h1{
    text-align:center;
    font-size:1.3em;
    margin:0 0 .5em;
    padding-top:1em
}
h2{
    font-size:1em
}
a{
    text-decoration:none;
}
textarea{
    font-family:Monaco,Consolas,monospace
}
#footer{
    margin-top:2em;
    text-align:center
}
textarea{
    border:3px double;
    width:100%;
    display:block;
    margin:1em 0 .5em;
    padding:.7em;
    resize:vertical;
    min-height:9.5em
}
</style>
</head>
<body>
<div align="center">
<h1>The Classics Book Reader</h1>
<h3>Books:</h3>
<div><a href="<?php echo basename(__FILE__); ?>?book=iliad">Iliad</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo basename(__FILE__); ?>?book=treasureisland">Treasure Island</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo basename(__FILE__); ?>?book=waroftheworlds">War of the Worlds</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>
<h3>Read:</h3>
<textarea readonly style="width: 80%;"><?php 
if(!empty($_REQUEST['book'])){
		$book = $_REQUEST['book'];
		if(stristr(strval($book),'flag')){
			echo "sorry. not allowed";
		} else {
			$book="$book.txt";
			$cmd="cat $book";
			//echo $cmd;
			system($cmd);
		}
}
?></textarea>
<hr />
</div></body>
