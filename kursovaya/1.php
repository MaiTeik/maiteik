<title>Календарь</title>
<?php
include 'style.html';
include 'foot.html';
echo "<br><br><br><br><br><br>";
session_start();

if (isset($_SESSION["session_username"]))
{
  echo "<table align='center' width='235'><td>
      Пользователь ".$_SESSION["session_username"]." авторизован.
    </td></table>";

function my_calendar($fill = array())
{
  $month_names = array("январь","февраль","март","апрель","май","июнь","июль","август","сентябрь","октябрь","ноябрь","декабрь");
  if (isset($_GET['y']))
  	$y = $_GET['y'];
  if (isset($_GET['m']))
  	$m = $_GET['m'];
  if (isset($_GET['date']) && strstr($_GET['date'],"-")) //strstr находит первое вхождение подстроки
  	list($y, $m) = explode("-", $_GET['date']);
  if (!isset($y))
  	$y = date("Y");
  if (!isset($m))
  	$m = date("m");

  $month_stamp = mktime(0,0,0, $m, 1, $y); //Возвращает метку времени Unix для заданной даты
  $day_count = date("t", $month_stamp);
  $weekday = date("w", $month_stamp);
  if ($weekday == 0) //если воскресенье
  	$weekday = 7;
  $start =- ($weekday - 2);
  $last = ($day_count + $weekday - 1) % 7;
  if ($last == 0)
  	$end = $day_count;
  else
  	$end = $day_count + 7 - $last;
  $today = date("Y-m-d");
  $prev = date('?\m=m&\y=Y', mktime (0,0,0, $m - 1, 1, $y));
  $next = date('?\m=m&\y=Y', mktime (0,0,0, $m + 1, 1, $y));
  $i = 0;

  include 'cal.html';
  
  for($d = $start; $d <= $end; $d++)
  {
    if (!($i++ % 7))
    	echo "<tr>";
    echo '<td align = "center">';
    if ($d < 1 || $d > $day_count)
      echo "&nbsp";
    else
    {
      $now = "$y-$m-".sprintf("%02d", $d);
      echo '<a href="'.$_SERVER['PHP_SELF'].'?date='.$now.'">'.$d.'</a>';
      if(isset($_GET['date']))
      {
      	$_SESSION["date"] = $_GET['date'];
      	header("Location: plans.php");
      }
    }    
    echo "</td>";
    if (!($i % 7))  
      echo " </tr>";
  }
echo "</table> ";
}

include 'plansForm.html';
echo "<table align='center' width='600'><td>
      <h4>Вы можете посмотреть запланированные события, щелкнув по дате в календаре.</h4></td></table>";
my_calendar(array(date("Y-m-d")));
echo "<table align='right'><td>
      <a href='logout.php'>Выход</a></td></table>";
}

?>
