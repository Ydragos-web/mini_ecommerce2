<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Mini Ecommerce</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="images/store.png" alt="logo">
            </div>
            <div class="menu">
                <a class="nav-link" href="index.php">Accueil</a>
            </div>
            <div class="search">
                <form class="d-flex" role="recherche" method="post">
                  <input class="form-control me-2" type="search" name="searchbox"placeholder="Recherche" aria-label="recherche"/>
                  <button class="btn btn-outline-success" type="submit" name="search">recherche</i></button>
                </form>
            </div> 
            <ul>
                    <?php
                    if(!isset($_SESSION['user'])){
                    session_start();
                    }
                    if(isset($_SESSION['user'])){
                        
                    ?>
                    <div class="user">
                        <div class="btn-group">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">           
                        <?php echo 'Bonjour '.$_SESSION['user']['pseudo'];  ?>
                        <i class="fa-solid fa-user"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="?route=profil" class="btn btn-primary mx-2">Profil</a></li>
                            <li><a href="?route=logout" class="btn btn-danger mx-2">Se déconnecter</a></li>
                        </ul>
                        </div>    
                    </div>
                    
                    <div class="panier">
                        <a href="?route=panier"><i class="fa-solid fa-basket-shopping fa-2xl"></i></a>
                    </div>
                    <?php
                    }else{
                        echo '<a href="?route=login" class="btn btn-primary mx-2">Se connecter</a>';
                        echo '<a href="?route=inscription" class="btn btn-info">S inscrire</a>';
                    }
                    ?>
            </ul>
        </nav>
        
    </header>