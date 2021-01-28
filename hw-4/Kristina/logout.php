<?php
    session_start();
    unset($_SESSION["id"]);
	unset($_SESSION["email"]);
	unset($_SESSION["korisnicko"]);
	unset($_SESSION["ime"]);
	unset($_SESSION["prezime"]);
	   
    header("Location:logovanje.php");
?>