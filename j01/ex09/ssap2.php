#!/usr/bin/php
<?php
    function ft_tolower($char)
    {
        if (ord($char) >= 65 && ord($char) <= 90)
            return (ord($char) + 32);
        return (ord($char));
    }
    function ft_convert($char)
    {
        if (ft_tolower($char) >= ord('a') && ft_tolower($char) <= ord('z'))
            return (ft_tolower($char)); 
        else if (ord($char) >= ord('0') && ord($char) <= ord('9'))
            return (ord($char) + 100);
        else
            return (ord($char) + 1000);
    }
    function cmp($str, $str2)
    {
        $i = 0;
        $len = strlen($str);
        while ($i < $len)
        {
            if (ft_tolower($str[$i]) != ft_tolower($str2[$i]))
                return (ft_convert($str[$i]) - ft_convert($str2[$i]));
            $i++;
        }
        return (0);
    }

    $result = array();
    foreach($argv as $key => $value)
    {
        if ($key < 1) continue;
        else
        {
            $array = split(" ", $value);
            $result = array_merge($result, $array);
            uasort($result, 'cmp');
        }
    }
    foreach($result as $key => $value)
    {
        echo "$value\n";
    }
?>
