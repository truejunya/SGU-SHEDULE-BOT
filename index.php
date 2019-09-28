<?php
ini_set('display_errors','Off');
include("inc/head.php");
if  (isset ($_GET["name"]))   {


$link = 'https://www.sgu.ru/schedule/'.$_GET["name"];
$text = file_get_contents($link); 
preg_match ("#<table[^>]*>.*</table[^>]*>#isU", $text, $regs); 
echo ('<table style="background-color:white;"><tr></tr><tr><td><div id="target">'.$regs[0].'</div></td></tr></table>');
}
else{ 
	echo "Ты пидор!";
}
?> 