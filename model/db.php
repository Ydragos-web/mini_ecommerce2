<?php
    function db_connect(){
        try {
            return new PDO('mysql:host=localhost;dbname=mini_ecommerce','root','');
        } catch (Exception $error) {
           die("erreur:" .$error ->getMessage()); 
        }
    }
?>