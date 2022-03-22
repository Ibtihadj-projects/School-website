<?php

	$servername = 'localhost';
    $username = 'root';
    $password = '';
	try {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO("mysql:host=$servername;dbname=projetwebiai", $username, $password, $pdo_options);
		}
	catch(PDOException $e){
		die("Erreur de connexion à la base de données. Veuillez contacter le web Master @ibtihadj : +228 93899766");
	}
?>