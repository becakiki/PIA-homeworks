<?php
session_start();
include 'konekcija.php';					
if(isset($_SESSION["id"])) 
{
	
	if(count($_POST)>0) 
	{
	$zanr=$_POST['zanr'];
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Filmovi pretraga po zanru</title>
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

<div class="slider movie-items">
	<div class="container">
		<div class="row">
			
	    	
	    </div>
	</div>
</div>
<div class="movie-items  full-width">
	<div class="row">
		<div class="col-md-12">
			<div class="title-hd">
				<h2>Filtirani film</h2>
				
			</div>
			<div class="title-hd">
				
				<h6><a href="filmovi.php" class="boja">Povratak na stranicu sa svim filmovima</a></h6>
			</div>
			
			
		
			<div class="tabs">
				 <div class="tab-content">
			        <div id="tab1-h2" class="tab active">
			            <div class="row">
			            	<div class="slick-multiItem2">
							
								<?php

								$sql = mysqli_query($conn,"SELECT * FROM film f inner join zanrovi z ON f.idFilm=z.idFilm where z.zanr='$zanr'");

								while($row = mysqli_fetch_array($sql)) 
								{

								?>
								<div class="slide-it">
			            			<div class="movie-item">
				            			<div class="mv-img">
				            				<img src="<?php echo $row['slika'];?>" alt="">
				            			</div>
				            			<div class="hvr-inner">
				            				<a  href="vidiFilm.php?idFilm=<?php echo $row["idFilm"]; ?>"> Vidi više <i class="ion-android-arrow-dropright"></i> </a>
				            			</div>
				            			<div class="title-in">
				            				<h6><a href="#"><?php echo $row['naslov'];?></a></h6>
				            				<p><i class="ion-android-star"></i><span></span></p>
				            			</div>
				            		</div>
			            		</div>
<?php

}
?>
</div>
					</div>
				</div>
			
				</div>
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

<?php
}


else
{
	echo "Morate se ulogovati da bi pristupili ovoj stranici";
}
?>

