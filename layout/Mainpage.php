<head>
  <!--<?php //require($_SERVER['DOCUMENT_ROOT']."/Database-Project/connection/databaseConnection.php"); ?> -->
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
<!-- Add icon library -->
<link rel="stylesheet" href="../style/Mainpage.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Mainpage.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

</head>

<body>
<div id="Main" class="container-fluid">

  <div id="RowStarter" class="row">
      <?php require($_SERVER['DOCUMENT_ROOT']."/Database-Project/php/navbar.php"); ?>
    <div id="MainStartingImgBlock">
    <div id="MainStartingImg" class="BigImg">
      <div class="BigImg-wrapper" layout="row" layout-align="center center">
        <div layout="column">
          <h1 class="md-display-2"><underlineImg>iWork</underlineImg></h1>
          </div>
        </br>
        <div id="FontAwesomeIconsTopImg">
        <a href="accesslayout.php">  <button  type="button" class="btn btn-default">Login</button></a>
        <a href="Register.php">  <button href="Register.php" type="button" class="btn btn-default">Register</button></a>
        </br></br></br></br>
      <form action="/Database-Project/php/MainPage.php" method="post">
        <input  style="width: 400px;"  type="text" placeholder="Enter Company name or Type or address" name ="searchText" required>
        <select name="searchOption">
           <option value="Name">Name</option>
           <option value="Type">Type</option>
           <option value="Address">Address</option>
       </select>
       <input class="btn btn-primary "type="submit" name="searchButton"  value = "Search">
     </form>
     <button class=" btn btn-danger" type="submit">View All Companies</button>
      </br>
        <a href="https://www.facebook.com/" class="fa fa-facebook" title="Facebook"></a>
        <a href="https://twitter.com/" class="fa fa-twitter" title="Twitter"></a>
         <a href="https://mail.google.com/" class="fa fa-envelope" title="Email"></a>
          </div>
        </div>
        </div>
       </div>
       </div>
    </div>
    <div id="footer" >
      <footer class="col-md-12">
        <div id="LinksInPageShortcuts">
            <ul id="ulLinkList">
            <li><a href="#">Home</a></li>
            <li><a href="#AboutBlock">About</a></li>
            <li><a href="#ContactBlock">Contacts</a></li>
            </ul>
        </div>

        <div id="FooterText"><ul id="ulLinkList"><li>Copyrights &copy; H. Morgan 2017. This page was created for educational purposes only as a project for GUC.</li></ul>
        </div>
      </footer>
    </div>
  </div>
</div>
</body>