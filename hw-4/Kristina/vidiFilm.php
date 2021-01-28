<?php
session_start();
include("konekcija.php");
					
if(isset($_SESSION["id"])) 
{

		
	$film = $_GET['idFilm'];
	$korisnik = $_SESSION['id'];


	if(isset($_POST['save']))
	{	 
	 $ocena = $_POST['ocena'];
	 
	 $sql1 = "INSERT INTO ocene (idOcena,idFilm,id,ocena)
	 VALUES ('','$film','$korisnik','$ocena')";
	 if (mysqli_query($conn, $sql1)) 
	 {
		 $message1="Uspesno ste ocenili film";
		
		
	 } else 
	 {
		echo "Greska: " . $sql1 . "
" . mysqli_error($conn);
	 }
	
	}
	
	if(isset($_POST['save1']))
	{	 
	 $ocena = $_POST['ocena1'];
	
	 $sql4 = "update ocene set ocena='" . $_POST['ocena1'] . "'";
	 if (mysqli_query($conn, $sql4)) 
	 {
		 
		 $message="Uspesno ste azurirali ocenu";
		
	 } else 
	 {
		echo "Greska: " . $sql4 . "
" . mysqli_error($conn);
	 }
	// mysqli_close($conn);
	}
	
	$sqlOcena = mysqli_query($conn,"SELECT * FROM ocene WHERE idFilm='" . $_GET['idFilm'] . "'");
	$sum=0;
	$brojac=0;
	while($rowOcena= mysqli_fetch_array($sqlOcena))
	{
		if(IS_NULL($rowOcena['ocena']))
		{
		
		}else {
			$sum += $rowOcena['ocena'];
		
		$brojac+=1;
		}
	}
	$srednjaVrednost=0;
	
	if($brojac==0)
	{
	
	}
	else
	{
	
	$srednjaVrednost=$sum/$brojac;
	}
	
	
?>

<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- moviesingle07:38-->
<head>
	<!-- Basic need -->
	<title>O filmu</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">

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
							<a href="filmovi.php">
								Filmovi
							</a>
							
						</li>
						
					<ul class="nav navbar-nav flex-child-menu menu-right">
		
						<li class=''><a href="logout.php">Logout</a></li>
						
					</ul>
				</div>
			
	    </nav>
	    
	   
	</div>
</header>


<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			
			</div>
		</div>
	</div>
</div>
	<?php if(isset($message)) { echo $message; } ?>
<?php
	echo "id filma je:".$_GET['idFilm'];
	$sql = mysqli_query($conn,"SELECT * FROM film where idFilm='".$_GET['idFilm']."'");
	
	while($row = mysqli_fetch_array($sql)) 
	{
		
		echo $row['naslov'];
						
?>					
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="<?php echo $row['slika'];?>" alt="">
					
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd"><?php echo $row['naslov'];?> <span><?php echo $row['godina'];?> </span></h1>
				
					<div class="movie-rate">
				
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span><?php echo (round($srednjaVrednost,2));?></span> /10<br>
								<span class="rv"><?php echo $brojac;?> osoba/e je glasalo</span>
							</p>
						</div>
						
						<div class="rate-star">
							<p>Žanr:</p>
						<?php 
						$zanr = mysqli_query($conn,"SELECT * FROM film f inner join zanrovi z on f.idFilm=z.idFilm where f.idFilm='".$_GET['idFilm']."'");

						while($rezultatZanr = mysqli_fetch_array($zanr)) 
						{
						?>
							<p><a href="#"><?php echo $rezultatZanr['zanr'];?> </a></p>
						<?php 
						}
						?>        	
						</div>
						
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">O filmu</a></li>
								                 
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">
						            		<p><?php echo $row['opis'];?> </p>
						            		
											
											<div class="title-hd-sm">
												<h4>Glumci</h4>
												
											</div>
											<?php 
											$sql55 = mysqli_query($conn,"SELECT * FROM film f inner join glumci g on f.idFilm=g.idFilm where f.idFilm='".$_GET['idFilm']."'");
	
											while($row55 = mysqli_fetch_array($sql55)) 
											{
											?>
											<div class="mvcast-item">											
												<div class="cast-it">
													<div class="cast-left">
														
														<a href="#"><?php echo $row55['glumac'];?> </a>
													</div>
													
												</div>
												
											</div>
											<?php
											}
											?>
											
											<?php 
											$korisnik = $_SESSION['id'];
											$film = $_GET['idFilm'];
											$sql2 = "select * from ocene where id='$korisnik' and idFilm='$film'";
											$result2=mysqli_query($conn,$sql2);
											$row2=mysqli_fetch_array($result2);
																							
												
												if(mysqli_num_rows($result2) >0 && ($row2['id']==$korisnik && $row2['idFilm']==$film))
												{
											?>
											<div class="title-hd-sm">
												<h4>Azurirajte ocenu</h4>
												<p>Unesite ocenu od 1 do 10</p>
											</div>
											
											<div class="mvcast-item">											
												<div class="cast-it">
													<div class="cast-left">
													<form method="post" action="">
														Ocena:<br>
														<input type="text" name="ocena1" value="<?php echo $row2['ocena'];?>">
														
														<br><br>
														<input type="submit" name="save1" value="Azurirajte ocenu">
													</form><br/><br/>
													
													</div>
													
												</div>
												
											</div>
											<p style="color:white;"><?php if(isset($message)) { echo $message; } ?></p>
											<?php
												}
											 else
											 {
											?>	
												
												
												
												<div class="title-hd-sm">
												<h4>Oceni</h4>
												<p>Unesite ocenu od 1 do 10</p>
											</div>
											
											<div class="mvcast-item">											
												<div class="cast-it">
													<div class="cast-left">
														<form method="post" action="">
														Ocena:<br>
														<input type="text" name="ocena">
														
														<br><br>
														<input type="submit" name="save" value="Dodajte ocenu">
													</form>
													
													</div>
													
												</div>
												
											</div>
											<p style="color:white;"><?php if(isset($message1)) { echo $message1; } ?></p>
											
											<?php
											
											 }
											 
											 ?>
											
											
											
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
											
						            		<div class="sb-it">
						            			<h6>Scenarista: </h6>
						            			<p><a href="#"><?php echo $row['scenarista'];?> </a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Reziser: </h6>
						            			<p><a href="#"><?php echo $row['reziser'];?> </a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Producentska kuća: </h6>
						            			<p><a href="#"><?php echo $row['producentskaKuca'];?> </a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Godina:</h6>
						            			<p><a href="#"><?php echo $row['godina'];?> </a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Trajanje:</h6>
						            			<p><?php echo $row['trajanje'];?> min</p>
						            		</div>
						            	
						            		
						            		
						            		
						            	</div>
						            </div>
						        </div>
						        
						      
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
		
		
	}
	
?>
<footer class="ht-footer">
	
	<div class="ft-copyright" style="color:white;margin-left:0%;">
		<div class="ft-left" style="margin-left:30%;">
			<p><a target="_blank" href="#" class="boja"><b>Kristina Kovačević 2021</b></a></p>
		</div>
		
	</div>
</footer>

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>

</html>



<?php

}

else
{
	echo "Morate se ulogovati da bi pristupili ovoj stranici";
}
?>