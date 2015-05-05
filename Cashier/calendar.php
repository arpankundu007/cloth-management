

<!DOCTYPE html>
<html>
  <head>
    <title>Cashier Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="css/calendar.css" rel="stylesheet">

    
    

  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-9">
	              <!-- Logo -->
	              <div class="logo">
	                <h1> <a href="index.php">Cashier's Page of Cloth shop</a></h1>
	              </div>
	           </div>
	          
	           <div class="col-md-3">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="login.php"><i class="glyphicon glyphicon-off"></i>Log Out</a>
	                        
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Products</a></li>
                    <li class="current"><a href="calendar.php"><i class="glyphicon glyphicon-shopping-cart"></i>Orders</a></li>
                    <li><a href="stats.php"><i class="glyphicon glyphicon-usd"></i> Payment (Details)</a></li>
                    <li><a href="tables.php"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href="buttons.php"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                    <li><a href="forms.php"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">

        <div class="row">
          <div class="col-md-12">
            <div class="content-box-large">
              <form action="servercode.php" method="post">

              <div class="col-lg-6">
                  <div class="input-group">
                
                    <input id = "productid" type="number" class="form-control" name="product"placeholder="Enter Product Id">
                      </form>
                      <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </span>
                   
                  </div>
              </div>
               </form>
          </div>
        </div>
        </div>


         <div class="row">
          <div class="col-md-12">
            <div class="content-box-large">
             

              <div class="col-lg-6">
                  
                  <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Product_id</th>
                                        <th>Name </th>
                                        <th>Brand</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                        // Create connection
                                $servername = "localhost";
                                $username = "root";
                                $password = "1234";
                                $dbname = "cloth_shop";
                                $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                                if ($conn->connect_error) {
                                   die("Connection failed: " . $conn->connect_error);
                                } 
                                $sql = "SELECT * FROM OrderDetails";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>". $row["Product_id"]."</td>"; 
                                        echo "<td>". $row["Product_name"]."</td>"; 
                                        echo "<td>". $row["Product_company"] ."</td>";
                                        echo "<td> Rs ". $row["Product_unitpricce"] ." /-</td>";
                                        echo "<td>". $row["Quantity"] ."</td>";
                                        echo "<td> Rs. ". $row["Totalprice"] ." /- </td>";

                                       // echo "<td>". $row["Supplier_address"] ."</td>";
                                        //echo '<td><button class="btn btn-danger" id="deletedata" data-id= "'.$row["Supplier_id"].'" >Delete</button></td>';
                                        //echo '<td><button id = "editer" class= "btn btn-success" onclick= "editform('.$row["Supplier_id"].',\''.$row["Supplier_name"].'\', \''.$row["Supplier_company"].'\','.$row["Supplier_number"].',\''.$row["Supplier_address"].'\');" >Update</button></td>';
                                        echo "</tr>";
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                  </div>
              </div>
              
          </div>
        </div>
        </div>

<div class="row">
   <form action="payment.php" method="post"> 

          <div class="col-md-3">
              
            <div class="content-box-large">

              Total price: 
                         <?php
                                        // Create connection
                                $servername = "localhost";
                                $username = "root";
                                $password = "1234";
                                $dbname = "cloth_shop";
                                $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                                if ($conn->connect_error) {
                                   die("Connection failed: " . $conn->connect_error);
                                } 
                                 $pr = 0;
                                $sql = "SELECT Totalprice FROM OrderDetails";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                   // $pr = 0;
                                    while($row = $result->fetch_assoc()) {
                                         $pr = $pr + $row["Totalprice"] ;
                                        }
                                    }
                                 echo "Rs. ".$pr." /-";   
                                 echo '<input style="display:none;"type="text" name="totalprice" value="'.$pr.'" > ';
                                ?>
          </div>


        </div>
        <div class="col-md-5">
        </div>
        <div class="col-md-4">
        
        <button type="submit"class="btn btn-success pull-right"> Make Payment</button>
      
      </div>
      </form>
  </div>



		  </div>
		  
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

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

    <script>


    </script>
  </body>
</html>