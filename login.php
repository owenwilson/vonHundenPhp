<?php
session_start();

include_once 'includes/header.php';
include_once 'db/config.php';

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username = :username and password = :password";
  $stmt = $conn->prepare($sql);
  $stmt->execute([':username' => $username, ':password' => $password]);

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if($user > 0 ) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
  }
}

?>

<div class="container">
<form method="POST" action="">
  <h1>Login Page</h1>
  <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" name="username" id="username">
  </div>
  <div class="form-group">
    <label for="password">password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button class="btn btn-primary" id="submit">Login</button>
  <input type="hidden" name="login">
</form>
</div>


<?php include_once 'includes/footer.php';?>
