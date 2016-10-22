<?php

session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
  header('Location: login.php');
  exit();
}



if (isset($_POST['logeout']) && $_POST['logeout']) {
  unset($_SESSION['loggedin']);
  header('Location: login.php');
  exit();
}


echo '<form name="login" method="post" action="index.php">
<input type="submit" name="logeout" value="logout">
</form>';

?>
