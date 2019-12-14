<?php
include 'style.html';
include 'foot.html';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
</head>
<body>
	<br><br><br><br><br>
<h2 align="center">Регистрация</h2>
<form action="reg.php" method=GET>
	<table align="center" cellspacing="3" cellpadding="3" width="160">
		<tr><td width="100">Имя пользователя <br><input type=text name="login" /><br></td></tr>
		<tr><td width="100">Пароль <br><input type=password name="pw1"><br></td></tr>
		<tr><td width="100">Повторите пароль <br><input type=password name="pw2"><br></td></tr>
		<tr><td colspan="3" width="100" align="center">
    			<input type="submit" value="Регистрация" />
    			<input type="reset" value="Очистить" />
   			</td></tr>
  		<tr><td>
			<?php
			echo '<a href="http://localhost/kursovaya/autoForm.php"><small>Уже зарегистрированы?</small><br/></a>';
			?>
			</td></tr>
 	</table>
</form>
</body>
</html>