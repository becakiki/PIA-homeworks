<?php
    session_start();
	
	if(count($_POST)>0)
	{
	include_once 'konekcija.php';
	
	$result = mysqli_query($conn,"SELECT * FROM registracija WHERE (korisnicko='" . $_POST["email-korisnicko"] . "' or email='" . $_POST["email-korisnicko"] . "') and lozinka = '". $_POST["lozinka"]."'");
	
	$row = mysqli_fetch_array($result);
	
	if(($_POST['email-korisnicko']=="kristina" || $_POST['email-korisnicko']=="kovacevic782@gmail.com") && $_POST['lozinka']=='kristina123')
	{
		$_SESSION["id"] = $row['id'];
        $_SESSION["email"]=$row['email'];
		$_SESSION["korisnicko"]=$row['korisnicko'];
        $_SESSION["ime"]=$row['ime'];
        $_SESSION["prezime"]=$row['prezime']; 
        header("Location: admin-panel.php"); 
	}
	else if(is_array($row)) 
	{
		$_SESSION["id"] = $row['id'];
        $_SESSION["email"]=$row['email'];
        $_SESSION["ime"]=$row['ime'];
        $_SESSION["prezime"]=$row['prezime']; 
        header("Location: filmovi.php"); 
	
	
	} 
	else
	{
		echo "Proverite korisnicko/email ili lozinku";
	}

}


	
	
?>

<html lang="en" class="no-js">
<head>
	<!-- Basic need -->
	<title>Logovanje</title>
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
							<a href="index.php" class="btn btn-default dropdown-toggle lv1">
							Početna 
							</a>
							
						</li>
						
					<ul class="nav navbar-nav flex-child-menu menu-right">
						               
						
						<li class=""><a href="logovanje.php">Logovanje</a></li>
						<li class=""><a href="registracija.php">Registracija</a></li>
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    
	    <!-- top search form -->
	   
	</div>
</header>
<!-- END | Header -->

<div class="slider movie-items">
	<div class="container">
		<div class="row">
			
	    	
	    </div>
	</div>
</div>
<div class="movie-items" >
	<div class="container">
		<div class="row ipad-width">
			<div class="login-content" style="margin-left:40%;color:white;">
				<h3>Logovanje</h3><br/><br/><br/><br/>
				 <form action="" method="post" enctype="multipart/form-data">
					<div class="row">
						 <label for="username">
							Email ili korisnicko ime
							<input type="text" name="email-korisnicko" id="email-korisnicko" required="required"/>
						</label>
					</div>
				   <br/><br/>
					<div class="row">
						<label for="password">
							Lozinka:
							<input type="password" name="lozinka" id="lozinka"/>
						</label>
					</div>
					<br/><br/><br/>
				   <div class="row">
					 <input type="submit" style="color:black;" name="btnLogovanje" value="Ulogujte se"/>
				   </div>
				</form>
				
			</div>
		
		</div>
	</div>
</div>


<footer class="ht-footer">
	
	<div class="ft-copyright" style="color:white;">
		<div class="ft-left" style="margin-left:30%;">
			<p><a target="_blank" href="#">Kristina 2021</a></p>
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
