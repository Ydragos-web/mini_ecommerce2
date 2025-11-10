<?php 

    require "model/produit.php";

$produit = ficheproduit($_POST['id']);


    if (isset($_POST['edit_produit'])) {
    
    editProduit($_POST['id'],$_POST['nom'],$_POST['description'],$_POST['prix'],$_POST['image']);

    header("Location: ?route=profil");
    
    }else{
        require "view/produit/editProduit.php";  
    }



    if (isset($_POST['delete_produit'])){

        delete_produit($_POST['id']);
    
        header("Location: ?route=profil");
    
    }
?>
