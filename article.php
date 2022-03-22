<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'liens.html' ?>
</head>
<body>
	<?php 
	include("navigation.php"); 
	require_once("controllers/connexionBd.php");
	?>

	<?php
			$get_id = htmlspecialchars($_GET['id']);
			$information = $bdd->prepare('SELECT * FROM informations where idInformation = ?');
			$information->execute(array($get_id));

			if ($information->rowCount()==1) {

				$resultat = $information->fetch();
				$titre = $resultat['titre'];
				$type = $resultat['type'];
				$contenu = $resultat['contenu'];
				$date_ajout = $resultat['date_ajout'];

			?>
			<div class="card text-center" class="articleAffichage" style="width: 50%; margin-right: auto; margin-left: auto; margin-top: 30px;">
  				<div class="card-header">
  		  			Communiqué
  				</div>
 			<div class="card-body">
   				<h5 class="card-title"><?php echo $titre ; ?></h5>
    			<p class="card-text"><?php echo $contenu ; ?></p>
  			</div>
  			<div class="card-footer text-muted">
    			 Date : <?php echo $date_ajout ; ?>
  			</div>
		</div>	
			<?php 
		}else{
				echo "Ce article n'existe pas";
			}
	?>
</body>
</html>