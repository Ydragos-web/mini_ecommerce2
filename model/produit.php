<?php

require "db.php";

function create_produit($nom, $description, $prix, $image, $vendeur): bool
{
  $db = db_connect();

  $sql = $db->prepare("
      INSERT INTO produit(nom, description, prix, image, vendeur) VALUES (:nom, :description, :prix, :image, :vendeur)
    ");

  $sql->bindValue(":nom", $nom);
  $sql->bindValue(":description", $description);
  $sql->bindValue(":prix", $prix);
  $sql->bindValue(":image", $image);
  $sql->bindValue(":vendeur", $vendeur);

  $sql->execute();

  return ($sql->rowCount() > 0) ? true : false;
}

function view_produit()
{
  $db = db_connect();

  $sql = $db->prepare("SELECT * FROM produit");

  $sql->execute();

  return $sql->fetchAll(PDO::FETCH_ASSOC);
}


function checkproduit($verifid): bool
{
  $db = db_connect();

  $sql = $db->prepare("SELECT id FROM produit WHERE id LIKE :id");

  $sql->bindValue(":id", $verifid);
  $sql->execute();

  return ($sql->rowCount() > 0) ? true : false;
}

function ficheproduit($id)
{
  $db = db_connect();

  $sql = $db->prepare("SELECT * FROM produit WHERE id LIKE :id");

  $sql->bindValue(":id", $id);
  $sql->execute();

  return $sql->fetch(PDO::FETCH_ASSOC);
}

function listUser($id)
{
  $db = db_connect();

  $sql = $db->prepare("SELECT produit.id, nom, image FROM produit JOIN user  ON produit.vendeur = user.id WHERE user.id LIKE :id");

  $sql->bindValue(":id", $id);
  $sql->execute();
  return $sql->fetchAll(PDO::FETCH_ASSOC);
}

function editProduit($id, $nom, $description, $prix, $image): bool
{
  $db = db_connect();

  $sql = $db->prepare("UPDATE produit SET nom = :nom, description = :description, prix = :prix, image = :image WHERE id = :id");


  $sql->bindValue(":id", $id);
  $sql->bindValue(":nom", $nom);
  $sql->bindValue(":description", $description);
  $sql->bindValue(":prix", $prix);
  $sql->bindValue(":image", $image);

  $sql->execute();

  return $sql->rowCount() > 0 ? true : false;
}

function delete_produit($id): bool
{
  $db = db_connect();

  $sql = $db->prepare("
    DELETE FROM produit WHERE id LIKE :id 
  ");

  $sql->bindValue(":id", $id);

  $sql->execute();

  return $sql->rowCount() > 0 ? true : false;
}

function panier($id)
{
  $db = db_connect();

  $sql = $db->prepare(
    "
    SELECT * FROM produit WHERE id LIKE :id"
  );

  $sql->bindValue(":id", $id);
  $sql->execute();

  return $sql->fetch(PDO::FETCH_ASSOC);
}

function search($saisi_utilisateur)
{
  $db = db_connect();
  $sql = $db->prepare("
    SELECT produit.*, user.pseudo, user.email FROM produit JOIN user ON user.id = produit.vendeur
    WHERE nom LIKE :search 
     OR prix LIKE :search 
     OR pseudo LIKE :search 
     OR description LIKE :search ");

  $sql->bindValue(':search', "%" . $saisi_utilisateur . "%");
  $sql->execute();

  return $sql->fetchAll();
}

function comment($content, $auteur, $produit): bool
{
  $db = db_connect();
  $sql = $db->prepare("
        INSERT INTO commentaires (content, auteur, produit) VALUES (:content,:auteur,:produit)
        ");

  $sql->bindValue(":content", $content);
  $sql->bindValue(":auteur", $auteur);
  $sql->bindValue(":produit", $produit);

  $sql->execute();

  return ($sql->rowCount() > 0) ? true : false;
}

function readComment($id)
{
  $db = db_connect();

  $sql = $db->prepare("
        SELECT * FROM commentaires  JOIN user ON commentaires.auteur = user.id
        JOIN produit ON commentaires.produit = produit.id
        WHERE produit.id = :id
        ");

  $sql->bindValue(":id", $id);

  $sql->execute();

  return $sql->fetchAll(PDO::FETCH_ASSOC);
}

function creates_notes($value,$produit_id) : bool
{
  $db = db_connect();

  $sql = $db->prepare("
    INSERT INTO notes (value, produit_id) VALUES (:value, :produit_id)
  ");

  $sql->bindValue(":value", $value);
  $sql->bindValue(":produit_id", $produit_id);

  $sql->execute();

  return ($sql->rowCount() > 0) ? true : false;
}

function read_notes($id)
{
  $db = db_connect();

  $sql = $db->prepare("
    SELECT AVG(value) as avg_notes FROM notes JOIN produit ON notes.produit_id = produit.id WHERE produit.id = :id
  ");

  $sql->bindValue(":id",$id);

  $sql->execute();

  return round($sql->fetch()['avg_notes'],1);
}