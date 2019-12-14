<?php
include 'style.html';
include 'foot.html';
echo "<br><br><br><br><br><br>";
echo "<title>Изменение</title>";
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'users1');

if ($_GET['time'] != "") 
{
	$query="UPDATE `{$_SESSION["session_username"]}` SET time='{$_GET['time']}' WHERE id='{$_GET['iventNum']}'";
	$res=mysqli_query($connect,$query);
}
if ($_GET['ivent'] != "") 
{
	$query="UPDATE `{$_SESSION["session_username"]}` SET ivent='{$_GET['ivent']}' WHERE id='{$_GET['iventNum']}'";
	$res=mysqli_query($connect,$query);
}
if ($_GET['comment'] != "") 
{
	$query="UPDATE `{$_SESSION["session_username"]}` SET comment='{$_GET['comment']}' WHERE id='{$_GET['iventNum']}'";
	$res=mysqli_query($connect,$query);
}

if ($_GET['iventNum'] != "") 
{
	if ($res)
	{
		echo "<table align='center' width='160'><td>
		Событие изменено!<br><a href='http://localhost/kursovaya/plans.php'>Вернуться<br/></a>
		</td></table>";
	}
	else
	{
		echo "<table align='center' width='160'><td>
		Ошибка.<br><a href='http://localhost/kursovaya/plans.php'>Вернуться<br/></a>
		</td></table>";
	}
}
else
{
	echo "<table align='center' width='260'><td>
	Введите корректный номер события!<br><a href='http://localhost/kursovaya/plans.php'>Вернуться<br/></a>
	</td></table>";
}
?>