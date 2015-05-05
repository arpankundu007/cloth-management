<?php
 $servername = "localhost";
 $username = "root";
 $password = "1234";
 $dbname = "cloth_shop";
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $vendorname = $_POST['vendorname'];
    $company = $_POST['companyname'];
    $contactnumber = $_POST['contactnumber'];
    $address = $_POST['address'];
    if($vendorname && $contactnumber && $company && $address){
    $sql = "INSERT INTO Suppliers (Supplier_name, Supplier_company, Supplier_number, Supplier_address) VALUES('$vendorname', '$company','$contactnumber','$address')";
    if ($conn->query($sql) === TRUE) {
    	header('location:/db/forms.php');
       // echo "New record created successfully";
    } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

else{
    echo '<div class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert">&times;</a>
                 <strong>Error!</strong>Please, provide all the details of the vendor.
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
