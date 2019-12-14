<?php
include 'style.html';
include 'foot.html';
echo "<br><br><br><br><br><br>";
session_start();
$connect=mysqli_connect('localhost', 'root', '', 'users1');

$login = trim($_GET["login"]);
$pw = trim($_GET["pw"]);

$flag = 0;

$query=mysqli_query($connect,"SELECT * FROM `users` WHERE login='{$login}' AND password='{$pw}'");
$numr=mysqli_num_rows($query);
if($numr!=0)
	$flag = 1;

if ($flag == 1)
{
	$_SESSION["session_username"] = $login;
	header("Location: 1.php");
}
else
{
	 echo "<table align='center' width='300'><td>
	Неверное имя пользователя или пароль.<a href='http://localhost/kursovaya/autoForm.php'> Повторите вход.<br/></a>
	</td></table>";
}
?>

