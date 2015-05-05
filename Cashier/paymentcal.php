<?php

                                      
       $servername = "localhost";
       $username = "root";
       $password = "1234";
       $dbname = "cloth_shop";
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
        if (isset($_POST['cashgiven']) && isset($_POST['userid']) && isset($_POST['tp'])){
          $x = $_POST['cashgiven'];
          $y = $_POST['userid'];
          $z = $_POST['tp'];
          $b = $x - $z;
          if($b > 0){
           $sqli = "INSERT INTO PaymentDetails (User_id, Totalprice, Cashgiven, Balance) VALUES('$y', '$z', '$x', '$b')";
           if ($conn->query($sqli) === TRUE) {
            header('location:/db/Cashier/stats.php');
      
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }   
          }
          else{
            echo 'Cash given is not sufficient';
          }
        }

        else{
          echo $_POST['cashgiven'];
          echo $_POST['userid']; 
          echo $_POST['tp'];
        }
?>