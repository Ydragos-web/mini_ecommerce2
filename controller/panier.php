<?php
require "model/produit.php";
if (isset($_POST['panier'])) {
    
    if (checkproduit($_POST['id'])) {
        $produit = panier ($_POST['id']); 
        $quantity=1;
        $produit_id = $_POST['id'];
        if ($produit && $quantity > 0){
            if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])){
                if (array_key_exists($produit_id, $_SESSION['panier'])){
                    $_SESSION['panier'][$produit_id] += $quantity;
                }else{
                    $_SESSION['panier'][$produit_id] = $quantity;
                    
                }
            }else{
                $_SESSION['panier'] = array($produit_id => $quantity);
            }
        }
    }
    
} 
if (isset($_POST['plus']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $_SESSION['panier'][$id] = ($_SESSION['panier'][$id] ?? 0) + 1;

}

if (isset($_POST['moins']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id]--;
        if ($_SESSION['panier'][$id] <= 0) {
            unset($_SESSION['panier'][$id]);
        }
    }

}

if (isset($_POST['supprimer']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    unset($_SESSION['panier'][$id]);

}

require "view/panier/panier.php";
?>