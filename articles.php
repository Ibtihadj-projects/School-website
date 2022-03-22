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

	<div class="divComArt">
		COMMUNIQUES
	</div>
	<?php
		//Je parcous la tabe informations
		$communique = $bdd->prepare('SELECT * FROM informations where type = ? order by date_ajout desc');
		$communique->execute(array('communique'));
		while ($resultat=$communique->fetch()) {
			
			$id = $resultat['idInformation'];
			$titre = $resultat['titre'];
			$contenu = $resultat['contenu'];
			$type = $resultat['type'];
			$date_ajout = $resultat['date_ajout'];
		?>
		<div class="card text-center" class="articleAffichage" style="width: 70%; margin-right: auto; margin-left: auto; margin-top: 10px;">
  			<div class="card-header">
    			Communiqué
  			</div>
 			<div class="card-body">
   				<h5 class="card-title"><?php echo $titre ; ?></h5>
    			<p class="card-text"><?php echo substr($contenu, 0, 300).'...';?></p>
    			<a href="article.php?id=<?php echo $id ?>" class="btn btn-primary">Lire plus</a>
  			</div>
  			<div class="card-footer text-muted">
    			 Date : <?php echo $date_ajout ; ?>
  			</div>
		</div>	
	<?php } ?>

	<div class="divComArt">
		ARTICLES
	</div>
	<?php
		//Je parcous la tabe informations
		$articles = $bdd->prepare('SELECT * FROM informations where type = ?order by date_ajout desc');
		$articles->execute(array('Article'));
		while ($resultat=$articles->fetch()) {
			
			$id = $resultat['idInformation'];
			$titre = $resultat['titre'];
			$contenu = $resultat['contenu'];
			$type = $resultat['type'];
			$date_ajout = $resultat['date_ajout'];
		?>
		<div class="card text-center" class="articleAffichage" style="width: 70%; margin-right: auto; margin-left: auto; margin-top: 10px;">
  			<div class="card-header">
    			Article
  			</div>
 			<div class="card-body">
   				<h5 class="card-title"><?php echo $titre ; ?></h5>
    			<p class="card-text"><?php echo substr($contenu, 0, 300).'...';?></p>
    			<a href="article.php?id=<?php echo $id ?>" class="btn btn-primary">Lire plus</a>
  			</div>
  			<div class="card-footer text-muted">
    			 Date : <?php echo $date_ajout ; ?>
  			</div>
		</div>	
	<?php } ?>
</body>
</html>