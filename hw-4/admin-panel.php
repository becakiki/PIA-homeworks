 <?php
session_start();
include 'konekcija.php';					
if(isset($_SESSION["id"]) && ($_SESSION['email']=='kovacevic782@gmail.com' || $_SESSION['korisnicko']=='kristina')) 
{

				
?>
<!DOCTYPE html>
<html lang="en" class="no-js">


<head>
	<!-- Basic need -->
	<title>Admin Panel</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>

<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="index-2.html"><img class="logo" src="images/logo1.png" alt="" width="119" height="58"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a href="#">
							Početna 
							</a>
							
						</li>
						
					<ul class="nav navbar-nav flex-child-menu menu-right">
		
						<li class=''><a href="logout.php">Logout</a></li>
						
					</ul>
				</div>
			
	    </nav>
	    
	   
	</div>
</header>

<div class="slider movie-items">
	<div class="container">
		<div class="row">
			
	    	
	    </div>
	</div>
</div>

<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<div class="title-hd">
					<h2>DODAJ NOVI FILM</h2>
					<br/><br/>
				</div>
				
				<form method="post" action="admin-dodajFilm.php" name="add_name" id="add_name" enctype="multipart/form-data">
					<div class="row">
					<label for="username-2" class="boja">
					Naslov<br>
					<input type="text" name="naslov" required>
					</label>
				</div>
				<br/>
				<div class="row">
					<label for="username-2" class="boja">
					Opis<br>
					<input type="text" name="opis" required>
					</label>
				</div>
				<br/>
				<div class="row">
					<label for="username-2" class="boja">
					Žanr:<br>
					<div id="dynamic_fieldZanr" >
							
						<input type="text" name="nameZanr[]" placeholder="Unesite zanr" class="form-control name_list" /><br/>
						<button type="button" name="addZanr" id="addZanr" class="btn btn-success">Dodaj jos jedan zanr</button>
					
					</div>
					</label>
				</div>
				<br/>
				<div class="row">
					<label for="username-2" class="boja">
					Scenarista<br>
					<input type="text" name="scenarista" required>
					</label>
				</div>
				<br/>
				<div class="row">
				<label for="username-2" class="boja">
					Režiser
					<input type="text" name="reziser" required>
				</label>
				</div>
				<br/>
				<div class="row">
				<label for="username-2" class="boja">
					Producentska kuća<br>
					<input type="text" name="producentskaKuca" required>
				</label>
				</div><br/>
				
				
				<div class="row">
				<label for="username-2" class="boja">
					Godina<br>
					<input type="text" name="godina" required>
				</label>
				</div><br/>
				
				<div class="row">
				<label for="username-2" class="boja">
					Slika<br>
					<input type="file" name="file" required>
				</label>
				
				</div><br/>
				
				<div class="row">
				<label for="username-2" class="boja">
					Trajanje<br>
					<input type="text" name="trajanje" required>
				</label>
				</div><br/>
				
				<div class="row">
				<label for="username-2" class="boja">
					Glumci<br>
					<div id="dynamic_field" >
							
						<input type="text" name="name[]" placeholder="Unesite ime glumca" class="form-control name_list" /><br/>
						<button type="button" name="add" id="add" class="btn btn-success">Dodaj jos jednog glumca</button>
					
					</div>
				</label>
				</div><br/>
				
					<input type="submit" style="color:black;" name="submit" id="submit" value="Dodaj novi film">
				</form>
			</div>
			
		</div>
	</div>
</div>   
           
<div class="movie-items">
	<div class="container">
		<div class="row ipad-width" >
			<div class="col-md-12" style="width:100%;">
				<div class="title-hd" border="3px solid white;">
					<h2>Azuriranje Filma i Brisanje</h2>
					<br/><br/>
				</div>
					<table border="3px solid white;">
					<tr>
					<td class="boja">id Film</td>
					<td class="boja">Naslov</td>
					<td class="boja">Opis</td>
					<td class="boja">Zanr</td>
					<td class="boja">Scenarista</td>
					<td class="boja">Reziser</td>
					<td class="boja">Produc.<br/>Kuca</td>
					<td class="boja"> Glumci</td>
					<td class="boja">Godina</td>
					<td class="boja">Slika</td>
					<td class="boja">Trajanje</td>
					<td class="boja">Azuriraj</td>
					<td class="boja">Obrisi</td>
					
					
					</tr>
					<?php
					$rezultat = mysqli_query($conn,"SELECT * FROM film");
					while($row = mysqli_fetch_array($rezultat)) 
					{
					
					?>
					<tr>
					<td class="boja"><?php echo $row["idFilm"]; ?></td>
					<td class="boja"><?php echo $row["naslov"]; ?></td>
					<td class="boja"><?php echo substr($row['opis'],0,70);?>...</td>
					<td class="boja"><?php 
					$zanr = mysqli_query($conn,"SELECT * FROM film f inner join zanrovi z on f.idFilm=z.idFilm where f.idFilm='".$row['idFilm']."'");

					while($rezultatZanr = mysqli_fetch_array($zanr)) 
					{
					
						 echo $rezultatZanr["zanr"]; 
						
					
					}
					?>
					</td>
					<td class="boja"><?php echo $row["scenarista"]; ?></td>
					<td class="boja"><?php echo $row["reziser"]; ?></td>
					<td class="boja"><?php echo $row["producentskaKuca"]; ?></td>
					<td class="boja">
					<?php
					
					$glumci = mysqli_query($conn,"SELECT * FROM film f inner join glumci g on f.idFilm=g.idFilm where f.idFilm='".$row['idFilm']."'");

					while($rezultatGlumci = mysqli_fetch_array($glumci)) 
					{
					 echo $rezultatGlumci["glumac"].", "; 
					}
					
					?>
					
					</td>
					<td class="boja"><?php echo $row["godina"]; ?></td>
					<td class="boja"><img src='<?php echo $row["slika"];?>'/></td>
					<td class="boja"><?php echo $row["trajanje"]; ?>min</td>
					<td class="boja"><a href="azurirajFilm-proces.php?idFilm=<?php echo $row["idFilm"]; ?>"class="boja">Azuriraj</a></td>
					<td class="boja"><a href="obrisiFilm.php?idFilm=<?php echo $row["idFilm"];?>" class="boja">Obrisi</a></td>
					</tr>
					<?php
					}
					?>
					</table>
				</div>
			
		</div>
	</div>
</div>



<!-- latest new v1 section-->

<!--end of latest new v1 section-->
<!-- footer section-->
<footer class="ht-footer">
	
	<div class="ft-copyright" style="color:white;margin-left:0%;">
		<div class="ft-left" style="margin-left:30%;">
			<p><a target="_blank" href="#" class="boja"><b>Kristina Kovačević 2021</b></a></p>
		</div>
		
	</div>
</footer>
<!-- end of footer section-->

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>


</html>

<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<div id="row'+i+'"><input type="text" name="name[]" placeholder="Upisite ime i prezime glumca" class="form-control name_list" /><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"admin-dodajFilm.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				
				$('#add_name')[0].reset();
			}
		});
	});
	
});


$(document).ready(function(){
	var i=1;
	$('#addZanr').click(function(){
		i++;
		$('#dynamic_fieldZanr').append('<div id="row'+i+'"><input type="text" name="nameZanr[]" placeholder="Upisite ime i prezime glumca" class="form-control name_list" /><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"admin-dodajFilm.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				
				$('#add_name')[0].reset();
			}
		});
	});
	
});

</script>


<?php

}

else
{
	echo "Samo admin moze pristupiti ovoj stranici";
}
?>


