<!DOCTYPE HTML>
<?php
include "sessiontest.php";
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Configurator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="ajax.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>


	<aside id="fh5co-aside" role="sidebar" class="text-center" style="background-image: url(images/img_bg_1_gradient.jpg);">
<body onload="menuInit();">
	<nav id="navbar">
		<ul id="main-menu">
			<li><a href="index.php" target="_self"><i class="fa fa-list-alt"></i>Главная</a></li>
			<li><a href="connection.php" target="_self"><i class="fa fa-home"></i>Подключение</a></li>
			<li><a href="web_console.php"><i class="fa fa-coffee"></i>Веб консоль</a></li>
			<li><a href="config.php" target="_self"><i class="fa fa-quote-left"></i>Настройки конфигуратора</a></li>
			<li><a target="_self" href="login.php"><i class="fa fa-user"></i>Выход</a></li></form>
		</ul><!-- main-menu -->
	</nav><!-- navbar -->


	</aside>

	<div id="fh5co-main-content">
		<div class="dt js-dt">
			<div class="dtc js-dtc">
 <h1>Управление подключением</h1>
 <?php 
 $filename = 'WebManagement\manage.py runserver' 
 ?>
 <hr>
 <h2>Статус сервиса</h2>
<form  class='mysubform' method="GET"  name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
	<input type="text" class="firstname"  placeholder="IP АДРЕС" name="ip" id="ip"/> 
	<input type="text" class="firstname"  placeholder="Порт" name="port" id="port"/> 
<div class="line">
<input type="SUBMIT" value="Включить">
</div>
<div class="line">

<div class="statusblock">
<?php
if(isset($_GET['ip']) and ($_GET['ip'] == TRUE))
{
    	if(isset($_GET['port']) and ($_GET['port'] == TRUE))
    {
    	$ip = $_GET['ip'];
    	$port = $_GET['port'];
    	$ipCorrect = filter_var($ip, FILTER_VALIDATE_IP);
    	if ($ipCorrect) {
    		$command = $filename . ' ' . $ip . ':' . $port;
        	system($command);	
        }
        else {
        	echo "Неверный IP АДРЕС!";
        }
    }
    else {
        echo "Введите порт!";
    }
}

?>
</pre>
</form>
</div>
</div>

	<form method="post" class="mysubform">
<input type="submit" name="killprocess" id="killprocess" value="Выключить сервис"/>
</form>


<hr>

<?php
function killprocess()
{
    system("taskkill /f /im py.exe");	
    system("taskkill /f /im python.exe");
    echo "Успешно!";
}
if(array_key_exists('killprocess',$_POST)){
	killprocess();
}
?>
		<div id="fh5co-footer">
			<div class="row">


			</div>
		</div>
		
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Count Down -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

