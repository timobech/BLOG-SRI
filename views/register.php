<?php
if(empty($access)) {
    header("location:../controllers/connect.php?error=true"); 
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <base href="../views/"> 
<meta charset="utf-8">
<title>EE</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />

<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />	
<link href="css/cubeportfolio.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<!--utils-->
<link id="t-colors" href="skins/default.css" rel="stylesheet" />
<link id="bodybg" href="bodybg/bg4.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="wrapper">
	<?php include('header.php');?>
	
	<!-- Arborescence -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a></li>
					<li class="active">Inscription</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<!-- Arborescence -->
	<!-- CONTENU -->
	
	<section id="content">
	<div class="container">
		<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<?php 
		
			if($pass_flag)
			{
				echo '<div class="alert alert-danger">
				<strong>Les Mots de passe ne conspendent pas / Le mot de passe doit être supérieur à 6 caratère </strong> Veuillez 
				re-essayer...</div>';
			}
		
			if($captcha_flag)
			{
				echo '<div class="alert alert-danger">
				<strong>Le texte que vous avez recopié est faux</strong> Veuillez 
				re-essayer...</div>';
			}			
			
			if($empty_flag)
			{
				echo '<div class="alert alert-danger">
				<strong>Tous les champs doivent être rempli</strong> Veuillez 
				re-essayer...</div>';
			}	
		?>
		<form role="form" class="register-form" method="post" action="../controllers/register.php">
		 
			<h2>Inscrivez vous </h2>
			<hr class="colorgraph">
		
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name"  id="first_name" value="<?php if(isset($nom)) echo $nom;?>" class="form-control input-lg" placeholder="Nom" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" value="<?php if(isset($prenom)) echo $prenom;?>"  class="form-control input-lg" placeholder="Prénom" tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="login_name" id="display_name" value="<?php if(isset($login)) echo $login;?>"  class="form-control input-lg" placeholder="Login" tabindex="3">
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirmer" tabindex="6">
					</div>
				</div>
			</div>
			<small>Recopiez le texte sur l'image :</small> 
			<div class="form-group">
			<img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image" />
			<input type="text" name="captcha_code" size="10" maxlength="6" />
			<!--<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>-->
			</div>
		
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Inscription" name="register" class="btn btn-theme btn-block btn-lg" tabindex="7"></div>
			
			</div>
		</form>
	</div>
</div>
	</div>
	</section>
	<!-- CONTENU -->
	<?php include('footer.html');?>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- -->
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script> 
<script src="plugins/flexslider/flexslider.config.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/stellar.js"></script>
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>
<script src="js/jquery.cubeportfolio.min.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
function delete_(pid){
$.ajax({
   type: "POST",
   url: "../controllers/comment.php",
   data: "pid="+pid,
   success: function(){
   $("#commentwrap-"+pid).hide(100);
   }
 });
}
</script>

<?php include('modals.php');?>
</body>
</html>