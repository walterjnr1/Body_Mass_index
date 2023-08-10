<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Web_Based Body Mass Index Calculator</title>
  <link href="bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
  <link href="css/all.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.jpg">

  <style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
  </style>
</head>
<body>
  <div class="contain-to-grid">
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1 class="style1">Web based Body Mass Index (BMI) calculator </h1>
        </li>
        <li class="toggle-topbar menu-icon">
          <a href="#">
            <span>Menu</span>          </a>        </li>
      </ul>

      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
		          <li class="active"><a href="index.php">Home </a></li>

          <li class=""><a href="register.php">Patient Registration</a></li>
        <li class="">
		    <?php 
		  if(strlen($_SESSION['email'])=="") {   
    								
   						 }else{
echo "<a href='calculator.php'>BMI Calculator</a>"	;							}  
								   ?>
		    </a>
		  </li>
          <li class=""><?php 
		  if(strlen($_SESSION['email'])=="") {   
    								echo "<a href='login.php'>Login</a>";
   						 }else{
echo "<a href='logout.php'>Logout</a>"	;							}  
								   ?></a></li>
        </ul>
      </section>
    </nav>
  </div>
  <div id="wrapper">
    <div class="hero">
       <div class="row">
         <div class="large-12 columns">
            <p align="justify">The  aim of the project is to design web based Body Mass Index (BMI) calculator for Demark  clinic, Ikot Ekpene which calculates the body mass index using the two basic  parameters that are weight and height. The weight of the person is calculated  in Kilograms and the height in meters in accordance of the BMI standard  formula. The online Body Mass Index calculator is a useful device when it comes  to controlling your weight and maintaining a healthy life style. Our online BMI  (Body Mass Index) calculator plays a major role in alerting the risk of  diseases due to overweight. The proposed system will not only show the  calculated value. The proposed system is implemented through PHP and mysql..</p>
         </div>
       </div>
    </div>
    <p align="center"><img src="images/bmi-adult-fb-600x315.jpg" width="600" height="315" /></p>
    <div id="lowerContainer" class="row">
      <div id="content" class="large-12 columns">
          <!-- @@BITNAMI_MODULE_PLACEHOLDER@@ -->
      </div>
    </div>
  </div>
<footer>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center"><?php  include('footer.php');?></p>
</footer>
</body>
</html>
