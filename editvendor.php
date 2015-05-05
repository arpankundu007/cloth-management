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
    $company = $_POST['vendorcompany'];
    $contactnumber = $_POST['vendornumber'];
    $address = $_POST['vendoraddress'];
    $id = $_POST['vendorid'];

    $sql = "UPDATE Suppliers SET Supplier_name = '$vendorname', Supplier_number = '$contactnumber', Supplier_company= '$company', Supplier_address='$address' WHERE Supplier_id = '$id'";
    if ($conn->query($sql) === TRUE) {
    	header('location:/db/forms.php');
       // echo "New record created successfully";
    } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
    }



?>