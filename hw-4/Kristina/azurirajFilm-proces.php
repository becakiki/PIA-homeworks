<?php
session_start();
include_once 'konekcija.php';

if(isset($_SESSION["id"])) 
{
	
$result = mysqli_query($conn,"SELECT * FROM film WHERE idFilm='" . $_GET['idFilm'] . "'");
$row= mysqli_fetch_array($result);

if(count($_POST)>0)
{
	
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="images/posteri/";
	 
	$new_size = $file_size/1024;  

	 

	 $new_file_name = strtolower($file);

	 
	$final_file=str_replace(' ','-',$new_file_name);
	
		
	if($new_file_name)
	{
	move_uploaded_file($file_loc,$folder.$final_file);
	mysqli_query($conn,"UPDATE film set naslov='" . $_POST['naslov'] . "',opis='".$_POST['opis']."', scenarista='".$_POST['scenarista']."', reziser='".$_POST['reziser']."', producentskaKuca='".$_POST['producentskaKuca']."', godina='".$_POST['godina']."',slika='$folder$file',trajanje='".$_POST['trajanje']."' WHERE idFilm='" . $_POST['idFilm'] . "'");

	$message = "Uspesno ste azurirali film";
	
	
	}
	
	else
	{
		mysqli_query($conn,"UPDATE film set naslov='" . $_POST['naslov'] . "',opis='".$_POST['opis']."', scenarista='".$_POST['scenarista']."', reziser='".$_POST['reziser']."', producentskaKuca='".$_POST['producentskaKuca']."', godina='".$_POST['godina']."',trajanje='".$_POST['trajanje']."' WHERE idFilm='" . $_POST['idFilm'] . "'");

		$message = "Uspesno ste azurirali film";
		
		
	}
}
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
					<h2>AŽURIRAJ FILM</h2>
					<br/><br/>
					
					
				</div>
				
				<div class="row">
					<label for="username-2" class="boja">
						<h4><?php if(isset($message)) { echo $message; } ?></h4>
						<br/><br/>
					</label>
					
		     	</div>
				<label for="username-2">
						
						<h6><a href="admin-panel.php" class="boja">Vratite se na admin panel</a></h6>
					</label>
				<br/><br/>
				
				<form name="frmUser" method="post" action="" enctype="multipart/form-data">
				<div class="row">
					<label for="username-2" class="boja">
					Naslov<br>
					<input type="text" name="naslov" value="<?php echo $row['naslov']; ?>" required>
					</label>
				</div>
				<br/>
				<div class="row">
					<label for="username-2" class="boja">
					Opis<br>
					<textarea name="opis" rows="" cols="22"><?php echo $row['opis'];?></textarea>
					</label>
				</div>
				<br/>
				
				<br/>
				<div class="row">
					<label for="username-2" class="boja">
					Scenarista<br>
					<input type="text" name="scenarista" value="<?php echo $row['scenarista']; ?>"required>
					</label>
				</div>
				<br/>
				<div class="row">
				<label for="username-2" class="boja">
					Režiser
					<input type="text" name="reziser"  value="<?php echo $row['reziser']; ?>" required>
				</label>
				</div>
				<br/>
				<div class="row">
				<label for="username-2" class="boja">
					Producentska kuća<br>
					<input type="text" name="producentskaKuca" value="<?php echo $row['producentskaKuca']; ?>" required>
				</label>
				</div><br/>
				
				
				<div class="row">
				<label for="username-2" class="boja">
					Godina<br>
					<input type="text" name="godina" value="<?php echo $row['godina']; ?>" required>
				</label>
				</div><br/>
				
				<div class="row">
				<label for="username-2" class="boja">
					Slika<br>
					<img src="<?php echo $row['slika']; ?>" width="100px" height="150px;"/>
					<input type="file" name="file">
				</label>
				
				</div><br/>
				
				<div class="row">
				<label for="username-2" class="boja">
					Trajanje<br>
					<input type="text" name="trajanje" value="<?php echo $row['trajanje']; ?>" required>
				</label>
				</div><br/>
					<input type="hidden" name="idFilm" class="txtField" value="<?php echo $row['idFilm']; ?>">
					<input type="submit" name="submit" value="Ažuriraj" class="buttom">

				</form>
					
			</div>
			
		</div>
		<br/><br/>
		
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

<?php

}

else
{
	echo "Samo admin moze pristupiti ovoj stranici";
}
?>