<!DOCTYPE html>
<head>


<link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
</head>
    <body>
     <div id="myModal" class="modal show">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Order Details Of The Product</h4>
            </div>
            <div class="modal-body">

            <form id="loginform" class="form-horizontal" role="form" method="post"action="orderdetails.php">

                <div style="margin-bottom: 25px" class="input-group">
                    Unit Price : 
                    <?php        
                            
       $servername = "localhost";
       $username = "root";
       $password = "1234";
       $dbname = "cloth_shop";
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
        

        if (isset($_POST['product'])) {
          $x = $_POST['product'];

        $sql = "SELECT * FROM Products WHERE Product_id = '$x'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            echo "<i> Rs. ".$row["Product_unitprice"]." /- </i>"; 
          }
        }
        else{
          echo "row error";
        }
        echo "<br />";
        echo ' <input type="text" class="form-control" name="id" value="'.$x.' " placeholder="" readonly>';
        }
        else{
          echo "error";
          //header('location:/db/Cashier/calendar.php');
        }
      
?> 
                       
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                    <input id="login-username" type="text" class="form-control" name="quantity" value="" placeholder="Quantity">                                        
                </div>

                <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
            </div>
            <div class="modal-footer">
              
               <!-- <input type="submit" class="btn btn-primary pull-left" value="Back">
               
                <input type="submit" class="btn btn-success pull-right" value="Continue">
              -->
              <a type="button" class="btn btn-primary pull-left" href="/db/Cashier/calendar.php">Back to Previous page</a>

              
              <input type="submit" class="btn btn-success pull-right" value="Continue">
              
            </div>
        </form>
        </div>
    </div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="js/jquery-1.10.2.min.js"></script>
    <script src="vendors/fullcalendar/fullcalendar.js"></script>
    <script src="vendors/fullcalendar/gcal.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/calendar.js"></script>
</body>
  </html>  