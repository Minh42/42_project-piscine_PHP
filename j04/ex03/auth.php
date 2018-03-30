<?php
session_start();
function auth($login, $passwd)
{
	$array_unser = unserialize(file_get_contents('../htdocs/private/passwd', FILE_USE_INCLUDE_PATH));
	foreach ($array_unser as $account)
	{
		if ($account['login'] == $login && $account['passwd'] == (hash("whirlpool",$passwd)))
		{
			return TRUE;
		}
	}
	return FALSE;
}
?>
