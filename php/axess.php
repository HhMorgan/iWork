<?php
if(session_status() == PHP_SESSION_NONE)
session_start();
//echo $_SESSION['userid'].""."1";
if($_SESSION['userid'] == null){
  //echo $_SESSION['userid'].""."if";
   header("Location: /Database-Project/layout/accesslayout.php");
    exit();
}else{
  //echo $_SESSION['userid'].""."else";
}

 ?>
