#!/usr/bin/php
<?PHP
if ($argc != 2)
	echo "Incorrect Parameters\n";
else
{
	if (strstr($argv[1], '+') != FALSE)
	{
		$result = explode('+', $argv[1]);
		if (count($result) != 2)
		{
            echo "Syntax Error";
			return;
		}
		else
		{
			if (is_numeric(trim($result[0])) && is_numeric(trim($result[1])))
				$result = trim($result[0]) + trim($result[1]);
			else
			{
				echo "Syntax Error";
				return;
			}
		}
	}
	else if (strstr($argv[1], '-') != FALSE)
	{
		$result = explode('-', $argv[1]);
		if (count($result) != 2)
		{
			echo "Syntax Error";
			return;
		}
		else
		{
			if (is_numeric(trim($result[0])) && is_numeric(trim($result[1])))
				$result = trim($result[0]) - trim($result[1]);
			else
			{
				echo "Syntax Error";
				return;
			}
		}
	}
	else if (strstr($argv[1], '*') != FALSE)
	{
		$result = explode('*', $argv[1]);
		if (count($result) != 2)
		{
			echo "Syntax Error";
			return;
		}
		else
		{
			if (is_numeric(trim($result[0])) && is_numeric(trim($result[1])))
				$result = trim($result[0]) * trim($result[1]);
			else
			{
				echo "Syntax Error";
				return;
			}
		}
	}
	else if (strstr($argv[1], '/') != FALSE)
	{
		$result = explode('/', $argv[1]);
		if (count($result) != 2)
		{
			echo "Syntax Error";
			return;
		}
		else
		{
			if (is_numeric(trim($result[0])) && is_numeric(trim($result[1])))
				$result = trim($result[0]) / trim($result[1]);
			else
			{
				echo "Syntax Error";
				return;
			}
		}
	}
	else if (strstr($argv[1], '%') != FALSE)
	{
		$result = explode('%', $argv[1]);
		if (count($result) != 2)
		{
			echo "Syntax Error";
			return;
		}
		else
		{
			if (is_numeric(trim($result[0])) && is_numeric(trim($result[1])))
				$result = trim($result[0]) % trim($result[1]);
			else
			{
				echo "Syntax Error";
				return;
			}
		}
	}
	else
		echo "Syntax Error";
    echo $result."\n";
}
?>
