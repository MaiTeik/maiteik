<?php
include 'style.html';
include 'foot.html';
echo "<br><br><br><br><br><br>";
session_start();
session_destroy();
echo "<table align='center' width='160'><td>
Вы вышли. <br><a href='http://localhost/kursovaya/autoForm.php'>Авторизоваться.<br/></a></td></table>";
?>