<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include("liens.html"); ?>
</head>
<body>
    <?php include("navigation.php"); ?>

    <div style="width: 260px;
    margin-top: 50px; margin-left: auto;margin-right: auto;">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect 
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'noCompte':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?>
            </div> 




    <form method="post" action="../controllers/adminConnexionCtrl.php" class="formLogAdmin" >
        <div align="center">
            <i class="fas fa-key"></i>
            <h3>ADMIN PANEL</h3>
        </div>
        <div class="form-group">
            <label>E-MAIL :
                <input type="email" name="email" class="form-control">
            </label>
        </div>
        <div class="form-group">
            <label>MOT DE PASSE:
                <input type="password" name="mdp" class="form-control">
            </label>
        </div>
        <div>
            <button class="btn btn-success">Valider</button>
        </div>
    </form>
</body>
</html>