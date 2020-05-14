 <?php
 session_start();
 if ($_SESSION['auth'] != "SESSIONTRUE")  {
		 header('Location: /dashboard/login.php'); 
		 echo $_SESSION['auth'];
		}
?>