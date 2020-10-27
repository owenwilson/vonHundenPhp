<?php
include_once 'includes/header.php';
include_once 'db/config.php';

$alert = '';

if(isset($_POST['register'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([':username' => $username, ':password' => $password]);
  $alert = "Cuenta creada exitosamente";
}

?>

<div class="container">
<form method="POST" action="">
  <h1>Register Page</h1>
  <div class="alert"><?= $alert ?></div>
  <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" name="username" id="username">
  </div>
  <div class="form-group">
    <label for="password">password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button class="btn btn-primary" id="submit">submit</button>
  <input type="hidden" name="register">
</form>
</div>


<?php include_once 'includes/footer.php';?>
