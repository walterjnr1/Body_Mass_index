<?php
session_start();
error_reporting(0);
include 'header.php';
include('connect.php');


 date_default_timezone_set('Africa/Lagos');
 $current_date = date('Y-m-d H:i:s');

if(isset($_POST["btnsubmit"]))
{
$patientID = mysqli_real_escape_string($conn,$_POST['txtpatientID']);
$fullname = mysqli_real_escape_string($conn,$_POST['txtfullname']);
$sex = mysqli_real_escape_string($conn,$_POST['cmdsex']);
$DOB = mysqli_real_escape_string($conn,$_POST['txtDOB']);
$email = mysqli_real_escape_string($conn,$_POST['txtemail']);
$address = mysqli_real_escape_string($conn,$_POST['txtaddress']);
$lga = mysqli_real_escape_string($conn,$_POST['LocalGovt']);
$state= mysqli_real_escape_string($conn,$_POST['state']);
$occupation = mysqli_real_escape_string($conn,$_POST['txtoccupation']);


$photo='uploads/default.jpg';

//check if Email exist
$sql_u = "SELECT * FROM patients WHERE email='$email'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Email Address already exist";

}else {

$sql1 = "INSERT INTO patients (patientID,fullname,sex,DOB,email,address,lga,state,occupation,photo)VALUES ('$patientID', '$fullname','$sex','$DOB','$email','$address','$lga','$state','$occupation','$photo')";
 
 if ($conn->query($sql1) === TRUE) {
$_SESSION['email']=$email;
$_SESSION['fullname']=$fullname;
$_SESSION['patientID']=$patientID;

//$msg_success = "Patient Registration is Successful";
header('location:upload_pic.php');

}
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Registration Form</title>
  <link href="bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
  <link href="css/all.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.jpg">
<script>
    
function showLocalGovt(str)
{
if (str=="")
  {
  document.getElementById("LocalGovt").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("LocalGovt").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","local_govt_db.php?state="+str,true);
xmlhttp.send();
}
</script>
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
		 <li class=""><a href="index.php">Home</a></li>
          <li class="active"><a href="#">Patient Registration</a></li>
          <li class=""><a href="calculator.php">BMI Calculator </a></li>
          
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
    <p><strong><span style="font-size:30px">PATIENT REGISTRATION FORM</span>  </strong></p>
  </div>
  <table width="754" height="223" border="0" align="center">
      <tr>
        <td width="748"><form action="" method="post" name="f" class="form-horizontal contactform" id="f" >
      <fieldset>
      <div class="form-group">
        <label class="col-lg-12 control-label" for="uemail">Patient ID:
          <input type="email" name="txtpatientID" class="form-control"  value="<?php 
			 function patientID(){
$string = (uniqid(rand(), true));
return substr($string, 0, 4);
}
	
$patientID = patientID();	
			 
			 echo 'P/'.$patientID ; ?>"  readonly="">
        </label>
      </div>
        <div class="form-group">
        <label class="col-lg-12 control-label" for="pass1">Fullname:
          <input type="text" placeholder="Enter Fullname" id="pass1" class="form-control" name="txtfullname" value="<?php if (isset($_POST['txtfullname']))?><?php echo $_POST['txtfullname']; ?>" required="" />
        </label>
      </div>
        <div class="form-group">
        <label class="col-lg-12 control-label" for="uemail">Email:
          <input type="email" name="txtemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  value="<?php if (isset($_POST['txtemail']))?><?php echo $_POST['txtemail']; ?>" placeholder="Email">
        </label>
      </div>
        <div class="form-group">
        <label class="col-lg-12 control-label" for="pass1">Sex:
          <select name="cmdsex" id="gender" class="form-control" required="">
          <option value=" ">--Select Gender--</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        </label>
      </div>
        <div class="form-group">
        <label class="col-lg-12 control-label" for="pass1">Date Of Birth:
          <input type="date"  id="pass1" class="form-control" name="txtDOB"  value="<?php if (isset($_POST['txtDOB']))?><?php echo $_POST['txtDOB']; ?>" required="" />
        </label>
      </div>
        <div class="form-group">
        <label class="col-lg-12 control-label" for="pass1">Address:
          <input type="text"  id="pass1" class="form-control" name="txtaddress"  value="<?php if (isset($_POST['txtaddress']))?><?php echo $_POST['txtaddress']; ?>" required="" />
        </label>
      </div>
        <div class="form-group">
        <label class="col-lg-12 control-label" for="pass1">State:
          <select name="state" class="form-control" id="state" onchange="showLocalGovt(this.value)">
          <option value="">Select your State</option>
          <option value="Abia">Abia</option>
          <option value="Adamawa">Adamawa</option>
          <option value="Akwa Ibom">Akwa Ibom</option>
          <option value="Anambra">Anambra</option>
          <option value="Bauchi">Bauchi</option>
          <option value="Bayelsa">Bayelsa</option>
          <option value="Benue">Benue</option>
          <option value="Borno">Borno</option>
          <option value="Cross River">Cross River</option>
          <option value="Delta">Delta</option>
          <option value="Ebonyi">Ebonyi</option>
          <option value="Edo">Edo</option>
          <option value="Ekiti">Ekiti</option>
          <option value="Enugu">Enugu</option>
          <option value="FCT">FCT</option>
          <option value="Gombe">Gombe</option>
          <option value="Imo">Imo</option>
          <option value="Jigawa">Jigawa</option>
          <option value="Kaduna">Kaduna</option>
          <option value="Kano">Kano</option>
          <option value="Kastina">Kastina</option>
          <option value="Kebbi">Kebbi</option>
          <option value="Kogi">Kogi</option>
          <option value="Kwara">Kwara</option>
          <option value="Lagos">Lagos</option>
          <option value="Nasarawa">Nasarawa</option>
          <option value="Niger">Niger</option>
          <option value="Ogun">Ogun</option>
          <option value="Ondo">Ondo</option>
          <option value="Osun">Osun</option>
          <option value="Oyo">Oyo</option>
          <option value="Plateau">Plateau</option>
          <option value="Rivers">Rivers</option>
          <option value="Sokoto">Sokoto</option>
          <option value="Taraba">Taraba</option>
          <option value="Yobe">Yobe</option>
          <option value="Zamfara">Zamfara</option>
        </select>
        </label>
      </div>
        <div class="form-group">
        <label class="col-lg-12 control-label" for="pass1">LGA:
          <select name="LocalGovt" class="form-control" class="active" id="LocalGovt">
        <option>Select Your Local Government</option>
        </select>
        </label>
      </div>
        <div class="form-group">
        <label class="col-lg-12 control-label" for="pass1">Occupation:
          <input type="text"  id="pass1" class="form-control" name="txtoccupation"  value="<?php if (isset($_POST['txtoccupation']))?><?php echo $_POST['txtoccupation']; ?>" required="" />
        </label>
      </div>
        <div class="form-group">
        <label for="pass1" class="col-lg-12 control-label style1"> By clicking Submit, you agree to our Terms of Use.</label>
      </div>
        <div style="height: 10px;clear: both"></div>
        <div class="form-group">
        <div class="col-lg-10">
          <button class="btn btn-primary" type="submit" name="btnsubmit">Submit</button>
        </div>
        </div>
      </fieldset>
    </form> </td>
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
</footer>
</body>
</html>
