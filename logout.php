<?php
session_start();
			unset($_SESSION["ID"]); 
			unset($_SESSION["EMAIL"]);
			unset($_SESSION["USERNAME"]);
			unset($_SESSION["CATEGORY"]);
			unset($_SESSION["STATUS"]);
			
			header("location:login.php");
?>