<?php 

	session_start();
	require_once("connexionBd.php");
	// si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location: ../adminAcces/loginAdmin.php');
        die();
    }

    		$id = $_POST['id'];
    		$titre = htmlspecialchars($_POST['titre']); 
    		$type = $_POST['type'];
    		$contenu = $_POST['contenu'];
    		$date_ajout = date('Y-m-d h:i:s');


    	if ($id == 0) {

    		$insertion = $bdd->prepare('INSERT INTO informations(titre, date_ajout, type, contenu) VALUES(:titre, :date_ajout, :type, :contenu)');
            $insertion->execute(array(
               'titre' => $titre,
               'type' => $type,
               'contenu' => $contenu,
           	   'date_ajout'=> $date_ajout));

            //On fait une insertion aussi dans Table TraitementsInformations


            //On a besoin de l'id de l'article qui vient d'etre créé

            $last = $bdd->query('SELECT MAX(idInformation) FROM informations');
            $rep = $last->fetch();

            //after now,
            $insertion2 = $bdd->prepare('INSERT INTO traitementsInformations(idAdmin, idInformation, type, dateTraitementI) VALUES(:idAdmin, :idInformation, :type, :dateTraitementI)');
            $insertion2->execute(array(
                'idAdmin'=>$_SESSION['user'],
                'idInformation'=>$rep['MAX(idInformation)'],
                'type'=> 'Ajout',
                'dateTraitementI' => $date_ajout));

            // On affiche le message de succès
                header('Location: ../adminAcces/editionArticle.php?reg_err=add');
    	}else{
    		
    		$update = $bdd->prepare('UPDATE informations SET titre = :titre, date_ajout = :date_ajout, type = :type, contenu = :contenu WHERE idInformation = :idInformation');

    		$update->execute(array(
    			'titre' => $titre,
    			'date_ajout'=> $date_ajout,
                'type' => $type,
                'contenu' => $contenu,
            	'idInformation' => $id));

            $update2 = $bdd->prepare('INSERT INTO traitementsInformations(idAdmin, idInformation, type, dateTraitementI) VALUES(:idAdmin, :idInformation, :type, :dateTraitementI)');
            $update2->execute(array(
                'idAdmin'=>$_SESSION['user'],
                'idInformation'=>$id,
                'type'=> 'Mise à jour',
                'dateTraitementI' => $date_ajout));
    		// On affiche le message de succès
                header('Location: ../adminAcces/editionArticle.php?reg_err=edit');
    	}


?>