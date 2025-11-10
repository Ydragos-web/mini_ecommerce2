        <h2>Mes Produits</h2> 
        <div class="ajoutproduit">
            <a href="?route=createProduit" class="btn btn-success">Ajouter un produit</a>
        </div>
        <div class="listUser">
            <?php       
                foreach ($listUser as  $value) {
            ?>
            <div class="listUserItems">
                <img src="<?php echo $value['image'];?>" class="card-img-top" alt="...">
                    <h5 class="card-title"><?php echo $value['nom'];?></h5>
                    <form action="?route=editProduit" method="post">
                        <input type="hidden"  name="id" value="<?php echo $value['id'];?>">
                        <button type="submit" class="btn btn-primary" name="editProduit">Modifier votre produit</button>
                    </form>  
            </div>                         
            <?php
                }
            ?>          
        </div>