<?php 
function	ft_is_sort($tab)
{
	$i = 0;
	$count = count($tab);
	$tmp = $tab;
	$sort = sort($tab);
	while ($i < $count)
	{
		if ($tmp[$i] == $tab[$i])
			$i++;
		else
		{
			return(false);
		}
	}
	return(true);
}
?>
