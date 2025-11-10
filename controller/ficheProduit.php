<?php
    require "model/produit.php";

$fiche = ficheproduit($_POST['id']);

    
if (isset($_POST['panier'])) {
    
    if (checkproduit($_POST['id']));{

        ficheProduit ($_POST['id']);
    }

    
} else {
    require "view/produit/ficheProduit.php";
}

?>