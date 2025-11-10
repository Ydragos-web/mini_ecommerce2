
<section>
    <?php
    if (isset($nbre_resultat)) {
        echo "<p> $nbre_resultat produit(s) trouvé(s) </p>";
    }
    ?>
    <div class="list">
<?php    
foreach ($list as $value) {
    ?>


        <div class="card" style="width: 18rem;">
            <img src="<?php echo $value['image'];?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $value['nom'];?></h5>
                <p class="card-text"><?php echo $value['description'];?></p>
                <p class="card-text"><?php echo $value['prix']."€";?></p>          
                <form action="?route=ficheProduit" method="post">
                    <input type="hidden"  name="id" value="<?= $value['id'] ?>">
                    <button type="submit" class="btn btn-primary" name="ficheProduit">Détails du produit</a></button>
                </form>
            </div>
        </div>


    <?php
}
?>    
</div>
</section>

