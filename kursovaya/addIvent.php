<?php

session_start();
include 'style.html';
include 'foot.html';
echo "<br><br><br><br><br><br>";
function date_check($date)
{
	if (preg_match("/^[0-9]{4}[-]{1}[0-9]{2}[-]{1}[0-9]{2}+$/", $date))
		return true;
	else
		return false;
}

if (date_check($_GET['date']))
{
	$connect=mysqli_connect('localhost', 'root', '', 'users1');
	$query="INSERT INTO `{$_SESSION["session_username"]}` (date,time,ivent,comment) VALUES ('{$_GET['date']}', '{$_GET['time']}', '{$_GET['ivent']}', '{$_GET['comment']}')";
	$res=mysqli_query($connect, $query);
	if ($res) 
	{
		echo "<table align='center' width='230'><td>
			Новое событие добавлено!
		<br><a href='http://localhost/kursovaya/1.php'>Вернуться<br/></a></td></table>";
	}
}

else
{
	echo "<table align='center' width='300'><td>
			Введите дату в корректном формате!
		<br><a href='http://localhost/kursovaya/1.php'>Повторить ввод.<br/></a></td></table>";
}
?>