<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "filmovi";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Losa konekcija sa bazom' .mysql_error());
}
?>

