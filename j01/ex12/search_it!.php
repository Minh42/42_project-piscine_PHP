#!/usr/bin/php
<?PHP
$keys = array();
$values = array();
foreach($argv as $key => $value)
{
	if ($key < 2) continue;
	else
	{
		$tmp = explode(":", $value);
		array_push($keys, $tmp[0]);
		array_push($values, $tmp[1]);
	}
}

$result = array();
foreach($keys as $i => $v)
{
	$result[$v] = $values[$i];
}
echo $result[$argv[1]];
echo "\n";
?>
