<?php

$recepient = "your@mail.ru";
$siteName = "Ajax-форма";

$ip= trim($_POST["ip"]);
$port = trim($_POST["port"]);
$message = "Имя: $name \nТелефон: $phone";

$pagetitle = "Заявка с сайта \"$siteName\"";

echo $output;	
?>