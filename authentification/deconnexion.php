<?php
  session_start();

  $_SESSION['loggedIn'] = false;
  unset($_SESSION["employe"]);

  header("location: authentification.php");

?>
