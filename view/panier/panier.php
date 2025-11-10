<?php
if (!empty($_SESSION['panier'])) {
?>
<table class="table">
  <thead>
    <tr>
      <th>Image</th>
      <th>Nom</th>
      <th>Prix unitaire</th>
      <th>Quantité</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
    $net_a_payer = 0;

foreach ($_SESSION['panier'] as $key => $produit_id) {
        $produit = panier($key);
        $totalProduit = $produit['prix'] * $produit_id;
        $net_a_payer += $totalProduit;
    ?>
    <tr>
      <td>
          <img src="<?php echo $produit['image']; ?>" width="100" alt=""></a>
      </td>
      <td><?php echo ($produit['nom']); ?></td>
      <td><?php echo number_format($produit['prix'], 2); ?> €</td>
      <td>
        <form action="" method="post" >
          <input type="hidden" name="id" value="<?php echo $key; ?>">
          <button type="submit" name="moins" class="btn btn-light"><i class="fa-solid fa-minus"></i></button>

          <input type="text" name="qte" id="qte" value="<?php echo $produit_id; ?>" readonly>
          
          <button type="submit" name="plus" class="btn btn-light"><i class="fa-solid fa-plus"></i></button>
        </form>
      </td>
      <td><?php echo number_format($totalProduit, 2); ?> €</td>
      <td>
        <form action="" method="post">
          <input type="hidden" name="id" value="<?php echo $key; ?>">
          <button type="submit" name="supprimer" class="btn btn-danger">
            <i class="fa-solid fa-trash"></i>
          </button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<hr>
<div class="text-end mb-3">
  <h5 class="text-secondary">
    <i class="fa-solid fa-credit-card"></i>
    Net à payer : <strong><?php echo number_format($net_a_payer, 2); ?> €</strong>
  </h5>
</div>
<?php
} else {
    echo "<p>Votre panier est vide.</p>";
}
?>