<?php
session_start();

/* Connexion Mysql */
$link = mysqli_connect(null, $SQLlogin, $SQLpass, 'my_db', 0, '/Users/mpham/goinfre/mamp/mysql/tmp/mysql.sock');
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

/* Seletionner la base de donnees */
mysqli_select_db($link, "my_db");

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['date_naissance']) && isset($_POST['tel']) && isset($_POST['sexe'])
&& isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['code_postal']) && isset($_POST['pays']))
{
	if ($_POST['submit'] == "SAUVEGARDER")
	{
        if (preg_match("#^[A-Z][a-zàáâäçèéêëìíîïñòóôöùúûü]+([-'\s][A-Z][a-zàáâäçèéêëìíîïñòóôöùúûü]+){1,16}$#", $_POST['prenom']))
            $new_prenom = htmlspecialchars($_POST['prenom']);
        if (preg_match("#^[a-zA-Z]{3,16}$#", $_POST['nom']))
            $new_nom = htmlspecialchars($_POST['nom']);
        if (preg_match("#^[a-zA-Z0-9_]{6,16}$#", $_POST['login']))
            $new_login = htmlspecialchars($_POST['login']);


        if (preg_match("(?=^.{6,}$)((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.*", $_POST['password']))
            $new_password = htmlspecialchars($_POST['password']);
        if (preg_match('#^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$#', $_POST['email']))
            $new_email = htmlspecialchars($_POST['email']);


        if (preg_match('#^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$#', $_POST['email']))
            $new_password = htmlspecialchars($_POST['date_naissance']);




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