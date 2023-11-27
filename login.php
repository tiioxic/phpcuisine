<?php
    session_start();
    require "partials/header.php";
    
    
        if (isset($_POST['connexion'])) {
        

        $sql = $db->prepare(
            "
            SELECT * FROM user WHERE email LIKE :email
            "
        );
        $sql->bindValue(":email",$_POST['email']);
        $sql->execute();

        $result = $sql->fetch();

        if (password_verify($_POST['pwd'], $result['pwd'])) {
          $_SESSION['user'] = $result;
          // $_SESSION = $result;
            header("Location:index.php");
        } else {
            echo 'Le mot de passe est invalide <br> ';
        }

       
    }
    
    ?>

<div class="form_box">
  <form method="post" enctype="multipart/form-data">
  <h2>Connexion</h2>  
  <ul>
      <li class="input_form">
        <input type="email" id="email" name="email" />
        <label for="mail">E-mail</label>
      </li>
      <li class="input_form">
        <input type="password" id="pwd" name="pwd" />
        <label for="pwd">Mot de passe</label>
      </li>

      <div class="">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <button class="" type="submit" name="connexion">Connexion</button>
      </div>
    </ul>
  </form>
</div>