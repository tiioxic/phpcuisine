<?php
    require "partials/header.php";

    
        if (isset($_POST["submit"]) && isset($_FILES['avatar']) ) {
      echo "<pre>";
      print_r($_POST);
      echo "</pre>";
        $source = $_FILES['avatar']['tmp_name'];

        $imgAvatar = "avatar";

        // $imgAvatar2 = "images";

        // Verifie si le dossier n'existe pas
        if (!is_dir($imgAvatar)) {
          // mkdir crée le dossier
          mkdir($imgAvatar);
        }

        // move_uploaded_file(source,imgAvatar);
        move_uploaded_file($source,$imgAvatar."/".$_FILES['avatar']['name']);
        $image_avatar = $_FILES['avatar']['name'];

        $sql = $db->prepare(
            "INSERT INTO user(pseudo,email,pwd,avatar)
                VALUE
            (:pseudo,:email,:pwd,:avatar)"
        );

        // cryptage du mdp
        $password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

        $sql->bindValue(":pseudo",$_POST["pseudo"]);
        $sql->bindValue(":email",$_POST["email"]);
        $sql->bindValue(":pwd",$password);
        $sql->bindValue(":avatar",$image_avatar);

        if ($sql->execute()) {
            ?>
                <div class="alert alert-success" role="alert">
                    Bravo,
                </div>
            <?php

            //Redirection avec ajout
           header('Location:index.php');
        }
        }
    
    
    ?>


<section>
<div class="form_box">
        <form method="post" enctype="multipart/form-data">
            <h2>Inscription</h2>
        <ul>
            <li class="input_file_form">
                <label for="avatar">Avatar</label>
                <input type="file" id="avatar" name="avatar" />
            </li >
            <li class="input_form">
                <input type="text" id="pseudo" name="pseudo" />
                <label for="pseudo">Pseudo</label>
            </li>
            <li class="input_form">
                <input type="email" id="email" name="email" />
                <label for="email">E-mail</label>
            </li>
            <li class="input_form">
                <input type="password" id="pwd" name="pwd" required />
                <label for="pwd">Mot de passe</label>
            </li>
            <div class="">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button class="" type="submit" name="submit">Inscription</button>
            </div>
        </ul>
    </form>
</div>
</section>