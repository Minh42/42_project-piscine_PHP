s_numeric($nb1) == FALSE || is_numeric($nb2) == FALSE)
+  10     {
+   9         echo "Incorrect Parameters\n";
+   8         return;
+   7     }
    6     if ($sign == '+')
        5         $result = $nb1 + $nb2;
            4     elseif ($sign == '-')
                3         $result = $nb1 - $nb2;
                    2     elseif ($sign == '*')
                        1         $result = $nb1 * $nb2;
                          24      elseif ($sign == '/')
                              1         $result = $nb1 / $nb2;
                                  2     elseif ($sign == '%')
                                      3         $result = $nb1 % $nb2;
                                          4     else
                                              ~   5         echo "Incorrect Parameters\n";
~   6     echo $result;
+   7     echo "\n";#!/usr/bin/php
<?PHP
if ($argc != 4)
	echo "Incorrect Parameters\n";
else
{
    $nb1 = trim($argv[1]);
    $nb1 = str_replace(' ', '', $nb1);
    $sign = trim($argv[2]);
    $sign = str_replace(' ', '', $sign);
    $nb2 = trim($argv[3]);
    $nb2 = str_replace(' ', '', $nb2);
    if (is_numeric($nb1) == FALSE || is_numeric($nb2) == FALSE)
    {
        echo "Incorrect Parameters\n";
        return;
    }
	if ($sign == '+')
		$result = $nb1 + $nb2;
	elseif ($sign == '-')
		$result = $nb1 - $nb2;
	elseif ($sign == '*')
		$result = $nb1 * $nb2;
	elseif ($sign == '/')
		$result = $nb1 / $nb2;
	elseif ($sign == '%')
		$result = $nb1 % $nb2;
	else
		echo "Incorrect Parameters\n";
    echo $result;
    echo "\n";
}
?>
