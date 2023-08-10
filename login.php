<?php
session_start();
error_reporting(0);
include('connect.php');

if(isset($_POST['btnlogin']))
{


$email = $_POST['txtemail'];
$patientID = $_POST['txtpatientID'];

 $sql = "SELECT * FROM patients WHERE email='".$email."' and patientID = '".$patientID."'";
  $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
($row = mysqli_fetch_assoc($result));
$_SESSION["email"] = $row['email'];
$_SESSION["patientID"] = $row['patientID'];


header("Location: calculator.php"); 
}else { 

$msg_error = "Wrong Email or patient ID";
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login Form</title>
  <link href="bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
  <link href="css/all.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.jpg">

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
		 <li class=""><a href="index.php">Home</a></li>
          <li class="active"></li>
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
        <td width="748"><form action="" method="post" name="f" class="form-horizontal contactform" id="f" >
      <fieldset>
      <div class="form-group">
        <label class="col-lg-12 control-label" for="pass1">Email:
          <input type="email"  id="pass1" class="form-control" name="txtemail"  value="<?php if (isset($_POST['txtemail']))?><?php echo $_POST['txtemail']; ?>" required="" />
        </label>
      </div>
        <div class="form-group">
        <label class="col-lg-12 control-label" for="pass1">Patient ID:
          <input type="text"  id="pass1" class="form-control" name="txtpatientID"  value="<?php if (isset($_POST['txtpatientID']))?><?php echo $_POST['txtpatientID']; ?>" required="" />
        </label>
      </div>
        
        <div style="height: 10px;clear: both"></div>
        <div class="form-group">
        <div class="col-lg-10">
          <button class="btn btn-primary" type="submit" name="btnlogin">Login</button>
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
