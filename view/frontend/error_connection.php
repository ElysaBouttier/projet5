<!-- Body page -->
<?php ob_start(); ?>

<div class="container error-connection-container">
		<div class="row-100 justify-content-center align-items-center error-connection-div">
			<div class="col-12 error-connection-div-form">
				<form class="" action="?controller=UserController&action=loginAction" method="POST">
					<span class="error-connection-title">
						Connexion
					</span>
                    <label for="username" class="error-connection-label">
					<div class="error-connection-input">
						<input class="form-control" type="text" name="username" placeholder="Pseudo">
						<span class="focus-input"></span>
					</div>
                    </label>
					
                    <label for="password" class="error-connection-password-label">
					<div class="error-connection-input error-connection-password-input">
						<input class="form-control" type="password" name="password" placeholder="Password">
						<span class="focus-input"></span>
					</div>
                    </label>

					<div class="error-connection-input-btn">
						<button class="btn btn-primary">
							Se connecter
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>



<?php $content = ob_get_clean(); ?>
<!--Necessite le template pour être affiché dedans -->
<?php require('template.php'); ?>