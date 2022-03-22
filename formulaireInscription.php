<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include("liens.html"); ?>
</head>
<body class="bodyForm" >
	<?php include("navigation.php"); ?>
<section style="width: 80%; margin-right: auto;margin-left: auto;">
	<?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Enrégistrement réussit</strong>, Candidature prise en compte
                            </div>
                        <?php
                        break;
                        case 'file_extension':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur lors de l'inscription!</strong>, Le fichier doit etre en format pdf
                            </div>
                        <?php
                        break;
                }}
                ?> 
	<h3 class="Inscription">Inscription à IAI-TOGO</h3>
<form style="margin-top: 20px; padding: 10px; font-size: 22px;" method="post" action="controllers/inscriptionCtrl.php" enctype="multipart/form-data">
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nom</label>
      <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required="required">
    </div>
    <div class="form-group col-md-6">
      <label for="prenom">Prenom</label>
      <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom" required="required">
    </div>
  </div>
  <div class="form-group">
    <label>Sexe :
		<input type="radio" name="sexe" value="M">M &nbsp;
		<input type="radio" name="sexe" value="F">F
	</label>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="dnaiss">Date de naissance</label>
      <input type="Date" name="dateNaiss" class="form-control" id="dnaiss">
    </div>
    <div class="form-group col-md-6">
        <label for="nationalite">Nationalité :<br></label>
			<select name="nationalite" required="required" class="form-control" id="nationalite">
				<option value="">Faites votre choix</option>
				<option value="Togolaise">Togolaise</option>
				<option value="Beninoise">Beninoise</option>
				<option value="Tchadienne">Tchadienne</option>
				<option value="Gabonnaise">Gabonnaise</option>
                <option value="Congolaise">Congolaise</option>
			</select>
	    
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Année du BAC </label>
       <select name="annee" required="required" class="form-control">
			<option value="">Faites votre choix</option>
			<option value="2020">2020</option>
			<option value="2019">2019</option>
			<option value="2018">2018</option>
            <option value="2017">2017</option>
		</select>
    </div>
    <div class="form-group col-md-4">
      <label>Série du BAC</label>
       <select name="serie" required="required" class="form-control">
			<option value="">Faites votre choix</option>
            <option value="D">D</option>
			<option value="C4">C4</option>
			<option value="F2">F2</option>
			<option value="F3">F3</option>
            <option value="E">E</option>
		</select>
    </div>
    <div class="form-group col-md-4">
      <label>Attestation ou diplome du BAC(PDF):</label>
			<input type="file" name="attestation_diplome" required="required" >
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" required="required">
      <label class="form-check-label" for="gridCheck">
        Je veux m'inscrire
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
</section>
</body>
</html>