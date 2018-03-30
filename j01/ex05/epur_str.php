#!/usr/bin/php
<?php 
if ($argc != 2)
	exit;
else
{
	$i = 0;
	$j = 0;
	$bool = 0;
	$my_string = trim($argv[1]);
	while ($my_string[$i] != NULL)
	{
		$result[$j] = $my_string[$i];
		$i++;
		$j++;
		while ($my_string[$i] == " ")
		{
			$bool = 1;
			$i++;
		}
		if ($bool == 1 && $my_string[$i + 1] != NULL)
		{
			$result[$j] = ' ';
			$j++;
			$bool = 0;
		}
	}
}
$result = implode('', $result);
echo $result;
?>

