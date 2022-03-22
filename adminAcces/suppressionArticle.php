<?php 

	session_start();
	require_once("../controllers/connexionBd.php");
	// si la sespsion existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:loginAdmin.php');
        die();
    }
?>

	<?php
	 	$idInformation = htmlspecialchars($_GET['id']);
	 	/*****************Pour table traitement********************/
	 	$del = $bdd->prepare('INSERT INTO traitementsInformations(idAdmin, idInformation, type, dateTraitementI) VALUES(:idAdmin, :idInformation, :type, :dateTraitementI)');
            $del->execute(array(
                'idAdmin'=>$_SESSION['user'],
                'idInformation'=>$idInformation,
                'type'=> 'Suppression',
                'dateTraitementI' => date('Y-m-d h:i:s')));	
          /*****************FIN********************/
		$delete = $bdd->prepare('DELETE FROM informations WHERE idInformation = :idInformation');
		$delete->execute(array('idInformation' => $idInformation));
	 	header('Location:articlesAdmin.php?err=suppression');	
		
	?>
