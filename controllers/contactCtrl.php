<?php
require_once 'connexionBd.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['email']) && !empty($_POST['prenom']) && !empty($_POST['message'])) // Si il existe les champs email, prenom, message et qu'ils sont pas vident
    {
        $email = htmlspecialchars($_POST['email']); 
        $prenom = htmlspecialchars($_POST['prenom']);
        $message = htmlspecialchars($_POST['message']);
        $email = strtolower($email); // email transformé en minuscule

            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // On insère dans la base de données
            		$insertion = $bdd->prepare('INSERT INTO contact(prenom, email, message) VALUES('', :prenom, :email, :message)');
                    $insertion->execute(array(
                        'prenom' => $prenom,
                        'email' => $email,
                        'message' => $message,
            ));
            // On redirige avec le message de succès
            header('Location:../vues/contact.php?contact_err=success');
    		}