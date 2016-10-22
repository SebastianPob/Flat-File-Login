<?php

session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
  header('Location: login.php');
  exit();
}

if (file_exists($_SESSION['username'].'.txt')) {
  header('Location: index.php');
  exit();
}else {
  $filename=$_SESSION['username'].".txt";
  fopen($filename, 'wb');
}

?>
