<?php
include 'style.html';
include 'foot.html';
?>
<html>
<head>
	<title>Авторизация</title>
</head>
<body>
	<br><br><br><br><br>
<h2 align="center">Добро пожаловать! Авторизируйтесь или зарегистрируйтесь.</h2>
<form action="autorisation.php" method=GET>
	<table align="center" cellspacing="2" cellpadding="2" border="0" width="160">
		<tr><td width="200">Имя пользователя <br><input type="text" name="login" /><br></td></tr>
		<tr><td width="200">Пароль <br><input type="password" name="pw" /><br></td></tr>
		<tr><td colspan="2" width="300" align="center">
    			<input type="submit" value="Вход" />
    			<input type="reset" value="Очистить" />
   			</td></tr>
  		<tr><td>
			<?php
			echo '<a href="http://localhost/kursovaya/regForm.php"><small>Регистрация.</small><br/></a>';
			?>
			</td></tr>
 	</table>
</form>
</body>
</html>
