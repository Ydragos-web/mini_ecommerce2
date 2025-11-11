<?php
require "model/produit.php";

$fiche = ficheproduit($_POST['id']);


if (isset($_POST['panier'])) {

    if (checkproduit($_POST['id'])); {

        ficheProduit($_POST['id']);
    }
}

if (isset($_POST['sendComment'])) {
    comment($_POST['comment'], $_SESSION['user']['id'], $_POST['id']);
}

$comments = readComment($_POST['id']);


if (isset($_POST['notes'], $_POST['id'])) {
    $notes = intval($_POST['notes']);
    $produit_id = intval($_POST['id']);
    if ($notes >= 1 && $notes <= 5) {
        if(creates_notes($_POST['notes'],$_POST['id'])){
            echo "Merci pour votre note de $notes étoile(s) !";  
        }
    }
}


$avg = read_notes($_POST['id']);
require "view/produit/ficheProduit.php";