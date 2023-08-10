<?php
session_start();
error_reporting(0);

?>
<?php
function result_BMI($height,$weight)
{
	$height = $height/100;
	$height = $height * $height;
	$BMI = $weight / $height;
	$BMI = round($BMI,2);
	return $BMI;
}
function compute($BMI)
{
	$result = '';
	if($BMI < 15){$result = 'Very severely underweight';}
	if(15 <= $BMI && $BMI < 16){$result = 'Severely underweight';}
	if(16 <= $BMI && $BMI < 18.5){$result = 'Underweight';}
	if(18.5 <= $BMI && $BMI < 25){$result = 'Normal (healthy weight)';}
	if(25 <= $BMI && $BMI < 30 ){$result = 'Overweight';}
	if(30 <= $BMI && $BMI < 35 ){$result = 'Obese Class I (Moderately obese)';}
	if(35 <= $BMI && $BMI < 40 ){$result = 'Obese Class II (Severely obese)';}
	if($BMI >= 40){$result = 'Obese Class III (Very severely obese)';}	
	return $result;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Calculate Your BMI - Standard BMI Calculator</title>
  <link href="bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
  <link href="css/all.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.jpg">
<script>
	$(document).ready(function(){
	  $(".BMI").submit(function (e){
		if ($("#height").val() == ""){
		  $("#height").css('box-shadow', '0px 0px 2px red');
		  alert('Please input your height');
		  e.preventDefault(); 
		}
		if ($("#weight").val() == ""){
		  $("#weight").css('box-shadow', '0px 0px 2px red');
		  alert('Please input you weight');
		  e.preventDefault(); 
		}
	  });
	});
	</script>
  <style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
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
		  <li class=""><a href="index.php">Home </a></li>
		  <li class=""><a href="register.php">Patient Registration</a></li>
		
		  <li class="">
		    <?php 
		  if(strlen($_SESSION['email'])=="") {   
    								echo "<a href='login.php'>Login</a>";
   						 }else{
echo "<a href='logout.php'>Logout</a>"	;							}  
								   ?>
		    </a>
			</li>
		  <li class="">
		  </li>
          </ul>
      </section>
    </nav>
  </div>
  <div id="wrapper">
    <p align="center">&nbsp;</p>
    <p align="center"><?php if ($msg <> "") { ?>
  <style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #FF0000;
}
.style2 {color: #000000}
-->
  </style>
  <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <p><?php echo $msg; ?></p>
  </div>
<?php } ?>
<p><h4><?php echo "<p> <font color=red font face='arial' size='3pt'>$msg_error</font> </p>"; ?></h4>  </p>
  <h4><?php echo "<p> <font color=green font face='arial' size='3pt'>$msg_success</font> </p>"; ?></h4>  
  </p>
  <div align="center">
    <p>&nbsp;  </p>
  </div>
  <table width="754" height="223" border="0" align="center">
      <tr>
        <td width="748"><p align="center"><span style="font-size:30px">CALCULATE YOUR BMI</span></p>
	<div align="left" style="padding-left:25%;">
	<form method="post" class="BMI">
		<table border="0">
			<tr>
				<td width="133"><label for="chieu_cao">Your Height (cm):</label></td>
				<td width="197"><input type="text" name="txtheight" id="txtheight" value=""></td>
			</tr>
			<tr>
				<td><label for="can_nang">Your Weight (kg):</label></td>
				<td><input type="text" name="txtweight" id="txtweight" value=""></td>		
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="btncompute" value="COMPUTE BMI"></td>
			</tr>
		</table>
	</form>
	</div>
	<div align="center">
	  <?php
		if (isset($_POST['txtheight'])){
			$height = $_POST['txtheight'];
			$weight = $_POST['txtweight'];
			$BMI = result_BMI($height,$weight);
			$status = compute($BMI);
			echo "<div align='left' style='padding-left:25%; padding-bottom:30px;'>";
			echo "Your BMI: ".$BMI;
			echo "<br>";
			echo "Condition Your Body: ".$status;
			echo "</div>";
		}
	?>
	  </div>
	<div class="quangcao">
		<center>
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-1020443662623638";
			/* 336x280_1 */
			google_ad_slot = "2827231852";
			google_ad_width = 336;
			google_ad_height = 280;
			//-->
			</script>
			<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</center>
	</div></td>
      </tr>
    </table>
    <p align="center">&nbsp;</p>
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
  
  <?php
include('connect.php');

if(isset($_POST['btncompute']))
{


$email=$_SESSION['email'];
$sql = "select * from patients where email ='".$_SESSION['email']."'"; 
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

$patientID=$row['patientID'];
$height = $_POST['txtheight'];
$weight = $_POST['txtweight'];
$date=date("d-m-Y");


 $sql1 = "INSERT INTO bmi_calculator (patientID,height,weight,result,status,date_dmi)VALUES ('$patientID', '$height','$weight','$BMI','$status','$date')";
 
 if ($conn->query($sql1) === TRUE) {


$_SESSION["success"] = "BMI data Saved Successfully";
}else { 

$_SESSION["error"] = "Problem Saving BMI Data";
}
}


?>
  
</footer>
<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong> 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong> 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
</body>
</html>

