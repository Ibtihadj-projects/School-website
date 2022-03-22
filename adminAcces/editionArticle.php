<?php 

	session_start();
	require_once("../controllers/connexionBd.php");
	// si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location: loginAdmin.php');
        die();
    }
	?>
<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8">
            <title>Edition d'articles</title>
            <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
            <?php include 'liens.html' ?>
    </head>
    <body>
      	<?php 
			include("navigation.php"); 
      include("menuHAjouter.php");
		?>


		<?php if (isset($_GET['id'])){
			$id = htmlspecialchars($_GET['id']);

			$check = $bdd->prepare('SELECT * FROM informations WHERE idInformation = ?');
			$check->execute(array($id));

			$data = $check->fetch();
        	
        	$row = $check->rowCount();

        	if ($row ==1) {
        		
        		$titre = $data['titre'];
        		$type = $data['type'];
        		$contenu = $data['contenu'];

          ?>

            <div class="divComArt">Edition d'article</div>
   <section style="width: 80%; margin-left: auto;
    margin-right: auto;">

    <?php
    if (isset($_GET['reg_err'])) {
    
    $err = htmlspecialchars($_GET['reg_err']);
      switch ($err) {
        case 'edit':
          ?><div class="alert alert-success">
                  <strong>Succès,</strong> Article mis à jour
              </div>
      <?php break;
        case 'add':
          ?><div class="alert alert-success">
                  <strong>Succès,</strong> Article ajouté
              </div>
      <?php break;

    }
    }
    ?>


            <form style="margin-top: 20px; padding: 10px;" method="post" action="../controllers/traitementsArticles.php">
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="titre">Titre</label>
                  <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'article" required="required" value="<?php echo $titre ; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Type</label>
                  <select id="inputState" name="type" class="form-control" required="required">
                    <option value="">--Votre choix--</option>
                    <option value="communique">Communique</option>
                    <option value="article">Article</option>
                  </select>
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $id ;?>">
          <label for="editor">Contenu</label>
           <textarea id="editor" name="contenu"><?php echo $contenu ; ?></textarea>
                <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
                
              
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required="required">
                <label class="form-check-label" for="gridCheck">
                  Voudriez-vous valider?
                </label>
            </div>
          </div>
      <button type="submit" class="btn btn-primary">Publier</button>
</form>
</section>

          <?php

        	}else{
        		echo "Article inexistant";

        	}
		}else{
			$id = 0;
			$titre = "";
        	$type = "";
        	$contenu = "";

    ?>
      <div class="divComArt">Edition d'article</div>
   <section style="width: 80%; margin-left: auto;
    margin-right: auto;">

    <?php
    if (isset($_GET['reg_err'])) {
    
    $err = htmlspecialchars($_GET['reg_err']);
      switch ($err) {
        case 'edit':
          ?><div class="alert alert-success">
                  <strong>Succès,</strong> Article mis à jour
              </div>
      <?php break;
        case 'add':
          ?><div class="alert alert-success">
                  <strong>Succès,</strong> Article ajouté
              </div>
      <?php break;

    }
    }
    ?>

            <form style="margin-top: 20px; padding: 10px;" method="post" action="../controllers/traitementsArticles.php">
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="titre">Titre</label>
                  <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'article" required="required" value="<?php echo $titre ; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Type</label>
                  <select id="inputState" name="type" class="form-control" required="required">
                    <option value="">--Votre choix--</option>
                    <option value="communique">Communique</option>
                    <option value="article">Article</option>
                  </select>
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $id ;?>">
          <label for="editor">Contenu</label>
           <textarea id="editor" name="contenu"><?php echo $contenu ; ?></textarea>
                <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
                
              
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required="required">
                <label class="form-check-label" for="gridCheck">
                  Voudriez-vous valider?
                </label>
            </div>
          </div>
      <button type="submit" class="btn btn-primary">Publier</button>
</form>
</section>
	<?php	}
		?>


</body>
</html>