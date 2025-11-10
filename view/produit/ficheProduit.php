
<section>
    <main>
        <h2><?php echo $fiche['nom'];?></h2>
        <div class="ficheproduit">
            <img src="<?php echo $fiche['image'];?>" class="card-img-top" alt="...">
            <div class="description">
                <p><?php echo $fiche['description'];?></p> 
                <div class="prix">
                    <p><?php echo $fiche['prix']."€";?></p>
                    <form action="?route=panier" method="post">
                    <input type="hidden"  name="id" value="<?= $fiche['id'] ?>">
                    <button type="submit" class="btn btn-primary" name="panier"><i class="fa-solid fa-basket-shopping fa-2xl"></i>Ajouter au panier</a></button>
                </form>
                    
                </div>
            </div>     
        </div>
    </main>
                  
</section>
