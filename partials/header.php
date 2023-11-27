<?php
//   demarre une session si aucune demarré
  if (!isset($_SESSION)) {
    session_start();
  }
require "db.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Recette</title>
</head>

<body>
    <header>
        <nav class="flex">
            <ul class="flex no-decoration">
                <li><a href="./index.php">Acceuil</a></li>
                <li><a href="./recette.php">Publier Recettes</a></li>
                <li><a href="./login.php">Connexion</a></li>
                <li><a href="./inscription.php">Inscription</a></li>
            <?php
            if (isset($_SESSION['user'])) {
              
              echo "Bienvenue"." ".$_SESSION['user']['pseudo'];
            ?>
              <img src="<?php echo $_SESSION['user']['avatar']?>" alt="profile">
            <?php  
              echo "
                <li><a href='logout.php'>Se deconnecter</a></li>
              ";
            }else {}
              ?>
            <?php
            

            ?>
            </ul>
        </nav>
    </header>
    <main>


        <!-- Créer un mini projet de recette de cuisine.

Le but est de faire un blog de partage d’idées de recette. Les utilisateurs pourront postés leurs recettes


Faire les tables:
Recette: id,titre, description,image, #user

User: id,prenom,nom,email,password


-- header et footer

NB: il faut être connecter pour créer une recette ce qui veut dire que l’auteur de la recette est forcément 
le user connecté

vous pouvez reprendre la même base de données donc la même table user


titre
description
image -->