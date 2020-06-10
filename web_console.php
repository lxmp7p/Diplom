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
			<li><a href="http://127.0.0.1/index.php" target="_self"><i class="fa fa-list-alt"></i>Главная</a></li>
			<li><a href="connection.php" target="_self"><i class="fa fa-home"></i>Подключение</a></li>
			<li><a href="web_console.php"><i class="fa fa-coffee"></i>Веб консоль</a></li>
			<li><a href="config.php" target="_self"><i class="fa fa-quote-left"></i>Настройки конфигуратора</a></li>
			<li><a target="_self" href="login.php"><i class="fa fa-user"></i>Выход</a></li></form>
		</ul><!-- main-menu -->
	</nav><!-- navbar -->

</body>
	</aside>

	<div id="fh5co-main-content">
		<div class="dt js-dt">
			<div class="dtc js-dtc">
 <h1>Веб консоль</h1>
 <hr>
<form class='mysubform' method="GET"  name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
	<input type="text" class="firstname"  placeholder="Команда" name="command" id="command"/> 
	<div class='line'>
	<input type="SUBMIT" value="Выполнить">
	</div>
	<div class='line'>
	<input type="SUBMIT" value="Очистить консоль">
	</div>
</form>
<pre>
	<?php
if(isset($_GET['command']) and ($_GET['command'] == TRUE))
{
    $command = $_GET['command'];
    system($command);	
}

?>
<script>document.getElementById("command").focus();</script>
</pre>

<hr>
<H1>Загрузка файлов на сервер</H1>
<?php
if ($_FILES && $_FILES['filename']['error']== UPLOAD_ERR_OK)
{
	$name = $_FILES['filename']['name'];
	$file_expansion =  substr(strrchr($name, '.'), 1);
	$f_type=$_FILES['filename']['type'];
	$uploads_dir = __DIR__ . '\uploads';
	echo $uploads_dir;
		if(($file_expansion == "php" and $f_type == "text/plain") or ($file_expansion == 'txt' and $f_type == "text/plain")) {
			$tmp_name = $_FILES["filename"]["tmp_name"];
			$name = basename($_FILES["filename"]["name"]);
			$rand = rand(1, 9999);
			$name = $rand . $name;
    		move_uploaded_file($tmp_name, "$uploads_dir/$name");
    		chmod($uploads_dir.'/'. $name, 0444); 
    	echo "Файл загружен";
	}
	else {
	echo "Неверный формат файла!";
}	
}
?>

<form method="post" enctype='multipart/form-data'>
Выберите файл: <input type='file' name='filename' size='10' /><br /><br />
<input type='submit' value='Загрузить' />
</form>



<hr>
<form method="post">
<input type="submit" name="filemanager" id="filemanager" value="Вывести список файлов" onclick="$('#hideFileList').show();"/><br/>
</form>
<table border="1" width="100%" cellpadding="5" id="fileList">
<?php
function filemanager()
{
   if ($handle = opendir('.')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            ?> <tr> <td> <?php echo "$entry\n"; ?> </td></tr> <?php
        }
    }
    closedir($handle);
	}
	?><input type="submit" name="hideFileList" id="hideFileList"   onclick="$('#fileList').hide();$('#hideFileList').hide();" value="Cкрыть список файлов"/> <?php
}
if(array_key_exists('filemanager',$_POST)){
	filemanager();
}
?>



<hr>


<?php
if(!function_exists('mime_content_type')) {

    function mime_content_type($filename) {

        $mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

    }
}
?>


		
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

