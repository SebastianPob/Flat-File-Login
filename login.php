<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
  header('Location: index.php');
  exit();
}

$included=true; // set this so it can only be accessed by this script.
require_once("passwords.php");

if (!isset($_POST['username'])) {
echo '<form name="login" method="post" action="login.php">
user:<input type="text" name="username"><br>
pass:<input type="password" name="password"><br>
<input type="submit" value="go">
</form>';
}else {
   if (in_array($_POST['username'], $usernames))  {
       if ($passwords[$_POST['username']] == $_POST['password']) {
         $_SESSION['loggedin'] = true;
         $_SESSION['username'] = $_POST['username'];
         $_SESSION['password'] = $_POST['password'];
        //  echo 'Logged in successfully.';
        if (file_exists($_SESSION['username'].'.txt')) {
          header('Location: index.php');
        }else {
          header('Location: terms.php');
        }
       }else {
         echo 'Invalid username or password given.';
       }
    }else {
      echo "This is not a recognised user.";
   }
}

?>
