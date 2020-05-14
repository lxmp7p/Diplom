<?php
    if (isset($_POST['exit'])) {
    	session_start();
       	$_SESSION['auth'] = " ";
		header('Location: /dashboard/login.php');
    }
?>