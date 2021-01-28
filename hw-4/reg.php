<?php
include_once 'konekcija.php';
if(isset($_POST['btnRegistracija']))
{	 
	 $ime = $_POST['ime'];
	 $prezime = $_POST['prezime'];
	 $email = $_POST['email'];
	 $korisnicko = $_POST['korisnicko'];
	 $lozinka = $_POST['lozinka'];
	 
	 $sql = "INSERT INTO registracija (ime,prezime,email,korisnicko,lozinka)
	 VALUES ('$ime','$prezime','$email','$korisnicko','$lozinka')";
	 if (mysqli_query($conn, $sql)) {
		echo "Uspesno poslati podaci u bazu!";
		header('Location:logovanje.php');
	 } else {
		echo "Greska: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>