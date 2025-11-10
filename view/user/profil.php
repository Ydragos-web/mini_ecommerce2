<?php

if (isset($_SESSION['user'])) {
    $user=$_SESSION['user'];

?>
<section>
    <main>
        <div class="mainprofil">
            <div class="profil">
                <h2>Mon profil</h2>
                <div class="infos">
                    <p>Pseudo : <?php echo $user['pseudo'];?></p> 
                    <p>Email: <?php echo $user['email'];?></p>
                </div>
                <div class="profilbtn">
                    <a href="?route=editUser" class="btn btn-warning">Modifier mon profil</a>
                    <a href="?route=deleteUser" class="btn btn-danger">supprimer mon profil</a>
                </div>
            </div>
            <div class="mesproduits">
                <?php require "controller/produit.php";?>
            </div>
        </div>
    </main>
</section>

<?php
} else {
    header("Location: ?route=login");
}

?>

