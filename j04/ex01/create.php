<?php
if($_POST['login'] != "" && $_POST['passwd'] != "")
{   
	if($_POST['submit'] == "OK")
    {
        $dir = "../htdocs/private/"; 
        if (!file_exists($dir))
        {
            mkdir("../htdocs", 0777, false);
            mkdir("../htdocs/private", 0777, false);
        }
       $file = "../htdocs/private/passwd"; 
        if (!file_exists($file))
	    {			
		    $login = htmlspecialchars($_POST['login']);
		    $passwd = hash('whirlpool', htmlspecialchars($_POST['passwd']));
		    $data = array(array('login'=>$login,'passwd'=>$passwd));
		    file_put_contents("../htdocs/private/passwd", serialize($data));
		    echo "OK\n";
		    exit;
	    }
        else
        {  
			$data = unserialize(file_get_contents("../htdocs/private/passwd", FILE_USE_INCLUDE_PATH));
			foreach ($data as $account)
			{
				if ($account['login'] == $_POST['login'])
					{
						echo "ERROR\n";
						exit;
					}
			}
			$login = htmlspecialchars($_POST['login']);
			$passwd = hash('whirlpool', htmlspecialchars($_POST['passwd']));
			$data[] = array('login'=>$login,'passwd'=>$passwd);
			file_put_contents("../htdocs/private/passwd", serialize($data));
			echo "OK\n";
            exit;
        }
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>
