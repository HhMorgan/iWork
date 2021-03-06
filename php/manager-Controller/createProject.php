<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
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
     //'".$manager_id."' //echo  $_SESSION['userid'];
//$username = "'".$_SESSION['userid']."'" ; // remove comment when you update your DB

//$username = post('username');
$projectName = post('projectName');
$startDate = post('startDate');
$endDate = post('endDate');

$comp=sqlExec("select company from Staff_Members where username='".$manager_id."'  ");
$company = "'".($comp[0] -> {'company'})."'" ;

$checkForExistance = sqlExec("select * from Projects where name = $projectName and company=$company ");
if(empty($checkForExistance)){

	if($startDate>=$endDate){
	$_SESSION['error'] = "You cannot create project that start date is greater than or equal to endate";
	header("Location: /Database-Project/layout/appology.php");
	exit();}
	
	else{
	$result = sqlExec("exec Create_New_Project @MHRusername= '".$manager_id."' , @title=$projectName,@start_date=$startDate,@end_date=$endDate");
	$_SESSION['accept'] = "created project succesfully";
	header("Location: /Database-Project/layout/acceptance.php");
	exit();}  
} 

else{
  $_SESSION['error'] = "There is an existing project with same name you chosen";
  header("Location: /Database-Project/layout/appology.php");
  exit();
}

?>
</body>
</html>
