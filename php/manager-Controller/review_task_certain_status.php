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
		 $p5 = post('p5');
         $t5 = post('t5');
		 $r5 = post('r5');
		 $d5 = post('d5');
		 
		 if ($r5=="'chooseregular'"){
		 $_SESSION['error'] = "you need to choose a Regular employee or in case you didnot find Regular employee then your Department doesnot have regular employee ";
		 header("Location: /Database-Project/layout/appology.php");
		 exit();
		 }
		 if ($p5=="'chooseproject'"){
		 $_SESSION['error'] = "you need to choose a Project or in case you didnot find Projectname then there is no created projects in your department to display ";
		 header("Location: /Database-Project/layout/appology.php");
		 exit();
		 }
		 
		 $comp=sqlExec("select company from Staff_Members where username='".$manager_id."'  ");
         $company = "'".($comp[0] -> {'company'})."'" ;
         
		 
		 
		 $task_exists_project=sqlExec("select name from Tasks where name=$t5 and project=$p5
		 and company=$company and manager='".$manager_id."' and status='Fixed' ");
         
		 
		 if(empty($task_exists_project) ){
     $_SESSION['error'] = "this task name doesnot exists in project or this Task name doesnot have Fixed status or this taskname is not created by you ";
     header("Location: /Database-Project/layout/appology.php");
     exit();
 }
		 else{
		    if($r5=="'Rejected'" and $d5=="''"){
                 $_SESSION['error'] = "you should enter an deadline date";
                 header("Location: /Database-Project/layout/appology.php");
                 exit();}
   
		    if($r5=="'Rejected'" and $d5<>"''"){
		         $check_deadline=sqlExec(" select t.name from Tasks t inner join Projects p on p.company=t.company and p.name=t.project
                 where t.name=$t5 and t.company=$company and t.project=$p5 and p.start_date<=$d5 and $d5<=p.end_date ");
			     if( empty($check_deadline) ){
				    $_SESSION['error'] = "you are not to allowed enter deadline before startdate of project and after end date of project";
                    header("Location: /Database-Project/layout/appology.php");
                    exit();
			     }
				 else{
				 $assign_task=sqlExec("exec Review_Assign_Regular_Task_Manager
                 @MHRusername='".$manager_id."' ,@project_name=$p5,@taskName=$t5,
                 @response=$r5, @deadline=$d5 ");
				 $_SESSION['accept'] = "Task status has changed to Assigned";
                 header("Location: /Database-Project/layout/acceptance.php");
                 exit();}
			
			    }
			
			if($r5=="'Accepted'" ){
		         $assign_task=sqlExec("exec Review_Assign_Regular_Task_Manager
                 @MHRusername='".$manager_id."' ,@project_name=$p5,@taskName=$t5,
                 @response=$r5");
                 $_SESSION['accept'] = "Task status has changed to Closed";
                 header("Location: /Database-Project/layout/acceptance.php");
                 exit();}
            
			}

         ?>

</body>



</html>
