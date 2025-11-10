<?php
    require 'view/nav/header.php';
    
    if (isset($_GET['route'])) {
        switch (true) {
            case $_GET['route'] === 'inscription':
                require 'controller/inscription.php';
                break;
            case $_GET['route'] === 'login':
                require 'controller/login.php';
                break;
            case $_GET['route'] === 'logout':
                require 'controller/logout.php';
                break;
            case $_GET['route'] === 'profil':
                require 'view/user/profil.php';
                break;
            case $_GET['route'] === 'editUser';
                require 'controller/editUser.php';
                break;
            case $_GET['route'] === 'deleteUser';
                require 'controller/deleteUser.php';
                break;            
            case $_GET['route'] === 'produit';
                require 'controller/produit.php';
                break;            
            case $_GET['route'] === 'createProduit';
                require 'controller/createProduit.php';
                break;            
            case $_GET['route'] === 'ficheProduit';
                require 'controller/ficheProduit.php';
                break;            
            case $_GET['route'] === 'editProduit';
                require 'controller/editProduit.php';
                break;            
            case $_GET['route'] === 'panier';
                require 'controller/panier.php';
                break;            
            default:
                # code...
                break;
        }
    } else {
        require'controller/listProduit.php';
    }
    require 'view/nav/footer.php';
?>