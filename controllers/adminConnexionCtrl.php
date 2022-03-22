<?php 
    session_start(); // Démarrage de la session
    require_once 'connexionBd.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['email']) && !empty($_POST['mdp'])) // Si il existe les champs email, mdp et qu'ils sont pas vident
    {
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['mdp']);
        $email = strtolower($email); // email transformé en minuscule
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT * FROM admins WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if($password == $data['mdp'])
                {
                    // On créer la session et on redirige sur admin.php
                    $_SESSION['user'] = $data['idAdmin'];
                    header('Location: ../adminAcces/admin.php');
                    die();
                }else{ header('Location: ../adminAcces/LoginAdmin.php?login_err=password'); die(); }
            }else{ header('Location: ../adminAcces/LoginAdmin.php?login_err=email'); die(); }
        }else{ header('Location: ../adminAcces/LoginAdmin.php?login_err=noCompte'); die(); }
    }else{ header('Location: ../adminAcces/LoginAdmin.php'); die();} // si le formulaire est envoyé sans aucune données