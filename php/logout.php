<?php
if(session_status() == PHP_SESSION_NONE)
session_start();
  $_SESSION['userid'] = null;
  $_SESSION['position'] = null;
  header("Location: /Database-Project/layout/MainPage.php");
  exit();
?>
