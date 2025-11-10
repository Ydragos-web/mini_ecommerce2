<?php
require "model/user.php";

if (isset($_POST['inscription'])) {

    if (checkemail($_POST['email'])) {
         echo '<div class="alert alert-warning" role="alert">('. $_POST['email'].')existe deja
            </div>';
            require "view/user/inscription.html";
    } else {
        
        
        if (create($_POST['pseudo'],$_POST['email'],$_POST['password'])) {
            echo '<div class="alert alert-success" role="alert">Inscription reussite</div>';
            header("Location: ?route=login");
        }else {
            echo '<div class="alert alert-warning" role="alert">Echec de l inscription veuillez reassayer
            </div>';
            require "view/user/inscription.html";
        }
    }
        
} else {
    require "view/user/inscription.html";
}

?>