<?php
echo "<title>Календарь</title>";
include 'style.html';
include 'foot.html';
echo "<br><br><br><br><br><br>";
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'users1');
if (isset($_SESSION["session_username"]))
{
    echo "<table align='center' width='250'><td>
    На день ".$_SESSION["date"]." запланировано: 
    </td></table>";

	$query = "SELECT * FROM `{$_SESSION["session_username"]}` WHERE date='{$_SESSION["date"]}'";
	$result = mysqli_query($connect, $query);
	$rows = mysqli_num_rows($result);
    if ($rows == 0) 
    {
        echo "<table align='center' border=1><tr><th>На сегодня планов нет!</th></tr></table><br>";
    }
    else
    {
	    echo "<table align='center' border=1><tr><th>№</th><th>Дата</th><th>Время</th><th>Событие</th><th>Комментарий</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
                for ($j = 0 ; $j < 5 ; ++$j) 
                    echo "<td>$row[$j]</td>";
            echo "</tr>";
        }  
        echo "</table>"."<br>";
    }  

    mysqli_free_result($result);
	include 'del.html';
    include 'changing.html';
	echo "<table align='right'><td>
    <a href='http://localhost/kursovaya/1.php'>Вернуться<br/></a></td></table>";
}
?>