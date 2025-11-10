<section>
  <main>
    <div class="editproduit">
      <form class="container" method="post" action="">
        <div class="mb-3">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $produit['nom']; ?>">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" id="description" name="description" value="<?php echo $produit['description']; ?>">
        </div>
        <div class="mb-3">
          <label for="prix" class="form-label">Prix</label>
          <input type="float" class="form-control" id="prix" name="prix" value="<?php echo $produit['prix']; ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $produit['id'];?>">
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" id="image" value="<?php echo $produit['image']; ?>">
          </div>
        <div class="editbtn">
          <button type="submit" class="btn btn-primary" name="edit_produit">Modifier mon produit</button>
          <a href="?route=profil" class="btn btn-warning">Annuler</a>
          <button type="submit" class="btn btn-danger" name="delete_produit">Supprimer mon produit</button>
        </div>
      </form>
    </div>
  </main>
</section>