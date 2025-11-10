<?php
require "model/user.php";

if (isset($_POST['update'])) {
    
    update($_POST['pseudo'],$_SESSION['user']['email']);

    $_SESSION['user']['pseudo'] = $_POST['pseudo'];

    header("Location: ?route=profil");
} else {
    require "view/user/editUser.php";
}

?>