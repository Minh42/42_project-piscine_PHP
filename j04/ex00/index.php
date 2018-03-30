<?php
session_start();
if (!empty($_GET['submit']))
{
	if (!empty($_GET['login']) && !empty($_GET['passwd']))
	{
		$_SESSION['login'] = htmlspecialchars($_GET['login']);
		$_SESSION['passwd'] = htmlspecialchars($_GET['passwd']);
	}
}	
?>

<!DOCTYPE html>
<html><body>
<form method ="get" action="index.php">
	Identifiant : <input type="text" name="login" value="<?php if(isset($_SESSION['login'])) echo $_SESSION['login']; ?>"/> 
	<br />
	Mot de passe: <input type="password" name="passwd" value="<?php if(isset($_SESSION['passwd'])) echo $_SESSION['passwd']; ?>"/>
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
