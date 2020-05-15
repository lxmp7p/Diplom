<?php
	$ip= trim($_POST["ip"]);
	$port = trim($_POST["port"]);
	$command = "WebManagement\manage.py runserver " .$ip.":".$port;
	$output = system($command);
	echo $output;	
?>