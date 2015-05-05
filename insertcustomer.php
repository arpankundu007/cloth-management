<?php
 $servername = "localhost";
 $username = "root";
 $password = "1234";
 $dbname = "cloth_shop";
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $customername = $_POST['customername'];
    $contactnumber = $_POST['contactnumber'];
    if($customername&&$contactnumber){
    $sql = "INSERT INTO Customers (Name, Contact_Number) VALUES('$customername', '$contactnumber')";
    if ($conn->query($sql) === TRUE) {
    	header('location:/db/tables.php');
       // echo "New record created successfully";
    } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>