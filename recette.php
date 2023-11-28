<?php
    require "partials/header.php";
    //rajout de la condition pour savoir si utilisateur est connecté si oui il peut submit
// Vérification de la connexion de l'utilisateur
if (!isset($_SESSION['user'])) {
    // L'utilisateur n'est pas connecté, vous pouvez afficher un message ou le rediriger vers une page de connexion
    ?>
    <div class="" role="alert">
        Vous devez être connecté pour soumettre une recette.
    </div>
    <?php
} else {
    
    
    if(isset($_POST["submit"])){
    
    // ?
    //     echo "<pre>";
    //   print_r($_POST);
    //   echo "</pre>";
      

        $source = $_FILES['img']['tmp_name'];

        $destination = "imgRecette";


        // Verifie si le dossier n'existe pas
        if (!is_dir($destination)) {
          // mkdir crée le dossier
          mkdir($destination);
        }

        move_uploaded_file($source,$destination."/".$_FILES['img']['name']);

       $image_recette = $_FILES['img']['name'];
        $sql = $db->prepare(
            "INSERT INTO recette(img,titre,contenu,idUser)
                VALUE
            (:img,:titre,:contenu,:auteur)"
        );
        $sql->bindValue(":img",$image_recette);
        $sql->bindValue(":titre",$_POST["titre"]);
        $sql->bindValue(":contenu",$_POST["contenu"]);
        $sql->bindValue(":auteur",$_SESSION["user"]["idUser"]);
        

        if ($sql->execute()) {
            ?>
                <div class="alert alert-success" role="alert">
                    Bravo
                </div>
            <?php

            //Redirection avec ajout
        //    header('Location:index.php');
        }







    }
}



?>
    <section>

<div class="form_box">
        <form method="post" enctype="multipart/form-data">
        <h2>Publier une recette</h2>
        <ul>
            <li class="input_form" >
                <input type="text" id="titre" name="titre" />
                <label for="titre">Titre</label>
            </li>
            <li class="input_form">
                <input type="text" id="contenu" name="contenu" placeholder="" />
                <label for="contenu">Recette</label>
            </li>
            <li class="input_file_form">
                <input type="file" id="img" name="img" />
                <label for="img">Image</label>
            </li>
            <!-- <li>
                <label for="name">Auteur</label>
                <input type="text" id="name" name="author" />
            </li> -->
            <div>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button class="" type="submit" name="submit">Envoyer la recette</button>
            </div>
        </ul>
    </form>
</div>
</section>
