<?php

require "model/produit.php";

$listUser = listUser($_SESSION['user']['id']);   

if (isset($_POST['editProduit'])) {
    
    if (checkproduit($_POST['id']));{

        ficheProduit ($_POST['id']);
      header("Location: ?route=editProduit");  
    }
}

require "view/produit/produit.php";

?>