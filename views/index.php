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
					<li><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
					
				</ul>
			</div>
		</div>
	</div>
	</section>
	<!-- Arborescence -->
	<!-- CONTENU -->
	<section id="content">
	

	<div class="container">
	<?php if(isset($_SESSION['idUser'])){
		if(isset($delete_ok))
		{
			if($delete_ok)
			{
				echo '<div class="alert alert-success">
				<strong>L\'article est supprimé avec succès</strong> </div>';
			}
		} ?>
		<h3>Bonjour <?php echo '<span style="color:red">'.$_SESSION['nom'].'</span>' ?>,</h3>
		<?php if($_SESSION['profile'] ==2 )
		{?>
		<p>Rechercher des articles : </p>
		<hr class="colorgraph">
		<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" class="register-form" method="post" action="../controllers/recherche.php">
			
				
			<div class="form-group">
				<input type="text" class="form-control input-lg" id="pass" name="search" placeholder="Description, Titre...">
				
			</div>
			<input type="submit" class="btn btn-success" value="Rechercher"/>
			<b>  OU</b>
			<a href="../controllers/recherche.php" class="btn btn-link">  Voir tous les articles >></a>
		</form>
		</div>
		</div>
		<?php }?>	
</div>
<?php if($_SESSION['profile'] ==1 )
		{?>
<div class="container">
  <h2>Liste des article  <button class="btn btn-default" data-toggle="modal" data-target="#add_article"><i class="fa fa-plus"></i> Ajouter un article</button>     </h2>
  <hr class="colorgraph">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>NUMERO</th>
        <th>Titre</th>
        <th>Description</th>
		<th>Lien vers l'article</th>
      </tr>
    </thead>
	<?php foreach($artcl as $elem)
	{
	?>
    <tbody>
        <td><?php echo $elem['id_article'];?></td>
        <td><?php echo $elem['titre'] ;?></td>
        <td><?php echo $elem['descript'];?></td>
		<td><a href="<?php echo '../controllers/res?article='.$elem['id_article'];?>"><i class="fa fa-external-link fa-2x"></i></a></td>
      </tr>
    </tbody>
	
	<?php }?>
  </table>
</div>
<div class="container">
  <h2>Liste des utilisateurs</h2>
  <hr class="colorgraph">
  <p></p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Login</th>
      </tr>
    </thead>
	<?php foreach($users as $elem)
	{
	?>
    <tbody>
      <tr>
        <td><?php echo $elem['nom'];?></td>
        <td><?php echo $elem['prenom'];?></td>
        <td><?php echo $elem['login'];?></td>
      </tr>
     <?php }?>
    </tbody>
  </table>
</div>
<?php }?>	
<?php } else{?>

<div class="container">
		<h3>Bonjour <span style="color:red">INCONNU</span>,<br></h3> 
		
		<p>Rechercher des articles : </p>
		<hr class="colorgraph">
		<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" class="register-form" method="post" action="../controllers/recherche.php">
			
				
			<div class="form-group">
				<input type="text" class="form-control input-lg" id="pass" name="search" placeholder="Description, Titre...">
				
			</div>
			<input type="submit" class="btn btn-success" value="Rechercher"/><b>  OU</b>
			<a href="../controllers/recherche.php" class="btn btn-link">  Voir tous les articles >></a>
		</form>
	</div>
</div>
		<?php }?>
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
<script src="js/custom.js"></script>s

<?php include('modals.php');?>
</body>
</html>