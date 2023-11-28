<?php
    require "partials/header.php";
    $sql = "SELECT r.*, u.* FROM recette r JOIN user u ON r.idUser = u.idUser";
    $recettes = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    ?>
<section>

    <h1>Recette de cuisine</h1>
    <img src="https://picsum.photos/500/300" alt="">
    <h2>Liste des recettes</h2>
    
     <div>
          <?php 
        foreach ($recettes as $recette) {
            ?>
        <img src="./imgRecette/<?php echo $recette['img'] ?>" alt="....">
           <h2>
            <?php echo $recette['titre'] ?>
        </h2>
     </div>
        <?php }
    ?> 
    
 
</section>

<?php
require "partials/footer.php";
?>