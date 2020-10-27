<?php
session_start();
include_once 'includes/header.php';
include_once 'db/config.php';

if(!$_SESSION['username']){
    header("Location: login.php");
}
?>

<h1>Dashboard</h1>
<a class="btn btn-danger" href="logout.php">Cerrar Session</a>

<?php include_once 'includes/footer.php';?>