<?php
	require_once('connexionBd.php');

	if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['sexe']) && !empty($_POST['dateNaiss']) && !empty($_POST['nationalite']) && !empty($_POST['serie']) && !empty($_POST['annee']) && !empty($_FILES['attestation_diplome']))
    {
    	//donnees saisies par l'utilisateur
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $dateNaiss = htmlspecialchars($_POST['dateNaiss']);

        $prenom = strtolower($prenom);
        $nom = strtoupper($nom);

        $sexe = $_POST['sexe'];
        $dateNaiss = $_POST['dateNaiss'];
        $nationalite = $_POST['nationalite'];
        $serie = $_POST['serie'];
        $annee = $_POST['annee'];
        
        //Traitements pour fichier PDF
        $file_name = $_FILES['attestation_diplome']['name'];
		$file_tmp_name = $_FILES['attestation_diplome']['tmp_name'];
		$file_extension =  strrchr($file_name, ".");
		$file_dest = '../candidaturesPDF/'.$prenom.$file_name;
		

		if (move_uploaded_file($file_tmp_name, $file_dest))
		{
			if($file_extension==".pdf"){
                            
            // On insère dans la base de données
            $insertion = $bdd->prepare("INSERT INTO candidatures(nom, prenom, sexe, dateNaiss, nationalite, serie, annee, attestation_diplome) VALUES(:nom, :prenom, :sexe, :dateNaiss, :nationalite, :serie, :annee, :attestation_diplome)");
                    $insertion->execute(array(
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'sexe' => $sexe,
                        'dateNaiss' => $dateNaiss,
                        'nationalite' => $nationalite,
                        'serie' => $serie,
                        'annee' => $annee,
                        'attestation_diplome' => $file_dest
            ));
             }else{ header('Location: ../formulaireInscription.php?reg_err=file_extension'); die(); }
            // On redirige avec le message de succès
            header('Location: ../formulaireInscription.php?reg_err=success');
        }
    }
    else{
        echo "Tous les champs n'ont pas été renseignés";
    }
?>