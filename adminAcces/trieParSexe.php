<?php 

	session_start();
	require_once("../controllers/connexionBd.php");
	// si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location: loginAdmin.php');
        die();
    }
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include("liens.html"); ?>
	<script type="text/javascript">
/****** FONCTION D'IMPRESSION******/
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
/****** TELECHARGER PDF SEXE M******/
		function tabSexeM() {
            html2canvas($('#M')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("candidaturesM.pdf");
                }
            });
}
/****** TELECHARGER PDF SEXE F******/
function tabSexeF() {
            html2canvas($('#F')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    }; 
                    pdfMake.createPdf(docDefinition).download("candidaturesF.pdf");
                }
            });
}
  
	</script>
</head>
<body>
	<?php 
	include("navigation.php"); 
	?>
	
	<?php 
	include("menuH.php"); 
	?>

		<section class="container" style="width: 90%; margin: auto;">
			<div class="row">
				<div class="col-12 col-sm-12 col-lg-3">
					<ul id="menu-accordeon">
					   <li><a href="admin.php">Afficher</a>
					   </li>
					    <li><a href="#">Trier</a>
					      <ul>
					         <li><a href="#">Par sexe</a></li>
					         <li><a href="trieParSerie.php">Par série du BAC</a></li>
					      </ul>
					   </li>
					</ul>
				</div>
				<div>
					<h2>Administration du site</h2>
				</div>
			 </div>

			 <div class="table-responsive" id="M">
					<table class="table">
						<caption style="caption-side: top;">Sexe Masculin</caption>
						<tr class="table-primary">
							<th>Candidature N°</th>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Sexe</th>
							<th>Date de naissance</th>
							<th>Nationalite</th>
							<th>Série</th>
							<th>Année</th>
							<th>Attestation/Diplome</th>
						</tr>
				<?php
					$requeteAffichageM=$bdd->prepare('SELECT * FROM candidatures where sexe = ?' );
					$requeteAffichageM->execute(array("M"));

			while ($resultat=$requeteAffichageM->fetch()) {
		?>
				<tr>
					<td><?php echo $resultat['idCandidature']?></td>
					<td><?php echo $resultat['nom']?></td>
					<td><?php echo $resultat['prenom']?></td>
					<td><?php echo $resultat['sexe']?></td>
					<td><?php echo $resultat['dateNaiss']?></td>
					<td><?php echo $resultat['nationalite']?></td>
					<td><?php echo $resultat['serie']?></td>
					<td><?php echo $resultat['annee']?></td>
					<td><a href="<?php echo  $resultat['attestation_diplome']?>">Telecharger</a></td>
				</tr>
	<?php	
	} ?>
		</table>
		</div>
		<div align="center"> 
			<button class="btn btn-warning" onclick="tabSexeM()">Exporter en PDF</button>
			&nbsp; 

			<button class="btn btn-warning" onclick="printContent('M')">Imprimer ce Tableau</button>
		</div>
		

		<div class="table-responsive" id="F">
			<table class="table">
						<caption style="caption-side: top;">Sexe Feminin</caption>
						<tr class="table-primary">
							<th>Candidature N°</th>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Sexe</th>
							<th>Date de naissance</th>
							<th>Nationalite</th>
							<th>Série</th>
							<th>Année</th>
							<th>Attestation/Diplome</th>
						</tr>
				<?php
					$requeteAffichageF=$bdd->prepare('SELECT * FROM candidatures where sexe = ?' );
					$requeteAffichageF->execute(array("F"));

			while ($resultat=$requeteAffichageF->fetch()) {
		?>
				<tr>
					<td><?php echo $resultat['idCandidature']?></td>
					<td><?php echo $resultat['nom']?></td>
					<td><?php echo $resultat['prenom']?></td>
					<td><?php echo $resultat['sexe']?></td>
					<td><?php echo $resultat['dateNaiss']?></td>
					<td><?php echo $resultat['nationalite']?></td>
					<td><?php echo $resultat['serie']?></td>
					<td><?php echo $resultat['annee']?></td>
					<td><a href="<?php echo  $resultat['attestation_diplome']?>">Telecharger</a></td>
				</tr>
	<?php	
	} ?>
		</table>
		</div>
		<div align="center"> 
			<button class="btn btn-warning" onclick="tabSexeF()">Exporter en PDF</button>
			&nbsp; 

			<button class="btn btn-warning" onclick="printContent('M')">Imprimer ce Tableau</button>
		</div>
	</section>
</body>
</html>