<?php
include('konekcija.php');
if(isset($_POST['submit']))
{	 

	
	 $naslov = $_POST['naslov'];
	 $opis = $_POST['opis'];
	 //$zanr = $_POST['zanr'];
	 $scenarista = $_POST['scenarista'];
	 $reziser = $_POST['reziser'];
	 $producentskaKuca = $_POST['producentskaKuca'];
	 $glumci = $_POST['glumci'];
	 $godina = $_POST['godina'];
	
	 $trajanje = $_POST['trajanje'];
	 
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="images/posteri/";
	$number = count($_POST["name"]);
	$numberZanr = count($_POST["nameZanr"]);
	
	$new_size = $file_size/1024;  

	 

	 $new_file_name = strtolower($file);

	 
	$final_file=str_replace(' ','-',$new_file_name);
	 
	 if(move_uploaded_file($file_loc,$folder.$final_file))
	 {
		 $sql = "INSERT INTO film (idFilm,naslov,opis,scenarista,reziser,producentskaKuca,godina,slika,trajanje)
		 VALUES ('','$naslov','$opis','$scenarista','$reziser','$producentskaKuca','$godina','$folder$file','$trajanje')";
		 
		
		
		
		 if (mysqli_query($conn, $sql))
			 {
				
				 $sql2="select * from film where naslov='".$naslov."'";
				 $poslednjiIdFilm = mysqli_query($conn,$sql2);
				 $pf = mysqli_fetch_array($poslednjiIdFilm);
				 echo $pf['idFilm'];
				
			 if($numberZanr >= 1)
					{
						for($i=0; $i<$numberZanr; $i++)
						{
							if(trim($_POST["nameZanr"][$i] != ''))
							{
								$sql1 = "INSERT INTO zanrovi(idFilm,zanr) VALUES('".$pf['idFilm']."','".mysqli_real_escape_string($conn,$_POST["nameZanr"][$i])."')";
								mysqli_query($conn, $sql1);
							}
						}
						
					}
					else
					{
						echo "Greska".mysql_error();
					}
					
					 if($number >= 1)
					{
						for($i=0; $i<$number; $i++)
						{
							if(trim($_POST["name"][$i] != ''))
							{
								$sql1 = "INSERT INTO glumci(idFilm,glumac) VALUES('".$pf['idFilm']."','".mysqli_real_escape_string($conn,$_POST["name"][$i])."')";
								mysqli_query($conn, $sql1);
							}
						}
						
					}
					else
					{
						echo "Greska".mysql_error();
					}
			header('Location:admin-panel.php');
			} 
			
			 else
			{
				echo "Greska: " . $sql . "
		" . mysqli_error($conn);
			 }
	  }
	  else
	 {
	  
	  echo "Pokusajte ponovo";
		
	  }
	
}
?>