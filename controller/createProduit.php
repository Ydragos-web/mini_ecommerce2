<?php
require "model/produit.php";

if (isset($_POST['createProduit'])) {
        
        if (create_produit($_POST['nom'],$_POST['description'],$_POST['prix'],$_POST['image'],$_SESSION['user']['id'])) {
            header("Location: ?route=produit");
        }else {
            echo '<div class="alert alert-warning" role="alert">Echec du partage veuillez reassayer
            </div>';
            require "view/produit/createProduit.php";
        }
        
} else {
    require "view/produit/createProduit.php";
}

?>