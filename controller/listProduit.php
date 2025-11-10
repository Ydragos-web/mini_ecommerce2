<?php

require "model/produit.php";

if (isset($_POST['search'])) {

            $list = search($_POST['searchbox']);
            $nbre_resultat = count($list);
}else {
    $list = view_produit();
}

require "view/produit/listProduit.php";

?>