<?php

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
}

?>
<form class="container" method="post" action="">
  <div class="mb-3">
    <label for="pseudo" class="form-label">Modifiez votre pseudo</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo $user['pseudo']; ?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Modifiez votre email</label>
    <input type="email" class="form-control" id="email" value="<?php echo $user['email']; ?>"disabled>
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Modifiez votre mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="update">Je modifie mes informations</button>
</form>