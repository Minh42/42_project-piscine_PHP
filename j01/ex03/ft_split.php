<?php 
function ft_split($my_string)
{
    $my_array = array_filter(explode(' ', $my_string));
    sort($my_array);
    return ($my_array);
}
?>
