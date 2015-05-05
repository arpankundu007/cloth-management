<?php
	   $servername = "localhost";
       $username = "root";
       $password = "1234";
       $dbname = "cloth_shop";
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
        if (isset($_POST['quantity'])) {
          $x = $_POST['quantity'];
          $id = $_POST['id'];
        $sql = "SELECT * FROM Products WHERE Product_id = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        	while($row = $result->fetch_assoc()) {
           	$a = $row["Product_id"]; 
            $b = $row["Product_name"]; 
			$c = $row["Product_company"] ;
            $d = $row["Product_unitprice"]; 
            }   
      	}
      	$e = $x * $d;
      	//echo $e;
    	$sqli = "INSERT INTO OrderDetails (Product_id, Product_name, Product_company, Product_unitpricce, Quantity, Totalprice) VALUES('$a', '$b', '$c', '$d', '$x', '$e')";
        if ($conn->query($sqli) === TRUE) {
    	header('Location:/db/Cashier/calendar.php');
  			} else {
     		echo "Error: " . $sqli . "<br>" . $conn->error;
    	}
        echo $id;
        echo "<br />";
        echo 'Quantity : ';
        echo $x;
        }
        else{
          echo "error";
          //header('location:/db/Cashier/calendar.php');
        }


?>