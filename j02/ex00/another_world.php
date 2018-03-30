#!/usr/bin/php
<?php 
if ($argc != 2)
	exit;
else
{
	$my_string = trim($argv[1]);
	$my_string= preg_replace("#\s{2,}#", ' ', $my_string);
}
echo $my_string;
?>