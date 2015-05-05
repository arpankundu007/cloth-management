<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               
                <a class="navbar-brand" href="admin.php">Admin's Page Of Cloth Shop</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
             
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.php"><i class="fa fa-fw fa-user"></i> Employers</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-user"></i> Customers</a>
                    </li>
                    <li>
                        <a href="forms.php"><i class="fa fa-fw fa-user"></i> Vendors</a>
                    </li>
                    <li class="active">
                        <a href="bootstrap-elements.php"><i class="fa fa-fw fa-tag"></i> Products</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.php"><i class="fa fa-fw fa-usd"></i>Transactions</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.php"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bootstrap Elements
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Bootstrap Elements
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Main jumbotron for a primary marketing message or call to action -->
                
                    <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Product_id</th>
                                        <th>Name </th>
                                        <th>Brand</th>
                                        <th>Unit Price</th>
                                        <th>Quantity in Stock</th>
                                        <th>Quantity in order</th>
                                        <th>Supplier Id</th>
                                        <th></th>
                                        <th></th>
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
                                        echo "<td>". $row["Product_instock"] ."</td>";
                                        echo "<td>". $row["Product_instock"] ."</td>";
                                        echo "<td>". $row["Supplier_id"] ."</td>";
                                        //echo '<td><button class="btn btn-danger" id="deletedata" data-id= "'.$row["Supplier_id"].'" >Delete</button></td>';
                                        //echo '<td><button id = "editer" class= "btn btn-success" onclick= "editform('.$row["Supplier_id"].',\''.$row["Supplier_name"].'\', \''.$row["Supplier_company"].'\','.$row["Supplier_number"].',\''.$row["Supplier_address"].'\');" >Update</button></td>';
                                        echo '<td><button class="btn btn-danger">Delete</button></td>';
                                        echo '<td><button class="btn btn-success">Edit</button></td>';
                                        echo "</tr>";
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
