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
		/****** TELECHARGER PDF SERIE C4******/
		function tabCandidatures() {
            html2canvas($('#candidatures')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("candidatures.pdf");
                }
            });
}
	</script>
	<style type="text/css">
		@media print{
			.ne_pas_afficher{
				display: none;
			}
		}
	</style>
</head>
<body>
	<?php
		include("navigation.php"); 
	?>
	

		<div class="box" class="ne_pas_afficher">
			<a href="admin.php" class="ne_pas_afficher"><button class="actif"> CANDIDATURES</button></a>
			<a href="articlesAdmin.php" class="ne_pas_afficher"><button class="noActif">ARTICLES</button></a>
		</div>

		<section class="container" style="width: 90%; margin: auto;">
			<div class="row">
				<div class="col-3">
					<ul id="menu-accordeon" class="ne_pas_afficher">
					   <li ><a href="admin.php">Afficher</a>
					   </li>
					    <li><a href="#">Trier/Filtrer</a>
					      <ul>
					         <li><a href="trieParSexe.php">Par sexe</a></li>
					         <li><a href="trieParSerie.php">Par série du BAC</a></li>
					      </ul>
					   </li>
					</ul>
				</div>
				<div class="ne_pas_afficher">
					<h2>Administration du site</h2>
				</div>
			</div>
				<div class=" table-responsive" id="candidatures">
					<table class="table" id="Tcandidatures">
						<caption style="caption-side: top;">LISTE DES CANDIDATURES</caption>
						<thead>
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
						</thead>
						<tbody>
				<?php
					$requeteAffichage=$bdd->query('SELECT * FROM candidatures');

			while ($resultat=$requeteAffichage->fetch()) {
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
				</tbody>
	<?php	
	} ?>
		</table>
	</div>
	</section>
		<div align="center" class="ne_pas_afficher"> 
			<button class="btn imp-pdf" style="border: 1px solid" onclick="tabCandidatures()">Exporter en PDF <i class="fas fa-file-pdf"></i></button>
			&nbsp; 

			<button class="btn imp-pdf" style="border: 1px solid" onclick="window.print(); return false;">Imprimer ce Tableau <i class="fas fa-print"></i></button>
	</div>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqmuery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
	
</body>
</html>