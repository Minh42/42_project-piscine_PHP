<?php
if ($_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "")
{
	if ($_POST['submit'] == "OK")
	{
		$oldpw = hash('whirlpool', htmlspecialchars($_POST['oldpw']));
		$newpw = hash('whirlpool', htmlspecialchars($_POST['newpw']));	
		$data = unserialize(file_get_contents("../htdocs/private/passwd", FILE_USE_INCLUDE_PATH));
		$i = 0;
		foreach ($data as $account)
		{	
			if ($account['login'] === $_POST['login'] && $account['passwd'] === $oldpw)
			{
				$data[$i]['passwd'] = $newpw;
				$modif = 1;
			}
			$i++;
		}
		if ($modif == 1)
		{
			file_put_contents("../htdocs/private/passwd", serialize($data));
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";

?>
