<?php
    require "partials/header.php"
    ?>
<section>

    <h1>Recette de cuisine</h1>
    <img src="https://picsum.photos/500/300" alt="">
    <h2>Liste des recettes</h2>
    
     <div>
        <?php foreach ($recettes as $recette) { ?> 
        <img src="<?php echo $recette["img"] ?>" alt="">
           <h2>
            <?php echo $recette["titre"] ?>
        </h2>
     </div>
     <?php } ?>
    
    
 
</section>