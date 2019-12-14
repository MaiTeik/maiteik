<?php
include 'style.html';
include 'foot.html';
echo "<br><br><br><br><br><br>";
session_start();
$connect=mysqli_connect('localhost', 'root', '', 'users1');
$query="DELETE FROM `{$_SESSION["session_username"]}` WHERE id='{$_GET['iventNum']}'";
$res=mysqli_query($connect,$query);
if ($res)
{
	echo "<table align='center' width='160'><td>
		Событие удалено! <br>
	<a href='http://localhost/kursovaya/plans.php'>Вернуться<br/></a></td></table>";
}
else
{
	echo "Ошибка."."<br>";
}

?>