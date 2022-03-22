<nav class="navbar navbar-expand-lg navbar-red navbar-dark">
    <div class="wrapper"> </div>
    <div class="container-fluid all-show"> <a class="navbar-brand" href="#">IAI-TOGO <img src="../vues/img/iai.jfif" width="45" alt="logo iai-togo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item"> <a class="nav-link" href="../index.php" target="_blank">Home</a> </li>
                <li class="nav-item"> <a class="nav-link" href="../articles.php" target="_blank">Articles</a> </li>
                <li class="nav-item"> <a class="nav-link" href="../formulaireInscription.php" target="_blank">Inscription</a> </li>
                <li class="nav-item"> <a class="nav-link" href="../contact.php" target="_blank">Contact</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#"><img src="../vues/img/avatar.png" width="30px" width="100%" title="se connecter en tant qu'admin"></a><?php if (isset($_SESSION['user'])) {
                    echo "Statut : Admin connecté";
                } ?></li>
            </ul>
            <div class="d-flex flex-column sim"> <span>IAI-TOGO</span> <small class="text-primary">La référence en matière d'informatique</small> </div>
        </div>
    </div>
</nav>