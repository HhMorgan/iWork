<!DOCTYPE html>
<html>

<head>
    <title>view specific task</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" href="/Database-Project/style/manager.css">
</head>

<body>


  <?php require_once($_SERVER['DOCUMENT_ROOT']."/Database-Project/php/axess.php"); ?>
  <?php require_once($_SERVER['DOCUMENT_ROOT']."/Database-Project/php/navbar.php"); ?></br></br></br></br></br>

		 <?php
     require_once($_SERVER['DOCUMENT_ROOT']."/Database-Project/helper/sqlExec.php");
     if(session_status() == PHP_SESSION_NONE)
     session_start();
         $manager_id = $_SESSION['userid'];
         //'".$manager_id."'
         $p2 = post('p2');
         $r2 = post('r2');
	     $remove_employee=sqlExec("exec Remove_Regular_To_Project @MHRusername='".$manager_id."',@titleOfProject=$p2,
		 @username=$r2 ");
		 if ( empty($remove_employee) ){
		 echo "This employee has a task in this project or this employee is not assigned to this project";
		 }
		 else{
		 echo "removed succesfully" ;}
         ?>


</body>

</html>