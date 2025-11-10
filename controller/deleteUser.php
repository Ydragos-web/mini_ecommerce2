<?php

require "model/user.php";

if (isset($_POST['delete'])) {
    if (delete($_SESSION['user']['email'])){
        unset($_SESSION['user']);
    header('Location: index.php');
    }
}
else {
    require "view/user/deleteUser.php";
}
?>