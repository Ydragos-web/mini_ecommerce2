<?php

require "db.php";

function create($pseudo, $email, $password) : bool{
    $db = db_connect();

    $sql = $db->prepare("
      INSERT INTO user(pseudo,  email, password) VALUES (:pseudo, :email, :password)
    ");

    $sql->bindValue(":pseudo",$pseudo);
    $sql->bindValue(":email",$email);
    $sql->bindValue(":password",password_hash($password, PASSWORD_DEFAULT));

    $sql->execute();

    return  ($sql->rowCount() > 0) ? true : false;
}

// verif mail

function checkemail($verifemail) : bool {
        $db = db_connect();

    $sql = $db->prepare("SELECT email FROM user WHERE email LIKE :email");

    $sql->bindValue(":email",$verifemail);
    $sql->execute();

    return ($sql->rowCount() > 0) ? true : false;
}

//connexion user

function connection_user($email, $password) : bool {
  $db = db_connect();

  $sql = $db->prepare("
    SELECT * FROM user WHERE email LIKE :email"
  );

  $sql->bindValue(":email",$email);
  $sql->execute();

  $req = $sql->fetch();
 
  if (password_verify($password, $req['password'])) {

    $_SESSION['user']= $req;
    
    return true;
  }else{
    return false;
  }

}

/*
*Update
*/

function update($pseudo ,$email) : bool {
  $db = db_connect();

  $sql = $db->prepare("
      UPDATE user SET pseudo = :pseudo WHERE email LIKE :email
  ");

  $sql->bindValue(":pseudo", $pseudo);
  $sql->bindValue(":email", $email);

  $sql->execute();

  return $sql->rowCount() > 0 ? true : false;
}


/*
*Delete
*/

function delete($email) : bool {
  $db = db_connect();

  $sql = $db->prepare("
    DELETE FROM user WHERE email LIKE :email 
  ");

  $sql->bindValue(":email",$email);

  $sql->execute();

  return $sql->rowCount() > 0 ? true : false;
  
}
?>