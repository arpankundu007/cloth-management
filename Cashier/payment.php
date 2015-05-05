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

            <form id="loginform" class="form-horizontal" role="form" method="post"action="paymentcal.php">


                <div style="margin-bottom: 25px" class="input-group">
                
					<input id="login-username" type="text" class="form-control" name="userid" value="" placeholder="Customer Id">                                        
                	
                </div>


                <div style="margin-bottom: 25px" class="input-group">
                   
                    <?php        
                            
       $servername = "localhost";
       $username = "root";
       $password = "1234";
       $dbname = "cloth_shop";
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
        

        if (isset($_POST['totalprice'])) {
          $x = $_POST['totalprice'];
        echo 'Total Price : <input type="text" class="form-control" name="tp" value="'.$x.' " placeholder="" readonly>';
        }
        else{
          echo "error";
          //header('location:/db/Cashier/calendar.php');
        }
      ?> 
                       
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                    <input id="login-username" type="text" class="form-control" name="cashgiven" value="" placeholder="Cash Given">                                        
                </div>

                <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
            </div>
            <div class="modal-footer">
              
              <a type="button" class="btn btn-primary pull-left" href="/db/Cashier/calendar.php">&larr; Back </a>

              <input type="submit" class="btn btn-success pull-right" value="Continue &rarr;">
              
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