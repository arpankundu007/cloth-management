<!DOCTYPE html>
<html>
  <head>
    <title>Sales Man</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-9">
	              <!-- Logo -->
	              <div class="logo">
	                <h1> <a href="login.php">Cashier's Page of Cloth shop</a></h1>
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
                    <li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Products</a></li>
                    <li><a href="calendar.php"><i class="glyphicon glyphicon-shopping-cart"></i> Orders</a></li>
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
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>

		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-12">
		  			<div class="content-box-large">
		  				<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Product_id</th>
                                        <th>Name </th>
                                        <th>Brand</th>
                                        <th>Unit Price</th>
                                        
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
                                $sql = "SELECT * FROM Products";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>". $row["Product_id"]."</td>"; 
                                        echo "<td>". $row["Product_name"]."</td>"; 
                                        echo "<td>". $row["Product_company"] ."</td>";
                                        echo "<td> Rs ". $row["Product_unitprice"] ." /-</td>";
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
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>