					<div class="container">
<div id="connect" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Connexion</h4>
      </div>
      <div class="modal-body">
       


<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" class="register-form" method="post" action="../controllers/connect.php">
			<h3>Connectez vous </h3>
			<hr class="colorgraph">

			<div class="form-group">
				<input type="login" name="login" class="form-control input-lg" placeholder="Login" tabindex="4">
			</div>
			<div class="form-group">
				<input type="password" class="form-control input-lg" id="pass" name="pass" placeholder="Password">
			</div>

			
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Sign in" name="connect" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				
			</div>
		</form>
	</div>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div></div>
</div>

<div class="container">
<div id="add_article" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter un article</h4>
      </div>
      <div class="modal-body">
       
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" name="add_form" class="register-form" method="post" action="../controllers/connect.php">
			<h3>Fiche article </h3>
			<hr class="colorgraph">

			<div class="form-group">
				<input type="text" name="titre" class="form-control input-lg" placeholder="Titre" tabindex="4">
			</div>
			<div class="form-group">
				<select class="form-control" name="categ">
					<option>Sélécionnez une catégorie...</option>
						<?php foreach($categs as $elem)
							  {
								  echo '<option>'.$elem['id_categ'].'.'.$elem['intitu_categ'].'</option>';
							  }
						?>
					
				</select>				
			</div>
			<div class="form-group">
				<textarea type="text" class="form-control input-lg" id="pass" name="Description" placeholder="Description"></textarea>
			</div>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit"  value="Enregistrer" id="add_article" name="add_article" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>
		</form>
	</div>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div></div>
</div>
<div class="container" >
<div id="register" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inscription</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" class="register-form" method="post" action="../controllers/register.php">
			<h2>Inscrivez vous </h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Nom" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Prénom" tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="login_name" id="display_name" class="form-control input-lg" placeholder="Login" tabindex="3">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div></div>
</div>
<script type="text/javascript">
function checkform()
    {
        var f = document.forms["add_form"].elements;
        var cansubmit = true;

        for (var i = 0; i < f.length; i++) {
            if (f[i].value.length == 0) cansubmit = false;
        }

        if (cansubmit) {
            document.getElementById('add_article').disabled = !cansubmit;
        }
    }
</script>