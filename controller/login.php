<?php
require "model/user.php";

if (isset($_POST['login'])) {

    if (!checkemail($_POST['email'])) {
         echo '<div class="alert alert-warning" role="alert">Ce compte n existe pas 
            </div>';
    } else {
     
    if (connection_user($_POST['email'], $_POST['password'])) {
        header('Location: index.php');
    } else {
       echo '<div class="alert alert-warning" role="alert">Mot de passe incorrect
            </div>';
            require "view/user/login.html";
    }
    
    }
        
} else {
    require "view/user/login.html";
}



?>