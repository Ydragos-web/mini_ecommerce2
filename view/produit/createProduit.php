<?php

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
}

?>
<section>
  <main>
    <div class="createproduit">
      <form class="container" method="post" action="">
        <div class="mb-3">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="mb-3">
          <label for="prix" class="form-label">Prix</label>
          <input type="float" class="form-control" id="prix" name="prix">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" id="image" >
          </div>
          <div class="mb-3">
            <label for="pseudo" class="form-label">vendeur</label>
            <input type="text" class="form-control" id="pseudo" name="vendeur" value="<?php echo $user['pseudo']; ?>"disabled>  
          </div>
        <button type="submit" class="btn btn-primary" name="createProduit">Créer mon produit</button>
      </form>
    </div>
  </main>
</section>