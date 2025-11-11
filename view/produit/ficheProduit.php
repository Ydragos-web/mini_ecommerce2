<section>
    <main>
        <h2><?php echo $fiche['nom']; ?></h2>
        <div class="ficheproduit">
            <img src="<?php echo $fiche['image']; ?>" class="card-img-top" alt="...">
            <div class="description">
                <p><?php echo $fiche['description']; ?></p>
                <div class="prix">
                    <p><?php echo $fiche['prix'] . "€"; ?></p>
                    <form action="?route=panier" method="post">
                        <input type="hidden" name="id" value="<?= $fiche['id'] ?>">
                        <button type="submit" class="btn btn-primary" name="panier"><i class="fa-solid fa-basket-shopping fa-2xl"></i>Ajouter au panier</a></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="commentaires">
            <div class="list_commentaires">
                <h4>Liste des commentaires</h4>
                <div class="commentaires_items">
                    <?php
                    foreach ($comments as $value) {
                        echo "posté par: " . $value['pseudo'];
                        echo "<p>" . $value['content'] . "</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="post_commentaires">
                <?php echo "Note moyenne : " . str_repeat('★', round($avg)) . " ($avg / 5)"; ?>
                <form method="post" action="">
                    <fieldset class="rating">
                        <?php for ($i = 5; $i >= 1; $i--): ?>
                            <input type="hidden" name="id" value="<?= $fiche['id'] ?>">
                            <input type="radio" id="star<?= $i ?>" name="notes" value="<?= $i ?>">
                            <label for="star<?= $i ?>" title="<?= $i ?> étoiles">★</label>
                        <?php endfor; ?>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Veuillez notez</button>
                </form>
                <hr>
                <h4>Laisser un commentaire</h4>
                <form action="" method="post" class="user-form">
                    <div class="form-floating">
                        <input type="hidden" name="id" value="<?= $fiche['id'] ?>">
                        <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Comments</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="sendComment">Je commente</button>
                </form>
            </div>
        </div>
    </main>
</section>