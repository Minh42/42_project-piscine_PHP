#!/usr/bin/php
<?php
if ($argc != 1)
    return;
while (true)
{
echo "Entrez un nombre: ";
$input = rtrim(fgets(STDIN));
if (feof(STDIN) == TRUE)
{
	echo "\n";
	return;
}
if (is_numeric($input) == False)	
	echo "'$input' n'est pas un chiffre";
else if (is_numeric($input) == TRUE)
{
	if (substr($input, -1, 1) % 2 == 0)
		echo "Le chiffre $input est Pair";
	else
		echo "Le chiffre $input est Impair";
}
echo "\n";
}
?>
