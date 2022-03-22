<?php 

	session_start();
	require_once("../controllers/connexionBd.php");
	// si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:loginAdmin.php');
        die();
    }
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'liens.html' ?>
</head>
<body>
	<?php 
	include("navigation.php");
	?>

	<?php 
	include("menuHArticles.php"); 
	?>

	<?php 

		if (isset($_GET['err'])) {
			$err = htmlspecialchars($_GET['err']);
			switch($err)
                    {
                        case 'suppression':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Succès,</strong> Article supprimé des informations du site. 
                            </div>
                        <?php
                        break;
		}
	}

	?>
	<div class="divComArt">
		COMMUNIQUES
	</div>
	<?php
		//Je parcous la tabe informations
		$communique = $bdd->prepare('SELECT * FROM informations where type = ?order by date_ajout desc');
		$communique->execute(array('Communique'));
		while ($resultat=$communique->fetch()) {
			
			$id = $resultat['idInformation'];
			$titre = $resultat['titre'];
			$type = $resultat['type'];
			$contenu = $resultat['contenu'];
			$date_ajout = $resultat['date_ajout'];
		?>
		<div class="card text-center" style="width: 70%; margin-right: auto; margin-left: auto; margin-top: 10px;">
  			<div class="card-header">
    			Communiqué
  			</div>
 			<div class="card-body">
   				<h5 class="card-title"><?php echo $titre ; ?></h5>
    			<p class="card-text"><?php echo substr($contenu, 0, 300).'...';?></p>
    			<a href="article.php?id=<?php echo $id ?>" class="btn btn-primary">Lire plus</a> &nbsp; <a href="editionArticle.php?id=<?php echo $id ?>" class="btn btn-primary">Modifier</a> &nbsp; <a href="suppressionArticle.php?id=<?php echo $id ?>" class="btn btn-primary">Supprimer</a>
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
			$type = $resultat['type'];
			$contenu = $resultat['contenu'];
			$date_ajout = $resultat['date_ajout'];
		?>
		<div class="card text-center" style="width: 70%; margin-right: auto; margin-left: auto; margin-top: 10px;">
  			<div class="card-header">
    			Article
  			</div>
 			<div class="card-body">
   				<h5 class="card-title"><?php echo $titre ; ?></h5>
    			<p class="card-text"><? echo substr($contenu, 0, 300).'...';?></p>
    			<a href="article.php?id=<?php echo $id ?>" class="btn btn-primary">Lire plus</a> &nbsp; <a href="editionArticle.php?id=<?php echo $id ?>" class="btn btn-primary">Modifier</a> &nbsp; <a href="suppressionArticle.php?id=<?php echo $id ?>" class="btn btn-primary">Supprimer</a>
  			</div>
  			<div class="card-footer text-muted">
    			 Date : <?php echo $date_ajout ; ?>
  			</div>
		</div>
	<?php } ?>
</body>
</html>