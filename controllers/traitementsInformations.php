/*****************Pour table traitement********************/
	 	$del = $bdd->prepare('INSERT INTO traitementsInformations(idAdmin, idInformation, type, dateTraitementI) VALUES(:idAdmin, :idInformation, :type, :dateTraitementI)');
            $del->execute(array(
                'idAdmin'=>$_SESSION['user'],
                'idInformation'=>$idInformation,
                'type'=> 'Suppression',
                'dateTraitementI' => date('Y-m-d h:i:s')));	
          /*****************FIN********************/


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




  $update2 = $bdd->prepare('INSERT INTO traitementsInformations(idAdmin, idInformation, type, dateTraitementI) VALUES(:idAdmin, :idInformation, :type, :dateTraitementI)');
            $update2->execute(array(
                'idAdmin'=>$_SESSION['user'],
                'idInformation'=>$id,
                'type'=> 'Mise à jour',
                'dateTraitementI' => $date_ajout));
          