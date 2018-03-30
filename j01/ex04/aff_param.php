#!/usr/bin/php
<?php
foreach($argv as $key => $value)
{
	if ($key < 1) continue;
	else
		echo "$value\n";
}
?>