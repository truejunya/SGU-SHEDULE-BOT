<?php
ini_set('display_errors','Off');
include("inc/head.php");
if  (isset ($_GET["name"]))   {


$link = 'https://www.sgu.ru/schedule/'.$_GET["name"];

if (substr($link, -1) == '*')
{
$link = substr($link, 0, -1);
$text = file_get_contents($link);	
preg_match ('/<table id=(?!.*<table).*xls/s', $text, $regs);  	
}
else{
	$text = file_get_contents($link);	
preg_match ('#<table id[^>]*>.*</table[^>]*>#isU', $text, $regs);
}
echo ('<table style="background-color:white;"><tr></tr><tr><td><div id="target">'.$regs[0].'</div></td></tr></table>');
}
else{ 
	echo "Ты пидор!";
}
?> 