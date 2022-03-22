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
/****** Fonction impression******/
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}

/****** TELECHARGER PDF SERIE D******/
		function tabSerieD() {
            html2canvas($('#D')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("candidatures_D.pdf");
                }
            });
}

/****** TELECHARGER PDF SERIE C4******/
		function tabSerieC4() {
            html2canvas($('#C4')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("candidatures_C4.pdf");
                }
            });
}

/****** TELECHARGER PDF SERIE F2******/
		function tabSerieF2() {
            html2canvas($('#F2')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("candidatures_F2.pdf");
                }
            });
}

/****** TELECHARGER PDF SERIE F3******/
		function tabSerieF3() {
            html2canvas($('#F3')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("candidatures_F3.pdf");
                }
            });
}

/****** TELECHARGER PDF SERIE F4******/
		function tabSerieF4() {
            html2canvas($('#F4')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("candidatures_E.pdf");
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
					         <li><a href="trieParsexe.php">Par sexe</a></li>
					         <li><a href="#">Par série du BAC</a></li>
					      </ul>
					   </li>
					</ul>
				</div>
				
				<div>
					<h2>Administration du site</h2>
				</div>
			</div>


		<div class="table-responsive" id="D">
					<table class="table">
						<caption style="caption-side: top;">D</caption>
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
					$requeteAffichageD=$bdd->prepare('SELECT * FROM candidatures where serie = ?' );
					$requeteAffichageD->execute(array("D"));

			while ($resultat=$requeteAffichageD->fetch()) {
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
			<button class="btn btn-warning" onclick="tabSerieD()">Exporter en PDF</button>
			&nbsp; 

			<button class="btn btn-warning" onclick="printContent('D')">Imprimer ce Tableau</button>
		</div>
	
		<div class="table-responsive" id="C4">
			<table class="table">
						<caption style="caption-side: top;">C4</caption>
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
					$requeteAffichageC4=$bdd->prepare('SELECT * FROM candidatures where serie = ?' );
					$requeteAffichageC4->execute(array("C4"));

			while ($resultat=$requeteAffichageC4->fetch()) {
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
			<button class="btn btn-warning" onclick="tabSerieC4()">Exporter en PDF</button>
			&nbsp; 

			<button class="btn btn-warning" onclick="printContent('C4')">Imprimer ce Tableau</button>
		</div>

		<div class="table-responsive" id="F2">
			<table class="table">
						<caption style="caption-side: top;">F2</caption>
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
					$requeteAffichageF2=$bdd->prepare('SELECT * FROM candidatures where serie = ?' );
					$requeteAffichageF2->execute(array("F2"));

			while ($resultat=$requeteAffichageF2->fetch()) {
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
			<button class="btn btn-warning" onclick="tabSerieF2()">Exporter en PDF</button>
			&nbsp; 

			<button class="btn btn-warning" onclick="printContent('F2')">Imprimer ce Tableau</button>
		</div>

		<div class="table-responsive" id="F3">
			<table class="table">
						<caption style="caption-side: top;">F3</caption>
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
					$requeteAffichageF3=$bdd->prepare('SELECT * FROM candidatures where serie = ?' );
					$requeteAffichageF3->execute(array("F3"));

			while ($resultat=$requeteAffichageF3->fetch()) {
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
			<button class="btn btn-warning" onclick="tabSerieF3()">Exporter en PDF</button>
			&nbsp; 

			<button class="btn btn-warning" onclick="printContent('F3')">Imprimer ce Tableau</button>
		</div>

		<div class="table-responsive" id="E">
			<table class="table">
						<caption style="caption-side: top;">E</caption>
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
					$requeteAffichageE=$bdd->prepare('SELECT * FROM candidatures where serie = ?' );
					$requeteAffichageE->execute(array("E"));

			while ($resultat=$requeteAffichageE->fetch()) {
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
			<button class="btn btn-warning" onclick="tabSerieE()">Exporter en PDF</button>
			&nbsp; 

			<button class="btn btn-warning" onclick="printContent('E')">Imprimer ce Tableau</button>
		</div>
	</div>
	</section>
</body>
</html>