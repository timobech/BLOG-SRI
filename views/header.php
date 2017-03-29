<!-- start header -->
	<header>
				
			
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="img/logo1.png" alt="" width="199" height="75" /> SRI</a>
                </div>
				
				
					<div class="navbar-collapse collapse ">
					<div class="row">
					<div class="col-lg-5">
					</div>
					<div class="">
						<ul class="nav navbar-nav pull-left" style="margin-left:30px">
							<li>
								<a href="../controllers/connect.php" ><i class="fa fa-home"></i> Accueil</a>
							</li>  
							<?php if(!isset($_SESSION['idUser'])){?>
							<li style="margin-right : 15px" >
							
								
								<button class="btn btn-danger" data-toggle="modal" data-target="#connect"><i class="fa fa-sign-in"></i> Connexion</button>
								</li>
								<li>
							
								<button class="btn btn-danger" data-toggle="modal" data-target="#register"><i class="fa fa-user"></i> Inscrivez vous</button>
								</li>
								
							<?php }
							else { 
									echo '<li>
											
											<div class="dropdown">
											<button class="btn btn-danger dropdown-toggle " type="button" data-toggle="dropdown"><i class="fa fa-user"></i> '.$_SESSION['nom'].'<span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a href="../controllers/connect.php?action=discon&token='.$_SESSION['token'].'"><i class="fa fa-power-off"></i> Déconnexion</a></li>
											</ul>
										</li>';
										}
								?>	
								
							
						</ul>
					</div>

					</div>
				</div>
				
				
            </div>
        </div>
	</header>