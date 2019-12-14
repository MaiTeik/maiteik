<?php
include 'style.html';
include 'foot.html';
echo "<br><br><br><br><br><br>";
$connect=mysqli_connect('localhost', 'root', '', 'users1');

$login = trim($_GET["login"]);
$pw1 = trim($_GET["pw1"]);
$pw2 = trim($_GET["pw2"]);

$flag = 0;

$query=mysqli_query($connect,"SELECT * FROM `users` WHERE login='{$login}'");
$numr=mysqli_num_rows($query);
if($numr!=0)
	$flag = 1;
 
if (($pw1 != $pw2) || ($login == "") || ($pw1 == "") || ($flag != 0))
{
	if ($login == "") 
	{
		echo "<table align='center' width='160'><td>
		Введите имя пользователя!<br><a href='http://localhost/kursovaya/regForm.php'>Вернуться<br/></a></td></table>";
	}
	elseif (($pw1 == "") || ($pw2 == ""))
	{
		echo "<table align='center' width='160'><td>
		Введите пароль!<br><a href='http://localhost/kursovaya/regForm.php'>Вернуться<br/></a></td></table>";
	}
	elseif ($flag != 0)
	{
		echo "<table align='center' width='360'><td>
		Пользователь с таким именем уже существует.<br><a href='http://localhost/kursovaya/regForm.php'>Вернуться<br/></a></td></table>";
	}
	else
	{
		echo "<table align='center' width='160'><td>
		Пароли не совпадают!<br><a href='http://localhost/kursovaya/regForm.php'>Вернуться<br/></a></td></table>";
	}
}
else
{
	$sql_q="INSERT INTO `users` (login,password) VALUES('{$login}','{$pw1}')";
	$res=mysqli_query($connect,$sql_q);
	if ($res)
	{
		$query1="CREATE TABLE  `{$login}` (`id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, `date` VARCHAR(255) NOT NULL, `time` VARCHAR(255), `ivent` VARCHAR(255), `comment` VARCHAR(255))";
		$res1=mysqli_query($connect,$query1);
		echo "<table align='center' width='360'><td>
		Вы успешно зарегистрировались, теперь можно <a href='http://localhost/kursovaya/autoForm.php'>авторизоваться.<br/></a></td></table>";
	}
	else
	{
		echo "Не удалось добавить данные."."<br>";
		echo '<a href="http://localhost/kursovaya/regForm.php">Вернуться<br/></a>';
	}
}

?>