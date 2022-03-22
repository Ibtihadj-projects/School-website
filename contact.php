<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include("liens.html"); ?>
</head>
<body style="background-color: #a1dcf1;">
	<?php include("navigation.php"); ?>
			<div style="padding-top: 50px;" class="formContact">
				<form method="post" action="controllers/contactCtrl.php" style="background-color: inherit; border-width: inherit;">
								<h1 style="text-align: center;">Nous contacter</h1>
					<div class="row">
					<div class="col-12 col-md-12 col-lg-6">
					<div class="form-group">
						<label>Prenom :
							<input type="text" name="prenom" class="form-control">
						</label>
					</div>
					<div class="form-group">
						<label>E-mail :
							<input type="email" name="email" class="form-control">
						</label>
					</div>
					<div>
						<label>
							<textarea rows="8" cols="50" name="message">Votre message ici
									
							</textarea>
						</label>
					</div>
				</div>
			<div class="col-12 col-md-12 col-lg-6">
				<img src="vues/img/fcontact.png">
			</div>
			</div>
				</form>
			</div>
</body>
</html>