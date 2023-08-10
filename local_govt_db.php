 <?php
//require ("constants.php");
include ('connect.php');


    $state = $_GET['state'];
    $conn = new mysqli ($servername, $username, $password, $dbname) or die("Connection to Database Failed");
    $stmt = $conn->stmt_init();
    $sql = "SELECT local_govt FROM local_govt WHERE state_id = (select id_no from state where state like '$state%')";
    $stmt->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<option>Select Your Local Government</option>";
    while($resultRow = $result->fetch_array(MYSQLI_NUM))
        echo "<option>$resultRow[0]</option>";
    $result->close();
    $stmt->close();
?>