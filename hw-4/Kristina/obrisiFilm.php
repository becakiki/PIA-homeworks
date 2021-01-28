<?php
include_once 'konekcija.php';
$sql = "DELETE FROM film WHERE idFilm='" . $_GET["idFilm"] . "'";

if (mysqli_query($conn, $sql)) 
{
	$sql1 = "DELETE FROM zanrovi WHERE idFilm='" . $_GET["idFilm"] . "'";
	mysqli_query($conn, $sql1);
	
	$sql2 = "DELETE FROM glumci WHERE idFilm='" . $_GET["idFilm"] . "'";
	mysqli_query($conn, $sql2);
	
    echo "Uspesno ste obrisali film";
	header('Location:admin-panel.php');
} else {
    echo "Greska prilikom brisanja " . mysqli_error($conn);
}
mysqli_close($conn);
?>