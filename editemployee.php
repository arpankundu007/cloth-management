<?php
 $servername = "localhost";
 $username = "root";
 $password = "1234";
 $dbname = "cloth_shop";
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $id = $_POST['employeeid'];
	$employeename = $_POST['employeename'];
    $employeenumber = $_POST['employeenumber'];
    $bd = $_POST['employeebd'];
    $hd = $_POST['employeehd'];
    $len = strlen($bd);
    $a = $bd[$len-4];$b = $bd[$len-3];$c = $bd[$len-2];$d = $bd[$len-1];
    $year = $a.$b.$c.$d;
    $age = 2014 - (int)$year;
    $address = $_POST['address'];
    $type = $_POST['type'];

    $len2 = strlen($hd);
    $a2 = $hd[$len2-4];$b2 = $hd[$len2-3];$c2 = $hd[$len2-2];$d2= $hd[$len2-1];
    $year2 = $a2.$b2.$c2.$d2;
    $age2 = 2014 - (int)$year2;
    if($age - $age2 >= 18){
    $sql = "UPDATE Employees SET Employee_name = '$employeename', Employee_number = '$employeenumber', Employee_bd= '$bd', Employee_hd = '$hd',Employee_age ='$age',Employee_address='$address',Employee_type='$type' WHERE Employee_id = '$id'";
    if ($conn->query($sql) === TRUE) {
    	header('location:/db/charts.php');
       // echo "New record created successfully";
    } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

    else{
        //echo '<script>alert("Age should be greater than or equal to 18 years.")</script>';
        echo '<div class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert">&times;</a>
                 <strong>Error!</strong>Cannot change, age should be greater than or equal to 18 years.
                </div>';
        echo '<a type="button" style="margin-left:500px;margin-top:200px;"class="btn btn-primary" href="/db/charts.php">Back to Previous page</a>';

    }

?>

 <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
<!--    <link href="css/sb-admin.css" rel="stylesheet">
-->
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
